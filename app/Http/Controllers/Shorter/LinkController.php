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
     * @return\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     **/
    public function index(Request $request)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();

            $links = Link::paginateLinks($user->id);

            return view('pages.links.links', ['links' => $links]);
        } catch (\Exception $e) {
            return view('index')->withErrors($e->getMessage());
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('index');
    }


    /**
     * Store a newly created resource in storage.
     * @param LinkRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(LinkRequest $request)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();
            $fullUrl = $request->full_url;

            $link = Link::create($fullUrl, $user->id);

            return view('pages.links.links-created', ['link' => $link]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     *
     * return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(int $id)
    {
        try {
            $user = UserCodeFacade::getUserByCookie();

            Link::where([
                ['id', $id],
                ['user_id', $user->id]
            ])->delete();

            return back()->with('success', 'Link was deleted');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
