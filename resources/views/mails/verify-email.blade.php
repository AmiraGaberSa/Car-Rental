@extends('user.tampletes.log')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (Auth::check() && is_null(Auth::user()->email_verified_at))
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    @elseif(Auth::check() && !is_null(Auth::user()->email_verified_at))
                        @if(Auth::user()->active == 0)
                            <script>window.location = "{{ route('index') }}";</script>
                        @else
                            <script>window.location = "{{ route('users') }}";</script>
                        @endif
                    @else
                        <script>window.location = "{{ route('login') }}";</script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection
