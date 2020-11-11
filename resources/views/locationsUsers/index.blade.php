@extends('layouts.main')

@section('title', __('messages.locationsUsers'))

@section('section', __('messages.locationsUsers'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.locationsUsers') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.locationsUsers') }} {{ $user->name }} </strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('locationsUsers.create', $user) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('messages.collaborateReport') }}</th>
                            <th>{{ __('messages.approverReport') }}</th>
                            <th>{{ __('messages.approverWorkbook') }}</th>
                            <th>{{ __('messages.receiveEmail') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($user->locations as $locationUser)
                            <tr>
                                <td>{{ $locationUser->location->name }}</td>
                                <td>{{ $locationUser->collaborator_report }}</td>
                                <td>{{ $locationUser->approver_report }}</td>
                                <td>{{ $locationUser->approver_folio }}</td>
                                <td>{{ $locationUser->notification }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('locationsUsers.edit', $locationUser)}}">{{ __('content.edit')}}</a>
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