<?php

namespace App\Models;

use App\Traits\Hashid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidade extends Model
{
    use HasFactory, SoftDeletes, Hashid;

    protected $table = 'especialidades';

    protected $fillable = ['nome'];

    public function dentistas()
    {
        return $this->belongsToMany(Dentista::class , 'dentistas_especialidades')->withTimestamps();
    }
}
