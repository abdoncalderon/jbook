<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JBook</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css"> --}}
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- Google Font -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}

    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>

<body onload="window.print();">
    @foreach ($folio->daily_reports as $dailyReport)
        <header>
            <div class="logos">
                {{-- <div class="logo" style="background-image: url({{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename1) }})"></div>
                <div class="logo" style="background-image: url({{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename2) }})"></div>
                <div class="logo" style="background-image: url({{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename3) }})"></div>
                <div class="logo" style="background-image: url({{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename4) }})"></div> --}}
                
                <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename1) }}" alt=""></div>
                <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename2) }}" alt=""></div>
                <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename3) }}" alt=""></div>
                <div class="logo"><img src="{{ asset('images/logos/'.$dailyReport->folio->location->project->logofilename4) }}" alt=""></div>
            </div>
            <p class="project">{{ $dailyReport->folio->location->project->name }}</p>
            <hr class="line">
            <p class="titleHeader">{{ __('messages.workbookdailyreport') }}</p>
            <hr class="line">
            <div class="details">
                <div class="fields">{{ __('content.location') }}</div>
                <div class="contents">{{ $dailyReport->folio->location->name }}</div>
                <div class="fields"></div>
                <div class="contents"></div>
                <div class="fields">{{ __('content.date') }}</div>
                <div class="contents">{{ $dailyReport->folio->date }}</div>
                <div class="fields">{{ __('content.number') }}</div>
                <div class="contents">{{ $dailyReport->folio->number }}</div>
                <div class="fields">{{ __('content.turn') }}</div>
                <div class="contents">{{ $dailyReport->turn->name }}</div>
            </div>
            <hr class="line">
        </header>
        <section>
            <div class="report">
                <p class="titleSection">ACTIVIDADES</p>
                <p class="report">{{ $dailyReport->report }}</p>
            </div>
            <div class="positions">
                <p class="title"></p>
            </div>
            <div class="equipments">
                <p class="title"></p>
            </div>
            <div class="attachments">
                <p class="title"></p>
            </div>
            <div class="notes">
                <p class="title"></p>
            </div>
            <div class="signatures">
                <p class="title"></p>
            </div>
        </section>
        
        <footer>

        </footer>
    @endforeach
    

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
