@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{ $title }}</h2>
        @include('chat._form')
        @include('chat.comments-count')
        @include('chat.comment')
    </div>
@stop