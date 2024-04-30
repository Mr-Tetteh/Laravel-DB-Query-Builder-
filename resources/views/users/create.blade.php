@extends('layout.master')

@section('title')
    Creat Users
@endsection

@section('content')

{{--    @if($errors->any())--}}
{{--        @foreach($errors as $error)--}}
{{--            {{$error}}--}}
{{--        @endforeach--}}
{{--    @endif--}}

    <h2 class="text-center">Create User</h2>
    <div class="row mb-4">
        <div class="col-6 offset-4">
            <form method="post" action="{{route('user.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text"
                           class="form-control @error('name') is-invalid @enderror "
                           id="name" aria-describedby="name" aria-describedby="name" value="{{old('name')}}">
                    <div id="name" class="invalid-feedback">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div   >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email"
                           class="form-control @error('email') is-invalid @enderror " id="exampleInputPassword2"
                           aria-describedby="exampleInputPassword2" value="{{old('email')}}">
                    <div id="exampleInputPassword2" class="invalid-feedback">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror "
                           id="exampleInputPassword1" aria-describedby="exampleInputPassword2" value="{{old('password')}}">
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
                           id="exampleInputPassword2" aria-describedby="exampleInputPassword2" value="{{old('password_confirmation')}}">

                    <div id="exampleInputPassword2" class="invalid-feedback">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </div>
                </div>


{{--                <div class="mb-3">--}}
{{--                    <label for="Date" class="form-label">Date</label>--}}
{{--                    <input name="created_at" type="date" class="form-control @error('date') is-invalid @enderror"--}}
{{--                           id="date" aria-describedby="date" value="{{old('created_at')}}">--}}
{{--                    <div id="date" class="invalid-feedback">--}}
{{--                        @error('date')--}}
{{--                        {{$message}}--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('users view')
    </script>
@endsection
