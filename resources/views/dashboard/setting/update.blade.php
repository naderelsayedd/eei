@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            @if (Session::has('success'))
                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Update Setting</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-4">
                                    <label>Name:</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', config('settings.name')) }}" placeholder="website name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Email:</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', config('settings.email')) }}" placeholder="website email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Phone:</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', config('settings.phone')) }}" placeholder="website phone">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Address:</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address', config('settings.address')) }}" placeholder="address">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>English Address:</label>
                                    <input type="text" name="en_address"
                                        class="form-control @error('en_address') is-invalid @enderror"
                                        value="{{ old('en_address', config('settings.en_address')) }}" placeholder="en_address">
                                    @error('en_address')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Location:</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        value="{{ old('location', config('settings.location')) }}"
                                        placeholder="location on map">
                                    @error('location')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="logo">Logo:</label>
                                    <input type="file" name="logo" class="form-control" id="logo">
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="footer_logo">Footer Logo:</label>
                                    <input type="file" name="footer_logo" class="form-control" id="footer_logo">
                                    @error('footer_logo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="default_cover">Default cover:</label>
                                    <input type="file" name="default_cover" class="form-control" id="default_cover">
                                    @error('default_cover')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <label for="fav_icon">Fav icon:</label>
                                    <input type="file" name="fav_icon" class="form-control" id="fav_icon">
                                    @error('fav_icon')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="footer_cover">Footer cover:</label>
                                    <input type="file" name="footer_cover" class="form-control" id="footer_cover">
                                    @error('footer_cover')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label>Arabic Footer About:</label>
                                    <textarea name="ar_footer_about" class="form-control @error('ar_footer_about') is-invalid @enderror"
                                        placeholder="ar_footer_about us description in english">{{ old('ar_footer_about', config('settings.ar_footer_about')) }}</textarea>
                                    @error('ar_footer_about')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label>English Footer About:</label>
                                    <textarea name="en_footer_about" class="form-control @error('en_footer_about') is-invalid @enderror"
                                        placeholder="en_footer_about us description in english">{{ old('en_footer_about', config('settings.en_footer_about')) }}</textarea>
                                    @error('en_footer_about')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Facebook UL:</label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', config('settings.facebook')) }}"
                                        placeholder="facebook">
                                    @error('facebook')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>inistagram UL:</label>
                                    <input type="text" name="inistagram"
                                        class="form-control @error('inistagram') is-invalid @enderror"
                                        value="{{ old('inistagram', config('settings.inistagram')) }}"
                                        placeholder="inistagram">
                                    @error('inistagram')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>linked_in UL:</label>
                                    <input type="text" name="linked_in"
                                        class="form-control @error('linked_in') is-invalid @enderror"
                                        value="{{ old('linked_in', config('settings.linked_in')) }}"
                                        placeholder="linked_in">
                                    @error('linked_in')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>twitter UL:</label>
                                    <input type="text" name="twitter"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ old('twitter', config('settings.twitter')) }}" placeholder="twitter">
                                    @error('twitter')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>youtube UL:</label>
                                    <input type="text" name="youtube"
                                        class="form-control @error('youtube') is-invalid @enderror"
                                        value="{{ old('youtube', config('settings.youtube')) }}" placeholder="youtube">
                                    @error('youtube')
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
