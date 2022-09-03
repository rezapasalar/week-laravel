<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

if (! function_exists('enToFa')) {
    function enToFa($value) {

        if (strlen($value)) {
            return strtr($value, array('0'=>'۰','1'=>'۱','2'=>'۲','3'=>'۳','4'=>'۴','5'=>'۵','6'=>'۶','7'=>'۷','8'=>'۸','9'=>'۹'));
        }
        
    }
}

if (! function_exists('license')) {
    function license() {
        
        if (!Session::has('license')) {
            return false;
        }

        $license = \App\Models\License::whereUsername(Session::get('license'))->first();

        if (!$license) {
            Session::remove('license');
            return false;
        }

        if ($license->expires_at < now()) {
            Session::remove('license');
            return false;
        }

        return true;
        
    }
}

if (! function_exists('authorize')) {
    function authorize($permissions) {
        foreach ($permissions as $permission) {
            if(Gate::allows($permission)){
                return true;
            }
        }

        return abort(403, 'THIS ACTION IS UNAUTHORIZED.');
    }
}

if (! function_exists('getSettings')) {
    function getSettings() {
        if (!cache()->has('settings')) {
            $settings = Setting::first() ?? null;

            if (!$settings) return null;

            Cache::forever('settings', $settings);
        }

        return cache('settings');
    }
}