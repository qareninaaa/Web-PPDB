<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    protected $fillable = [
        'nama_jalur',
        'deskripsi'
    ];

    // Relasi ke pendaftaran
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'jalur_id');
    }
}