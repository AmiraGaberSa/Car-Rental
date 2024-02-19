<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Traits\Common;

class TeamController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();
        return view('admin.teams',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTeam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
             'name'=>'required|string|max:50',
             'description'=> 'required|string',
             'position'=>'required|string|max:50',
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',             
            ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/admin/images');    
        $data['image'] = $fileName;
        $data['active'] = isset($request->active);
        Team::create($data);
        return redirect('admin/teams');
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
        $team = Team::findOrFail($id);               
        return view('admin.editTeam',compact('team')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'description'=> 'required|string',
            'position'=>'required|string|max:50',          
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',          
            ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/admin/images');  
            $data['image'] = $fileName;
            unlink("assets/admin/images/" . $request->oldImage);
        }
        
        $data['active'] = isset($request->active);
        Team::where('id', $id)->update($data);
        return redirect('admin/teams');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::where('id', $id)->delete();
        return redirect('admin/teams');
    }

    public function messages(){
        return [            
            'name.required' => 'The name field is required.',
            'name.string' => 'The name should be a string.',
            'title.max' => 'The name may not be greater than 50 characters.',
            'position.string' => 'The position should be a string.',
            'description.required' => 'The description field is required.',          
            'image.required' => 'Please make sure to select an image.',
            'image.mimes' => 'The image must be of type: png, jpg, jpeg.',
            'image.max' => 'The image file size cannot exceed the maximum allowed.',            
            ];
    }
}
