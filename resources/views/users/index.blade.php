@extends('layout.master')

@section('title')
    Users index
@endsection

@section('content')
    <h1>Users</h1>
<div class="row">

    <div class="col-sm-6">
        <form method="post" action="{{route('users.create.dummy')}}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Create Dummy
            </button>
        </form>
    </div>

    <div class="col-sm-6">
        <form method="post" action="{{route('users.delete.dummy')}}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">
                Delete All
            </button>
        </form>
    </div>

</div>

    <div class="row mb-4">
        <table>
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>




            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$loop->index}}</th>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                <td>
                    <a href="{{route('user.show', $user->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('user.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
            @endforeach

            </tbody>
        </table>
    </div>
    {{$users->links()}}
@endsection

@section('scripts')
    <script>
        console.log('users view')
    </script>
@endsection
