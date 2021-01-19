<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class UserCodeFacade extends Facade
{
 protected static function getFacadeAccessor()
 {
    return 'user_code';
 }
}
