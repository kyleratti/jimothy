<?php

return [

    /*
     * Redirect URL after login
     */
    'redirect_url' => '/user/login/auth',

    /*
     * API Key (http://steamcommunity.com/dev/apikey)
     */
    'api_key' => env('STEAM_AUTH_API_KEY'),

    /*
     * Is using https ?
     */
    'https' => config('app.env') == 'production'

];
