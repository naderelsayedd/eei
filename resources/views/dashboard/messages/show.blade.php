@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            @if(Session::has('success'))
                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{ $message->subject }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="mb-4">
                        <div class="row mb-3">
                            <div class="col-md-3 text-end">
                                <span class="h6">Name:</span>
                            </div>
                            <div class="col-md-9 text-center">{{ $message->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 text-end">
                                <span class="h6">Email:</span>
                            </div>
                            <div class="col-md-9 text-center">{{ $message->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 text-end">
                                <span class="h6">Phone:</span>
                            </div>
                            <div class="col-md-9 text-center">{{ $message->phone }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 text-end">
                                <span class="h6">Subject:</span>
                            </div>
                            <div class="col-md-9 text-center">{{ $message->subject }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 text-end">
                                <span class="h6">Message:</span>
                            </div>
                            <div class="col-md-9 text-center">{{ $message->message }}</div>
                        </div>

                        @if($message->answer)
                            <div class="row mb-3">
                                <div class="col-md-3 text-end">
                                    <span class="h6">Answer:</span>
                                </div>
                                <div class="col-md-9 text-center">{{ $message->answer }}</div>
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-3 text-end">
                                <span class="h6">Sent At:</span>
                            </div>
                            <div class="col-md-9 text-center">
                                <p class="date_time mb-0">{{ $message->created_at->format('Y-m-d h:i a') }}</p>
                            </div>
                        </div>
                        @if($message->answer)
                            <div class="row mb-4">
                                <div class="col-md-3 text-end">
                                    <span class="h6">Replied At:</span>
                                </div>
                                <div class="col-md-9 text-center">
                                    <p class="date_time mb-0">{{ $message->updated_at->format('Y-m-d h:i a') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($message->answer == null)
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <form action="{{ route('messages.reply', ['message' => $message->id]) }}" method="post">
                                    @csrf
        
                                    <div class="form-group mb-4">
                                        <label>Answer:</label>
                                        <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" placeholder="message answer">{{ old('answer') }}</textarea>
                                        @error('answer')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Send</button>
                                </form>
                            </div>                                        
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

@endsection
