@extends('layouts.main')

@section('title', __('content.periods'))

@section('section', __('content.periods'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('periods.index')}}"> {{ __('content.periods') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $period->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Id  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $period->id }}">
                            </div>
                        </div>

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $period->name }}">
                            </div>
                        </div>

                        {{-- Start hour --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $period->startdate }}">
                            </div>
                        </div>

                        {{-- Finish hour  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $period->finishdate }}">
                            </div>
                        </div>

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.nextday') }}</label>
                            <div class="col-sm-10">
                                <input type="checkbox" disabled class="form-control" value="{{ $period->nextday }}">
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('periods.edit', $period) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('periods.index') }} ">{{ __('messages.returntolist') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection