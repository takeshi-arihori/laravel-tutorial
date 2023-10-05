@switch($random)
    @case(5)
        <p>大ラッキーの一日です。</p>
    @break

    @case(4)
        <p>小ラッキーの一日です。</p>
    @break

    @default
        <p>テスト</p>
@endswitch
