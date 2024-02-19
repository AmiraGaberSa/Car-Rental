<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Traits\Common;

class BlogController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.blogs',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'content'=> 'required|string',
             'author'=>'required|string|max:50',
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',             
            ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Blog::create($data);
        return redirect('admin/blogs');
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
        $blog = Blog::findOrFail($id);               
        return view('admin.editBlog',compact('blog')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'content'=> 'required|string', 
            'author'=>'required|string|max:50',           
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',          
            ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/admin/images');  
            $data['image'] = $fileName;
            unlink("assets/admin/images/" . $request->oldImage);
        }
        
        $data['published'] = isset($request->published);
        Blog::where('id', $id)->update($data);
        return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::where('id', $id)->delete();
        return redirect('admin/blogs');
    }

    public function messages(){
        return [            
            'title.required' => 'The title field is required.',
            'title.string' => 'The title should be a string.',
            'title.max' => 'The title may not be greater than 50 characters.',
            'author.string' => 'The author name should be a string.',
            'content.required' => 'The content field is required.',          
            'image.required' => 'Please make sure to select an image.',
            'image.mimes' => 'The image must be of type: png, jpg, jpeg.',
            'image.max' => 'The image file size cannot exceed the maximum allowed.',            
            ];
    }
}
