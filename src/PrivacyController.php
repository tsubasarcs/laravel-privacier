<?php

namespace Tsubasarcs\Privacier;

use Illuminate\Routing\Controller;

class PrivacyController extends Controller
{
    public function index()
    {
        $message = 'Privacy';
        return view('Privacier::welcome', compact('message'));
    }
}
