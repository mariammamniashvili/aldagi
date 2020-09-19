<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
   protected $table = 'external_system';
   public $primaryKey = 'id';
   protected $system_name = 'system_name';
   protected $password = 'password';
   public $timestamps = true;
}
