<?php

namespace App\Http\Controllers;

use App\Category;
use App\Projects;
use App\Campaign;
use App\Rating;
use Illuminate\Http\Request;
use App\Institution;
use DB;
use Auth;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $title = trans('app.my_projects');
        $project = Projects::orderBy('created_at', 'desc')->get();
        $insId = Institution::select('id')
        ->where('user_id', '=', $userId)
        ->get();
        if ($insId->isEmpty()) {
            $project = NULL;
        } else {
            $institution = Institution::where('user_id',$userId)->firstOrFail();       
            $project = Projects::where('institution_id',$institution->id)->get();
        }

        return view('admin.project_all', compact('title','insId','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('Start a Project');
        $category = Category::all();
        return view('admin.start_project', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $institution = Institution::where('user_id',$userId)->firstOrFail();


        $data = [
            'project_name'                  => $request->project_name,
            'project_description'           => $request->project_description,
            'project_rating'                => 0,
            'institution_id'                => $institution->id,
            'project_budget'                => $request->project_budget,
            'number_of_required_applier'    => $request->number_of_required_applier,
            'applier'                       => 0,
            'start_date'                    => $request->start_date,
            'end_date'                      => $request->end_date,
            'created_at'                    => Carbon::now()->toDateTimeString(),
            'updated_at'                    => Carbon::now()->toDateTimeString(),
            'applier_requirements'          => $request->applier_requirements,
            'category'                      => $request->category
        ];

        $create = Projects::create($data);

        if ($create){
            return redirect(route('projects', $create->id))->with('success', trans('app.project_created'));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects, $id)
    {
        $projects = Projects::find($id);
        $title = $projects->project_name;
        $institution = Institution::find($projects->institution_id);
        $enable_discuss = get_option('enable_disqus_comment_in_blog');
        if (Auth::check()) {
            $rating = Rating::where('user_id',Auth::user()->id);
        }
        else{
            $rating = NULL;
        }
        return view('project_single', compact('projects', 'title', 'enable_discuss','institution','rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects, $id)
    {
        $userId = Auth::user()->id;
        $category = Category::all();
        $projects = Projects::find($id);

        $title = trans('app.edit_project');
        return view('admin.edit_project', compact('title','projects', 'category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $category = Category::all();
        $institution = Institution::where('user_id',$userId)->firstOrFail();

        $data = [
            'project_name'                  => $request->project_name,
            'project_description'           => $request->project_description,
            'institution_id'                => $institution->id,
            'project_budget'                => $request->project_budget,
            'number_of_required_applier'    => $request->number_of_required_applier,
            'start_date'                    => $request->start_date,
            'end_date'                      => $request->end_date,
            'updated_at'                    => Carbon::now()->toDateTimeString(),
            'applier_requirements'          => $request->applier_requirements,
            'category'                      => $request->category
        ];

        $update = Projects::whereId($id)->update($data,$id);

        if ($update){
            return redirect(route('projects'))->with('success', trans('app.update_updated'));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }

    public function rating($id, Request $request){
        if (Auth::check()) {
            $project = Projects::find($id);
            $rating = new Rating();
            $rating->user_id = Auth::user()->id;
            $rating->project_id = $project->id;
            $rating->rating_score = $request->rating;
            $rating->save();
            $project->project_rating = Rating::where('project_id', $project->id)->avg('rating_score');
            $project->save();
            return redirect(route('project_single',['id'=>$project->id]));
        }
        else{
            return redirect('/login');
        }
    }
}
