@extends('layouts.base')

@section('title', 'where')

@section('main')
    @if (!empty($result))
        <p>{{ $result }}</p>
    @else
        <p>一致するデータは存在しません。
        </p>
    @endif
@endsection
