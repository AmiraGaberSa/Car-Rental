<!doctype html>
<html lang="en">

  <head>
    @include('user.includes.head')
  </head>

  <body>
    
     @include('user.includes.singleNavbar')     
          
     @include('user.includes.header')   
     
     @yield('content')

     @include('user.includes.footer')   

    </div>

    @include('user.includes.footerJs') 

  </body>

</html>

