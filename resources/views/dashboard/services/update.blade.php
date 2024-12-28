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
                            <h4>Update Service ({{ $service->name }})</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <form action="{{ route('services.update', ['service' => $service->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
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
                                                            <label>Name - {{ $lang['name'] }}:</label>
                                                            <input type="text" name="name[{{ $key }}]"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ old('name', $service->getTranslations()['name'][$key]) }}"
                                                                placeholder="Service name">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Short Description - {{ $lang['name'] }}:</label>
                                                            <textarea id="shortdes{{ $key }}" name="shortdescription[{{ $key }}]" class="form-control"
                                                                placeholder="Crop mini shortdescription">
                                                                {{ old('shortdescription', @$service->getTranslations()['shortdescription'][$key]) }}
                                                            
                                                            </textarea>
                                                            @error('shortdescription')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group mb-4">
                                                            <label>Description - {{ $lang['name'] }}:</label>
                                                            <textarea id="Pagedesc{{ $key }}" name="description[{{ $key }}]" class="form-control"
                                                                placeholder="description mini description">
                                                                {{ old('description', @$service->getTranslations()['description'][$key]) }}
                                                            
                                                            </textarea>
                                                            @error('description')
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


                                <div class="form-group mb-4">
                                    <label for="icon">Icon:</label>
                                    <input type="file" name="icon" class="form-control" id="icon">
                                    @error('icon')
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

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>
    <script src="{{ url('admin/assets/js/ckeditor.js') }}"></script>
    @foreach (config('laravellocalization.supportedLocales') as $key => $lang)
        <script>
            var element = document.getElementById("shortdes{{ $key }}");
            CKEditorConfigs(element);
        </script>
        <script>
            var Pagedesc = document.getElementById("Pagedesc{{ $key }}");
            CKEditorConfigs(Pagedesc);
        </script>
    @endforeach
@endsection
