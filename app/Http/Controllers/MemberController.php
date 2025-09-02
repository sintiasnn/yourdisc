<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $randomCode = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
        $validated['code'] = 'MBR-' . $randomCode;

        // Pastikan kode unik (sejalan dengan unique index di DB)
        while (\App\Models\Member::where('code', $validated['code'])->exists()) {
            $randomCode = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
            $validated['code'] = 'MBR-' . $randomCode;
        }

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        // Cegah hapus jika ada loan aktif (status PENDING)
        $hasActiveLoan = $member->loans()->where('status', 'PENDING')->exists();

        if ($hasActiveLoan) {
            return redirect()->route('members.index')
                ->with('error', 'Tidak dapat menghapus member dengan peminjaman aktif.');
        }

        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus.');
    }
}
