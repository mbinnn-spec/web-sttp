<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proposal\StoreResearchReportRequest;
use App\Http\Requests\Proposal\UpdateResearchReportRequest;
use App\Models\ResearchReport;
use Illuminate\Support\Facades\Storage;

class ResearchReportController extends Controller
{
    public function index()
    {
        return ResearchReport::with('proposal')
            ->latest()
            ->get();
    }

    public function store(StoreResearchReportRequest $request)
    {
        $file = $request->file('file_laporan');

        $path = $file->store('research-reports', 'public');

        $report = ResearchReport::create([
            'proposal_id' => $request->proposal_id,
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'file_laporan' => $path,
            'status' => 'draft',
        ]);

        return response()->json([
            'message' => 'Laporan penelitian berhasil ditambahkan.',
            'data' => $report
        ], 201);
    }

    public function show(ResearchReport $researchReport)
    {
        return $researchReport;
    }

    public function update(UpdateResearchReportRequest $request, ResearchReport $researchReport)
    {
        $data = [
            'proposal_id' => $request->proposal_id,
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
        ];

        if ($request->hasFile('file_laporan')) {
            Storage::disk('public')->delete($researchReport->file_laporan);

            $file = $request->file('file_laporan');
            $path = $file->store('research-reports', 'public');

            $data['file_laporan'] = $path;
            $data['status'] = 'draft';
        }

        $researchReport->update($data);

        return response()->json([
            'message' => 'Laporan penelitian berhasil diperbarui.',
            'data' => $researchReport
        ]);
    }

    public function destroy(ResearchReport $researchReport)
    {
        Storage::disk('public')->delete($researchReport->file_laporan);

        $researchReport->delete();

        return response()->json([
            'message' => 'Laporan penelitian berhasil dihapus.'
        ]);
    }
}