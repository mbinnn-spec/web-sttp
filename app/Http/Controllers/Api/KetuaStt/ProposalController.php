<?php

namespace App\Http\Controllers\Api\KetuaStt;

use App\Http\Controllers\Controller;
use App\Http\Requests\KetuaStt\ApproveProposalRequest;
use App\Http\Requests\KetuaStt\RejectProposalRequest;
use App\Models\Proposal;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::with('ketuaPeneliti')
            ->where('status', 'review_ketua_stt')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar proposal untuk persetujuan Ketua STT.',
            'data' => $proposals
        ]);
    }

    public function show(Proposal $proposal)
    {
        $proposal->load([
            'ketuaPeneliti',
            'members',
            'rabs',
            'files',
            'reviews'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Detail proposal berhasil diambil.',
            'data' => $proposal
        ]);
    }

    public function approve(ApproveProposalRequest $request, Proposal $proposal)
    {
        if ($response = $this->validateProposalStatus($proposal)) {
            return $response;
        }

        return $this->processReview(
            $proposal,
            'disetujui',
            'disetujui',
            null,
            'Proposal berhasil disetujui.'
        );
    }

    public function reject(RejectProposalRequest $request, Proposal $proposal)
    {
        if ($response = $this->validateProposalStatus($proposal)) {
            return $response;
        }

        return $this->processReview(
            $proposal,
            'ditolak',
            'ditolak',
            null,
            'Proposal berhasil ditolak.'
        );
    }

    private function processReview(
        Proposal $proposal,
        string $proposalStatus,
        string $reviewStatus,
        ?string $catatan,
        string $message
    ) {
        $proposal->update([
            'status' => $proposalStatus
        ]);

        Review::create([
            'proposal_id' => $proposal->id,
            'reviewer_id' => Auth::id(),
            'status' => $reviewStatus,
            'catatan' => $catatan,
        ]);

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $proposal->fresh()
        ]);
    }

    private function validateProposalStatus(Proposal $proposal)
    {
        if ($proposal->status !== 'review_ketua_stt') {
            return response()->json([
                'success' => false,
                'message' => 'Proposal tidak dapat diproses karena status saat ini adalah ' . $proposal->status . '.'
            ], 400);
        }

        return null;
    }
}