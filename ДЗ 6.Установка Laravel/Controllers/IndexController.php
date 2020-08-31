<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 27.07.2020
 * Time: 15:27
 */

namespace App\Http\Controllers;



class IndexController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function show(){

        return view('index');
    }

    public function laravel_show(){

        return view('site.index');
    }



}
