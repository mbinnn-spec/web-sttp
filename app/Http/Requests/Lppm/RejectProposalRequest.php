<?php

namespace App\Http\Requests\Lppm;

use Illuminate\Foundation\Http\FormRequest;

class RejectProposalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'catatan' => 'required|string|max:1000',
        ];
    }
}