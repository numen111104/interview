<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramIdn extends Model
{
    use HasFactory;

    protected $table = 'program_idn';

    protected $fillable = [
        'cabang_idn', 'nama_program'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_idn', 'id', 'cabangs');
    }
}
