<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProposalRabRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'kelompok'    => 'required|string|max:255',
            'item'        => 'required|string|max:255',
            'satuan'      => 'required|string|max:50',
            'harga'       => 'required|numeric|min:0',
            'jumlah'      => 'required|integer|min:1',
        ];
    }
}