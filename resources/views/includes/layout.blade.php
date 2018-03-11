<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Share Purchase System</title>

        <!-- Styles -->
        @yield('before-styles')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        @yield('after-styles')

    <body>
        <div>
            @include('includes.nav')

            <div class="content">
                <div class="container">
                    @include('includes.messages')
                </div>
                
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        @yield('before-scripts')
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @yield('after-scripts')

    </body>
</html>