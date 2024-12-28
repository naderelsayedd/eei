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
            <div class="table-responsive">
                <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" tabindex="0" aria-sort="ascending" style="min-width: 8px;">#</th>
                            <th class="text-center sorting" tabindex="0" style="min-width: 80px;">Name</th>
                            <th class="text-center sorting" tabindex="0" style="min-width: 80px;">Email</th>
                            <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 80px;">Phone</th>
                            <th class="text-center dt-no-sorting" tabindex="0" style="min-width: 100px;">Subject</th>
                            <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Sent At</th>
                            <th class="text-center sorting" tabindex="0" style="min-width: 60px;">Replied At</th>
                            <th class="text-center no-content dt-no-sorting" tabindex="0" style="width: 48px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($messages as $message)
                            <tr role="row">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $message->name }}</td>
                                <td class="text-center">{{ $message->email }}</td>
                                <td class="text-center">{{ $message->phone }}</td>
                                <td class="text-center">{{ $message->subject }}</td>
                                <td class="text-center">{{ $message->created_at->format('Y-m-d H:i a') }}</td>
                                <td class="text-center">
                                    @if($message->answer) {{ $message->updated_at->format('Y-m-d H:i a') }} @endif
                                </td>
                                <td class="text-center">
                                    <ul class="table-controls action-btns">
                                        <li>
                                            <a href="{{ route('messages.show', ['message' => $message->id]) }}" title="@if($message->answer) show @else reply @endif" class="action-btn btn-update bs-tooltip mr-2 _effect--ripple waves-effect waves-light">
                                                @if($message->answer)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                                @endif
                                            </a>
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

@endsection

@section('js')

    <script>
        c3 = $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center tableTitle'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
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
            $('#messagesCount').text(c3.rows( {search:'applied'} ).count());
        } );


        $('.tableTitle').html("<span style='padding:6px;font-size:18px;'> Messages (<span id='messagesCount'>"+c3.rows( {search:'applied'} ).count()+"</span>) </span>");
    </script>

@endsection