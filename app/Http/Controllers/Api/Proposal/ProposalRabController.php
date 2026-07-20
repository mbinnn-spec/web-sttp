<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Models\ProposalRab;
use Illuminate\Http\Request;

class ProposalRabController extends Controller
{
    public function index()
    {
        return ProposalRab::with('proposal')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'kelompok' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:1',
        ]);

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

    public function update(Request $request, ProposalRab $proposalRab)
    {
        $validated = $request->validate([
            'kelompok' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:1',
        ]);

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