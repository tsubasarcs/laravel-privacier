<?php

namespace Tsubasarcs\Privacier\Http\Controllers;

use Tsubasarcs\Privacier\Facades\Privacier;
use Illuminate\Routing\Controller;

class PrivacyController extends Controller
{
    public function store()
    {
        Privacier::updateOrCreate(
            session(config('privacy.sessions.keys.update')),
            [config('privacy.models.names.store_column') => session(config('privacy.sessions.keys.store'))]
        );

        return response()->json(['message' => config('privacy.messages.store')]);
    }

    public function setCookie()
    {
        return response()->json(['message' => config('privacy.messages.set_cookie')])
            ->cookie(
                config('privacy.cookies.name'),
                bcrypt(config('privacy.cookies.value')),
                config('privacy.cookies.minutes')
            );
    }
}
