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
                            <h4>Update Section</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <form action="{{ route('sections.update', ['section' => $section->id]) }}" method="post">
                                @method('PUT')
                                @csrf

                                <div class="form-group mb-4">
                                    <label>For Page:</label>
                                    <select name="page_id" class="form-control">
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"
                                                @if (old('page_id', $section->page_id) == $page->id) selected @endif>
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
                                        <option value="1" @if (old('status', $section->status) == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if (old('status', $section->status) == 0) selected @endif>Not Active
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>Order:</label>
                                    <input type="text" name="order"
                                        class="form-control @error('order') is-invalid @enderror"
                                        value="{{ old('order', $section->order) }}"
                                        placeholder="section order ex: 1, 2, ...">
                                    @error('order')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>type:</label>
                                    <select name="type" id="sectiontype" class="form-control">

                                        <option value="content" @if (old('type',$section->type) == 'content') selected @endif>Text
                                            Content
                                        </option>
                                        <option value="team" @if (old('type',$section->type) == 'team') selected @endif>Team
                                            Members
                                        </option>
                                        <option value="three_column" @if (old('type',$section->type) == 'three_column') selected @endif>Three
                                            Column
                                        </option>
                                        <option value="background_image" @if (old('type',$section->type) == 'background_image') selected @endif>
                                            Text with background
                                        </option>
                                        <option value="box_image_test" @if (old('type',$section->type) == 'box_image_test') selected @endif>
                                            Image and Text
                                        </option>
                                        <option value="select_product" @if (old('type',$section->type) == 'select_product') selected @endif>
                                            Select Products
                                        </option>
                                        <option value="service_section" @if (old('type',$section->type) == 'service_section') selected @endif>
                                            service_section
                                        </option>
                                        <option value="partners" @if (old('type',$section->type) == 'partners') selected @endif>
                                            partners
                                        </option>
                                    </select>
                                    @error('type')
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
                                                                value="{{ old('title',$section->getTranslations()['title'][$key]) }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                        <div class="form-group mb-4 inputdescription">
                                                            <label>Description - {{ $lang['name'] }}:</label>
                                                            <textarea id="editor{{ $key }}" name="description[{{ $key }}]" class="form-control"
                                                                placeholder="section discreption">{{ old('description', $section->getTranslations()['description'][$key]) }}</textarea>
                                                            @error('description')
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
                                                                    value="{{ old('col_icon_1', $section->col_icon_1) }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 1 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col1{{ $key }}" name="col_1[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_1', $section->getTranslations()['col_1'][$key]) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <h3> Column 2</h3>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Icon 2:</label>
                                                                <input type="text" name="col_icon_2"
                                                                    class="form-control @error('col_icon_2') is-invalid @enderror"
                                                                    value="{{ old('col_icon_2', $section->col_icon_2) }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 2 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col2{{ $key }}" name="col_2[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_2', $section->getTranslations()['col_2'][$key]) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col3">
                                                            <h3> Column 3</h3>
                                                            <div class="form-group mb-4 col1icon">
                                                                <label>Icon 3:</label>
                                                                <input type="text" name="col_icon_3"
                                                                    class="form-control @error('col_icon_3') is-invalid @enderror"
                                                                    value="{{ old('col_icon_3', $section->col_icon_3) }}"
                                                                    placeholder="select icon class name : im im-icon-Duplicate-Window">
                                                            </div>
                                                            <div class="form-group mb-4 ">
                                                                <label>Col 3 Description - {{ $lang['name'] }}:</label>
                                                                <textarea id="col3{{ $key }}" name="col_3[{{ $key }}]" class="form-control"
                                                                    placeholder="section discreption">{{ old('col_3', $section->getTranslations()['col_3'][$key]) }}</textarea>
                                                            </div>
                                                        </div>





                                                        <div class="form-group mb-4 inputtitle">
                                                            <label>Button Text :</label>
                                                            <input type="text" name="buton_txt[{{ $key }}]"
                                                                class="form-control @error('buton_txt[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('buton_txt',@$section->getTranslations()['buton_txt'][$key]) }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                        <div class="form-group mb-4 inputtitle">
                                                            <label>Button URL :</label>
                                                            <input type="text" name="button_url[{{ $key }}]"
                                                                class="form-control @error('button_url[' . $key . ']') is-invalid @enderror"
                                                                value="{{ old('button_url',@$section->getTranslations()['button_url'][$key]) }}"
                                                                placeholder="can make it empty">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                            </div>
                                        @endforeach
                                    </div> <!-- tab-content -->
                                </div>




                                <div class="form-group mb-4 backgroundsection">
                                    <label for="cover">Image/background:</label>
                                    <input type="file" name="background" class="form-control" id="background">
                                    @error('background')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 image_position">
                                    <label>Image Position:</label>
                                    <select name="image_position" id="image_position" class="form-control">

                                        <option value="Right" @if (old('image_position', $section->image_position) == 'Right') selected @endif>
                                            First
                                        </option>
                                        <option value="Left" @if (old('image_position', $section->image_position) == 'Left') selected @endif>
                                            End
                                        </option>
                                    </select>
                                    @error('image_position')
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
            console.log('ssssssssss >>', sectype);
            switch (sectype) {
                case 'three_column':
                    $('.inputtitle').show();
                    $('.col1').show();
                    $('.col2').show();
                    $('.col3').show();
                    $('.inputdescription').hide();
                    $('.backgroundsection').hide();
                    $('.image_position').hide();

                    break;
                case 'select_product':
                    $('.inputtitle').show();
                    $('.inputdescription').show();
                    $('.backgroundsection').hide();
                    $('.col1').hide();
                    $('.col2').hide();
                    $('.col3').hide();
                    $('.image_position').hide();

                    break;
                case 'background_image':
                    $('.inputtitle').show();
                    $('.inputdescription').show();
                    $('.backgroundsection').show();
                    $('.col1').hide();
                    $('.col2').hide();
                    $('.col3').hide();
                    $('.image_position').hide();
                    break;
                case 'box_image_test':
                    $('.inputtitle').show();
                    $('.inputdescription').show();
                    $('.backgroundsection').show();
                    $('.image_position').show();
                    $('.col1').hide();
                    $('.col2').hide();
                    $('.col3').hide();
                    break;
                default:
                    $('.inputtitle').show();
                    $('.inputdescription').show();
                    $('.backgroundsection').hide();
                    $('.col1').hide();
                    $('.col2').hide();
                    $('.col3').hide();
                    $('.image_position').hide();

                    break;
            }

        }
        var sectype = $('#sectiontype').val();
        rerendertype(sectype)

        $("#sectiontype").change(function() {
            sectype = $('#sectiontype').val();
            rerendertype(sectype)
        });
    </script>
@endsection
