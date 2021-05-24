<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\UsedClothing;
use App\Models\Wardrobe;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $userid = Auth::id();
        $wardrobes = Wardrobe::where('user_id',$userid)->get();

        return view('wardrobe', ['wardrobes'=>$wardrobes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = DB::table('materials')->pluck('material');
        return view('pages.create', ['materials' => $materials]);
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

        $wardrobes = new Wardrobe;
        $wardrobes->user_id = Auth::user()->id;
        $wardrobes -> clothingType = $request->input('type');
        $wardrobes -> clothingName = $request->input('name');
        $wardrobes -> pictureId = $request->file('image')->store('images');

        $wardrobes->save();
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
        $wardrobes = Wardrobe::find($id);
        return view('pages.edit')->with('wardrobes', $wardrobes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wardrobes = Wardrobe::find($id);
        return view('pages.edit')->with('wardrobes', $wardrobes);
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
        $messages = array(
            'name'=>"Clothing name cannot be empty",
        );

        $rules=array(
            'name'=>'required',
            'image'=>'required',
        );
        $validator = $request->validate($rules,$messages);

        $wardrobes = wardrobeController::find($id);
        $wardrobes-> clothingName = $request->input('name');
        $wardrobes -> pictureId = $request->file('image')->store('images');

        $wardrobes->save();
        return Redirect::to("wardrobe");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wardrobes = wardrobeController::find($id);
        $wardrobes->delete();
        return Redirect::to("wardrobe");
    }

    public function materials($id)
    {
        $materials = DB::table('materials')->pluck('material');
        return view('pages.create', ['material' => $materials]);
    }

    public function selectColthing($id){
        $wardrobes = Wardrobe::inRandomOrder()->first();
        return view('edit', ['wardrobes'=>$wardrobes]);
    }
    /* for used clothing still needs to be tested
       public function Usedcolthing(Request $request,$id){
           $messages = array(
               'title'=>"Title field can't be empty",
               'mainname'=>"Surname can't be empty",
               'price'=>"Price can't be empty",
               'length'=>"Length can't be empty"
           );

           $rules = array(
               'title'=>'required',
               'firstname'=>'required',
               'mainname'=>'required',
               'price'=>'required',
               'length'=>'required',
           );
           $validator = $request->validate($rules,$messages);


           $wardrobe = Wardrobe::find($id);
           $used = new UsedClothing($wardrobe);
           $used-> title = $request->input('title');
           $used-> fname = $request->input('firstname');
           $used-> sname = $request->input('mainname');
           $used-> price = $request->input('price');
           $used-> length = $request->input('length');
           $used-> imagename = $request->file('imagename')->store('images');

           $used->save();
           return Redirect::to("pages.home");

       }*/
}
