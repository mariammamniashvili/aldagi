<?php

namespace App\Models\CarInfo;

use Illuminate\Database\Eloquent\Model;

class GetCarManufacturers extends Model
{
   protected $table = 'manufacturers';
   public $primaryKey = 'id';
   protected $manufacturer_name = 'manufacturer_name';
   //protected $password = 'password';
   //public $timestamps = true;
}
