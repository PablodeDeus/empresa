<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
/*    use HasFactory;
*/
    protected $fillable = ['nome', 'setor'];

        
    public function cargoFuncionario()
    {
        return $this->hasMany(Pessoa::class, 'cargo', 'id');
    }
}