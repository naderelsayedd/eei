@extends('dashboard.layouts.app')

@section('content')

<div class="row layout-top-spacing">
    <div class="col-lg-12 layout-spacing">
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
                        <h4>Second Address</h4>
                    </div>                 
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <form action="{{ route('setting.update_new_address') }}" method="post">
                            @csrf

                            <div class="form-group mb-4">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $address ? $address->name : '') }}" placeholder="website name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $address ? $address->email : '') }}" placeholder="website email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Phone:</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $address ? $address->phone : '') }}" placeholder="website phone">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Address:</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $address ? $address->address : '') }}" placeholder="address">
                                @error('address')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>                                        
                </div>

            </div>
        </div>
    </div>

</div>

@endsection