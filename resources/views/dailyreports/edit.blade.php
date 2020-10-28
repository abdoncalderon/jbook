@extends('layouts.main')

@section('title', __('content.dailyreports'))

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('workbooks.index')}}"> {{ __('content.legalsheets') }} </a></li>
        <li class="active">{{ __('content.edit').' '.__('content.dailyreport') }}</li>
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
                    <h3 class="box-title"><strong>{{ __('content.edit').' '.__('content.dailyreport') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('dailyReports.update',$dailyReport) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- dateWorkbook --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dateWorkbook" disabled type="text" class="form-control" name="dateWorkbook" value="{{ $dailyReport->workbook->dateWorkbook }}">
                                </div>
                            </div>
                            
                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dateWorkbook" disabled type="text" class="form-control" name="dateWorkbook" value="{{ $dailyReport->workbook->location->name }}">
                                </div>
                            </div>

                            {{-- period --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.period') }}</label>
                                <div class="col-sm-10" >
                                    <input id="period" disabled type="text" class="form-control" name="period" value="{{ $dailyReport->period->name }}">
                                </div>
                            </div>

                            {{-- report --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="report" class="form-control @error('report') is-invalid @enderror" rows="30" maxlength="65000" name="report" required autocomplete="report">{{ $dailyReport->report }}</textarea>
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
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-equipments">
                                        {{ __('content.add').' '.__('content.equipment') }}
                                    </button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-clone-equipments">
                                        {{ __('content.clone').' '.__('content.equipments') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="equipments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.contractor') }}</th>
                                                <th>{{ __('content.equipment') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->equipments as $equipmentDailyReport)
                                                <tr>
                                                    <td>{{ $equipmentDailyReport->contractor->name }}</td>
                                                    <td>{{ $equipmentDailyReport->equipment->name }}</td>
                                                    <td>{{ $equipmentDailyReport->quantity }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('equipmentDailyReports.destroy',$equipmentDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- positions --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.positions') }}</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-positions">
                                        {{ __('content.add').' '.__('content.position') }}
                                    </button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-clone-positions">
                                        {{ __('content.clone').' '.__('content.positions') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="positions" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.contractor') }}</th>
                                                <th>{{ __('content.position') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->positions as $positionDailyReport)
                                                <tr>
                                                    <td>{{ $positionDailyReport->contractor->name }}</td>
                                                    <td>{{ $positionDailyReport->position->name }}</td>
                                                    <td>{{ $positionDailyReport->quantity }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('positionDailyReports.destroy',$positionDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href="{{ route('dailyReports.index') }}">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>


    {{-- Add Equipments in Daily Report --}}

    <div class="modal fade" id="modal-default-equipments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('equipmentDailyReports.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.equipment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- Daily Report --}}
    
                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
    
                            {{-- Contractor --}}
    
                            <div class="form-group">
                                <label for="contractor_id">{{__('content.contractor')}}</label>
                                <select id="contractor_id" name="contractor_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.contractor')}}</option>
                                    @foreach ($contractors as $contractor)
                                        <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            {{-- Equipment --}}
    
                            <div class="form-group">
                                <label for="equipment_id">{{__('content.equipment')}}</label>
                                <select id="equipment_id" name="equipment_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.equipment')}}</option>
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Add Positions in Daily Report --}}

    <div class="modal fade" id="modal-positions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('positionDailyReports.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.position') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Daily Report --}}

                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">

                            {{-- Contractor --}}

                            <div class="form-group">
                                <label for="contractor">{{__('content.contractor')}}</label>
                                <select id="contractor_id" name="contractor_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.contractor')}}</option>
                                    @foreach ($contractors as $contractor)
                                        <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Position --}}

                            <div class="form-group">
                                <label for="position_id">{{__('content.position')}}</label>
                                <select id="position_id" name="position_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.position')}}</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Quantity --}}

                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" min="1" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

        {{-- Clone Positions in Daily Report --}}

        <div class="modal fade" id="modal-clone-positions">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('positionDailyReports.clone') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">{{ __('content.clone').' '.__('content.positions') }}</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                
                                {{-- Daily Report --}}
    
                                <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
    
                                {{-- Location --}}
    
                                <input id="location_id" hidden type="text" name="location_id" value="{{ $dailyReport->workbook->location->id }}">

                                {{-- Date Workbook --}}
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.period') }}</label>
                                    <input id="dateWorkbook"  type="date" class="form-control" name="dateWorkbook">
                                </div>
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('content.clone')}}</button>
                        </div>
                    </div>
                </form>
                
            </div>
    
        </div>

@endsection
