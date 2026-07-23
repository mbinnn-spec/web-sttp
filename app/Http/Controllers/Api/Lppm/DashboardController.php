<?php

namespace App\Http\Controllers\Api\Lppm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Dashboard Ketua LPPM',
            'data' => [
                'proposal_menunggu' => Proposal::where('status', 'review_lppm')->count(),

                'proposal_disetujui' => Proposal::where('status', 'review_ketua_stt')->count(),

                'proposal_ditolak' => Proposal::where('status', 'ditolak')->count(),

                'proposal_revisi' => Proposal::where('status', 'revisi')->count(),
            ]
        ]);
    }
}
