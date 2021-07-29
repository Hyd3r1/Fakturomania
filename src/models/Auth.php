<?php

namespace khaller\fakturomania\models;

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