<?php

namespace App\Models\FinanceInfo;

use Illuminate\Database\Eloquent\Model;

class GetLimit extends Model
{
   protected $table = 'max_limit';
   public $primaryKey = 'id';
   public $external_system_id = 'external_system_id';
   protected $limited = 'limited';
   
}


