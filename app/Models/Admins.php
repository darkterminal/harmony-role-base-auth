<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
     protected $table = 'admins';
     protected $fillable = ['name','email','role','password', 'password_reset'];

}