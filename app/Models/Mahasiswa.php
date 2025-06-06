<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa'; 

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'Id', 'Id');
    }
}
