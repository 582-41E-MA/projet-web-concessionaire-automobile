<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetLocaleController extends Controller
{
    public function index($locale){
        if (! in_array($locale, ['en', 'fr'])) {
            abort(400);
        }
        // dump($locale);
        App::setlocale($locale);
        Session::put('locale', $locale);
        return back();
     }
}
