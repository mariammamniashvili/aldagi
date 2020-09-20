<?php

namespace App\Models\CarInfo;

use Illuminate\Database\Eloquent\Model;

class GetCarModels extends Model
{
   protected $table = 'model';
   public $primaryKey = 'id';
   public $manufacturer_id = 'manufacturer_id';
   protected $model_name = 'model_name';
   //protected $password = 'password';
   //public $timestamps = true;
}
