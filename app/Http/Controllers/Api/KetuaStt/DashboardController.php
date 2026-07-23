<?php

namespace App\Http\Controllers\Api\KetuaStt;

use App\Http\Controllers\Controller;
use App\Models\Proposal;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = [
            'proposal_menunggu' => Proposal::where('status', 'review_ketua_stt')->count(),
            'proposal_disetujui' => Proposal::where('status', 'disetujui')->count(),
            'proposal_ditolak' => Proposal::where('status', 'ditolak')->count(),
        ];

        return response()->json([
            'success' => true,
            'message' => 'Dashboard Ketua STT berhasil diambil.',
            'data' => $dashboard
        ]);
    }
}