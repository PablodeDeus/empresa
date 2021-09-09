<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
/*    use HasFactory;
*/
    protected $fillable = ['nome', 'email', 'telefone', 'cargo', 'setor'];

        
    public function tarefasCriadas()
    {
        return $this->hasMany(Tasks::class, 'id_creater', 'id');
    }

    public function tarefasRecebidas()
    {
        return $this->hasMany(Tasks::class, 'id_assigned', 'id');
    }

    public function cargoPessoa()
    { 
        return $this->hasOne(Cargo::class, 'id' ,'cargo' );
    }
}
