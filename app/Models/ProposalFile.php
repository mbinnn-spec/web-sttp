<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalFile extends Model
{
    protected $fillable = [
        'proposal_id',
        'jenis_file',
        'nama_file',
        'path_file',
        'status_upload',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}