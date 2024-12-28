@extends('website.eei.app')
@section('content')
    <!-- Start service  -->

<div class="img-cover" id="img-cover" style="margin-top: 110px;">
    <div class="container"  >
        <div class="row ">
          <p style="display: flex; justify-content: start; padding-top: 90px; color: rgba(225, 44, 33, 1); font-size: 55px; font-weight: 700;
          line-height: 32px; letter-spacing: 2px;">
           Get Service</p>
           <div class="d-flex">
            <span style="color: #475569;">Home > &nbsp;</span> <span>Get Service</span>
          </div>
        </div>
     </div>

  </div>
  </div>


    <div class="service-form container">

      <div class="service-form-div-inmg">
        <img src="./assets/img/1.jpg" alt="" style="max-width: 100%;">
      </div>


  <div class="box p-5" style="height: auto; width: 100%;">
    <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" style="height: 50px;">
    </div>

    <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
      <input type="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number" style="height: 50px;"  >
    </div>

    <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" style="height: 50px;" >
    </div>


    <div class="mb-3 mt-5">
      <label for="exampleFormControlTextarea1" class="form-label">Details</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Write Your Details" style="height: 140px;"  ></textarea>
    </div>

    <div class="mb-4 mt-5">
      <div class="botton-sub">
        <button type="submit" class="btn btn-primary" style="width: 100%; border: none; background-color:rgba(225, 44, 33, 1) ; height: 60px; font-size: 22px;" >send</button>
      </div>

    </div>

  </div>


    </div>
  <!-- End service  -->
@endsection

@section('scripts')
@endsection
