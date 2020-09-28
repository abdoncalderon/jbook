@extends('layouts.main')

@section('title', __('content.permits'))

@section('section', __('content.permits'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.permits') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.permits') }}</strong></h3> | 
                
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('messages.createWorkbook') }}</th>
                            <th>{{ __('messages.createReport') }}</th>
                            <th>{{ __('messages.createNote') }}</th>
                            <th>{{ __('messages.createComment') }}</th>
                            <th>{{ __('messages.printReport') }}</th>
                            <th>{{ __('messages.printNote') }}</th>
                            <th>{{ __('messages.receiveEmail') }}</th>
                            <th>{{ __('messages.signReport') }}</th>
                            <th>{{ __('messages.editSequence') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($user->permits as $permit)
                            <tr>
                                <td>{{ $permit->create_workbook }}</td>
                                <td>{{ $permit->create_report }}</td>
                                <td>{{ $permit->create_note }}</td>
                                <td>{{ $permit->create_comment }}</td>
                                <td>{{ $permit->print_report }}</td>
                                <td>{{ $permit->print_note }}</td>
                                <td>{{ $permit->receive_email }}</td>
                                <td>{{ $permit->sign_report }}</td>
                                <td>{{ $permit->edit_sequence }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('permits.edit', $permit)}}">{{ __('content.edit')}}</a>
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