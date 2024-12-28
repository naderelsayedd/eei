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
                        <h4>Update Partener ({{ $partener->name }})</h4>
                    </div>                 
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <form action="{{ route('parteners.update', ['partener' => $partener->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group mb-4">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $partener->name) }}" placeholder="partener name in english">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Link:</label>
                                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $partener->link) }}" placeholder="partener link">
                                @error('link')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="image">Image:</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>                                        
                </div>

            </div>
        </div>
    </div>

</div>

@endsection