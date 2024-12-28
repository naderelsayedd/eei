@extends('website.eei.app')
@section('content')
    <!-- card-details  -->
    <div class="img-cover" id="img-cover" style="margin-top: 40px;">
        <div class="container">
            <div class="row ">
                <p
                    style="display: flex; justify-content: start; padding-top: 90px; color: rgba(225, 44, 33, 1); font-size: 55px; font-weight: 700;
          line-height: 32px; letter-spacing: 2px;">
                    MCCB</p>
                <div class="d-flex">
                    <span style="color: #475569;">Home > &nbsp;</span> <span style="color: #475569;">Services > &nbsp;</span>
                    <span style="color: #475569;">Low voltage > &nbsp;</span><span style="color: #475569;">MCCB >
                        &nbsp;</span>
                    <span>MCCB</span>
                </div>
            </div>
        </div>

    </div>
    <!-- card-details  -->


    <!--start box -->


    <div class="container">
        <div class="row">
            <div class="col" style="display: flex; justify-content: center; align-items: center;">


                <div class="card mb-3"
                    style="max-width: 1112px; background: rgba(255, 255, 255, 1);

          box-shadow: 0px 4px 64.2px 0px rgba(0, 0, 0, 0.05); margin-top: 50px; border: none; padding: 23px; border-radius: 10px;">
                    <div class="row ">
                        <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('website/assets/img/mcb.png') }}" class="img-fluid rounded-start"
                                alt="..." style="width: 200px; height:304px ;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="color: rgba(22, 28, 45, 1); font-weight: 700; font-size: 30px; line-height: 32px; text-align: right;">
                                    MCB</h5>
                                <p class="card-text"
                                    style="color: rgba(71, 85, 105, 1); font-weight: 300; font-size: 18px; line-height: 28.8px; text-align: left; ">
                                    With lots of unique blocks, you can easily build a page without coding. Build your next
                                    landing
                                    page.With lots of unique blocks, you can easily build a page without coding. Build your
                                    next landing
                                    page.With lots of unique blocks, you can easily build a page without coding. Build your
                                    next landing
                                    page. With lots of unique blocks, you can easily build a page without coding. Build your
                                    next landing
                                    page.With lots of unique blocks, you can easily build a page without coding. Build your
                                    next landing
                                    page.With lots of unique blocks, you can easily build a page without coding. Build your
                                    next landing
                                    page.</p>

                                <div class="asdasdasdfdsfdf"
                                    style="text-align: right; display: flex; justify-content: start; gap: 15px;">
                                    <a href="/contact" class="btn btn-primary"
                                        style="background-color: rgba(255, 255, 255, 1); border-radius: 25px;
              color: rgba(240, 36, 24, 1); border: 1px solid rgba(240, 36, 24, 1); padding-left: 10px; padding-right: 10px; ">
                                        Contact us
                                    </a>

                                    <a href="/get-service" class="btn btn-primary"
                                        style="background-color: rgba(240, 36, 24, 1); border-radius: 25px;
           color: rgba(255, 255, 255, 1); border: 1px solid rgba(240, 36, 24, 1); padding-left: 10px; padding-right: 10px;">
                                        Get Service
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <!--end box -->
    <!-- Start text details -->
    <div class="">
        <div class="container">
            <div class="row container" style="margin-top: 3%; padding-bottom: 5%;">

                <div class="col" style="margin-bottom: 25px;">
                    <div class="card mb-3" style="border: none; margin: 5px; padding: 5px;">
                        <div><img src="{{ asset('website/assets/img/ground-form.png') }}" class="card-img-top"
                                alt="..." style="max-width: 100%;"></div>
                        <div class="card-body">

                            <p class="card-text"
                                style="color: rgba(71, 85, 105, 1); font-size: 17px; font-weight: 400; line-height: 28.8px; margin-top: 15px; text-align: left;">
                                With lots of unique blocks, you can easily build a page without coding. Build your next
                                landing
                                page.With lots of unique blocks, you can easily build a page without coding. Build your next
                                landing
                                page.With lots of unique blocks, you can easily build a page without coding. Build your next
                                landing
                                page. With lots of unique blocks,
                                you can easily build a page without coding. Build your next landing page.With lots of unique
                                blocks, you
                                can easily build a page without coding. Build your next landing page.With lots of unique
                                blocks, you can
                                easily build a page without coding. Build your next landing page.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End text details -->


    <!--start other cards-->

    <div class="row">
        @foreach ($categoryProducts as $product)
            <div class="col-lg-4 col-md-4" style="display: flex; justify-content: center; align-items: center;">
                <div class="card" style="width: 18rem; margin-bottom: 25px; border: none;">

                    <div class="card-img cardddd"
                        style="display: flex; justify-content: center; background: rgba(244, 247, 250, 1); padding: 35px; border-radius: 13px;">
                        <img src="{{ asset('website/assets/img/asset3333.jpeg') }}" class="card-img-top" alt="{{ $product['name'] }}"
                            style="width: 159.21px; height: 242.38px;">
                        <div class="text">More Details <img src="assets/img/Vector32.svg"
                                style="width: 18px; height: 18px; padding-left: 3px;" /> </div>
                    </div>

                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="color: rgba(22, 28, 45, 1); font-size: 30px; font-weight: 700;">
                            {{ $product->name }}
                        </h5>
                        <p class="card-text" style="color: rgba(144, 144, 144, 1); font-size: 15px; font-weight: 300;">
                            {{ $product['description'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--end other cards-->
@endsection
