@extends('dashboard.layouts.app')

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12">

            <div class="widget-content widget-content-area">
                <div id="zero-config_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center sorting_asc" tabindex="0" aria-controls="style-3" style="min-width: 8px;">#</th>
                                    <th class="text-center dt-no-sorting" tabindex="0" aria-controls="style-3" style="min-width: 100px;">Log</th>
                                    <th class="text-center dt-no-sorting" tabindex="0" aria-controls="style-3" style="min-width: 100px;">Description</th>
                                    <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 100px;">By</th>
                                    <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 80px;">Type</th>
                                    <th class="text-center sorting" tabindex="0" aria-controls="style-3" style="min-width: 70px;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activity_logs as $log)
                                    <tr role="row">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $log->event.' '.$log->log_name }}</td>
                                        <td class="text-center">{{ $log->description }}</td>
                                        <td class="text-center">{{ $log->causer ? $log->causer->name : 'Not Avilable' }}</td>
                                        <td class="text-center text-capitalize">
                                            @if($log->causer)
												{{ $log->causer->type }}
                                            @else
                                                Not Avilable
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <p class="date_time mb-0">{{ $log->created_at->format('Y-m-d h:i a') }}</p>
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
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center tableTitle'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
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
            "pageLength": 50
        });

        c3.on( 'draw', function () {
            $('#logsCount').text(c3.rows( {search:'applied'} ).count());
        } );

        $('.tableTitle').html("<span style='padding:6px;font-size:18px;'> Activity Logs (<span id='logsCount'>"+c3.rows( {search:'applied'} ).count()+"</span>) </span>");
    </script>

@endsection
