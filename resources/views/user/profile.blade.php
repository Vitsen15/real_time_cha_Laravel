@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="profile" class="row profile">
            <profile-sidebar avatar="{{ $avatarUrl }}" name="{{ $name }}"></profile-sidebar>
            <div class="col-md-9">
                <div class="profile-content">
                    {{--<router-view></router-view>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
