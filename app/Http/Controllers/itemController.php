<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\item;
use App\Models\modal;
use Database\Seeders\ItemsTableSeeder;
use App\Http\Requests\ItemsRequest;
use Illuminate\Http\Request;

class itemController extends Controller
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
        //getting brands with its related modals
        $data['brands']=brand::with(['modal'])->get();
        //getting items with their related modals
        $data['item_with_modals']=item::with(['modal','modal.brand'])->orderBy('name')->paginate(10);
//        return json_encode($data['item_with_modals']);   data testing comment
        return view('Emanager/items/index',$data);
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
    public function store(ItemsRequest $request)
    {
        //validating items
     
//        initiating new instance of item class and saving values in it
        $item=new item;
        $item->fill($request->validated());
        $item->save();
//        redirecting to home route
        return redirect()->route('sm.home.index')->with('msg','new item stored successfully');
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
    public function update(ItemsRequest $request, $id)
    {
        //
        //validating items
     
// updating items by specific id
        $item=item::find($id);
        $item->fill($request->validated());
        $item->save();

        return redirect()->route('sm.home.index')->with('msg','new item updated successfully');
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
        $item=item::find($id);
        $item->delete();
        return redirect()->route('sm.home.index')->with('msg','band delete successfully');
    }

}
