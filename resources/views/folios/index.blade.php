@extends('layouts.main')

@section('title', __('content.folio'))

@section('section', __('content.folios'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.folios') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.folio') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('folios.create') }}">{{ __('content.insert') }}</a>
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
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($folios as $folio)
                            <tr>
                                <td>{{ $folio->location->name }}</td>
                                <td>{{ date('Y-M-d',strtotime($folio->date)) }}</td>
                                <td>{{ $folio->number }}</td>
                                <td>
                                    @if($folio->status()==__('content.opened'))
                                        <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('dailyReports.create',$folio) }}">{{ __('content.dailyreport') }}</a>
                                        <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('notes.create',$folio) }}">{{ __('content.note') }}</a>
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