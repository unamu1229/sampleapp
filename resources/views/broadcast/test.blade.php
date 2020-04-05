<html lang="ja">
    <head>
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <script>
        const orderId = {{$orderId}};
    </script>
    <body>
    <h1>broadcast test2</h1>
    {{\Illuminate\Support\Facades\Auth::user()->name}}
    <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>