@extends('user.tampletes.home')
@section('title')
Car Rental-Home Page
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
         
      </div>
    </div>
@endsection

