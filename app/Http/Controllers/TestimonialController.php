<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string|max:50',
            'content' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);        
        
        $fileName = $this->uploadFile($request->image, 'assets/admin/images');
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Testimonial::create($data);
        return redirect('admin/testimonial');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.editTestimonials', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string|max:50',
            'content' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',    
            ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/admin/images');  
            $data['image'] = $fileName;
            unlink("assets/admin/images/" . $request->oldImage);
        }
        
        $data['published'] = isset($request->published);
        Testimonial::where('id', $id)->update($data);
        return redirect('admin/testimonial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect('admin/testimonial');
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name should be a string.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'position.required' => 'The position field is required.',
            'position.string' => 'The position should be a string.',
            'position.max' => 'The position may not be greater than 50 characters.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content should be a string.',
            'image.sometimes' => 'The image field is invalid.',
            'image.mimes' => 'The image must be of type: png, jpg, jpeg.',
            'image.max' => 'The image file size cannot exceed the maximum allowed.'
        ];
    }
}
