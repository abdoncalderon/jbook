@extends('layouts.print')

@foreach ($folio->daily_reports as $dailyReport)

{{-- Header --}}

@section('header')

    <div class="logos">
        <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename1) }}" alt=""></div>
        <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename2) }}" alt=""></div>
        <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename3) }}" alt=""></div>
        <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename4) }}" alt=""></div>
    </div>
    <p class="projectTitle">{{ $dailyReport->folio->location->project->name }}</p>
    <hr class="line">
    <p class="headerTitle">{{ __('messages.workbookdailyreport') }}</p>
    <hr class="line">
    
    <div class="details">
        <div>
            <div class="fields">{{ __('content.location') }}</div>
            <div class="contents">{{ $dailyReport->folio->location->name }}</div>
            <div class="fields"></div>
            <div class="contents"></div>
        </div>
        <div>
            <div class="fields">{{ __('content.date') }}</div>
            <div class="contents">{{ date('l d F Y',strtotime($dailyReport->folio->date)) }}</div>
            <div class="fields">{{ __('content.number') }}</div>
            <div class="contents">{{ $dailyReport->folio->number }}</div>
        </div>
        <div>
            <div class="fields">{{ __('content.turn') }}</div>
            <div class="contents">{{ $dailyReport->turn->name }}</div>
        </div> 
    </div>
    <hr class="line">

@endsection

@section('content')

        {{-- Report --}}

        <div class="section">
            <p class="sectionTitle">ACTIVIDADES</p>
            <p class="activities">{{ $dailyReport->report }}</p>
            
            {{-- Comments x Report --}}

            @if ($dailyReport->haveCommentsReport())

                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentDailyReport)
                            @if($commentDailyReport->section=='report')
                                <tr>
                                    <td class="td-date">{{ $commentDailyReport->dateComment }}</td>
                                    <td class="td-comment">{{ $commentDailyReport->comment }}</td>
                                    <td class="td-author">{{ $commentDailyReport->user->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>

        {{-- Equipments --}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.equipments') }}</p>
            <table>
                <thead>
                    <tr>
                        <th class="td-contractor">{{ __('content.contractor') }}</th>
                        <th class="td-equipment">{{ __('content.equipment') }}</th>
                        <th class="td-quantity">{{ __('content.quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyReport->equipments as $equipmentDailyReport)
                        <tr>
                            <td class="td-contractor">{{ $equipmentDailyReport->contractor->name }}</td>
                            <td class="td-equipment">{{ $equipmentDailyReport->equipment->name }}</td>
                            <td class="td-quantity">{{ $equipmentDailyReport->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Comments x Equipments --}}

            @if ($dailyReport->haveCommentsEquipments())
                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentEquipment)
                            @if($commentEquipment->section=='equipments')
                                <tr>
                                    <td class="td-date">{{ $commentEquipment->dateComment }}</td>
                                    <td class="td-comment">{{ $commentEquipment->comment }}</td>
                                    <td class="td-author">{{ $commentEquipment->user->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
            
        </div>

        {{-- Positions --}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.positions') }}</p>
            <table>
                <thead>
                    <tr>
                        <th class="td-contractor">{{ __('content.contractor') }}</th>
                        <th class="td-position">{{ __('content.position') }}</th>
                        <th class="td-quantity">{{ __('content.quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyReport->positions as $positionDailyReport)
                        <tr>
                            <td class="td-contractor">{{ $positionDailyReport->contractor->name }}</td>
                            <td class="td-position">{{ $positionDailyReport->position->name }}</td>
                            <td class="td-quantity">{{ $positionDailyReport->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Comments x Positions --}}

            @if ($dailyReport->haveCommentsPositions())
                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentPosition)
                            @if($commentPosition->section=='positions')
                                <tr>
                                    <td class="td-date">{{ $commentPosition->dateComment }}</td>
                                    <td class="td-comment">{{ $commentPosition->comment }}</td>
                                    <td class="td-author">{{ $commentPosition->user->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- Events--}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.events') }}</p>
            <table>
                <thead>
                    <tr>
                        <th class="td-origin">{{ __('content.origin') }}</th>
                        <th class="td-start">{{ __('content.start') }}</th>
                        <th class="td-finish">{{ __('content.finish') }}</th>
                        <th class="td-description">{{ __('content.description') }}</th>
                        <th class="td-impact">{{ __('content.impact') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyReport->events as $eventDailyReport)
                        <tr>
                            <td class="td-origin">{{ $eventDailyReport->cause }}</td>
                            <td class="td-start">{{ $eventDailyReport->start }}</td>
                            <td class="td-finish">{{ $eventDailyReport->finish }}</td>
                            <td class="td-description">{{ $eventDailyReport->description }}</td>
                            <td class="td-impact">{{ $eventDailyReport->haveImpact() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Comments x Events --}}

            @if ($dailyReport->haveCommentsEvents())
                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentEvent)
                            @if($commentEvent->section=='events')
                                <tr>
                                    <td class="td-date">{{ $commentEvent->dateComment }}</td>
                                    <td class="td-comment">{{ $commentEvent->comment }}</td>
                                    <td class="td-author">{{ $commentEvent->user->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- Attachments--}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.attachments') }}</p>
            <table>
                <thead>
                    <tr>
                        <th class="td-attachment">{{ __('content.attachment') }}</th>
                        <th class="td-description">{{ __('content.description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyReport->attachments as $attachmentDailyReport)
                        <tr>
                            <td class="td-attachment"><img src="{{ asset('images/attachments/daily_reports/'.$attachmentDailyReport->filename) }}" alt=""></td>
                            <td class="td-description">{{ $attachmentDailyReport->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Comments x Attachments --}}

            @if ($dailyReport->haveCommentsEvents())
                <p class="comments">{{ __('content.comments') }}:</p>
                <table>
                    <thead>
                        <tr>
                            <th class="td-date">{{ __('content.date') }}</th>
                            <th class="td-comment">{{ __('content.comment') }}</th>
                            <th class="td-author">{{ __('content.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyReport->comments as $commentAttachment)
                            @if($commentAttachment->section=='attachments')
                                <tr>
                                    <td class="td-date">{{ $commentAttachment->dateComment }}</td>
                                    <td class="td-comment">{{ $commentAttachment->comment }}</td>
                                    <td class="td-author">{{ $commentAttachment->user->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- Notes--}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.notes') }}</p>
        </div>

        {{-- Signatures--}}

        <div class="section">
            <p class="sectionTitle">{{ __('content.signatures') }}</p>
        </div>

    

@endsection


@section('footer')
    <footer>
        <table>
            <tr>
                <td>
                    <p class="izq">
                        Desarrolloweb.com
                    </p>
                </td>
                <td>
                    <p class="page">
                    Página
                    </p>
                </td>
            </tr>
        </table>
        
    </footer>
@endsection

@endforeach

<body onload="window.print();">
    
    

            {{-- <div class="box-body">

                <div class="col-sm-4 col-md-6 col-lg-10">

                    @foreach ($folio->daily_reports as $dailyReport)

                      <p>
                          {{ $dailyReport->folio->date }}
                      </p>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                          <div class="col-sm-10" >
                              <input id="date" disabled type="text" class="form-control" name="date" value="">
                          </div>
                      </div>
                      
                          
                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                          <div class="col-sm-10" >
                              <input id="location" disabled type="text" class="form-control" name="location" value="{{ $dailyReport->folio->location->name }}">
                          </div>
                      </div>

                      
                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                          <div class="col-sm-10" >
                              <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $dailyReport->turn->name }}">
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                          <div class="col-sm-10" >
                              <textarea id="report" disabled class="form-control" rows="20" style="resize: vertical" name="report">{{ $dailyReport->report }}</textarea>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10" >
                              <div>
                                  <br>
                              </div>
                              <table id="comments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.date') }}</th>
                                          <th>{{ __('content.comment') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->comments as $commentDailyReport)
                                          @if($commentDailyReport->section=='report')
                                              <tr>
                                                  <td>{{ $commentDailyReport->dateComment }}</td>
                                                  <td>{{ $commentDailyReport->comment }}</td>
                                                  <td>{{ $commentDailyReport->user->name }}</td>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                      <hr>


                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.equipments') }}</label>
                          <div class="col-sm-10" >
                              <table id="equipments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.contractor') }}</th>
                                          <th>{{ __('content.equipment') }}</th>
                                          <th>{{ __('content.quantity') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->equipments as $equipmentDailyReport)
                                          <tr>
                                              <td>{{ $equipmentDailyReport->contractor->name }}</td>
                                              <td>{{ $equipmentDailyReport->equipment->name }}</td>
                                              <td>{{ $equipmentDailyReport->quantity }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10" >
                             
                              <div>
                                  <br>
                              </div>
                              <table id="comments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.date') }}</th>
                                          <th>{{ __('content.comment') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->comments as $commentDailyReport)
                                          @if($commentDailyReport->section=='equipments')
                                              <tr>
                                                  <td>{{ $commentDailyReport->dateComment }}</td>
                                                  <td>{{ $commentDailyReport->comment }}</td>
                                                  <td>{{ $commentDailyReport->user->name }}</td>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                      <hr>


                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.positions') }}</label>
                          <div class="col-sm-10" >
                              <table id="positions" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.contractor') }}</th>
                                          <th>{{ __('content.position') }}</th>
                                          <th>{{ __('content.quantity') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->positions as $positionDailyReport)
                                          <tr>
                                              <td>{{ $positionDailyReport->contractor->name }}</td>
                                              <td>{{ $positionDailyReport->position->name }}</td>
                                              <td>{{ $positionDailyReport->quantity }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10" >
                              <div>
                                  <br>
                              </div>
                              <table id="comments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.date') }}</th>
                                          <th>{{ __('content.comment') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->comments as $commentDailyReport)
                                          @if($commentDailyReport->section=='positions')
                                              <tr>
                                                  <td>{{ $commentDailyReport->dateComment }}</td>
                                                  <td>{{ $commentDailyReport->comment }}</td>
                                                  <td>{{ $commentDailyReport->user->name }}</td>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                      <hr>


                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.events') }}</label>
                          <div class="col-sm-10" >
                              <table id="events" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.origin') }}</th>
                                          <th>{{ __('content.start') }}</th>
                                          <th>{{ __('content.finish') }}</th>
                                          <th>{{ __('content.impact') }}?</th>
                                          <th>{{ __('content.actions') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->events as $eventDailyReport)
                                          <tr>
                                              <td>{{ $eventDailyReport->cause }}</td>
                                              <td>{{ $eventDailyReport->start }}</td>
                                              <td>{{ $eventDailyReport->finish }}</td>
                                              <td>{{ $eventDailyReport->haveImpact() }}</td>
                                              <td>
                                                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-show-event">{{ __('content.open') }}</button>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10" >
                              <div>
                                  <br>
                              </div>
                              <table id="comments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.date') }}</th>
                                          <th>{{ __('content.comment') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                          <th>{{ __('content.actions') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->comments as $commentDailyReport)
                                          @if($commentDailyReport->section=='events')
                                              <tr>
                                                  <td>{{ $commentDailyReport->dateComment }}</td>
                                                  <td>{{ $commentDailyReport->comment }}</td>
                                                  <td>{{ $commentDailyReport->user->name }}</td>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                      <hr>


                      <div class="form-group">
                          <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                          <div class="col-sm-10" >
                              <table id="attachments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.attachment') }}</th>
                                          <th>{{ __('content.description') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->attachments as $attachmentDailyReport)
                                          <tr>
                                              <td><img src="{{ asset('images/attachments/daily_reports/'.$attachmentDailyReport->filename) }}" alt="" style="max-width: 100%; min-width:50%"></td>
                                              <td>{{ $attachmentDailyReport->description }}</td>
                                              <td>{{ $attachmentDailyReport->user->name }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-10" >
                             
                              <div>
                                  <br>
                              </div>
                              <table id="comments" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>{{ __('content.date') }}</th>
                                          <th>{{ __('content.comment') }}</th>
                                          <th>{{ __('content.author') }}</th>
                                          <th>{{ __('content.actions') }}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($dailyReport->comments as $commentDailyReport)
                                          @if($commentDailyReport->section=='attachments')
                                              <tr>
                                                  <td>{{ $commentDailyReport->dateComment }}</td>
                                                  <td>{{ $commentDailyReport->comment }}</td>
                                                  <td>{{ $commentDailyReport->user->name }}</td>
                                              </tr>
                                          @endif
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                        
                    @endforeach

                    
                    @foreach ($folio->notes as $note)


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                            <div class="col-sm-10" >
                                <input id="date" disabled type="text" class="form-control" name="date" value="{{ $note->folio->date }}">
                            </div>
                        </div>
                      
                            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                            <div class="col-sm-10" >
                                <input id="date" disabled type="text" class="form-control" name="date" value="{{ $note->folio->location->name }}">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                            <div class="col-sm-10" >
                                <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $note->turn->name }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.note') }}</label>
                            <div class="col-sm-10" >
                                <textarea id="note" disabled class="form-control" rows="20" style="resize: vertical" maxlength="65000" name="note">{{ $note->note }}</textarea>
                            </div>
                        </div>

                        <hr>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                            <div class="col-sm-10" >
                                <div>
                                    <br>
                                </div>
                                <table id="attachments" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('content.attachment') }}</th>
                                            <th>{{ __('content.description') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($note->attachments as $attachmentNote)
                                            <tr>
                                                <td><img src="{{ asset('images/attachments/notes/'.$attachmentNote->filename) }}" alt="" style="max-width: 100%; min-width:50%"></td>
                                                <td>{{ $attachmentNote->description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.comments') }}</label>
                            <div class="col-sm-10" >
                                <div>
                                    <br>
                                </div>
                                <table id="comments" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('content.date') }}</th>
                                            <th>{{ __('content.comment') }}</th>
                                            <th>{{ __('content.author') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($note->comments as $commentNote)
                                            <tr>
                                                <td>{{ $commentNote->dateComment }}</td>
                                                <td>{{ $commentNote->comment }}</td>
                                                <td>{{ $commentNote->user->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @endforeach
                    

                </div>

            </div> --}}


</body>
</html>
