<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';

    protected $fillable = [
        'nama_cabang',
        'kuota_tkj',
        'kuota_rpl',
        'kuota_dkv',
        'kuota_smp'
    ];

    public function programIdns()
    {
        return $this->hasMany(ProgramIdn::class, 'cabang_idn', 'id', 'program_idn');
    }
}
