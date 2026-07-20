<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalRab extends Model
{
    protected $fillable = [
        'proposal_id',
        'kelompok',
        'item',
        'satuan',
        'harga',
        'jumlah',
        'subtotal',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}