<?php

namespace Http\Controllers\Shorter;

use App\Http\Controllers\Shorter\LinkController;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{

    public function testIndex():void
    {
        $response = $this->get('/links');

        $response->assertStatus(200);
        $response->assertOk();
    }

    public function testCreate()
    {
        $fullUrl = 'https://www.youtube.com/watch?v=nef9Rozfp_U&list=PLTUf2WvWTqQc-W3Rf3xvbdnHTnb2FdR7M&index=1&ab_channel=E-Freelancer';
        $response = $this->post('/link');

        $response->assertStatus(302);
    }

    public function testStore()
    {

    }

    public function testDestroy()
    {

    }
}
