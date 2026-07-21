<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'reviewer_id' => 'required|exists:users,id',
            'status' => 'required|in:disetujui,revisi,ditolak',
            'catatan' => 'nullable|string',
        ];
    }
}