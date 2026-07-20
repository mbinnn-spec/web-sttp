<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'abstrak' => 'required|string',
            'skema' => 'required|string|max:255',
            'bidang_fokus' => 'required|string|max:255',
            'kata_kunci' => 'required|string|max:255',
            'tahun_pengajuan' => 'required|digits:4',
            'tanggal_pengajuan' => 'required|date',
            'target_selesai' => 'required|date',
        ];
    }
}
