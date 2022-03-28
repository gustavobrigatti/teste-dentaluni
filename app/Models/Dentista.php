<?php

namespace App\Models;

use App\Traits\Hashid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dentista extends Model
{
    use HasFactory, SoftDeletes, Hashid;

    protected $table = 'dentistas';

    protected $fillable = ['name', 'email', 'cro', 'cro_uf'];

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class , 'dentistas_especialidades')->withTimestamps();
    }
}
