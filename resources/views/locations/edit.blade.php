@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $location->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locations.update', $location) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Id  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
                                    <input disabled class="form-control" value="{{ $location->id }}">
                                </div>
                            </div>

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->name }}">
                                </div>
                            </div>

                            {{-- Start Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->datestart }}">
                                </div>
                            </div>

                            {{-- Finish Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->datefinish }}">
                                </div>
                            </div>

                            {{-- Logo 1  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 1</label>
                                <div class="col-sm-10">
                                    <input id="logofilename1" type="file" class="form-control" name="logofilename1" value="{{ $location->logofilename1 }}">
                                </div>
                                
                            </div>

                            <div class="form-group" style="background-image: url({{ asset('logos/'.$location->logofilename1) }});"></div>
                            
                            {{-- Logo 2  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 2</label>
                                <div class="col-sm-10">
                                    <input id="logofilename2" type="file" class="form-control" name="logofilename2"}}>
                                </div>
                            </div>
                          
                            {{-- Logo 3  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 3</label>
                                <div class="col-sm-10">
                                    <input id="logofilename3" type="file" class="form-control" name="logofilename3"}}>
                                </div>
                            </div>
                           
                            {{-- Logo 4  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 4</label>
                                <div class="col-sm-10">
                                    <input id="logofilename4" type="file" class="form-control" name="logofilename4"}}>
                                </div>
                            </div>
                            
                            {{-- Max Time for Open WorkBook  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimeopen') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->maxtimeopen }}">
                                </div>
                            </div>

                            {{-- Max Time for Create Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimenote') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->maxtimenote }}">
                                </div>
                            </div>

                            {{-- Max Time for Comment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecomment') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $location->maxtimecomment }}">
                                </div>
                            </div>
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                       {{--  <a class="btn btn-success btn-sm" href=" {{ route('locations.edit', $location) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('locations.index') }} ">{{ __('messages.returntolist') }}</a> --}}
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection