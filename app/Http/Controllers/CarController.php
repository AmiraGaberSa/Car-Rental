<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
       // $categories = Category::get();
        return view('admin.cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.addCar',compact('categories'));
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
             'luggage'=> 'required|integer',
             'doors'=>  'required|integer',
             'passengers'=>  'required|integer',
             'price'=> 'required|numeric',
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',
             'category_id'=> 'required',
            ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Car::create($data);
        return redirect('admin/cars');
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
        $car = Car::findOrFail($id);                     
        $categories = Category::select('id', 'cat_name')->get();
        return view('admin.editCar',compact('car', 'categories')); 
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
            'luggage'=> 'required|integer',
            'doors'=>  'required|integer',
            'passengers'=>  'required|integer',
            'price'=> 'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',          
            'category_id' => 'required',
            ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/admin/images');  
            $data['image'] = $fileName;
            unlink("assets/admin/images/" . $request->oldImage);
        }
        
        $data['published'] = isset($request->published);
        Car::where('id', $id)->update($data);
        return redirect('admin/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('admin/cars');
    }

    public function messages(){
        return [            
            'title.required' => 'The title field is required.',
            'title.string' => 'The title should be a string.',
            'title.max' => 'The title may not be greater than 50 characters.',
            'content.required' => 'The content field is required.',
            'luggage.required' => 'The luggage field is required.',
            'luggage.integer' => 'The luggage field must be a number.',
            'doors.required' => 'The doors field is required.',
            'doors.integer' => 'The doors field must be a number.',
            'passengers.required' => 'The passengers field is required.',
            'passengers.integer' => 'The passengers field must be a number.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'image.required' => 'Please make sure to select an image.',
            'image.mimes' => 'The image must be of type: png, jpg, jpeg.',
            'image.max' => 'The image file size cannot exceed the maximum allowed.',
            'category_id.required' => 'The category ID field is required.',
            ];
    }
}
