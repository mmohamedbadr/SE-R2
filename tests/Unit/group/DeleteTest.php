<?php

namespace Tests\Unit\group;

use App\Models\Group;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function deleteGroupSuccess()
    {
        $adminData = parent::userLogin('admin');
        if ($adminData) {
            $group = Group::factory()->create();
            $response = $this->delete('/api/v1/groups/' . $group->id, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            $response->assertStatus(200)->assertJson([
                'ok' => true,
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
    public function deleteGroupFail()
    {
        $userData = parent::userLogin('User');
        if ($userData) {
            $group = Group::factory()->create();
            $response = $this->delete('/api/v1/groups/' . $group->id, [], ['Authorization' => 'Bearer ' . $userData['token']]);
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
    public function deletGroupWithWrongIdFail()
    {
        $userData = parent::userLogin('admin');
        if ($userData) {
            $response = $this->delete('/api/v1/groups/' . rand(10000, 20000), [], ['Authorization' => 'Bearer ' . $userData['token']]);
            $response->assertStatus(400)->assertJson([
                'ok' => false,
            ]);
            parent::logoutUser($userData);
        }
    }
}
