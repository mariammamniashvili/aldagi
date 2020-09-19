<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    protected $table = 'users';
    public $primaryKey = 'id';
    protected $name = 'name';
    protected $last_name = 'last_name';
    protected $user_id = 'user_id';
    protected $phone = 'phone';
    protected $email = 'email';
    protected $birthday = 'birthday';
    public $timestamps = true;
}