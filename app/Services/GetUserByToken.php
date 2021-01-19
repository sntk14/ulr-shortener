<?php


namespace App\Services;


use App\User;
use Illuminate\Support\Facades\Cookie;

class GetUserByToken
{
    private $cookieKey = 'user_key';

    public function getUserByCookie()
    {
        if (!Cookie::has($this->cookieKey)) {
            $hashCode = $this->setUserKeyInCookie();
        } else {
            $hashCode = Cookie::get($this->cookieKey);
        }

        return User::where('code', $hashCode)->first();
    }

    private function setUserKeyInCookie()
    {
        $hashCode = hash('sha256', request()->getClientIp() . rand(-9999, 9999));
        Cookie::queue($this->cookieKey, $hashCode, 99999);
        User::create($hashCode);

        return $hashCode;
    }

}
