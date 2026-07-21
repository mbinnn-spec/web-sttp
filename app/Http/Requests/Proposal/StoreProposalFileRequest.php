<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class StoreProposalFileRequest extends FormRequest
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
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ];
    }
}