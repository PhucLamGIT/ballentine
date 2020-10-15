@auth()
    @include('management::layouts.navbars.navs.auth')
@endauth

@guest()
    @include('management::layouts.navbars.navs.guest')
@endguest
