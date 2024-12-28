@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
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
                            <h4>Update Slide</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <form action="{{ route('slider.update', ['slider' => $slide->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-4">
                                    <label>Order:</label>
                                    <input type="text" name="order"
                                        class="form-control @error('order') is-invalid @enderror"
                                        value="{{ old('order', $slide->order) }}" placeholder="slide order ex: 1, 2, ...">
                                    @error('order')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group mb-4">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div> --}}
                                <hr>
                                <div id="basicwizard">
                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                        @foreach (config('laravellocalization.supportedLocales') as $key => $lang)
                                            <li class="nav-item">
                                                <a href="#{{ $key }}" data-bs-toggle="tab" data-toggle="tab"
                                                    class="nav-link rounded-0 pt-2 pb-2 @if ($loop->index == 0) active @endif">
                                                    <span class="d-none d-sm-inline">{{ $lang['name'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content b-0 mb-0 pt-0">

                                        @foreach (config('laravellocalization.supportedLocales') as $key => $lang)
                                            <div class="tab-pane  @if ($loop->index == 0) active @endif"
                                                id="{{ $key }}">
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <div class="form-group mb-4">
                                                            <label>Title - {{ $lang['name'] }}:</label>
                                                            <input type="text" name="title[{{ $key }}]"
                                                                class="form-control @error('title' . $key . '') is-invalid @enderror"
                                                                value=" {{ old('title[' . $key . ']', $slide->getTranslations()['title'][$key]) }}"
                                                                placeholder="slide title [{{ $key }}]">
                                                            @error('title' . $key . '')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>subtitle - {{ $lang['name'] }}:</label>
                                                            <input type="text" name="subtitle[{{ $key }}]"
                                                                class="form-control @error('subtitle' . $key . '') is-invalid @enderror"
                                                                value=" {{ old('subtitle[' . $key . ']', @$slide->getTranslations()['subtitle'][$key]) }}"
                                                                placeholder="slide subtitle [{{ $key }}]">
                                                            @error('subtitle' . $key . '')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Description - {{ $lang['name'] }}:</label>
                                                            <textarea name="description[{{ $key }}]"
                                                                class="form-control @error('description[' . $key . ']') is-invalid @enderror"
                                                                placeholder="slide description [{{ $key }}]">{{ old('description[' . $key . ']', $slide->getTranslations()['description'][$key]) }}</textarea>
                                                            @error('description[' . $key . ']')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Link Title - {{ $lang['name'] }}:</label>
                                                            <input type="text" name="link_title[{{ $key }}]"
                                                                class="form-control @error('link_title[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('link_title[' . $key . ']', $slide->getTranslations()['link_title'][$key]) }}"
                                                                placeholder="slide button title">
                                                            @error('link_title[' . $key . ']')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Link - {{ $lang['name'] }}:</label>
                                                            <input type="text" name="link[{{ $key }}]"
                                                                class="form-control @error('link[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('link[' . $key . ']', $slide->getTranslations()['link'][$key]) }}"
                                                                placeholder="slide button link">
                                                            @error('link[' . $key . ']')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div>
                                        @endforeach
                                    </div> <!-- tab-content -->
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
