<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Requests\proposal\StoreProposalRequest;
use App\Http\Requests\proposal\UpdateProposalRequest;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index()
    {
        return Proposal::with('ketuaPeneliti')
            ->where('ketua_peneliti_id', Auth::id())
            ->latest()
            ->get();
    }

    public function store(StoreProposalRequest $request)
    {
        $proposal = Proposal::create([
            ...$request->validated(),
            'ketua_peneliti_id' => Auth::id(),
            'progress' => 0,
            'total_dana' => 0,
            'status' => 'draft',
        ]);

        return response()->json([
            'message' => 'Proposal berhasil dibuat.',
            'data' => $proposal
        ], 201);
    }

    public function show(Proposal $proposal)
    {
        return $proposal->load([
            'ketuaPeneliti',
            'members.user',
            'rabs',
            'files',
            'report',
            'reviews'
        ]);
    }

    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->update($request->validated());

        return response()->json([
            'message' => 'Proposal berhasil diperbarui.',
            'data' => $proposal
        ]);
    }

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();

        return response()->json([
            'message' => 'Proposal berhasil dihapus.'
        ]);
    }
}