@extends('layouts.base')

@section('title', 'Cookieの確認')

@section('main')
    <div class="container" mt-5>
        <div class="alert alert-success">
            {{-- <h4>クッキーの設定が完了しました!!</h4>
            <p>アプリケーションのタイトルは「Laravel」として、次の30日間保存されます。</p> --}}
        </div>
        <a href="{{ url('/') }}" class="btn btn-primary">ホームに戻る</a>
    </div>
