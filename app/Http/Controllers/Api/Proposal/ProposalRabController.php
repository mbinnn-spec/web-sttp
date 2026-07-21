<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proposal\StoreProposalRabRequest;
use App\Http\Requests\Proposal\UpdateProposalRabRequest;
use App\Models\ProposalRab;

class ProposalRabController extends Controller
{
    public function index()
    {
        return ProposalRab::with('proposal')->get();
    }

    public function store(StoreProposalRabRequest $request)
    {
        $validated = $request->validated();

        $validated['subtotal'] = $validated['harga'] * $validated['jumlah'];

        $rab = ProposalRab::create($validated);

        return response()->json([
            'message' => 'Item RAB berhasil ditambahkan.',
            'data' => $rab
        ], 201);
    }

    public function show(ProposalRab $proposalRab)
    {
        return $proposalRab->load('proposal');
    }

    public function update(UpdateProposalRabRequest $request, ProposalRab $proposalRab)
    {
        $validated = $request->validated();

        $validated['subtotal'] = $validated['harga'] * $validated['jumlah'];

        $proposalRab->update($validated);

        return response()->json([
            'message' => 'RAB berhasil diperbarui.',
            'data' => $proposalRab
        ]);
    }

    public function destroy(ProposalRab $proposalRab)
    {
        $proposalRab->delete();

        return response()->json([
            'message' => 'RAB berhasil dihapus.'
        ]);
    }
}