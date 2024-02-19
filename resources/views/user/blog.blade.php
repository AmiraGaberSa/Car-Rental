@extends('user.tampletes.pages')
@section('title')
Car Rental-Blog
@endsection
@section('pageTitle')
  Blogs
@endsection
@section('content')

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
           @foreach ($blogs as $blog)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">
                <img src="{{asset('assets/admin/images/'.$blog->image)}}" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">{{$blog->title}}</a></h2>
                <span class="meta d-inline-block mb-3">{{ date('F d, Y', strtotime($blog->created_at)) }} <span class="mx-2">by</span> <a href="#">{{$blog->author}}</a></span>
                <p>{{ substr($blog->content, 0, 100) }}{{ strlen($blog->content) > 100 ? "..." : "" }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        
        <div class="row">        
          <div class="col-5">            
            <div class="custom-pagination">
            {{ $blogs->links('pagination::default') }}                
            </div>
          </div>
        </div>        
     
      </div>
    </div>
    

@include('user.includes.whatAreYouWaiting')
@endsection
