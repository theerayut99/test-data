<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $players = Player::all();
        return view('player.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $player = new Player;
        $player->team_id = $request->input('team_id');
        $player->name = $request->input('name');
        $player->description = $request->input('description');
        $player->save();

        return redirect('player')->with('message', 'Create Success!');

    }

    public function createForm()
    {
        $teams = Team::select('id','name')->get();
        return view('player.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        $teams = Team::select('id', 'name')->get();
        return view('player.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        // $this->validate(request(), [
        //   'name' => 'required',
        //   'description' => 'required|numeric'
        // ]);
        $player->name = $request->input('name');
        $player->team_id = $request->input('team_id');
        $player->description = $request->input('description');
        $player->save();
        return redirect('player')->with('success','Player has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect('team')->with('message','League deleted successfully');
    }
}