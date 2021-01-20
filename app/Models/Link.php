<?php

namespace App\Models;

use App\Facades\ToShortUrlFacade;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    public function getUpdatedAtAttribute($value)
    {
        $date = new Carbon($value);
        $date->addWeeks(2);
        return $date;
    }


    public static function paginateLinks($userId, $linksOnPage = 10)
    {
        return self::where('user_id', $userId)
            ->paginate($linksOnPage);
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function create($fullUrl,$userId)
    {
        $shortUrl = ToShortUrlFacade::toShort($fullUrl);

        $link = new Link();
        $link->full_url = $fullUrl;
        $link->short_url = $shortUrl;
        $link->user_id = $userId;
        $save = $link->save();

        if(!$save) throw new \Exception('Link doesn\'t create!');

        return $link;
    }
}
