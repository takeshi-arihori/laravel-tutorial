@empty($msg)
    <p>Messageがありません!!</p>
@endempty

@isset($msg)
    <p>変数Messageは {{ $msg }}です。</p>
@else
    <p>Messageがありません!!</p>
@endisset
