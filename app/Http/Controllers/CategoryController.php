<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories = [
        ['id' => 1, 'name' => 'Công nghệ'],
        ['id' => 2, 'name' => 'Khoa học'],
        ['id' => 3, 'name' => 'Kinh doanh'],
    ];

    public function index()
    {
        return view('categories.index', [
            'categories' => $this->categories
        ]);
    }

    public function show($id)
    {
        $category = collect($this->categories)
            ->firstWhere('id', (int)$id);

        return view('categories.show', compact('category'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}