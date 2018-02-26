<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Actor;

class ActorsController extends Controller
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
        return view('create.createActor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required'
        ]);

        $actor = new Actor;
        $actor->name=$request->input('name');
        $actor->user_id=1;
        $actor->birthday=$request->input('birthday');

        if(null !== $request->input('deathday')){
            $actor->deathday=$request->input('deathday');
        } else {
            $actor->deathday=null;
        }
        $actor->save();

        return redirect('/actors')->with('success', 'Actor has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor= Actor::find($id);

        return view('pages.actor', [
            'actor'=> $actor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor = Actor::find($id);
        return view('create.editActor', [
            'actor'=>$actor
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required'
        ]);

        $actor = Actor::find($id);
        $actor->name=$request->input('name');
        $actor->birthday=$request->input('birthday');

        if(null !== $request->input('deathday')){
            $actor->deathday=$request->input('deathday');
        } else {
            $actor->deathday=null;
        }
        $actor->user_id=auth()->user()->id;
        $actor->save();

        return redirect('/actors')->with('success', 'Actor has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);
        $actor->delete();

        return redirect('/actors')->with('success', 'Actor Removed');
    }
}
