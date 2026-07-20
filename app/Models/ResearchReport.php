<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchReport extends Model
{
    protected $fillable = [
        'proposal_id',
        'judul',
        'ringkasan',
        'file_laporan',
        'status',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}