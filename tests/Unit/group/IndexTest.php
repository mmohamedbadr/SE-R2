<?php

namespace Tests\Unit\group;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function getGroupsSuccess()
    {
        $adminData = parent::userLogin('admin');
        if ($adminData) {
            $response = $this->get('/api/v1/groups', ['Authorization' => 'Bearer ' . $adminData['token']]);
            $response->assertStatus(200)->assertJson([
                'ok' => true,
                'items' => []
            ]);
            parent::logoutUser($adminData);
        }
    }

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function getGroupsFail()
    {
        $userData = parent::userLogin('user');
        $response = $this->get('/api/v1/groups', ['Authorization' => 'Bearer ' .  $userData['token']]);
        $response->assertUnauthorized();
        parent::logoutUser($userData);
    }
}
