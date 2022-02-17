<?php

namespace Tests\Unit\category;

use Tests\TestCase;
use Faker\Factory;

class UpdateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function updateCategorySuccess()
    {
        $faker = Factory::create();
        $user = parent::userLogin('admin');
        if ($user) {
            $data = [
                'name' => $faker->name(),
                'code' => $faker->numberBetween(1, 1000),
                'price' => $faker->numberBetween(1, 1000),
                'is_active' => 1,
            ];
            $categoryId = null;
            $createResponse = $this->post('/api/v1/categories', $data, ['Authorization' => 'Bearer ' . $user['token']]);
            if (isset($createResponse->original['item']) && $createResponse->original['item']) {
                $categoryId = $createResponse->original['item']->id;
            }
            $data = [
                'name' => $faker->name(),
                'code' =>  $createResponse->original['item']->code,
                'price' => $faker->numberBetween(1, 1000),
                'is_active' => 1,
            ];
            if ($categoryId) {
                $updateResponse = $this->put('/api/v1/categories/' . $categoryId, $data, ['Authorization' => 'Bearer ' . $user['token']]);
                $updateResponse->assertStatus(200)
                    ->assertJson([
                        'ok' => true,
                    ])->assertJsonStructure([
                        'ok',
                        'item' => [
                            'id',
                            'name',
                            'code',
                            'is_active'
                        ]
                    ]);
                $this->delete('/api/v1/groups/' . $categoryId, [], ['Authorization' => 'Bearer ' . $user['token']]);
            }
            parent::logoutUser($user);
        }
    }
}
