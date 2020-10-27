@extends('layouts.main')

@section('title', __('content.legalsheets'))

@section('section', __('content.legalsheets'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.legalsheets') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Messages --}}
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('message') }}
                </div>
            @endif

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.legalsheet') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('workbooks.create') }}">{{ __('content.insert') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($workbooks as $workbook)
                            <tr>
                                <td>{{ $workbook->location->name }}</td>
                                <td>{{ $workbook->dateWorkbook }}</td>
                                <td>{{ $workbook->number }}</td>
                                <td>{{ $workbook->status() }}</td>
                                <td>
                                    @if($workbook->status()==__('content.opened'))
                                        <a class="btn btn-info btn-xs" href="{{ route('dailyReports.create',$workbook) }}">{{ __('content.dailyreports') }}</a>
                                        <a class="btn btn-info btn-xs" href="#">{{ __('content.notes') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

@endsection