<?php

namespace App\Http\Requests\KetuaStt;

use Illuminate\Foundation\Http\FormRequest;

class ApproveProposalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}