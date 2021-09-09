<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pessoa;


class Tasks extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'id_creater',
        'id_assigned',
    ];

    public function creator()
    { 
        return $this->hasOne(Pessoa::class, 'id' ,'id_creater' );
    }

    public function assigned()
    {
        return $this->hasOne(Pessoa::class, 'id', 'id_assigned' );
    }
}
