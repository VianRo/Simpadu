<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'NIM', 'Nama', 'Tanggal_lahir', 'Telp', 'Email', 'Password', 'Id', 'Foto'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'Id', 'Id');
    }
}
