<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request, $language)
    {
        if ($language) {
            $request->session()->put('language', $language);
        }

        return redirect()->back();
    }
}
