<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>速習 Laravel</title>
    </head>

    <body>
        <table class="table">
            <tr>
                <th>No. </th>
                <th>署名</th>
                <th>価格</th>
                <th>出版社</th>
                <th>刊行日</th>
            </tr>

            @foreach ($records as $id => $record)
                <tr>
                    <td>{{ $id + 1 }}</td>
                    <td>{{ $record->title }}</td>
                    <td>{{ $record->price }}</td>
                    <td>{{ $record->publisher }}</td>
                    <td>{{ $record->published }}</td>
                </tr>
            @endforeach
        </table>
    </body>

</html>
