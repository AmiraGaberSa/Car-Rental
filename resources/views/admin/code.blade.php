@extends('admin.tampletes.listTamplete')
@section('content')
@endsection

@extends('admin.tampletes.formTamplete')
@section('content')
@endsection


public function updateUser($id, Request $request){
    //validate post data
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);
    $userData = $request->only(["email","password"]);
    $userData['password'] = Hash::make($userData['password']);
    User::find($id)->update($userData);
    Session::flash('success_msg', 'User details updated successfully!');
    return redirect()->route('admin.user');

    
}

                                                @error('password')
                                                {{ $message }}
                                                @enderror


                                                value="{{ old('password') }}"

                                                value="{{ $car->title }}"

                                                @foreach ($testimonials as $testimonial)

                                                {{$testimonial->content}}

                                                {{$testimonial->name}}

                                                {{$testimonial->position}}

                                                {{asset('assets/admin/images/'.$testimonial->image)}}

                                                ,compact('testimonials')



                                                @if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            @endif
        </ul>
@endif



{{ $users->links('vendor.pagination.custom')}}

LabTest::orderby('id', 'desc')->paginate(10); 

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>

        php artisan vendor:publish --tag=laravel-pagination

        <td>{{$item->products()->count()}}</td>
        
        //If you have categories that don't have any products put this in your blade to check before showing the count (Its an if else statement just inline)

        <td>{{$item->products ? $item->products()->count() : 'N/A'}}</td>

        auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count()

        public function showMsg(string $id)
    {
       $user= Contact::findOrFail($id);
       $user->update(['read_at' => 1]);
       return view('mails.contactUs', compact('user'));
    }


    $contacts = Contact::where('unread', 0)->get();