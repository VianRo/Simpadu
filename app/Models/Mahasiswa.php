<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'NIM',
        'Nama', 
        'Tanggal_lahir',
        'Telp',
        'Email',
        'Password',
        'Foto',
        'Id' // Ini adalah foreign key ke tabel prodi
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'Id', 'Id');
    }
}
