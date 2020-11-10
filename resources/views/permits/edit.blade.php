@extends('layouts.main')

@section('title', __('content.permits'))

@section('section', __('content.permits'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('permits.index', $permit->user) }}"> {{ __('content.permits') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $permit->user->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('permits.update', $permit) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Id  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
                                    <input disabled class="form-control" value="{{ $permit->id }}">
                                </div>
                            </div>

                            {{-- User  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="col-sm-10">
                                    <input disabled class="form-control" value="{{ $permit->user->name }}">
                                </div>
                            </div>

                            {{-- Create Folio  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.createfolio') }}</label>
                                <div class="col-sm-10" >
                                    <input id="create_folio" type="checkbox" name="create_folio" 
                                        @if($permit->create_folio==1)
                                            checked
                                        @endif
                                    >
                                </div>
                            </div>

                            {{-- Create Report --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.createReport') }}</label>
                                <div class="col-sm-10" >
                                    <input id="create_report" type="checkbox" name="create_report" 
                                        @if($permit->create_report==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Create Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.createNote') }}</label>
                                <div class="col-sm-10" >
                                    <input id="create_note" type="checkbox" name="create_note" 
                                        @if($permit->create_note==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Create Comment  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.createComment') }}</label>
                                <div class="col-sm-10" >
                                    <input id="create_comment" type="checkbox" name="create_comment" 
                                        @if($permit->create_comment==1)
                                            checked
                                        @endif
                                    >
                                   
                                </div>
                            </div>

                            {{-- Print Report  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.printReport') }}</label>
                                <div class="col-sm-10" >
                                    <input id="print_report" type="checkbox" name="print_report" 
                                        @if($permit->print_report==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Print Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.printNote') }}</label>
                                <div class="col-sm-10" >
                                    <input id="print_note" type="checkbox" name="print_note" 
                                        @if($permit->print_note==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Receive Email  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.receiveEmail') }}</label>
                                <div class="col-sm-10" >
                                    <input id="receive_email" type="checkbox" name="receive_email" 
                                        @if($permit->create_workbook==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Sign Report --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.signReport') }}</label>
                                <div class="col-sm-10" >
                                    <input id="sign_report" type="checkbox" name="sign_report" 
                                        @if($permit->sign_report==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>

                            {{-- Edit Sequence  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.editSequence') }}</label>
                                <div class="col-sm-10" >
                                    <input id="edit_sequence" type="checkbox" name="edit_sequence" 
                                        @if($permit->edit_sequence==1)
                                            checked
                                        @endif
                                    >
                                    
                                </div>
                            </div>
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                       
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection