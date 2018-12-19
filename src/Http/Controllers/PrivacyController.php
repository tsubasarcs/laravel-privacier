<?php

namespace Tsubasarcs\Privacier\Http\Controllers;

use Tsubasarcs\Privacier\Facades\Privacier;
use Illuminate\Routing\Controller;

class PrivacyController extends Controller
{
    public function store()
    {
        Privacier::updateOrCreate(
            [
                config('privacy.column') => session(config('privacy.session_uid_key'))
            ],
            session(config('privacy.session_update_guidelines_key'))
        );

        return response()->json(['message' => config('privacy.messages.store')]);
    }

    public function setCookie()
    {
        return response()->json(['message' => config('privacy.messages.set_cookie')])
            ->cookie(
                config('privacy.cookie.name'),
                bcrypt(config('privacy.cookie.value')),
                config('privacy.cookie.minutes')
            );
    }
}
