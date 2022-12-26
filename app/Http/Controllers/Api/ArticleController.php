<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiHelperTrait ;
use App\Models\Article;
use App\Models\Governorate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiHelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
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
            $input = $request->all();


            $article = Article::create($input);
            return response()->json([
            "success" => true,
            "message" => "article created successfully.",
            "data" => $article
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
        $article = Article::find($id);
        if ($article) {
            return $this->successResponse("Article", $article, 200, 'done');
        } else {

            return $this->errorResponse('Article not found', 404);
        }
    }
    public function active(Request $request)
    {
        try {
            $article = Article::findOrFail($request->id);
            $article->status = $request->active;
            $article->save();
            return $this->successMessage('تم التحديث بنجاح');
        } catch (\Throwable $th) {
            return $this->errorResponse('حدث خطا ما ', 404);
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
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $article=Article::findOrFail($id);
$article->title = $request->title;
$article->description = $request->description;
$article->save();
return response()->json([
"success" => true,
"message" => "Product updated successfully.",
"data" => $article
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
        $article=Article::findOrFail($id);
        $article->delete();
return response()->json([
"success" => true,
"message" => "Product deleted successfully.",
"data" => $article
]);
    }
}
