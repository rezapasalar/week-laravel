<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function setLocaleSession($locale)
    {
        cookie()->queue('locale', $locale, 60);
        return redirect(url()->previous());
    }
}
