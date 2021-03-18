<div class="container mt-2">
    <p class="text-center text-gray text-muted text-dev">Developed by: SLSU-CCSIT Development Team</p>
</div>

<div class="container mt-5 pb-3">
    <p class="text-center text-gray text-muted text-footer"> 
    @if(Request::is('developer')) 
        @if(isset($_GET['view-from']) && $_GET['view-from'] == 'login')
        <a href="{{ route('user.login') }}" class="mr-2">Home</a>
        @elseif(isset($_GET['view-from']) && $_GET['view-from'] == 'register')
        <a href="{{ route('developer') }}" class="mr-2">Home</a>
        @endif
    @endif
    <a href="" class="mr-2 {{ (Request::is('developer') ? 'ml-2' : '') }}">Privacy Policy</a><a href="" class="mr-2 ml-2">Terms and Condition</a>
    <a href="{{ route('developer', ['view-from' => (Request::is('login') ? 'login' : 'registration')]) }}" class="mr-2 ml-2">Developer</a>
    <a href="" class="mr-2 ml-2">About</a>
    <a href="" class="ml-2">Help</a> </p>
</div>