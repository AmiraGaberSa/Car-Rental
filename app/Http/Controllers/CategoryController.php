<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'cat_name'=>'required|string|max:50',            
            ], $messages);  //send messages array with data array
         
            Category::create($data);
            return redirect()->back();
    
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
        $category = Category::findOrFail($id);
        return view ('admin.editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'cat_name'=>'required|string|max:50',         
            ], $messages);  //send messages array with data array

            Category::where('id',$id)->update($data);
            return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $importantCategory = Car::where('category_id',$id)->count();
        if ($importantCategory){
            return back()->with ('error',"This category is linked to a car. It can't be deleted!");
        }else{
            Category::where('id',$id)->delete();
            return redirect('admin/categories');

        }
    }

    public function messages()
    {
        return [
            'cat_name.string'=>'Should be string',
            
            
        ];
    }
}
