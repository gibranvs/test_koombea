<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;

class HomeTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected function HomeTest(): void{

        $values = [
            'id' => 1,
            'username' => "Gibrán"
        ];
        $result = $this->withSession($values)->get('/');
        if ($result->isOK()) {
            $results->seeElement('.table_container')
        }
    }

    protected function HomeTestNoSession(): void{
        $values = [
        ];
        $result = $this->withSession($values)->get('/');
        if ($result->isOK()) {
            $url = $result->getRedirectUrl();
            $this->assertEquals(site_url('/login'), $url);
        }
    }

    protected function SaveTestSuccess(): void{
        $values = [
            'id' => 1,
            'username' => "Gibrán"
        ];
        $params=["url"=>"https://google.com"];
        $result = $this->withSession($values)->post('page/save',$params);
        if ($result->isOK()) {
            $result->assertJSONFragment(['status' => 1]);
        }
    }

    protected function SaveTestFail(): void{
        $values = [
            'id' => 1,
            'username' => "Gibrán"
        ];
        $params=["url"=>"https://asdasd.cdfkjfsdkj"];
        $result = $this->withSession($values)->post('page/save',$params);
        if ($result->isOK()) {
            $result->assertJSONExact(['status' => 0,'data'=>"The given url doesn't have any content"]);
        }
    }

}