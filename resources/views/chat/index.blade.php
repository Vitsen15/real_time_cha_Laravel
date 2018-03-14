@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<h2 class="text-center">{{ $title }}</h2>--}}
        {{--<form class="form-horizontal col align-self-center" action="{{ route('send-message') }}" method="POST">--}}
            {{--@csrf--}}
            {{--<div class="form-group">--}}
                {{--<label for="message">Message</label>--}}
                {{--<textarea class="form-control" rows="3" id="message" name="message"></textarea>--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-default">Send</button>--}}
        {{--</form>--}}

        {{--<div class="text-right">--}}
            {{--<b>Massages count: {{ $messagesCount }}</b>--}}
            {{--<br>--}}
        {{--</div>--}}
        <message :messages="messages"></message>
        <sent-message v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></sent-message>
        {{--@foreach($messages as $message)--}}
            {{--@if($message->user->id === Auth::user()->id)--}}
                {{--<div class="card bg-info text-white">--}}
                    {{--<div class="card-header">--}}
                        {{--<h3>{{ $message->user->name }}</h3>--}}
                        {{--<p class="text-right">{{ $message->created_at }}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">{{ $message->message }}</div>--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--<h3>{{ $message->user->name }}</h3>--}}
                        {{--<p class="text-right">{{ $message->created_at }}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">{{ $message->message }}</div>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--@endforeach--}}
        <br>

        {{--<div class="text-center">--}}
            {{--{!! $messages->render() !!}--}}
        {{--</div>--}}
    </div>
@endsection