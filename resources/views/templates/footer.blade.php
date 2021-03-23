

<div class="container mt-5 pb-3">
    <p class="text-center text-gray text-muted text-footer"> 
    @if(Request::is('developer')) 
        @if(isset($_GET['view-from']) && $_GET['view-from'] == 'login')
        <a href="{{ route('user.login') }}" class="mr-2">Home</a>
        @elseif(isset($_GET['view-from']) && $_GET['view-from'] == 'register')
        <a href="{{ route('developer.info') }}" class="mr-2">Home</a>
        @else
        <a href="{{ route('check-route.index') }}" class="mr-2">Home</a>
        @endif
    @endif
    <a href="" class="mr-2 {{ (Request::is('developer') ? 'ml-2' : '') }}">Privacy Policy</a><a href="" class="mr-2 ml-2">Terms and Condition</a>
    @if(Request::is('login'))
    <a href="{{ route('developer.info', ['view-from' => 'login']) }}" class="mr-2 ml-2">Developer</a>
    @elseif(Request::is('register'))
    <a href="{{ route('developer.info', ['view-from' => 'register']) }}" class="mr-2 ml-2">Developer</a>
    @else
    <a href="{{ route('developer.info') }}" class="mr-2 ml-2">Developer</a>
    @endif
    <a href="" class="mr-2 ml-2">About</a>
    <a href="" class="ml-2">Help</a> </p>
</div>