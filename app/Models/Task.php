<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /* CRAZIONE DI MASSA */
    protected $fillable = ['name'];

    /* RELAZIONE CON USER */
    public function user()
    {
        /* UN UTENTE */
        return $this->belongsTo(User::class);
    }
}
