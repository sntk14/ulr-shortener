<?php

namespace App\Http\Controllers\Shorter;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Services\ToShortUrl;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class LinkController extends Controller
{
    /**
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        try {
            
            if($request->has('code')){
                $links = Link::pagination(10);
            }
            $links = Link::where('');
            return view('index', ['links' => $links]);
        } catch (\Exception $e) {
            //TODO error
        }

    }


    public function create(Request $request)
    {
        try {

            $date = Carbon::now();
            return view('index', ['date' => $date]);
        } catch (\Exception $e) {
            //TODO error
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param LinkRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(LinkRequest $request)
    {
        try {
            if(!$request->hasCookie('user_key')) {
                $hashCode = hash('sha256',$request->getClientIp() . rand(-9999, 9999));
                $request->cookie('user_key', $hashCode);
                Cookie::queue('user_key', $hashCode,99999);
                $user = new User();
                $user->code = $hashCode;
                $user->save();
            } else {
                $hashCode = $request->cookie('user_key');
            }
            $user = User::where('code', $hashCode)->limit(1)->first();

            $fullUrl = $request->full_url;

            $link = new Link();
            $toShort = new ToShortUrl();
            $shortUrl = $toShort->toShort($fullUrl);
            $link->full_url = $fullUrl;
            $link->short_url = $shortUrl;
            $link->user_id = $user->id;
            $link->save();

            return view('link.created',['link' => $link]);
        } catch (\Exception $e) {
            //TODO error
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
