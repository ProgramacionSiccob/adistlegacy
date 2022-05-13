<?php

namespace Siccob\Tests\identificationAccess\src\user\infrastructure;

use Siccob\Tests\identificationAccess\src\user\domain\UserNicknameMother;
use Siccob\Tests\identificationAccess\src\user\UserModuleInfrastructureTest;

class UserDoctrineRepositoryTest extends UserModuleInfrastructureTest
{
    /** @test * */
    public function it_should_search_user_by_nickname()
    {
        $expected = '126';

        $nickname = UserNicknameMother::create('TESTER');
        $user = $this->repository()->searchNickname($nickname);

        $this->assertSame($expected , $user->getId());
    }

    /** @test * */
    public function it_should_search_user_by_email()
    {
        $expected = '126';

        $nickname = UserNicknameMother::create('programacion@siccob.com.mx');
        $user = $this->repository()->searchNickname($nickname);

        $this->assertSame($expected , $user->getId());
    }

    /** @test * */
    public function it_should_return_null_if_user_not_exits()
    {
        $nickname = UserNicknameMother::create('XXXXX');
        $user = $this->repository()->searchNickname($nickname);

        $this->assertNull($user);
    }

    /** @test * */
    public function it_should_return_null_if_emial_not_exits()
    {
        $nickname = UserNicknameMother::create('a@sicco.c');
        $user = $this->repository()->searchNickname($nickname);

        $this->assertNull($user);
    }

    /** @test * */
    public function it_should_the_user_be_disable()
    {
        $nickname = UserNicknameMother::create('MAZACARL');
        $user = $this->repository()->searchNickname($nickname);

        $this->assertSame(true , $user->isDisable());
    }
}
