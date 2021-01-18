<?php


namespace App\Services;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ToShortUrl
{
    public function toShort($fullUrl)
    {

        $faker = new Faker();

        do{//regexify('/[A-Za-z0-9]{5}/');
            $shortUrl = Str::random(5);

        }while($this->verifyUniqUrl($shortUrl));

        return $shortUrl;
    }
    private function verifyUniqUrl($shortUrl)
    {
        $res = DB::table('links')
            ->select('id')
            ->where('short_url',$shortUrl)
            ->limit(1)
            ->first();
        return $res ? true : false;
    }
}
