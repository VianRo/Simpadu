<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    
    protected $fillable = [
        'Id',
        'Nama',
        'Kaprodi',
        'Jurusan'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'Id', 'Id');
    }
}
