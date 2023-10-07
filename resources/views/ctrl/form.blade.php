@extends('layouts.base')
@section('title', 'フォームの基本')
@section('main')

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <form method="POST" action="/ctrl/result">
        <!-- CSRF対策 -->
        {{-- CSRFの結果(ワンタイムトークン) --}}
        {{-- <input type="hidden" name="_token" value="N0CR85wWgUCT6Nr0cIZYwBRB4l4z09MqLtXlRv9k"> --}}
        {{-- アクションメソッドでは、あらかじめ手元で生成されたワンタイムトークンと、
            フォームから送信されたそれが一致するかを確認し、一致する場合にだけデータを受け入れ --}}
        @csrf

        <label id="name">名前 : </label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" />
        <input type="submit" value="送信" />
        <p>{{ $result }}</p>
    </form>
@endsection
