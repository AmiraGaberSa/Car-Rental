@extends('user.tampletes.pages')
@section('title')
Car Rental-Contact US
@endsection
@section('pageTitle')
  Contact
@endsection

@section('content')
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>Contact Us Or Use This Form To Rent A Car</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="{{ route('storeContact') }}" method="post">
              @csrf
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name" name="firstName" value="{{ old('firstName') }}">
                  @error('firstName')
                  {{ $message }}
                  @enderror
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Last name" name="lastName" value="{{ old('lastName') }}">
                  @error('lastName')
                  {{ $message }}
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}">
                  @error('email')
                  {{ $message }}
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" id="message" class="form-control" placeholder="Write your message." cols="30" rows="10">{{ old('message') }}</textarea>
                  @error('message')
                  {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span>34 Street Name, City Name Here, United States</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+1 242 4942 290</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection