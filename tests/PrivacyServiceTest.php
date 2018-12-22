<?php

namespace Tsubasarcs\Privacier\Tests;

use Tsubasarcs\Privacier\Privacy;
use Tsubasarcs\Privacier\Services\PrivacyService;

class PrivacyServiceTest extends TestCase
{
    protected $uid = 'test@email.com';

    /**
     * @test
     * @group PrivacyService
     */
    public function 可以儲存隱私權資料_並在資料庫中看到()
    {
        $service = app(PrivacyService::class);
        $privacy = $service->updateOrCreate($this->uid, ['uid' => $this->uid]);

        $this->assertDatabaseHas('privacies', [
            'id' => $privacy->id,
            'uid' => $this->uid,
        ]);
    }

    /**
     * @test
     * @group PrivacyService
     */
    public function 可以更新隱私權資料_並在資料庫中看到()
    {
        Privacy::create(['uid' => $this->uid]);
        $service = app(PrivacyService::class);
        $privacy = $service->updateOrCreate($this->uid, ['uid' => 'updateTest@email.com']);

        $this->assertDatabaseHas('privacies', [
            'id' => $privacy->id,
            'uid' => 'updateTest@email.com',
        ]);
    }

    /**
     * @test
     * @group PrivacyService
     */
    public function 可以在資料庫中判斷此筆uid資料已存在()
    {
        $privacy = Privacy::create(['uid' => $this->uid]);
        $service = app(PrivacyService::class);

        $this->assertTrue($service->existUid($privacy->uid));
    }

    /**
     * @test
     * @group PrivacyService
     */
    public function 可以在資料庫中判斷此筆uid資料不存在()
    {
        $service = app(PrivacyService::class);

        $this->assertTrue($service->doesNotExistUid($this->uid));
    }

    /**
     * @test
     * @group PrivacyService
     */
    public function 可以在資料庫中判斷此筆指定欄位資料已存在()
    {
        $privacy = Privacy::create(['uid' => $this->uid]);
        $service = app(PrivacyService::class);

        $this->assertTrue($service->exists($privacy->uid));
    }
}
