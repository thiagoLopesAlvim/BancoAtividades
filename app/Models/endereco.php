<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class endereco extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "logradouro",
        "numero",
        "cidade",
        "cep",
        "complemento",
        "estado",
        "usuario_id"
    ] ;

}