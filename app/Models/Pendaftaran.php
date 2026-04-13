<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'calon_siswa_id',
        'jalur_id',
        'tahun_ajaran_id',
        'asal_sekolah',
        'nilai_rapor',
        'file_ijazah',
        'file_kk',
        'file_akta',
        'status'
    ];

    // Relasi ke calon siswa
    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }

    // Relasi ke jalur
    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_id');
    }

    // Relasi ke tahun ajaran
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}