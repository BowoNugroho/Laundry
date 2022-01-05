@extends('login.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6">
                <div class="card-body p-0 ">
                    <div class="row justify-content-center ">
                        <div class="col-lg-12 p-5">
                            <img class="mb-4" src="/img/bootstrap-logo.svg" alt="" width="72" height="57">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="/register" method="post">
                                @csrf
                                <div class="form-group ">
                                    <input type="text" name="name"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        id="exampleFirstName" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feadback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username"
                                        class="form-control form-control-user @error('username') is-invalid @enderror"
                                        id=" exampleInputEmail" placeholder="Username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feadback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id=" exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feadback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id=" exampleInputPassword" placeholder="Password">
                                    @error('password')
                                        <div class=" invalid-feadback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                Already have an account?
                                <a class="small" href="\login"> Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
