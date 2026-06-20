<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $articles = [
        ['id' => 1, 'title' => 'Giới thiệu Laravel', 'author' => 'A', 'date' => '2024-01-15'],
        ['id' => 2, 'title' => 'Routing cơ bản', 'author' => 'B', 'date' => '2024-01-18'],
        ['id' => 3, 'title' => 'Blade Template', 'author' => 'C', 'date' => '2024-01-22'],
        ['id' => 4, 'title' => 'Eloquent ORM', 'author' => 'D', 'date' => '2024-01-25'],
    ];

    return view('articles.index', compact('articles'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    
   public function show(string $id)
{
    $articles = [
        1 => ['id'=>1,'title'=>'Giới thiệu Laravel','author'=>'A','date'=>'2024-01-15','content'=>'Laravel là framework PHP'],
        2 => ['id'=>2,'title'=>'Routing cơ bản','author'=>'B','date'=>'2024-01-18','content'=>'Routing là mapping URL'],
        3 => ['id'=>3,'title'=>'Blade Template','author'=>'C','date'=>'2024-01-22','content'=>'Blade là template engine'],
        4 => ['id'=>4,'title'=>'Eloquent ORM','author'=>'D','date'=>'2024-01-25','content'=>'ORM giúp làm DB dễ hơn'],
    ];

    if (!isset($articles[$id])) {
        abort(404);
    }

    return view('articles.show', ['article' => $articles[$id]]);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
