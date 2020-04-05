<html lang="ja">
    <head>
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <script>
        const orderId = {{$orderId}};
    </script>
    <body>
    <h1>broadcast test2</h1>
    <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>