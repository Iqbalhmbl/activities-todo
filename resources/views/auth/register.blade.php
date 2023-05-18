@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card border-primary shadow">
            <h2 class="text-center py-4 border-bottom bg-primary card-header border-primary" style="">Sign Up</h2>
            <div class="card-body">
                    <form method="POST" action="{{ route('account.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label style="" for="password" class="col-md-2 col-form-label text-md-left">{{ __('Photo') }}</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file border-primary" name="photo">
                            </div>
                        </div>
                        <div class="form-group row" enctype="multipart/form-data">
                            <label style="" for="name" class="col-md-2 col-form-label text-md-left">{{ __('First Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control border-primary  @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="" for="name" class="col-md-2 col-form-label text-md-left">{{ __('Middle Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control border-primary  @error('name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label style="" for="name" class="col-md-2 col-form-label text-md-left">{{ __('Last Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control border-primary  @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="" for="gender" class="col-md-2 col-form-label text-md-left">Gender</label>
                            <div class="col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                                <label style="" class="form-check-label" for="fmale">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                                <label style="" class="form-check-label" for="female">
                                  Female
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="" for="name" class="col-md-2 col-form-label text-md-left">{{ __('Role') }}</label>
                            <div class="col-md-10">
                                <select style="" id="name" type="text" class="border-primary form-control  @error('name') is-invalid @enderror" name="role_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <option style="" value="admin">Admin</option>
                                <option style="" value="user">User</option>
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="" for="email" class="col-md-2 col-form-label text-md-left border-primary">{{ __('E-Mail') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control  border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="" class="col-md-2 col-form-label text-md-left border-primary">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control border-primary  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" style="" class="col-md-2 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control border-primary " name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                                <button style="" type="submit" class="btn  btn-warning btn-block ">
                                    {{ __('Register') }}
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
