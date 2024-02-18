<!doctype html>
<html lang="en">

  <head>
    @include('user.includes.head')
  </head>

  <body>

         
     @include('user.includes.navbar')  

     @include('user.includes.header') 
     
     @include('user.includes.rentCarByFinger') 
       
     @include('user.includes.howWorks')   

     @include('user.includes.meetNow') 
          
     @yield('content') 
        
     @include('user.includes.features')

     @include('user.includes.recentTestimonials') 
    
     @include('user.includes.whatAreYouWaiting') 

     @include('user.includes.footer')  
  

    </div>

    @include('user.includes.footerJs') 

  </body>

</html>

