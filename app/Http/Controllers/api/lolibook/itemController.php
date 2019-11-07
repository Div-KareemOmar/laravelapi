<?php

namespace App\Http\Controllers\api\lolibook;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\itemResource;
use App\item;
use Illuminate\Support\Facades\DB;
use App\item_details;

class itemController extends Controller
{
    private $project = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_details=item_details::where('project_id',$this->project)->get();
      return new itemResource($item_details);
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



        $id = DB::table('items')->insertGetId([
            'favorite'=> 1,
            'img'=>"kk"

        ]);

            $item_details = new item_details();

            $item_details->title = $request->title;
            $item_details->item_id = $id;
            $item_details->project_id = $this->project;
            $item_details->description = $request->description;
            $item_details->price = $request->price;
            $item_details->language = $request->language;

            $item_details->save();

            return new itemResource($item_details);



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
