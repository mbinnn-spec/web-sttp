<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $proposal = Proposal::where('ketua_peneliti_id', $userId);

        return response()->json([
            'success' => true,
            'message' => 'Dashboard berhasil dimuat.',
            'data' => [
                'total_proposal' => $proposal->count(),
                'proposal_disetujui' => (clone $proposal)->where('status', 'disetujui')->count(),
                'proposal_ditolak' => (clone $proposal)->where('status', 'ditolak')->count(),
                'proposal_revisi' => (clone $proposal)->where('status', 'revisi')->count(),
                'proposal_draft' => (clone $proposal)->where('status', 'draft')->count(),
                'proposal' => $proposal->latest()->take(5)->get(),
            ],
        ]);
    }
}