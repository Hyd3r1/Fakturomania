<?php
namespace khaller\fakturomania\models;
use Jenssegers\Model\Model;

class Auth extends Model {
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'value',
        'userEmail',
        'userLoginEmail',
        'valid',
        'remember'
    ];
}