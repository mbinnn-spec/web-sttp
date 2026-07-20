<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'ketua_peneliti_id',
        'judul',
        'abstrak',
        'skema',
        'bidang_fokus',
        'kata_kunci',
        'tahun_pengajuan',
        'tanggal_pengajuan',
        'target_selesai',
        'progress',
        'total_dana',
        'status',
    ];

    public function ketuaPeneliti()
    {
        return $this->belongsTo(User::class, 'ketua_peneliti_id');
    }

    public function members()
    {
        return $this->hasMany(ProposalMember::class);
    }

    public function rabs()
    {
        return $this->hasMany(ProposalRab::class);
    }

    public function files()
    {
        return $this->hasMany(ProposalFile::class);
    }

    public function report()
    {
        return $this->hasOne(ResearchReport::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}