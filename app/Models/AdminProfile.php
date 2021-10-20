<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;
    protected $visible = ['name','email','mobile','password','address','city','plans','pincode','terms','payment','status',];
}
