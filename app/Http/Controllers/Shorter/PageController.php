<?php

namespace App\Http\Controllers\Shorter;

use App\Http\Controllers\Controller;
use App\Services\getFullLink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
       return redirect(route('links.create'));
    }

    public function aboutCreatorPage()
    {

        return view('pages.author');
    }

    public function redirect(Request $request)
    {
        try {
            $getLink = new getFullLink();
            $linkObj = $getLink->get($request->short_url);
            $linkObj->visits++;
            $linkObj->save();

            return redirect($linkObj->full_url);
        } catch (\Exception $e){
            return redirect(route('index'));
        }

    }
}
