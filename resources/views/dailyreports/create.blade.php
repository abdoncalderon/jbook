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

                <form class="form-horizontal" method="POST" action="{{ route('workbooks.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

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
                                    <input id="dateWorkbook" disabled type="text" class="form-control" name="dateWorkbook" value="{{ $workbook->location->name }}">
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

                            {{-- equipments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.equipments') }}</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                        {{ __('content.add').' '.__('content.equipment') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="equipments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.description') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">
    
                            {{-- number --}}

                            
    
                            <input id="number" hidden type="text" name="number">

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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('content.add').' '.__('content.equipment') }}</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection


