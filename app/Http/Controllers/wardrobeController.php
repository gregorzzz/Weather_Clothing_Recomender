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
            'material'=>'required',
            'name'=>'required',
            'image'=>'required',
        );
        $validator = $request->validate($rules,$messages);

        $wardrobes = new Wardrobe;
        $wardrobes->user_id = Auth::user()->id;
        $wardrobes -> clothingType = $request->input('type');
        $wardrobes -> material = $request->input('material');
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

    public function selectClothing(){
        $userid = Auth::id();
        $wardrobes = Wardrobe::where('user_id',$userid)->get()->random();
        return view('pages.recommendation', ['wardrobes'=>$wardrobes]);

    }
    // for used clothing still needs to be tested
       public function Usedclothing(Request $request, $id=''){
           $app_id = "8edbfcf3c0d0badddb4b1a4adcfaf403";
           $lat = 53.992119;
           $lng = -1.541812;
           $url = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=${app_id}&units=metric");
           $data =json_decode($url,true);


           $wardrobe = Wardrobe::select('id')->get();
           $used = new UsedClothing();
           $used->userID = Auth::user()->id;
           $used->clothingID = $wardrobe;
           $used->weatherType = $data['weather'][0]['description'];
           $used->weatherTemp = $data['main']['temp'];
           $used->useRating = $request->input('rating');
           $used->useFeel = $request->input('feel');


           $used->save();
           return Redirect::to("pages.home");

       }

}
