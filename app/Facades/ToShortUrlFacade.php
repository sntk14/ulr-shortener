<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ToShortUrlFacade extends Facade
{
 protected static function getFacadeAccessor()
 {
    return 'to_short_url';
 }
}
