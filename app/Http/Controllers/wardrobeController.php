<?php

namespace App\Http\Controllers;

use App\Models\Wardrobe;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Response;

class wardrobeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $wardrobe = Wardrobe::all();

        return view('pages.wardrobe', ['wardrobe'=>$wardrobe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $messages = array(
          'name'=>"Clothing name cannot be empty",
        );

        $rules=array(
            'type'=>'required',
            'name'=>'required',
            'image'=>'required',
        );
        $validator = $request->validate($rules,$messages);

        $wardrobe = new Wardrobe;
        $wardrobe -> clothingType = $request->input('type');
        $wardrobe -> clothingName = $request->input('name');
        $wardrobe -> pictureId = $request->input('image')->store('images');

        $wardrobe->save();
        return Redirect::to("wardrobe");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
