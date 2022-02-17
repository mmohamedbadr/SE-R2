<?php

namespace Tests\Unit\category;

use App\Models\Category;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function DeleteSuccess()
    {
        $user = parent::userLogin('admin');
        if ($user) {
            $category = Category::factory()->create();
            if ($category) {
                $response = $this->delete('/api/v1/categories/' . $category->id, [], ['Authorization' => 'Bearer ' . $user['token']]);
                $response->assertStatus(200)
                    ->assertJson([
                        'ok' => true,
                    ]);
                parent::logoutUser($user);
            }
        }
    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function DeleteFail()
    {
        $user = parent::userLogin('admin');
        if ($user) {
            $response = $this->delete('/api/v1/categories/something', [], ['Authorization' => 'Bearer ' . $user['token']]);
            $response->assertStatus(400)
                ->assertJson([
                    'ok' => false,
                ]);
            parent::logoutUser($user);
        }
    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function DeleteUnauthorize()
    {
        $user = parent::userLogin('user');
        if ($user) {
            $response = $this->delete('/api/v1/categories/something', [], ['Authorization' => 'Bearer ' . $user['token']]);
            $response->assertUnauthorized();
            parent::logoutUser($user);
        }
    }
}
