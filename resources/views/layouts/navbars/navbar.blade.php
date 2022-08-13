{{-- @auth()
    @include('layouts.navbars.navs.auth')
@endauth --}}

@guest()
    @include('layouts.navbars.navs.guest')
@endguest

@user()
  @include('')
@enduser

@sales()
  @include('')
@endsales  

