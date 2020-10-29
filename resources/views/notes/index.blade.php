@extends('layouts.main')

@section('title', __('content.notes'))

@section('section', __('content.notes'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.notes') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.notes') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.period') }}</th>
                            <th>{{ __('content.author') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($notes as $note)
                            <tr>
                                <td>{{ $note->workbook->location->name }}</td>
                                <td>{{ $note->workbook->dateWorkbook }}</td>
                                <td>{{ $note->period->name }}</td>
                                <td>{{ $note->user->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('notes.edit',$note) }}">{{ __('content.edit') }}</a>
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