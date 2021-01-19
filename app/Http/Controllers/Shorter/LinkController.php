<?php

namespace App\Http\Controllers\Shorter;

use App\Facades\UserCodeFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;


class LinkController extends Controller
{
    /**
     * @param Request $request
     *
     */
    public function index(Request $request)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();

            $links = Link::paginateLinks($user->id);

            return view('pages.links.links',['links' => $links]);
        } catch (\Exception $e) {
            return back()->with(['type' => 'error','message' => $e->getMessage()]);
        }

    }


    public function create()
    {
        try {

            return view('index');
        } catch (\Exception $e) {
            return back()->with(['type' => 'error','message' => $e->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param LinkRequest $request
     *
     */
    public function store(LinkRequest $request)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();
            $fullUrl = $request->full_url;

            $link = Link::create($fullUrl,$user->id);

            return view('pages.links.links-created',['link' => $link]);
        } catch (\Exception $e) {
            return back()->with(['type' => 'error','message' => $e->getMessage()]);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param integer $id
     *
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();

            Link::where([
                ['id',$id],
                ['user_id', $user->id]
            ])->limit(1)->delete();

            return back()->with(['type' => 'success','message' => 'Link was deleted']);
        } catch (\Exception $e){
            return back()->with(['type' => 'error','message' => $e->getMessage()]);
        }
    }
}
