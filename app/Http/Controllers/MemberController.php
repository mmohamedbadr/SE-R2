<?php

namespace App\Http\Controllers;

use App\Http\Requests\member\DeleteRequest;
use App\Http\Requests\member\ShowRequest;
use App\Http\Requests\member\StoreRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->failResponse;
        $members = Cache::remember('allMembers',Config::get('constant.timeStoredInSeconds'), function () {
            return  Member::where('is_active', 1)->orderBy('created_at','DESC')->get();
        });
        $response = $this->successResponse;
        $response['items'] = $members;
        return $this->response($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request)
    {
        $response = $this->failResponse;
        $member = Member::find($request->id);
        $response = $this->successResponse;
        $response['item'] = $member;
        return $this->response($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        $response = $this->failResponse;
        Member::find($request->id)->delete();
        $response = $this->successResponse;
        return $this->response($response);
    }
}
