<?php

namespace L56S\Http\Controllers\Page;

use L56S\Http\Controllers\Controller;

class PageController extends Controller
{

    /**
     * Show the home page to the user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('pages.index');

    }

    /**
     * Show the about page to the user.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the site frequently asked questions to the user.
     *
     * @return \Illuminate\View\View
     */
    public function help()
    {
        return view('pages.site-help');
    }

}
