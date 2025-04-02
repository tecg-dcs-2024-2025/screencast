<?php

namespace Animal\Models;

use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    protected $fillable = ['email', 'phone', 'first_name', 'last_name'];
}
