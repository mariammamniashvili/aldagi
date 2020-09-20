<?php

namespace App\Models\FinanceInfo;

use Illuminate\Database\Eloquent\Model;

class GetBonus extends Model
{
   protected $table = 'bonus';
   public $primaryKey = 'id';
   public $max_limit_id = 'max_limit_id';
   public $external_system_id = 'external_system_id';
   protected $limited = 'bonus_number';
   
}
