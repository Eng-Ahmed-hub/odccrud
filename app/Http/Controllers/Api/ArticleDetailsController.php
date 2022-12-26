<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiHelperTrait;
use App\Models\ArcticalDetails;
use App\Models\Article;
use App\Models\Governorate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ArticleDetailsController extends Controller
{
    use ApiHelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $article = ArcticalDetails::where('arctical_id', $id)->get();
        if ($article) {
            return $this->successResponse('article', $article, 200, 'done');
        } else {

            return $this->errorResponse('article not found', 404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();
        $input['arctical_id'] = $id;
        if ($input['image']) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('articl-details'), $fileName);
            $inputs['image'] = 'articl-details/' . $fileName;
        }

        $article = ArcticalDetails::create($input);
        return response()->json([
            "success" => true,
            "message" => "article created successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = ArcticalDetails::find($id);
        if ($article) {
            return $this->successResponse("Article", $article, 200, 'done');
        } else {

            return $this->errorResponse('Article not found', 404);
        }
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

        $article = ArcticalDetails::findOrFail($id);
        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('articl-details'), $fileName);
            $article->image = 'articl-details/' . $fileName;
        }
        $article->save();
        return response()->json([
            "success" => true,
            "message" => "Product updated successfully."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = ArcticalDetails::findOrFail($id);
        $article->delete();
        return response()->json([
            "success" => true,
            "message" => "Product deleted successfully."
        ]);
    }
}