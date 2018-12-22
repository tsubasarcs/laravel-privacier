<?php

namespace Tsubasarcs\Privacier\Tests;

class PrivacyControllerTest extends TestCase
{
    /**
     * @test
     * @group PrivacyController
     */
    public function It_should_get_privacy_cookie_name_and_value_by_set_cookie_method()
    {
        $response = $this->post(route('privacy.set_cookie'));

        $response->assertCookie(config('privacy.cookies.name'));
    }
}
