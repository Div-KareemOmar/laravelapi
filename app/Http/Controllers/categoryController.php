<?php

namespace App\Http\Controllers;

use App\category_details;
use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
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
        $title = 'category';
        $category = category::all();
        $category_details=DB::select("SELECT * FROM `category_details` WHERE `language`='0'");

        return view('category.index',['title'=>$title,'category'=>$category,'category_details'=>$category_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'add category';
        return view('category.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id = DB::table('categories')->insertGetId([
            'parent' => 0,
            'project_id'=>session('project')
        ]);

        $count = count($request->input('title'));

        //        echo $request->input('title')[1];die;
        for($i=0;$i<$count;$i++){
            $category_details = new category_details();

            $category_details->title = $request->input('title')[$i];
            $category_details->category_id = $id;
            $category_details->project_id =  session('project');
            $category_details->description = $request->input('description')[$i];
            $category_details->language = $i;
            $category_details->save();

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

    public function setperoject($project_id){
//        $_SESSION['project'] = $project_id;
//        dd($project_id);
        session()->put('project', $project_id);

//        $value = session('project',$project_id);

    }
}
