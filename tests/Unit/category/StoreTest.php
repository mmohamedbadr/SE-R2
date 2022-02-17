<?php

namespace Tests\Unit\category;

use Tests\TestCase;
use Faker;

class StoreTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function StoreCategorySuccess()
    {
        $faker = Faker\Factory::create();
        $user = parent::userLogin('admin');
        if ($user) {
            $data = [
                'name' => $faker->name(),
                'code' => $faker->numberBetween(1, 1000),
                'price' => $faker->numberBetween(1, 1000),
                'is_active' => 1,
            ];
            $response = $this->post('/api/v1/categories', $data, ['Authorization' => 'Bearer ' . $user['token']]);
            $response->assertStatus(200)
                ->assertJson([
                    'ok' => true,
                ])->assertJsonStructure([
                    'ok',
                    'item' => [
                        'id',
                        'name',
                        'code',
                        'price',
                        'is_active',
                    ]
                ]);

            $this->delete('/api/v1/categories/' .  $response->original['item']->id, [], ['Authorization' => 'Bearer ' . $user['token']]);
            parent::logoutUser($user);
        }
    }
}
