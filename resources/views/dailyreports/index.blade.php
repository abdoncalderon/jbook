@extends('layouts.main')

@section('title', __('content.dailyreports'))

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.dailyreports') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.dailyreports') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.turn') }}</th>
                            {{-- <th>{{ __('content.status') }}</th> --}}
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($dailyReports as $dailyReport)
                            <tr>
                                <td>{{ $dailyReport->folio->location->name }}</td>
                                <td>{{ date('Y-M-d',strtotime($dailyReport->folio->date)) }}</td>
                                <td>{{ $dailyReport->turn->name }} {{ $dailyReport->status() }}</td>
                                {{-- <td></td> --}}
                                <td>
                                    @if($dailyReport->status==0)
                                        <a class="btn btn-warning btn-xs" href="{{ route('dailyReports.edit',$dailyReport) }}">{{ __('content.edit') }}</a>
                                    @elseif($dailyReport->status==1)
                                        <a class="btn btn-success btn-xs" href="{{ route('dailyReports.review',$dailyReport) }}">{{ __('content.review') }}</a>
                                    @else 
                                        <a class="btn btn-info btn-xs" href="{{ route('dailyReports.show',$dailyReport) }}">{{ __('content.show') }}</a>
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