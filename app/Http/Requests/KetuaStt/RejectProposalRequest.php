<?php

namespace App\Http\Requests\KetuaStt;

use Illuminate\Foundation\Http\FormRequest;

class RejectProposalRequest extends FormRequest
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