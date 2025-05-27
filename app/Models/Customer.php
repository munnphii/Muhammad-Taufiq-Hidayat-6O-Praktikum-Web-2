<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nik', 'name', 'telp', 'email', 'alamat'];

}
