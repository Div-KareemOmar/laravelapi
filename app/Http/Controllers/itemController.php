<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\item_details;
use App\items;

use Illuminate\Support\Facades\DB;

class itemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="items";
        $item= item::all();

        $itemd = DB::table('items')->join('item_details','items.id','=','item_details.item_id')->where('language','0')->get();
        $item_details= DB::select("SELECT * FROM `item_details` WHERE `language`='0'");
        return view('item.index',['title'=>$title,'item_details'=>$item_details,'item'=>$itemd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'add item';
        return view('item.create',['title'=>$title]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file=$request->file('img');
        $distnationpath='uploads';
        $file->move($distnationpath,$file->getClientOriginalName());

        $id = DB::table('items')->insertGetId([

            'favorite'=> 1,
            'img'=>$file->getClientOriginalName(),
            'project_id'=>session('project')

        ]);

        $count = count($request->input('title'));

        //        echo $request->input('title')[1];die;
        for ($i = 0; $i < $count; $i++) {
            $item_details = new item_details();

            $item_details->title = $request->input('title')[$i];
            $item_details->item_id = $id;
            $item_details->project_id = session('project');
            $item_details->description = $request->input('description')[$i];
            $item_details->price = $request->input('price')[$i];
            $item_details->language = $i;

            $item_details->save();
        }
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
