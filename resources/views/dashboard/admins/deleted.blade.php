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

            <div class="statbox widget box box-shadow tables_list">
                <div class="widget-content widget-content-area">
                    <div id="style-3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table id="style-3" class="table style-3 dt-table-hover dataTable no-footer" role="grid" aria-describedby="style-3_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center sorting_asc" tabindex="0" aria-controls="style-3" aria-sort="ascending" style="width: 10px;">#</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 74px;">Name</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 88px;">Email</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 84px;">Deleted At</th>
                                        <th class="text-center dt-no-sorting" tabindex="0" aria-controls="style-3" style="min-width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($deleted_admins as $user)
                                    <tr role="row">
                                        <td class="checkbox-column text-center sorting_1">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">
                                            <p class="date_time mb-0">{{ $user->deleted_at->format('Y-m-d h:i a') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li>
                                                    <button type="button" title="restor" class="btn btn-danger mr-2 _effect--ripple waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#restoreAdmin{{ $user->id }}">
                                                        Restore
                                                    </button>
                                                    <!-- Restore Modal -->
                                                    <div class="modal modal-lg fade fadeInDown" id="restoreAdmin{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Restore Admin Account</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <svg> ... </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="modal-text">
                                                                        Do you want to restore ({{$user->type}}) {{ $user->name }} ?<br>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('admins.restore', ['admin' => $user->id]) }}" method="post">
                                                                        @csrf

                                                                        <button type="submit" class="btn btn-danger">Confirm</button>
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
    </div>

@endsection

@section('js')

    <script>
        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center tableTitle'><'col-12 col-sm-3 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f><'col-12 col-sm-3 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3 table_btns'>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Page no _PAGE_ from _PAGES_ pages",
                "sInfoEmpty": "No data found",
                "sInfoFiltered": "",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                //"sLengthMenu": "Results :  _MENU_",
                "sZeroRecords": "No records found",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 30
        });

        c3.on( 'draw', function () {
            $('#deletedAdminsCount').text(c3.rows( {search:'applied'} ).count());
        } );

        $('.tableTitle').html("<span style='padding:6px;font-size:18px;'> Deleted Admins (<span id='deletedAdminsCount'>"+c3.rows( {search:'applied'} ).count()+"</span>) </span>");
        $('.table_btns').html(
            '<a href="{{ route('admins.index') }}" class="btn btn-primary" tabindex="0"><span>Admins</span></a>'
        );
    </script>

@endsection
