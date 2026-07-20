<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Models\ProposalMember;
use Illuminate\Http\Request;

class ProposalMemberController extends Controller
{
    public function index()
    {
        return ProposalMember::with(['proposal', 'user'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $member = ProposalMember::create($validated);

        return response()->json([
            'message' => 'Anggota berhasil ditambahkan.',
            'data' => $member
        ], 201);
    }

    public function show(ProposalMember $proposalMember)
    {
        return $proposalMember->load(['proposal', 'user']);
    }

    public function update(Request $request, ProposalMember $proposalMember)
    {
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $proposalMember->update($validated);

        return response()->json([
            'message' => 'Data anggota berhasil diperbarui.',
            'data' => $proposalMember
        ]);
    }

    public function destroy(ProposalMember $proposalMember)
    {
        $proposalMember->delete();

        return response()->json([
            'message' => 'Anggota berhasil dihapus.'
        ]);
    }
}