@auth()
    @include('layouts.navbars.navs.auth')
@endauth 

 @guest()
    @include('layouts.navbars.navs.guest')
@endguest

{{-- 
@auth()
  @include('layouts.navbars.sidebar')
@endauth --}}


{{-- 
@sales()
  @include('')
@endsales   --}}

