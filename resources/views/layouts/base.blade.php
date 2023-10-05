<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8" />
        <!--a. titleの置き場所 -->
        <title>@yield('title')</title>
        <!--Bootstrapのインポート-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    </head>

    <body>
        <img src="https://wings.msn.to/image/wings.jpg" title="ロゴ" />
        <hr />
        <!--b. mainコンテンツの置き場所 -->
        @section('main')
            <p>既定のコンテンツです！！！！！！</p>
        @show
        <hr />
        <p>Copyright(c) 1998-2022,WINGS Project. All Right Reserved.</p>
    </body>

</html>
