@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{ $title }}</h2>

        <form class="form-horizontal col align-self-center" method="post">
            <div class="form-group">
                <label for="comment">Message</label>
                <textarea class="form-control" rows="3" id="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Send</button>
        </form>

        <div class="text-right">
            <b>Massages count: {{ $messagesCount }}</b>
            <br>
        </div>

        @foreach($messages as $message)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $message->user }}</h3>
                    <p class="text-left">{{ $message->user }}</p>
                    <p class="text-right">{{ $message->created_at }}</p>
                </div>
                <div class="panel-body">{{ $message->message }}</div>
            </div>
        @endforeach
    </div>
@endsection