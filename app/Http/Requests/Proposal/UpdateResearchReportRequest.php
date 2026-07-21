<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResearchReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ];
    }
}