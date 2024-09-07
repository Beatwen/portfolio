<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller

{

    public function change(Request $request)
    {
        $lang = $request->query('lang');

        if (!in_array($lang, ['en', 'fr'])) {
            dd('error');
            abort(400);

        }
        Session::put('locale', $lang);

        App::setLocale($lang);
        App::setLocale('en');
        return redirect()->back();
    }
}
