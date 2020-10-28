@extends('layouts.main')

@section('title', __('content.dailyreports'))

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('workbooks.index')}}"> {{ __('content.legalsheets') }} </a></li>
        <li class="active">{{ __('content.create').' '.__('content.dailyreport') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.create').' '.__('content.dailyreport') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('dailyReports.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- workbook_id --}}
    
                            <input id="workbook_id" hidden type="text" name="workbook_id" value="{{ $workbook->id }}">


                            {{-- dateWorkbook --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dateWorkbook" disabled type="text" class="form-control" name="dateWorkbook" value="{{ $workbook->dateWorkbook }}">
                                </div>
                            </div>
                            
                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="location" disabled type="text" class="form-control" name="location" value="{{ $workbook->location->name }}">
                                </div>
                            </div>

                            {{-- period --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.period') }}</label>
                                <div class="col-sm-10" >
                                    <select id="period_id" name="period_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.period')}}</option>
                                        @foreach ($workbook->location->periods as $periodLocation)
                                            <option value="{{ $periodLocation->period_id }}">{{ $periodLocation->period->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- report --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="report" class="form-control @error('report') is-invalid @enderror" rows="30" maxlength="65000" name="report" required autocomplete="report"></textarea>
                                    @error('report')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('workbooks.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection

