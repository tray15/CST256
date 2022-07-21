{{--<div class="mt-3">--}}
{{--	<div style='width: 100%; display: flex; justify-content: center;'>--}}
{{--		<h2>Welcome to our Milestone</h2>--}}
{{--	</div>--}}
{{--</div>--}}
<nav class="navbar navbar-light navbar-expand-md py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="{{URL::to('/')}}"><span>Welcome to our Milestone</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/home')}}" >Home</a></li>
            </ul>
            @if(session()->get('userid') == null)
                <a class="btn btn-primary" role="button" href="/login">Log In</a>
            @else
                <a class="btn btn-primary" role="button" href="/logout" style="margin-right: 4px;">Logout</a>
            @endif
        </div>
    </div>
</nav>