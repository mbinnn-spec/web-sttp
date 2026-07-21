<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proposal\StoreProposalFileRequest;
use App\Http\Requests\Proposal\UpdateProposalFileRequest;
use App\Models\ProposalFile;
use Illuminate\Support\Facades\Storage;

class ProposalFileController extends Controller
{
    public function index()
    {
        return ProposalFile::with('proposal')
            ->latest()
            ->get();
    }

    public function store(StoreProposalFileRequest $request)
    {
        $file = $request->file('file');

        $path = $file->store('proposals', 'public');

        $proposalFile = ProposalFile::create([
            'proposal_id' => $request->proposal_id,
            'jenis_file' => $request->jenis_file,
            'nama_file' => $file->getClientOriginalName(),
            'path_file' => $path,
            'status_upload' => 'draft',
        ]);
        return response()->json([
            'message' => 'File proposal berhasil diupload.',
            'data' => $proposalFile
        ], 201);
    }

    public function show(ProposalFile $proposalFile)
    {
        return $proposalFile;
    }

    public function update(UpdateProposalFileRequest $request, ProposalFile $proposalFile)
    {
        $data = [
            'proposal_id' => $request->proposal_id,
            'jenis_file' => $request->jenis_file,
        ];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($proposalFile->path_file);

            $file = $request->file('file');
            $path = $file->store('proposals', 'public');

            $data['nama_file'] = $file->getClientOriginalName();
            $data['path_file'] = $path;

            // kembali menjadi draft karena ada revisi/upload baru
            $data['status_upload'] = 'draft';
        }

        $proposalFile->update($data);

        return response()->json([
            'message' => 'File proposal berhasil diperbarui.',
            'data' => $proposalFile
        ]);
    }

    public function destroy(ProposalFile $proposalFile)
    {
        Storage::disk('public')->delete($proposalFile->path_file);

        $proposalFile->delete();

        return response()->json([
            'message' => 'File proposal berhasil dihapus.'
        ]);
    }
}