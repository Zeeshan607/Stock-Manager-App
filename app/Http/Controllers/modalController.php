<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\item;
use App\Models\modal;
use Illuminate\Http\Request;

class modalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data['brands']=brand::all();
        $data['modals']=modal::with(['brand'])->orderBy('name')->paginate(10);
//        return json_encode($data);
        return view('Emanager/models/index',$data);
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
        //
        $request->validate([
            'modalName'=>'required',
            'brand_id'=>'required'
        ]);
        $modal=new modal;
        $modal->name=$request->modalName;
        $modal->brand_id=$request->brand_id;
        $modal->save();
        return redirect()->route('sm.modals.index')->with('msg','new modal added successfully');
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

        //updating data
        $request->validate([
            'modalName'=>'required',
        ]);
        $modal=  modal::find($id);
        $modal->name=$request->modalName;
        $modal->brand_id=$request->brand_id;
        $modal->update();
        return redirect()->route('sm.modals.index')->with('msg','modal updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting record with specific id
        $modal=modal::find($id);
        item::where('modal_id',$id)->delete();
        $modal->delete();
        return redirect()->route('sm.modals.index')->with('msg','modal delete successfully');
    }
}
