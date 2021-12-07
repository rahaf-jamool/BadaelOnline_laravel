<?php

namespace App\Service\Team;

use App\Http\Requests\Team\TeamRequest;
use App\Manager\Team\TeamManager;
use Illuminate\Http\Request;

class TeamService
{
    private $teamManager;
    public function __construct(TeamManager $teamManager)
    {
        $this->teamManager=$teamManager;
    }
    public function index()
    {
        return $this->teamManager->index();
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return $this->teamManager->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request){
        return $this->teamManager->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return $this->teamManager->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return $this->teamManager->edit($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id){
        return $this->teamManager->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return $this->teamManager->destroy($id);
    }
}
