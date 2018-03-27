@extends('layouts.app')

@section('content')
    <div class="container">
        <sent-message v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></sent-message>
        <message :messages="messages"></message>
    </div>
@endsection