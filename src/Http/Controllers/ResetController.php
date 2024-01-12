<?php

namespace Whitecube\LaravelCookieConsent\Http\Controllers;

use Whitecube\LaravelCookieConsent\CookiesManager;
use Illuminate\Http\Request;

class ResetController
{
    public function __invoke(Request $request, CookiesManager $cookies)
    {
        $response = ! $request->expectsJson()
            ? redirect()->back()
            : response()->json([
                'status' => 'ok',
                'scripts' => $cookies->getNoticeScripts(true),
                'notice' => $cookies->getNoticeMarkup(),
            ]);

        return $response->withoutCookie(
            config('cookieconsent.cookie.name'),
            null,
            config('cookieconsent.cookie.domain'),
        );
    }
}
