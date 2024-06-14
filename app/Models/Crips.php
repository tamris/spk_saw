<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria_id',
        'nama',
        'nilai',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatifKriterias()
    {
        return $this->hasMany(AlternatifKriteria::class);
    }
}
