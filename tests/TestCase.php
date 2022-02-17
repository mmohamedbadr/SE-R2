<?php

namespace Tests;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function userLogin($role = 'User')
    {
        $user = User::factory()->create();
        $user->assignRole($role);
        $response = $this->post('/api/v1/login', ['email' => $user->email, 'password' => 'password'], ['Accept' => 'application/json']);
        if ($response->original) {
            return [
                'token' => $response->original['token'],
                'userId' => $response->original['item']['id']
            ];
        } else {
            return null;
        }
    }
    public function changeUserRole($userId, $role = 'User')
    {
        $user = User::find($userId);
        $user->syncRoles([$role]);
    }
    public function logoutUser($data = [])
    {
        if ($data) {
            $this->post('/api/v1/logout', [], ['Authorization' => 'Bearer ' .  $data['token']]);
            $user = User::find($data['userId']);
            if ($user) {
                $user->delete();
            }
        }
        return [
            'token' => null,
            'userId' => null
        ];
    }
}
