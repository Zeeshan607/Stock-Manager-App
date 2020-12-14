<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\modal;
use App\Models\item;

use Illuminate\Http\Request;

class brandController extends Controller
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
        //getting brands with modals and their related items {pagnating by 10 record per page}
        $data['brands']=brand::with(['modal','modal.item'])->orderBy('name')->paginate(10);

        return view('Emanager/brands/index',$data);
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
        //validating name input of form
        $request->validate([
            'brandName'=>'required'
        ]);
//        saving brand with new instance of brand class
        $brand= new brand;
        $brand->name=$request->brandName;
        $brand->save();
        return redirect()->route('sm.brands.index')->with('msg','new brand added successfully');
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
            'brandName'=>'required',
        ]);
        //
    $brand=  brand::find($id);
    $brand->name=$request->brandName;
    $brand->update();
    //
    return redirect()->route('sm.brands.index')->with('msg','brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting brands with its modals and modals with its items by specific id
        $brand=brand::find($id);
        modal::where('brand_id',$id)->delete();
        item::where('brand_id',$id)->delete();
        $brand->delete();

        return redirect()->route('sm.brands.index')->with('msg','band delete successfully');
    }
}
