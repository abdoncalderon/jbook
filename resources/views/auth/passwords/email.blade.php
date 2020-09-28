@extends('layouts.app')

@section('content')
    <section class="content">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">{{ __('content.resetpassword') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            {{-- Start Form  --}}

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                {{-- Email --}}

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('content.emailaddress') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                {{-- Submit --}}

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('content.sentpasswordresetlink') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                            {{-- Start Form  --}}

                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </section>
@endsection




    

    



