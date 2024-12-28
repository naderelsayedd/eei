@extends('dashboard.layouts.app')

@section('content')

<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12">
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

        <div class="widget-content widget-content-area">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center sorting_asc" tabindex="0" aria-sort="ascending" style="min-width: 8px;">#</th>
                                <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 80px;">Image</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 80px;">Name</th>
                                <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 140px;">Description</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 60px;">status</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Created At</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Last Update</th>
                                <th class="text-center no-content dt-no-sorting" tabindex="0" style="width: 58px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($crops as $fish)
                                <tr role="row">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/'.$fish->image) }}" width="80" height="60" >
                                    </td>
                                    <td class="text-center">{{ $fish->name }}</td>
                                    <td class="text-center">
                                        <p style="max-height:104px; white-space: pre-wrap; overflow:hidden; margin-top: -34px">
                                            {{ $fish->description }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge @if($fish->status == 1) badge-light-success @else badge-light-danger @endif">{{ $fish->statusName }}</span>
                                    </td>
                                    <td class="text-center">{{ $fish->created_at->format('Y-m-d H:i a') }}</td>
                                    <td class="text-center">{{ $fish->updated_at->format('Y-m-d H:i a') }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls action-btns">
                                            <li>
                                                <a href="{{ route('crop.edit', ['crop' => $fish->id]) }}" title="update" class="action-btn btn-update bs-tooltip mr-2 _effect--ripple waves-effect waves-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" title="delete" class="action-btn btn-delete bs-tooltip mr-2 _effect--ripple waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteFish{{ $fish->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                                <!-- Delete Modal -->
                                                <div class="modal modal-lg fade fadeInDown" id="deleteFish{{ $fish->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Crop ({{ $fish->name }})</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <svg> ... </svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="modal-text">
                                                                    Do you want to delete this Crop ?
                                                                    <br>
                                                                    <strong>Note: </strong> Crop will be deleted forever.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('crop.destroy', ['crop' => $fish->id]) }}" method="post">
                                                                    @method('delete')
                                                                    @csrf

                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                    <button type="button" class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')

    <script>
        c3 = $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-5 d-flex justify-content-sm-start justify-content-center tableTitle'><'col-12 col-sm-4 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f><'col-12 col-sm-3 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3 table_btns'>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "page number _PAGE_ from _PAGES_ pages",
                "sInfoEmpty": "No pages to show",
                "sInfoFiltered": "",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "search...",
                //"sLengthMenu": "Results :  _MENU_",
                "sZeroRecords": "No Data Found",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 30
        });

        c3.on( 'draw', function () {
            $('#fishesCount').text(c3.rows( {search:'applied'} ).count());
        } );


        $('.tableTitle').html("<span style='padding:6px;font-size:18px;'> Crops  (<span id='fishesCount'>"+c3.rows( {search:'applied'} ).count()+"</span>) </span>");
        $('.table_btns').html(
            '<a href="{{ route('crop.create') }}" class="btn btn-primary" tabindex="0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span></a>'+
			'<a href="{{ route('crop.export') }}" class="btn btn-success" tabindex="0"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)"><path d="M 80.959 78.79 H 19.13 c -1.588 0 -2.876 -1.288 -2.876 -2.876 V 14.085 c 0 -1.588 1.288 -2.876 2.876 -2.876 h 61.829 c 1.588 0 2.876 1.288 2.876 2.876 v 61.829 C 83.835 77.503 82.547 78.79 80.959 78.79 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/><path d="M 80.959 80.79 H 19.13 c -2.688 0 -4.876 -2.187 -4.876 -4.875 v -61.83 c 0 -2.688 2.188 -4.876 4.876 -4.876 h 61.829 c 2.688 0 4.876 2.188 4.876 4.876 v 61.83 C 85.835 78.604 83.647 80.79 80.959 80.79 z M 19.13 13.209 c -0.483 0 -0.876 0.393 -0.876 0.876 v 61.83 c 0 0.482 0.393 0.875 0.876 0.875 h 61.829 c 0.483 0 0.876 -0.393 0.876 -0.875 v -61.83 c 0 -0.483 -0.393 -0.876 -0.876 -0.876 H 19.13 z" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/><rect x="61.05" y="20.47" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(0 171 85);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="61.05" y="31.74" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(0 171 85);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="61.05" y="43" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(0 171 85);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="61.05" y="54.26" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(0 171 85);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="61.05" y="65.53" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(0 171 85);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="39.76" y="20.47" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="39.76" y="31.74" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="39.76" y="43" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="39.76" y="54.26" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><rect x="39.76" y="65.53" rx="0" ry="0" width="15.93" height="4" style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/><polygon points="51.33,90 6.17,78.79 6.17,11.21 51.33,0 " style="stroke: none;stroke-width: 1;stroke-dasharray: none;stroke-linecap: butt;stroke-linejoin: miter;stroke-miterlimit: 10;fill: rgb(255,255,255);fill-rule: nonzero;opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/><polygon points="38.15,28.21 31.01,28.62 26.67,37.72 22.56,29.1 15.8,29.48 23.2,45 15.8,60.52 22.56,60.9 26.67,52.28 31.01,61.38 38.15,61.79 30.14,45 " style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0 171 85); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/></g></svg></svg> Export</span></a>'
        );
    </script>

@endsection