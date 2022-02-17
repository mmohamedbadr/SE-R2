<?php

namespace Tests\Unit\group;

use App\Models\Group;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function showGroupSuccess()
    {
        $adminData = parent::userLogin('admin');
        if ($adminData) {
            $group = Group::factory()->create();
            $response = $this->get('/api/v1/groups/' . $group->id, ['Authorization' => 'Bearer ' . $adminData['token']]);
            $response->assertStatus(200)->assertJson([
                'ok' => true,
            ])->assertJsonStructure([
                'ok',
                'item' => [
                    'id',
                    'name'
                ],
            ]);

            parent::logoutUser($adminData);
            $group->forceDelete();
        }
    }

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function showGroupFail()
    {
        $userData = parent::userLogin('user');
        if ($userData) {
            $group = Group::factory()->create();
            $response = $this->get('/api/v1/groups/' . $group->id, ['Authorization' => 'Bearer ' . $userData['token']]);
            $response->assertUnauthorized();
            parent::logoutUser($userData);
            $group->forceDelete();
        }
    }

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function showGroupWithWrongIdFail()
    {
        $userData = parent::userLogin('admin');
        if ($userData) {
            $response = $this->get('/api/v1/groups/' . rand(10000, 20000), ['Authorization' => 'Bearer ' . $userData['token']]);
            $response->assertStatus(400)->assertJson([
                'ok' => false,
            ]);
            parent::logoutUser($userData);
        }
    }
}
