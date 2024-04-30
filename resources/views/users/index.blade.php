@extends('layout.master')

@section('title')
    Users index
@endsection

@section('content')
    <h1>Users</h1>

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
                    <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('users view')
    </script>
@endsection
