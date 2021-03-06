@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.profile'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        {{-- <li><a href="{{ route('profiles.show')}}"> {{ __('content.profile') }} </a></li> --}}
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $user->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10" >
                                    <input id="name" disabled type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            
                            {{-- username --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="col-sm-10" >
                                    <input id="user" disabled type="text" class="form-control" name="user" value="{{ old('user', $user->user) }}">
                                </div>
                            </div>

                            {{-- email --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="col-sm-10" >
                                    <input id="email" disabled type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>

                            {{-- Contractor --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.contractor') }}</label>
                                <div class="col-sm-10" >
                                    <input id="contractor" disabled type="text" class="form-control" name="contractor" value="{{ old('contractor', $user->contractor->name) }}">
                                </div>
                            </div>

                            {{-- Role --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="col-sm-10" >
                                    <input id="role" disabled type="text" class="form-control" name="role" value="{{ old('role', $user->role->name) }}">
                                </div>
                            </div>
                            
                            {{-- Avatar --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.avatar') }}</label>
                                <div class="col-sm-10">
                                    <input id="avatar" type="file" class="form-control" name="avatar"}}>
                                </div>
                            </div>

                            {{-- Signature --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.signature') }}</label>
                                <div class="col-sm-10">
                                    <input id="signature" type="file" class="form-control" name="signature"}}>
                                </div>
                            </div>


                            {{-- Status --}}
                        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="col-sm-10">
                                    <select name="status" disabled class="form-control" data-placeholder="Estado" style="width: 100%;" value="{{ old('status', $user->status) }}">
                                        <option value="0"
                                            @if($user->status==0):
                                                selected="selected"
                                            @endif
                                            >{{ __('content.inactive') }}</option>
                                        <option value="1"
                                            @if($user->status==1):
                                                selected="selected"
                                            @endif
                                            >{{ __('content.active') }}</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        {{-- Avatar --}}

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                                <img src="{{ asset('images/avatars/'.$user->avatar) }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                                <img src="{{ asset('images/signatures/'.$user->signature) }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>
                        
                    </div>

                    {{-- Submit --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection