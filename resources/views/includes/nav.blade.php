<nav class="navbar navbar-toggleable-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><a href="{{ url('/') }}">Purchase Stock System</a></h1>
            </div>   
             <div class="col-md-4" style="padding-top: 20px;">
                <ul class="nav nav-pills navbar-right">
                    @auth
                        <li role="dashboard"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li role="dashboard"><a href="{{ url('/logout') }}">Logout</a></li>
                    @else
                        <li role="dashboard"><a href="{{ route('login') }}">Login</a></li>
                        <li role="dashboard"><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>  
        </div>        
    </div>
</nav>