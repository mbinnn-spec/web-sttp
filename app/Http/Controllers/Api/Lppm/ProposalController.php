<?php

namespace App\Http\Controllers\Api\Lppm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lppm\ApproveProposalRequest;
use App\Http\Requests\Lppm\RejectProposalRequest;
use App\Http\Requests\Lppm\RevisionProposalRequest;
use App\Models\Proposal;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::with('ketuaPeneliti')
            ->whereIn('status', [
                'review_lppm',
                'revisi'
            ])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar proposal untuk validasi Ketua LPPM.',
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
            'review_ketua_stt',
            'disetujui',
            $request->catatan,
            'Proposal berhasil disetujui dan dikirim ke Ketua STT.'
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
            $request->catatan,
            'Proposal berhasil ditolak.'
        );
    }
    
    public function revision(RevisionProposalRequest $request, Proposal $proposal)
    {
        if ($response = $this->validateProposalStatus($proposal)) {
            return $response;
        }

        return $this->processReview(
            $proposal,
            'revisi',
            'revisi',
            $request->catatan,
            'Proposal berhasil dikembalikan untuk revisi.'
        );
    }

    private function processReview(
        Proposal $proposal,
        string $proposalStatus,
        string $reviewStatus,
        ?string $catatan,
        string $message
    ) {
        // Update status proposal
        $proposal->update([
            'status' => $proposalStatus
        ]);

        // Simpan histori review
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
        if ($proposal->status !== 'review_lppm') {
            return response()->json([
                'success' => false,
                'message' => 'Proposal tidak dapat diproses karena status saat ini adalah ' . $proposal->status . '.'
            ], 400);
        }

        return null;
    }
}