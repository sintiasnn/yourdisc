<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Loan;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Loan::with('member')->latest();

        // Filter status: PENDING, RETURNED, OVERDUE (turunan)
        if (request()->filled('status')) {
            $status = request('status');
            if ($status === 'OVERDUE') {
                $query->where('status', 'PENDING')->whereDate('due_date', '<', now()->toDateString());
            } elseif (in_array($status, ['PENDING', 'RETURNED'])) {
                $query->where('status', $status);
            }
        }

        // Filter member
        if (request()->filled('member_id')) {
            $query->where('member_id', request('member_id'));
        }

        $loans = $query->paginate(10)->appends(request()->query());
        $members = Member::orderBy('name')->get(['id','name']);

        return view('loans.index', compact('loans','members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::orderBy('name')->get();
        $films = Film::where('stock', '>', 0)->orderBy('title')->get();

        return view('loans.create', compact('members', 'films'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'film_ids' => 'required|array|min:1',
            'film_ids.*' => 'required|exists:films,id',
            'loan_date' => 'required|date',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $days = (int) config('app.loan_default_days', 7);
                $dueDate = Carbon::parse($validated['loan_date'])->addDays($days)->toDateString();
                $loan = Loan::create([
                    'member_id' => $validated['member_id'],
                    'loan_date' => $validated['loan_date'],
                    'due_date' => $dueDate,
                    'status' => 'PENDING',
                ]);

                foreach ($validated['film_ids'] as $film_id) {
                    $film = Film::find($film_id);
                    if ($film->stock < 1) {
                        throw new \Exception("Film {$film->title} is out of stock.");
                    }

                    $loan->loanItems()->create([
                        'film_id' => $film_id,
                    ]);

                    $film->decrement('stock');
                }
            });

            return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan peminjaman: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        $loan->load(['member', 'loanItems.film']);

        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function return(Loan $loan)
    {
        if ($loan->status !== 'PENDING') {
            return redirect()->route('loans.show', $loan->id)->with('error', 'Peminjaman ini tidak dapat dikembalikan.');
        }

        try {
            DB::transaction(function () use ($loan) {
                $loan->load('loanItems.film');
                $loan->update([
                    'status' => 'RETURNED',
                    'returned_at' => Carbon::now(),
                ]);

                foreach ($loan->loanItems as $item) {
                    $item->film->increment('stock');
                }
            });

            return redirect()->route('loans.show', $loan->id)->with('success', 'Peminjaman berhasil dikembalikan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengembalikan peminjaman: ' . $e->getMessage());
        }
    }
}
