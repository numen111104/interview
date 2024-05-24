<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'nama',
        'jenis_kelamin',
        'cabang_idn',
        'program_idn',
        'bukti_transfer',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_idn');
    }

    public function program()
    {
        return $this->belongsTo(ProgramIdn::class, 'program_idn');
    }
}
