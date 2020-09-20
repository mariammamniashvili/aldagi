<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
   protected $table = 'users';
   public $primaryKey = 'id';
   public $system_id = 'system_id';
   protected $first_name = 'first_name';
   protected $last_name = 'last_name';
   protected $user_id = 'user_id';
   protected $phone = 'phone';
   protected $email = 'email';
   protected $birthday = 'birthday';
   protected $manufacturer = 'manufacturer';
   protected $model = 'model';
   protected $issue_date = 'issue_date';
   protected $registration_number = 'registration_number';
   protected $status = 'status';
   public $timestamps = true;
}
