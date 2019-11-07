<?php

namespace App\Http\Controllers\api\youkal;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\categoryResource;
use App\category;
use App\category_details;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    private $project = 6;

    public function index()
    {

        $category = category::all();

        $category_details= category_details::where('project_id',
        $this->project)->get();
        return new categoryResource($category_details);

    }

    public function store(Request $request)
    {

        $id = DB::table('categories')->insertGetId([
            'parent' => 0,
        ]);

        $category_details = new category_details();

        $category_details->title = $request->title;
        $category_details->category_id = $id;
        $category_details->project_id = $this->project;
        $category_details->description = $request->description;
        $category_details->language = $request->language;
        $category_details->save();

        return new categoryResource($category_details);

    }

}
