<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
   protected $table = 'external_system';
   public $primaryKey = 'id';
   protected $system_name = 'system_name';
   protected $password = 'password';
   public $timestamps = true;
}
