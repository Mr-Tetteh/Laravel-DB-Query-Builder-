@extends('layout.master')

@section('title')
    Users index
@endsection

@section('content')
    <h1 class="text-center">Users</h1>
    <div class="row">
        <div class="col-6 offset-4">
            <form method="post" action="{{route('user.update', $users->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{$users->name}}" type="text"
                           class="form-control @error('name') is-invalid @enderror "
                           id="name" aria-describedby="name" aria-describedby="name">
                    <div id="name" class="invalid-feedback">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" value="{{$users->email}}" type="email"
                           class="form-control @error('email') is-invalid @enderror " id="exampleInputPassword2"
                           aria-describedby="exampleInputPassword2">
                    <div id="exampleInputPassword2" class="invalid-feedback">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror "
                           id="exampleInputPassword1" aria-describedby="exampleInputPassword2" value="{{$users->password}}">
                    <div id="exampleInputPassword2" class="invalid-feedback">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password"
                           class="form-control @error('password_confirmation') is-invalid @enderror "
                           id="exampleInputPassword2" aria-describedby="exampleInputPassword2" value="{{$users->password}}">

                    <div id="exampleInputPassword2" class="invalid-feedback">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="Date" class="form-label">Date</label>
                    <input value="{{\Carbon\Carbon::parse($users->created_at)->format('Y-m-d')}}" name="updated_at" type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                           aria-describedby="date">
                    <div id="date" class="invalid-feedback">
                        @error('date')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('users view')
    </script>
@endsection
