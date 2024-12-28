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
                            <h4>Create New Section</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <form action="{{ route('sections.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-4">
                                    <label>For Page:</label>
                                    <select name="page_id" class="form-control">
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"
                                                @if (old('page_id') == $page->id) selected @endif>
                                                {{ $page->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('page_id')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if (old('status') == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if (old('status') == 0) selected @endif>Not Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>type:</label>
                                    <select name="type" id="sectiontype" class="form-control">
                                        <option value="content" @if (old('type') == 'content') selected @endif>content
                                        </option>
                                        <option value="header_section" @if (old('type') == 'header_section') selected @endif>
                                            header_section </option>
                                        <option value="home_contact" @if (old('type') == 'home_contact') selected @endif>
                                            home_contact </option>
                                        <option value="team_partner" @if (old('type') == 'team_partner') selected @endif>
                                            team_partner </option>
                                        <option value="requestService" @if (old('type') == 'requestService') selected @endif>
                                            requestService </option>
                                        <option value="team" @if (old('type') == 'team') selected @endif>team
                                        </option>
                                        <option value="partner" @if (old('type') == 'partner') selected @endif>partner
                                        </option>
                                        <option value="three_column" @if (old('type') == 'three_column') selected @endif>
                                            three_column </option>
                                        <option value="home_about" @if (old('type') == 'home_about') selected @endif>
                                            home_about </option>
                                        <option value="service_section" @if (old('type') == 'service_section') selected @endif>
                                            service_section </option>
                                        <option value="contact_info" @if (old('type') == 'contact_info') selected @endif>
                                            contact_info </option>

                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Order:</label>
                                    <input type="text" name="order"
                                        class="form-control @error('order') is-invalid @enderror"
                                        value="{{ old('order') }}" placeholder="section order ex: 1, 2, ...">
                                    @error('order')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4 image_frame">
                                    <label>image_frame:</label>
                                    <select name="image_frame" id="image_frame" class="form-control">
                                        <option value="yes" @if (old('image_frame') == 'yes') selected @endif>
                                            yes
                                        </option>
                                        <option value="no" @if (old('image_frame') == 'no') selected @endif>
                                            no
                                        </option>
                                    </select>
                                    @error('image_frame')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 width">
                                    <label>width:</label>
                                    <select name="width" id="width" class="form-control">
                                        <option value="full" @if (old('width') == 'full') selected @endif>
                                            full
                                        </option>
                                        <option value="box" @if (old('width') == 'box') selected @endif>
                                            box
                                        </option>
                                    </select>
                                    @error('width')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 section_margin_top">
                                    <label>section_margin_top:</label>
                                    <input type="text" name="section_margin_top"
                                        class="form-control @error('section_margin_top') is-invalid @enderror"
                                        value="{{ old('section_margin_top') }}"
                                        placeholder="select icon class name : im im-icon-Duplicate-Window">
                                    @error('section_margin_top')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 background_color">
                                    <label>background_color:</label>
                                    <input type="text" name="background_color"
                                        class="form-control @error('background_color') is-invalid @enderror"
                                        value="{{ old('background_color') }}"
                                        placeholder="select icon class name : im im-icon-Duplicate-Window">
                                    @error('background_color')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 icon">
                                    <label>icon:</label>
                                    <input type="file" name="icon"
                                        class="form-control @error('icon') is-invalid @enderror"
                                        value="{{ old('icon') }}"
                                        placeholder="select icon class name : im im-icon-Duplicate-Window">
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 image">
                                    <label>image:</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        value="{{ old('image') }}"
                                        placeholder="select icon class name : im im-icon-Duplicate-Window">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 background_image">
                                    <label>background_image:</label>
                                    <input type="file" name="background_image"
                                        class="form-control @error('background_image') is-invalid @enderror"
                                        value="{{ old('background_image') }}"
                                        placeholder="select icon class name : im im-icon-Duplicate-Window">
                                    @error('background_image')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
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
                                                        <div class="form-group mb-4 inputtitle">
                                                            <label>Title :</label>
                                                            <input type="text" name="title[{{ $key }}]"
                                                                class="form-control @error('title[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('title[' . $key . ']') }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                        <div class="form-group mb-4 inputdescription">
                                                            <label>Description - {{ $lang['name'] }}:</label>
                                                            <textarea id="editor{{ $key }}" name="description[{{ $key }}]" class="form-control"
                                                                placeholder="section discreption">{{ old('description[' . $key . ']') }}</textarea>
                                                            @error('description[{{ $key }}]')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col1">
                                                            <h3> Column 1</h3>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Icon 1:</label>
                                                                <input type="text" name="col_icon_1"
                                                                    class="form-control @error('col_icon_1') is-invalid @enderror"
                                                                    value="{{ old('col_icon_1') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Title 1:</label>
                                                                <input type="text" name="col_title_1"
                                                                    class="form-control @error('col_title_1') is-invalid @enderror"
                                                                    value="{{ old('col_title_1') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 1 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col1{{ $key }}" name="col_1[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_1[' . $key . ']') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <h3> Column 2</h3>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Icon 2:</label>
                                                                <input type="text" name="col_icon_2"
                                                                    class="form-control @error('col_icon_2') is-invalid @enderror"
                                                                    value="{{ old('col_icon_2') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Title 2:</label>
                                                                <input type="text" name="col_title_2"
                                                                    class="form-control @error('col_title_2') is-invalid @enderror"
                                                                    value="{{ old('col_title_2') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 2 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col2{{ $key }}" name="col_2[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_2[' . $key . ']') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col3">
                                                            <h3> Column 3</h3>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Icon 3:</label>
                                                                <input type="text" name="col_icon_3"
                                                                    class="form-control @error('col_icon_3') is-invalid @enderror"
                                                                    value="{{ old('col_icon_3') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Title 3:</label>
                                                                <input type="text" name="col_title_3"
                                                                    class="form-control @error('col_title_3') is-invalid @enderror"
                                                                    value="{{ old('col_title_3') }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 3 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col3{{ $key }}" name="col_3[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_3[' . $key . ']') }}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-4 ">
                                                            <label>Button Text :</label>
                                                            <input type="text" name="buton_txt[{{ $key }}]"
                                                                class="form-control @error('buton_txt[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('buton_txt[' . $key . ']') }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                        <div class="form-group mb-4 ">
                                                            <label>Button URL :</label>
                                                            <input type="text" name="button_url[{{ $key }}]"
                                                                class="form-control @error('button_url[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('button_url[' . $key . ']') }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div>
                                        @endforeach
                                    </div> <!-- tab-content -->
                                </div>


                                <button type="submit" class="btn btn-success">Create</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <style>
        .inputtitle,
        .section_margin_top,
        .image_frame,
        .image,
        .icon,
        .background_image,
        .inputdescription,
        .backgroundsection,
        .col1,
        #basicwizard,
        .image_position,
        .col2,
        .col3 {
            display: none;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>
    <script src="{{ url('admin/assets/js/ckeditor.js') }}"></script>
    @foreach (config('laravellocalization.supportedLocales') as $key => $lang)
        <script>
            var element = document.getElementById("editor{{ $key }}");
            CKEditorConfigs(element);
        </script>
        <script>
            var element = document.getElementById("col1{{ $key }}");
            CKEditorConfigs(element);
        </script>
        <script>
            var element = document.getElementById("col2{{ $key }}");
            CKEditorConfigs(element);
        </script>
        <script>
            var element = document.getElementById("col3{{ $key }}");
            CKEditorConfigs(element);
        </script>
    @endforeach
    <script>
        function rerendertype(sectype) {
            console.log('select type ',sectype);
            switch (sectype) {
                case 'content':
                    break;
                case 'header_section':
                    break;
                case 'home_contact':
                    break;
                case 'team_partner':
                    break;
                case 'requestService':
                    $('.section_margin_top').show();
                    break;
                case 'team':
                    break;
                case 'partner':
                    break;
                case 'three_column':
                    break;
                case 'home_about':
                    break;
                case 'service_section':
                    break;
                case 'contact_info':
                    break;
                default:
                    $('.inputtitle').show();
                    break;
            }

        }
        var sectype = $('#sectiontype').val();
        rerendertype(sectype)

        $("#sectiontype").change(function() {
            console.log('change select type');
            var newsectype = $('#sectiontype').val();
            rerendertype(newsectype)
        });
    </script>
@endsection
