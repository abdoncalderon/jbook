@extends('layouts.main')

@section('title', "Usuarios")

@section('section','Usuarios')

@section('level','Administración')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> Usuarios </a></li>
        <li class="active">Agregar</li>
    </ol>
@endsection

@section('mainContent')
    <section class="content">
        <div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Agregar</strong></h3>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10" >
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="email" value="{{ old('user') }}" required autocomplete="user">
    
                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('E-Mail Address') }}</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('Password') }}</label>
    
                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('Confirm Password') }}</label>
    
                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label class="col-sm-2 control-label">{{ __('Confirm Password') }}</label> --}}
    
                            <div class="col-sm-10">
                                <input id="status" type="hidden" class="form-control" name="status" value=1>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">Grabar</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('users.index') }} ">Cancelar</a>
                    </div>
                   

                    

                    

                   {{--  <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div> --}}
                    
                </form>
            </div>
        </div>
    </section>
@endsection