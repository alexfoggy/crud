<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get(); 
        return view('index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $item = Validator::make($request->all(), [
            'name' => 'required',
            'alias' => 'required',
        ]);

        if($item->fails()){
            return response()->json([
                'status' => false,
                'messages' => $item->messages(),
            ]);
        }
        
        $id = null;

        if($request->input('id')){
            $id = $request->input('id');
        }

        $active = 0;

        if($request->input('active') == 'on'){
            $active = 1;
        }

        $newCategory = Category::updateOrCreate(['id' => $id], [
            'p_id' => $request->input('parent'),
            'alias' => $request->input('alias'),
            'name' => $request->input('name'),
            'active' => $active,
        ]);
        // $newCategory->name = $request->input('name');
        // $newCategory->alias = $request->input('alias'); 
        // $newCategory->p_id = ; 
        // $newCategory->active = $active; 
        // $newCategory->save();

        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        $category = Category::get(); 
        $currentCategory = Category::where('alias',$alias)->first(); 
        return view('edit',compact('category','currentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$alias)
    {
        $categoryItem = Category::where('alias',$alias)->first();
        
        return redirect('/');
    }
}
