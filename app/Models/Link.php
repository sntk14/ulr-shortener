<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    public function getUpdatedAttribute($value)
    {
        $date = new Carbon($value);
        $date->addWeeks(2);
        $this->attributes['delete_at'] = $date;
        return $date;
    }
    public function getPart($part)
    {

    }

}
