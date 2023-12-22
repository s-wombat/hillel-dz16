<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->whereBetween('id', array(4, 7))->get();
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        if($id == 5) {
            $category->name = 'new5';
            $category->description = 'new description';
            $category->save();
            return redirect()->route('categories.index');
        }

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
