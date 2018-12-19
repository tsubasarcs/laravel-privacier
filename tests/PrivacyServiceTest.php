<?php

namespace Tsubasarcs\Privacier\Tests;

use Tsubasarcs\Privacier\Privacy;
use Tsubasarcs\Privacier\Services\PrivacyService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrivacyServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group privacy
     */
    public function 可以儲存隱私權資料_並在資料庫中看到()
    {
        $service = app(PrivacyService::class);
        $privacy = $service->updateOrCreate(['uid' => 'seanshih@cw.com.tw'], 'seanshih@cw.com.tw');

        $this->assertDatabaseHas('privacies', [
            'id' => $privacy->id,
            'uid' => 'seanshih@cw.com.tw',
        ]);
    }

    /**
     * @test
     * @group privacy
     */
    public function 可以更新隱私權資料_並在資料庫中看到()
    {
        Privacy::create(['uid' => 'seanshih@cw.com.tw']);
        $service = app(PrivacyService::class);
        $privacy = $service->updateOrCreate(['uid' => 'yishlai@cw.com.tw'], 'seanshih@cw.com.tw');

        $this->assertDatabaseHas('privacies', [
            'id' => $privacy->id,
            'uid' => 'yishlai@cw.com.tw',
        ]);
    }

    /**
     * @test
     * @group privacy
     */
    public function 可以在資料庫中判斷此筆uid資料已存在()
    {
        $privacy = Privacy::create(['uid' => 'seanshih@cw.com.tw']);
        $service = app(PrivacyService::class);

        $this->assertTrue($service->existUid($privacy->uid));
    }

    /**
     * @test
     * @group privacy
     */
    public function 可以在資料庫中判斷此筆uid資料不存在()
    {
        $service = app(PrivacyService::class);

        $this->assertTrue($service->doesNotExistUid('seanshih@cw.com.tw'));
    }

    /**
     * @test
     * @group privacy
     */
    public function 可以在資料庫中判斷此筆指定欄位資料已存在()
    {
        $privacy = Privacy::create(['uid' => 'seanshih@cw.com.tw']);
        $service = app(PrivacyService::class);

        $this->assertTrue($service->exists($privacy->uid));
    }
}
