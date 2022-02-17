<?php

namespace Tests\Unit\group;

use App\Models\User;
use Tests\TestCase;
use Faker;

class UpdateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function UpdateGroupSuccess()
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
            $groupId = null;
            $createResponse = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            if (isset($createResponse->original['item']) && $createResponse->original['item']) {
                $groupId = $createResponse->original['item']->id;
            }
            if ($groupId) {

                $updateResponse = $this->put('/api/v1/groups/' . $groupId, $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
                $updateResponse->assertStatus(200)
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
                $this->delete('/api/v1/groups/' . $groupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            }
            parent::logoutUser($adminData);
        }
    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function UpdateGroupWithWrongDataFail()
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
            $groupId = null;
            $createResponse = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            if (isset($createResponse->original['item']) && $createResponse->original['item']) {
                $groupId = $createResponse->original['item']->id;
            }
            if ($groupId) {
                $groupData = [
                    'name' => $faker->text(100),
                    'code' => $faker->numberBetween(100000000, 1000000000),
                    'note' => $faker->text(2000),
                    'is_active' => $faker->text(10)
                ];
                $updateResponse = $this->put('/api/v1/groups/' . $groupId, $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
                $updateResponse->assertStatus(400)
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
                    ]);
                $this->delete('/api/v1/groups/' . $groupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            }
            parent::logoutUser($adminData);
        }
    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function UpdateGroupWithWrongIdFail()
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
            $groupId = null;
            $fakeGroupId = 'hhh';
            $createResponse = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            if ($createResponse->original['item']) {
                $groupId = $createResponse->original['item']->id;
            }
            $groupData = [
                'name' => $faker->name(),
                'code' => $faker->numberBetween(1, 1000),
                'note' => $faker->text(1000),
                'is_active' => 1,
            ];
            $updateResponse = $this->put('/api/v1/groups/' . $fakeGroupId, $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            $updateResponse->assertStatus(400)
                ->assertJson([
                    'ok' => false,
                ])->assertJsonStructure([
                    'ok',
                    'errors' => [
                        'id',

                    ]
                ]);
            $this->delete('/api/v1/groups/' . $groupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            parent::logoutUser($adminData);
        }
    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function updateGroupWithUsedCodeFail()
    {
        $faker = Faker\Factory::create();
        $adminData = parent::userLogin('admin');
        $code = $faker->numberBetween(1, 1000);
        if ($adminData) {
            $firstGroupData = [
                'name' => $faker->name(),
                'code' =>  $code,
                'note' => $faker->text(1000),
                'is_active' => 1,
            ];
            $firstGroupId = null;
            $secondGroupId = null;
            $createFirstGroupResponse = $this->post('/api/v1/groups', $firstGroupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            if (isset($createFirstGroupResponse->original['item']) && $createFirstGroupResponse->original['item']) {
                $firstGroupId = $createFirstGroupResponse->original['item']->id;
            }
            if ($firstGroupId) {

                $secondGroupData = [
                    'name' => $faker->name(),
                    'code' =>   $faker->numberBetween(1, 1000),
                    'note' => $faker->text(1000),
                    'is_active' => 1,
                ];
                $createSecondGroupResponse = $this->post('/api/v1/groups', $secondGroupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
                if (isset($createSecondGroupResponse->original['item']) && $createSecondGroupResponse->original['item']) {
                    $secondGroupId = $createSecondGroupResponse->original['item']->id;
                }
                if ($secondGroupId) {
                    $secondGroupData = [
                        'name' => $faker->name(),
                        'code' =>   $code,
                        'note' => $faker->text(1000),
                        'is_active' => 1,
                    ];
                    $updateResponse = $this->put('/api/v1/groups/' . $secondGroupId, $secondGroupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
                    $updateResponse->assertStatus(400)
                        ->assertJson([
                            'ok' => false,
                        ])->assertJsonStructure([
                            'ok',
                            'errors' => [
                                'code'
                            ]
                        ]);
                    $this->delete('/api/v1/groups/' . $secondGroupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
                }
                $this->delete('/api/v1/groups/' . $firstGroupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
            }
            parent::logoutUser($adminData);
        }
    }

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function UpdateGroupWithUnAuthorizedFail()
    {

        $faker = Faker\Factory::create();
        $adminData = parent::userLogin('admin');
        $groupData = [
            'name' => $faker->name(),
            'code' => $faker->numberBetween(1, 1000),
            'note' => $faker->text(1000),
            'is_active' => 1,
        ];
        $groupId = null;

        if ($adminData) {
            $createResponse = $this->post('/api/v1/groups', $groupData, ['Authorization' => 'Bearer ' . $adminData['token']]);
            if (isset($createResponse->original['item']) && $createResponse->original['item']) {
                $groupId = $createResponse->original['item']->id;
            }
        }
        parent::changeUserRole($adminData['userId'], 'User');
        if ($groupId) {
            $updateResponse = $this->put('/api/v1/groups/' . $groupId, $groupData, ['Authorization' => 'Bearer ' .  $adminData['token']]);
            $updateResponse->assertUnauthorized();
            parent::changeUserRole($adminData['userId'], 'admin');
            $this->delete('/api/v1/groups/' . $groupId, [], ['Authorization' => 'Bearer ' . $adminData['token']]);
        }
        parent::logoutUser($adminData);
    }
}
