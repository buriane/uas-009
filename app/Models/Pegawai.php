<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'email',
        'tanggal_lahir',
        'jenis_kelamin',
        'departemen_id',
        'jabatan_id',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
