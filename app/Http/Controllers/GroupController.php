<?php

namespace App\Http\Controllers;

use App\Http\Requests\group\DeleteRequest;
use App\Http\Requests\group\ShowRequest;
use App\Http\Requests\group\StoreRequest;
use App\Http\Requests\group\UpdateRequest;
use App\Http\Requests\group\IndexRequest;
use App\Models\Group;

/**
 * @group  Groups management
 *
 * APIs for managing Groups
 */
class GroupController extends Controller
{
    /**
     * List Group
     *
     * To list groups item
     * @urlParam  id required The ID of the post.
     * @urlParam  lang The language.
     * @bodyParam  user_id int required The id of the user. Example: 9
     * @bodyParam  room_id string The id of the room.
     * @bodyParam  forever boolean Whether to ban the user forever. Example: false
     * @bodyParam  another_one number Just need something here.
     * @bodyParam  yet_another_param object required Some object params.
     * @bodyParam  yet_another_param.name string required Subkey in the object param.
     * @bodyParam  even_more_param array Some array params.
     * @bodyParam  even_more_param.* float Subkey in the array param.
     * @bodyParam  book.name string
     * @bodyParam  book.author_id integer
     * @bodyParam  book[pages_count] integer
     * @bodyParam  ids.* integer
     * @bodyParam  users.*.first_name string The first name of the user. Example: John
     * @bodyParam  users.*.last_name string The last name of the user. Example: Doe
 
     */
    public function index()
    { //IndexRequest $request
        $groups = Group::where('is_active', 1)->get();
        $response = $this->successResponse;
        $response['items'] = $groups;
        return $this->response($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public function store(StoreRequest $request)
    {
        $response = $this->failResponse;
        $group = Group::create($request->all());
        $response = $this->successResponse;
        $response['item'] = $group;
        return $this->response($response);
    }

    /**
     * Display the specified resource.
     *
     
     */
    public function show(ShowRequest $request)
    {
        $response = $this->failResponse;
        $group = Group::where('id', $request->id)
            ->where('is_active', 1)->first();
        $response = $this->successResponse;
        $response['item'] = $group;
        return $this->response($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(UpdateRequest $request, $id)
    {
        $response = $this->failResponse;
        $group = Group::where('id', $id)->first();
        if ($group) {
            $group->update($request->all());
            $response = $this->successResponse;
            $response['item'] = $group;
        }
        return $this->response($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(DeleteRequest $request)
    {
        $response = $this->failResponse;
        $group = Group::find($request->id);
        if ($group) {
            $group->delete();
            $response = $this->successResponse;
        }
        return $this->response($response);
    }
}
