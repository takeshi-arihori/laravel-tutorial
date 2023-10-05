<!--a. 利用する共通レイアウトを宣言 -->
@extends('layouts.base')
<!--b. titleセクションのコンテンツ -->
@section('title', '共通レイアウトの基本')
<!--c. mainセクションのコンテンツ-->
@section('main')
    @parent
    <p>{{ $msg }}</p>
@endsection
