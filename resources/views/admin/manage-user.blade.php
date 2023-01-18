@extends('layout')

@section('styling')
<style>
    body {
        margin-bottom: 0;
    }
    #user-box {
        display: flex;
        flex-wrap: wrap;
    }

    #user-card {
        margin: 0 10px 10px 0;

        background: linear-gradient(146.53deg, rgba(243, 243, 243, 0.4) -10.26%, rgba(243, 243, 243, 0.04) 84.29%);
        backdrop-filter: blur(30px);
        color: white;
    }
    
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="/admin/manage/user/search" method="get" style="margin-bottom: 2rem">
            <input class="form-control" type="text" placeholder="Type the user's name here" name="q" aria-label="default input example">
        </form>
    
        <div id="user-box">
            @foreach ($users as $user)
                <div class="card" id="user-card" style="width: 17.5rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} {{ $user->isBanned ? "(BANNED)" : "" }}</h5>
                        <p class="card-text">Has joined since {{ $user->created_at }}</p>
    
                        <form action="{{ route('admin.update.ban', ['user_id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
    
                            @if ($user->isBanned)
                                <input name="isBan" type="number" value="0" hidden>
                                <button type="submit" class="btn btn-danger">Lift The Ban</button>
                            @else
                                <input name="isBan" type="number" value="1" hidden>
                                <button type="submit" class="btn btn-success">Ban User</button>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection