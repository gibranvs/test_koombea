<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class LoginTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected function LoginTestSuccess(): void{
        $result = $this->call('post', '/login/validate_user', [
            'username'  => 'Gibrán',
            'password' => '123',
        ]);
        if ($result->isOK()) {
            $url = $result->getRedirectUrl();
            $this->assertEquals(site_url('/'), $url);
        }
    }
    protected function LoginTestFail(): void{
        $result = $this->call('post', '/login/validate_user', [
            'username'  => 'Gibrán',
            'password' => '321',
        ]);
        if ($result->isOK()) {
            $url = $result->getRedirectUrl();
            $this->assertEquals(site_url('/login'), $url);
        }
    }

    protected function RegisterTestSuccess(): void{
        $result = $this->call('post', '/login/register_user', [
            'username'  => 'ronaldo@r9.com',
            'password' => '1234',
        ]);
        if ($result->isOK()){
            $this->assertTrue($result->getJSON() !== false);
            $result->assertJSONFragment(['status' => 1]);
        }
    }

    protected function RegisterTestFail(): void{
        $result = $this->call('post', '/login/register_user', [
            'username'  => 'Gibrán',
            'password' => '1234',
        ]);
        if ($result->isOK()){
            $this->assertTrue($result->getJSON() !== false);
            $result->assertJSONExact(['status' => 0,'data'=>"Username already exists. try a different one or login with your password"]);
        }
    }
}