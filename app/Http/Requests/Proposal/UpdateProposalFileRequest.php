<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'jenis_file' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ];
    }
}