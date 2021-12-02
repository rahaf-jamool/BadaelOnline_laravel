<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id','desc')->get();
        return view('admin.service.index',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            "icon" => "required",
            "title" => "required",
            "quote" => "required|max:255"         
        ])->validate();

        $service = new Service();
        // $service->icon = $request->icon;
        $service->title = $request->title;
        $service->slug = Str::slug(request('title'));
        $service->quote = $request->quote;
        $service->desc = $request->desc;

        $icon = $request->file('icon');

        if($icon){
        $cover_path = $icon->store('images/service', 'public');

        $service->icon = $cover_path;
        }
       if ( $service->save()) {

        return redirect()->route('admin.service')->with('success', 'Data added successfully');

       } else {
           
        return redirect()->route('admin.service.create')->with('error', 'Data failed to add');

       }
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.service.edit',compact('service'));
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
        Validator::make($request->all(), [
            "icon" => "required",
            "title" => "required",
            "quote" => "required|max:255"         
        ])->validate();

        $service = Service::findOrFail($id);
        // $service->icon = $request->icon;
        $service->title = $request->title;
        $service->slug = Str::slug(request('title'));
        $service->quote = $request->quote;
        $service->desc = $request->desc;

        $new_photo = $request->file('icon');

        if($new_photo){
        if($service->icon && file_exists(storage_path('app/public/' . $service->icon))){
            Storage::delete('public/'. $service->icon);
        }

        $new_cover_path = $new_photo->store('images/service', 'public');

        $service->icon = $new_cover_path;
        }
       if ( $service->save()) {

        return redirect()->route('admin.service')->with('success', 'Data added successfully');

       } else {
           
        return redirect()->route('admin.service.create')->with('error', 'Data failed to add');

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $service = Service::findOrFail($id);

        $service->delete();
        
        return redirect()->route('admin.service')->with('success', 'Data deleted successfully');
    }
}
