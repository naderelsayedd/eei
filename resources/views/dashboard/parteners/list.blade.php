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
                                <th class="text-center sorting" tabindex="0" style="min-width: 80px;">Name</th>
                                <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 100px;">Image</th>
                                <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 50px;">Link</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Created At</th>
                                <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Last Update</th>
                                <th class="text-center no-content dt-no-sorting" tabindex="0" style="width: 58px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($parteners as $partener)
                                <tr role="row">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $partener->name }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/'.$partener->image) }}" width="80" height="60" >
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ $partener->link }}" target="_blank">{{ $partener->link }}</a>
                                    </td>
                                    <td class="text-center">{{ $partener->created_at->format('Y-m-d H:i a') }}</td>
                                    <td class="text-center">{{ $partener->updated_at->format('Y-m-d H:i a') }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls action-btns">
                                            <li>
                                                <a href="{{ route('parteners.edit', ['partener' => $partener->id]) }}" title="update" class="action-btn btn-update bs-tooltip mr-2 _effect--ripple waves-effect waves-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" title="delete" class="action-btn btn-delete bs-tooltip mr-2 _effect--ripple waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deletePartener{{ $partener->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                                <!-- Delete Modal -->
                                                <div class="modal modal-lg fade fadeInDown" id="deletePartener{{ $partener->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Partener ({{ $partener->name }})</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <svg> ... </svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="modal-text">
                                                                    Do you want to delete this partener ?
                                                                    <br>
                                                                    <strong>Note: </strong> Partener will be deleted forever.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('parteners.destroy', ['partener' => $partener->id]) }}" method="post">
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
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center tableTitle'><'col-12 col-sm-4 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f><'col-12 col-sm-2 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3 table_btns'>>>" +
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
            $('#partenersCount').text(c3.rows( {search:'applied'} ).count());
        } );


        $('.tableTitle').html("<span style='padding:6px;font-size:18px;'> Parteners (<span id='partenersCount'>"+c3.rows( {search:'applied'} ).count()+"</span>) </span>");
        $('.table_btns').html(
            '<a href="{{ route('parteners.create') }}" class="btn btn-primary" tabindex="0"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span></a>'
        );
    </script>

@endsection