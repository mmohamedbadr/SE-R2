<?php

namespace Tests\Feature\Unit\group;

use Tests\TestCase;
use Faker;

class StoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function StoreGroupSuccess()
    {
        $faker = Faker\Factory::create();
        $adminData = parent::userLogin('admin');
        if ($adminData) {
            $groupData = [
                'name' => $faker->name(),
                'code' => $faker->numberBetween(1, 1000),
                'note' => $faker->text(1000),
                'is_active' => 1,
            ];
            $response = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            $response->assertStatus(200)
                ->assertJson([
                    'ok' => true,
                ])->assertJsonStructure([
                    'ok',
                    'item' => [
                        'id',
                        'name',
                        'code',
                        'is_active',
                        'note'
                    ]
                ]);
            $this->delete('/api/v1/groups/' . $response->original['item']->id, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            parent::logoutUser($adminData);
        }
    }
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function StoreGroupFail()
    {
        $faker = Faker\Factory::create();
        $adminData = parent::userLogin('admin');
        if ($adminData) {
            $groupData = [
                'name' => $faker->text(100),
                'code' => $faker->numberBetween(10000, 100000),
                'note' => $faker->text(2000),
                'is_active' => $faker->text(10)
            ];
            $response = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            $response->assertStatus(400)
                ->assertJson([
                    'ok' => false,
                ])->assertJsonStructure([
                    'ok',
                    'errors' => [
                        'name',
                        'code',
                        'is_active',
                        'note'
                    ]
                ]);;
            parent::logoutUser($adminData);
        }
    }
}
