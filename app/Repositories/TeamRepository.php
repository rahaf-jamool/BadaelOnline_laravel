<?php

namespace App\Repositories;

use App\Http\Requests\Team\TeamRequest;
use App\Repositories\Interfaces\TeamRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Team\Team;
use App\Models\Team\TeamTranslation;

use Illuminate\Support\Facades\Storage;

class TeamRepository implements TeamRepositoryInterface{

    private $team;
    private $teamTranslation;
    public function __construct(Team $team , TeamTranslation $teamTranslation)
    {
        $this->team = $team;
        $this->teamTranslation = $teamTranslation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = $this->team::orderBy('id','desc')->get();

        return view('admin.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;
        $team->qoute = $request->qoute;

        $photo = $request->file('photo');

        if($photo){
        $cover_path = $photo->store('images/team', 'public');

        $team->photo = $cover_path;
        }

        if ( $team->save()) {

            return redirect()->route('admin.team')->with('success', 'Data added successfully');

           } else {

            return redirect()->route('admin.team.create')->with('error', 'Data failed to add');

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
        $team = $this->team::findOrFail($id);

        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        $team = $this->team::findOrFail($id);
        $team->name = $request->name;
        $team->position = $request->position;
        $team->twitter = $request->twitter;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;
        $team->qoute = $request->qoute;

        $new_photo = $request->file('photo');

        if($new_photo){
        if($team->photo && file_exists(storage_path('app/public/' . $team->photo))){
            Storage::delete('public/'. $team->photo);
        }

        $new_cover_path = $new_photo->store('images/team', 'public');

        $team->photo = $new_cover_path;
        }

        if ( $team->save()) {

            return redirect()->route('admin.team')->with('success', 'Data updated successfully');

           } else {

            return redirect()->route('admin.team.edit')->with('error', 'Data failed to update');

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
        $team = $this->team::findOrFail($id);

        $team->delete();

        return redirect()->route('admin.team')->with('success', 'Data deleted successfully');


    }
}
