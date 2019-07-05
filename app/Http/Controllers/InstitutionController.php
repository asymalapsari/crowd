<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = Auth::user()->id;
        $title = trans('app.institution');
        $ins = DB::table('institutions')
        ->where('user_id',$userId)
        ->limit(1)
        ->get();
        
        return view('admin.institution', compact('title', 'ins'));
        // return $ins;
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
        $userId = Auth::user()->id;
        
        $data = [
            'user_id'           =>$userId,
            'institution_name'  =>$request->institution_name,
            'established_date'  =>$request->established_date,
            'address'           =>$request->address,
            'contact_person'    =>$request->contact_person,
            'email'             =>$request->email,
            'website_url'       =>$request->website_url,

        
            'created_at'        =>Carbon::now()->toDateTimeString(),
            'updated_at'        =>Carbon::now()->toDateTimeString()
        ];

        $create = DB::table('institutions')->insert($data);
        
        if ($create){
            return redirect(route('institution'))->with('success', trans('app.operation_success'));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        $userId = Auth::user()->id;
        $title = trans('app.add_institution');
        $ins = Institution::where('user_id',$userId)
        ->limit(1)
        ->get();
        return view('admin.institution_form', compact('title', 'ins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Institution::where('id', $id)->update($request->all());
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        //
    }
}
