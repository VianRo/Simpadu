<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'Id'; // <--- tambahkan ini
    public $timestamps = false; // jika tabel tidak ada created_at/updated_at

    protected $fillable = [
        'Nama', 'Kaprodi', 'Jurusan'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'Id', 'Id');
    }
}
