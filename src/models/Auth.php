<?php

namespace Fakturomania\Models;

use Jenssegers\Model\Model;

class Auth extends Model
{
  protected $fillable = [
    'value',
    'userEmail',
    'userLoginEmail',
    'valid',
    'remember',
    'password'
  ];
}