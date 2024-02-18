@extends('user.tampletes.pages')
@section('title')
Car Rental-Listing
@endsection
@section('pageTitle')
  Listings
@endsection
@section('content')

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>        
        @include('user.includes.carListing')     
      
        
        <div class="row">        
          <div class="col-5">            
            <div class="custom-pagination">
            {{ $cars->links('pagination::default') }}                
            </div>
          </div>
        </div>        
     
      </div>
    </div>
    
@include('user.includes.recentTestimonials')   
@include('user.includes.whatAreYouWaiting')
@endsection

