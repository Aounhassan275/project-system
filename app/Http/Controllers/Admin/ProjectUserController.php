<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectUser;
use Exception;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'project_id' => 'required',
                'user_id' => 'required',
            ]);
            ProjectUser::create($request->all());
            toastr()->success('Project User Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectUser $projectUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectUser $projectUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectUser $projectUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectUser  $projectUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectUser = ProjectUser::find($id);
        $projectUser->delete();
        toastr()->success('Project User Deleted successfully');
        return redirect()->back();
    }
}
