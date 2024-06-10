<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view ('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' =>'required|min:5|max:250',
                'client_name' => 'required|min:5|max:250',
                'summary' => 'required|min:15',
                'cover_image' => 'image'
            ]
        );
        $formdata = $request->all();
        if($request->hasFile('cover_image')){
            $img_path = Storage::disk('public')->put('project_image', $formdata['cover_image']);
            $formdata['cover_image'] = $img_path;
        }
        $newProject = new Project();
        $newProject->fill($formdata);
        $newProject->slug = Str::slug($newProject->title,'-');
        $newProject->save();
        return redirect()->route('adminprojects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' =>'required|min:5|max:250',
                'client_name' => 'required|min:5|max:250',
                'summary' => 'required|min:15',
                'cover_image' => 'image'
            ]
        );
        
        $formdata = $request->all();
        if($request->hasFile('cover_image')){
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }
            $img_path = Storage::disk('public')->put('project_image', $formdata['cover_image']);
            $formdata['cover_image'] = $img_path;
        }
        $formdata['slug'] = Str::slug($formdata['title'], '-');
        $project->update($formdata);
        return redirect()->route('adminprojects.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('adminprojects.index');    

    }
}
