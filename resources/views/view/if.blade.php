<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $appTitle }}</title>
    </head>

    @env('local')

    <body>
        @if ($random < 50)
            <p>{{ $random }}は50未満です。</p>
        @elseif ($random == 70)
            <p>{{ $random }}は50以上70未満です。</p>
        @else
            <p>{{ $random }}は70以上です。</p>
        @endif
    </body>
    @endenv

</html>
