@extends('website.eei.app')
@section('content')
    <div class="img-cover" id="img-cover" style="margin-top: 110px;">
        <div class="container">
            <div class="row ">
                <p
                    style="display: flex; justify-content: start; padding-top: 90px; color: rgba(225, 44, 33, 1); font-size: 55px; font-weight: 700;
                         line-height: 32px; letter-spacing: 2px;">
                    Contact Us </p>
                <div class="d-flex">
                    <span style="color: #475569;">Home > &nbsp;</span> <span>Contact Us</span>
                </div>
            </div>
        </div>

    </div>

    <div class="w-100 d-flex justify-content-center align-items-start" style="margin-top: 90px;">
        <img src="{{ asset('website/assets/img/img_01.png') }}" alt="404" class="rounded position-absolute w-75"
            style="height: auto;">
    </div>
@endsection

@section('scripts')
@endsection
