<?php

namespace App\Http\Requests\Lppm;

use Illuminate\Foundation\Http\FormRequest;

class ApproveProposalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'catatan' => 'nullable|string|max:1000',
        ];
    }
}