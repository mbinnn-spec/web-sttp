<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'status' => 'required|in:disetujui,revisi,ditolak',
            'catatan' => 'nullable|string',
        ];
    }
}