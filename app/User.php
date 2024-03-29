<?php

namespace App;

use App\Models\Link;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function create($code)
    {
        $user = new User();
        $user->code = $code;
        $res = $user->save();
        if(!$res) throw new \Exception('Error of user creating');
    }

    public function links()
    {
        return $this->hasMany(Link::class, 'user_id', 'id');
    }
}
