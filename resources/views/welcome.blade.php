<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DomPDF && Laravel 7</title>

        <link href="{{ asset('assets/bootstrap5/css/bootstrap5.min.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/bootstrap5/js/bootstrap5.min.js') }}" ></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Laravel DomPDF</h1>
            <form class="form" method="post" action="{{ url('download') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="name" placeholder="Type some text">

                <button class="btn btn-primary" type="submit"> Download PDF </button>
            </form>
        </div>
    </body>
</html>
