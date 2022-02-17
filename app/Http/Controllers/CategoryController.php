<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\DeleteRequest;
use App\Http\Requests\category\StoreRequest;
use App\Http\Requests\category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        return  $this->failResponse;
    }


    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(StoreRequest $request)
    {
        $response = $this->failResponse;
        $category = Category::create($request->all());
        $response = $this->successResponse;
        $response['item'] = $category;
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show()
    {
        return  $this->failResponse;
    }

    /**
     * Update the specified resource in storage.
     * /**
     * List Group
     *
     * To list groups item
     * @urlParam  id required The ID of the category.
     * @bodyParam  name  string required The category name. Example: 9
     * @bodyParam  code int required unique category code .
     * @bodyParam  is_active boolean to enable /disable category . Example: false
     * @bodyParam  price number required category price per hour.
     *@response {
                    "ok": true,
                    "message": "Success",
                    "errors": [],
                    "statusCode": 200,
                    "item": {
                        "id": 18,
                        "code": "300",
                        "name": "Mohamed Badr",
                        "price": "18",
                        "is_active": "1",
                        "created_at": "2021-09-20T21:21:21.000000Z",
                        "updated_at": "2021-09-20T22:15:58.000000Z",
                        "deleted_at": null
                    }
                }
      @response  400 {
                    "ok": false,
                    "message": "Fail",
                    "errors": {
                        "name": [
                            "The name field is required."
                        ],
                        "code": [
                            "The code field is required."
                        ],
                        "price": [
                            "The price field is required."
                        ],
                        "is_active": [
                            "The is active field is required."
                        ]
                    },
                    "statusCode": 400
                }
   
     @responseFile 401 responses/401.json
     @responseFile 429 responses/429.json
     
     */


    public function update(UpdateRequest $request)
    {
        $response = $this->failResponse;
        $category = Category::find($request->id);
        if ($category) {
            $category->update($request->all());
            $response = $this->successResponse;
            $response['item'] = $category;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     */
    public function destroy(DeleteRequest $request)
    {
        $response = $this->failResponse;
        $category = Category::find($request->id);
        if ($category) {
            $category->delete();
            $response = $this->successResponse;
        }
        return $response;
    }
}
