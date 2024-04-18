@extends('layouts.dashboard.dashlayout')

@section('content')
<div class="container">
    
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($unreadNotifications->count())
                        <h4>Notifications non lues</h4>
                        <ul class="list-group"> 
                            @foreach($unreadNotifications as $notification)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="alert alert-warning">
                                        {{ $notification->data['message'] }}
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ $notification->data['link'] }}" class="btn btn-sm btn-primary me-2" >
                                            {{ $notification->data['action'] }}
                                        </a>
                                        <form action="{{ route('notifications.read', $notification->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Marquer comme lue</button>
                                        </form>
                                    </div>
                                    
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if($readNotifications->count())
                        <h4>Notifications lues</h4>
                        <ul class="list-group">
                            @foreach($readNotifications as $notification)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="alert alert-success">
                                        {{ $notification->data['message'] }}
                                    </div>
                                    <a href="{{ $notification->data['link'] }}" class="btn btn-sm btn-primary me-2" >
                                        {{ $notification->data['action'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
    
</div>
@endsection


