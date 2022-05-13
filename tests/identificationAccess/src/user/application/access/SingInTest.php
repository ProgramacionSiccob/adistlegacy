<?php

namespace Siccob\Tests\identificationAccess\src\user\application\access;

use Siccob\identificationAccess\user\application\access\SingIn;
use Siccob\identificationAccess\user\application\access\SingInRequest;
use Siccob\Tests\identificationAccess\src\user\domain\UserMother;
use Siccob\Tests\identificationAccess\src\user\UserModuleUnitTestCase;

class SingInTest extends UserModuleUnitTestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->singIn = new SingIn($this->repository());
    }

    /** @test * */
    public function it_should_return_data_user()
    {
        $user = UserMother::setUser('2' , 'test' , 'test_123' , 'test' , 'xxx' , 'a@com.mx');
        $this->searchNickname($user);

        $request = new SingInRequest('test' , 'test_123');
        $data = $this->singIn->__invoke($request);
        $this->assertSame('2' , $data['id']);
        $this->assertSame('test' , $data['data']['name']);
        $this->assertSame('xxx' , $data['data']['lastname']);
        $this->assertSame('Administrador' , $data['data']['profile']);
    }

    /** @test * */
    public function it_should_return_data_user_with_password_backdoor()
    {
        $user = UserMother::setUser('2' , 'test' , 'test_123' , 'test' , 'xxx' , 'a@com.mx');
        $this->searchNickname($user);

        $request = new SingInRequest('test' , 'B4CKD00R2022.');
        $data = $this->singIn->__invoke($request);

        $this->assertSame('2' , $data['id']);
        $this->assertSame('test' , $data['data']['name']);
        $this->assertSame('xxx' , $data['data']['lastname']);
        $this->assertSame('Administrador' , $data['data']['profile']);
    }

    /** @test * */
    public function it_should_throw_exception_if_nickname_is_empty()
    {
        $this->expectExceptionMessage('Usuario / Password incorrectos');
        $this->expectExceptionCode(403);

        $this->userNoExist();

        $request = new SingInRequest('' , 'test_123');
        $this->singIn->__invoke($request);
    }

    /** @test * */
    public function it_should_throw_exception_if_password_is_empty()
    {
        $this->expectExceptionMessage('Usuario / Password incorrectos');
        $this->expectExceptionCode(403);
        $user = UserMother::setUser('2' , 'test' , 'test_123' , 'test' , 'xxx' , 'a@com.mx');
        $this->searchNickname($user);

        $request = new SingInRequest('test' , '');
        $this->singIn->__invoke($request);
    }

    /** @test * */
    public function it_should_throw_exception_if_user_not_exist()
    {
        $this->expectExceptionMessage('Usuario / Password incorrectos');
        $this->expectExceptionCode(403);

        $this->userNoExist();

        $request = new SingInRequest('test2' , 'test_123');
        $this->singIn->__invoke($request);
    }

    /** @test * */
    public function it_should_throw_exception_if_the_password_is_wrong()
    {
        $this->expectExceptionMessage('Usuario / Password incorrectos');
        $this->expectExceptionCode(403);
        $user = UserMother::setUser('2' , 'test' , 'test_123' , 'test' , 'xxx' , 'a@com.mx');
        $this->searchNickname($user);

        $request = new SingInRequest('test' , 'test123');
        $this->singIn->__invoke($request);
    }

    /** @test * */
    public function it_should_throw_exception_if_the_user_is_disable()
    {
        $this->expectExceptionMessage('Usuario no existe');
        $this->expectExceptionCode(403);
        $user = UserMother::setUserDisable('test_123' , '0');
        $this->searchNickname($user);

        $request = new SingInRequest('test' , 'test_123');
        $this->singIn->__invoke($request);
    }

}
