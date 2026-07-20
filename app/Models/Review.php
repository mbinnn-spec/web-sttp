<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'proposal_id',
        'reviewer_id',
        'status',
        'catatan',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}