<?php

namespace App\Http\Controllers;

use App\Clock;
use Illuminate\Http\Request;

class ClockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clock = Clock::all();
        return view('clock.list', compact('clock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'bail|required',
            'price'=>'bail|required',
            'vendor'=>'required'
        ]);

        $clock = new Clock();
        $clock->name = $request->input('name');
        $clock->price = $request->input('price');
        $clock->vendor= $request->input('vendor');
        $clock->save();
        return redirect()->route('clocks.index');
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
        $clock = Clock::findOrFail($id);
        return view('clock.edit',compact('clock'));
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
        $clock = Clock::findOrFail($id);
        $clock->name = $request->input('name');
        $clock->price = $request->input('price');
        $clock->vendor= $request->input('vendor');
        $clock->save();
        return redirect()->route('clocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clock = Clock::findOrFail($id);
        $clock->delete();
        return redirect()->route('clocks.index');
    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        if (!$keyword){
            return redirect()->route('clocks.index');
        }
        $clock = Clock::where('name','LIKE','%'.$keyword.'%')->paginate(2);
        return view('clock.list',compact('clock'));
    }
}
