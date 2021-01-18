<?php


namespace App\Services;


use App\Models\Link;
//use Illuminate\Support\Facades\DB;


class getFullLink
{
    public function get($shortUrl)
    {
        $res = Link::where('short_url',$shortUrl)
            ->limit(1)
            ->first();

        if(!$res) throw new \Exception('Неизвестный url!');

        return $res;
    }
}
