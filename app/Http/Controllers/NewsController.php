<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNews;
use App\Http\Requests\StoreNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use League\Flysystem\Exception;
use Optimus\Bruno\LaravelController;
use Optimus\Bruno\EloquentBuilderTrait;
use App\Models\News;

class NewsController extends LaravelController
{
    use EloquentBuilderTrait;
    /**
     * Display a listing of the resource.
     *
     * @param GetNews $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetNews $request)
    {
        try{
            $queryString = json_encode($request->query());
        }catch (Exception $e){
            return $this->response(400,$e->getMessage());
        }
        $news = Cache::remember("news_$queryString", 120, function () {
            // Parse the resource options given by GET parameters
            $resourceOptions = $this->parseResourceOptions();
            $query = News::query();
            $this->applyResourceOptions($query, $resourceOptions);
            if($resourceOptions['limit']){
                $news = $query->paginate($resourceOptions['limit']);
            }else{
                $news = $query->paginate(config('params.limit'));
            }

            return $news;
        });


        // Create JSON response of parsed data
        return $this->response([
            'current_page' => $news->currentPage(),
            'data' => $news->items(),
            "from" => $news->firstItem(),
            "last_page" => $news->lastPage(),
            "per_page" => $news->perPage(),
            "to" => $news->lastItem(),
            "total" => $news->total()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNews  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        $data = $request->all();
        if(!$request->has('date')){
            $data['date'] = date("Y-m-d H:i:s");
        }
        return $this->response(201,News::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        if(!$news){
            return $this->response($news,404);
        }
        return $this->response($news);
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
        $news = News::find($id);
        if(!$news){
            return $this->response($news,404);
        }
        $news->update($request->all());

        return $news;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if(!$news){
            return $this->response($news,404);
        }
        $news->delete();
        return $this->response([
            'error' => 0,
            'message' => 'Deleted successfully'
        ],200);
    }
}
