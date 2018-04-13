@extends('layouts.app')

@section('content')
    <router-view avatar="{{ $avatarUrl }}" name="{{ $name }}"></router-view>
@endsection
