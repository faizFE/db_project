<?php

namespace App\Http\Controllers;

use App\Models\approveModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class approveController extends Controller
{
    private function authorizeAdmin(): void
    {
        $user = Auth::user();

        abort_unless(
            $user && in_array($user->role, [
                'user',
                'admin'
            ]),
            403
        );
    }

    public function index(): RedirectResponse
    {
        $this->authorizeAdmin();

        return redirect()->route('dashboard');
    }

    public function approve(approveModel $approval): RedirectResponse
    {
        $this->authorizeAdmin();

        abort_unless($approval->status === 'pending', 404);

        $approval->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil disetujui!');
    }

    public function reject(approveModel $approval): RedirectResponse
    {
        $this->authorizeAdmin();

        abort_unless($approval->status === 'pending', 404);

        $approval->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil ditolak.');
    }
}
