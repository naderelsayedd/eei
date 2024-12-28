@extends('website.eei.app')
@section('content')
    <div class="img-cover" id="img-cover" style="margin-top: 110px;">
        <div class="container">
            <div class="row ">
                <p
                    style="display: flex; justify-content: start; padding-top: 90px; color: rgba(225, 44, 33, 1); font-size: 55px; font-weight: 700;
                         line-height: 32px; letter-spacing: 2px;">
                    About Us </p>
                <div class="d-flex">
                    <span style="color: #475569;">Home > &nbsp;</span> <span>About Us</span>
                </div>
            </div>
        </div>

    </div>
    <section class="container-fluid about-section">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="w-75 m-auto">
                    <h2 class="fw-bold text-dark fs-1 centeratmobile">Who Are We</h2>
                    <p class="about-text centeratmobile">
                        With lots of unique blocks, you can easily build a page without coding. Build your next landing
                        page effortlessly and focus on showcasing your business. Our goal is to make website development
                        accessible to everyone, ensuring you create engaging, responsive designs.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 about-image">
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('website/assets/img/1.jpg') }}" alt="Electrical Work Image" style="width: 350px;">
                </div>
            </div>
        </div>
    </section>
    <div class="mission-section-2">
        <div class="ablosute-img-about"></div>
        <div class="text-mission-section-2">
            <h2 class="">Our Mission</h2>
            <p class="">
                Egestas fringilla aliquam leo, habitasse arcu varius lorem elit. Neque pellentesque donec et tellus
                ac varius tortor, bibendum.
                Nulla felis ac turpis at amet. Purus malesuada placerat arcu et enim elit in accumsan. Egestas
                fringilla aliquam leo, habitasse
                arcu varius lorem elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit autem
                quibusdam laborum eveniet sint officia ex inventore fugit, reprehenderit adipisci? Neque quam beatae
                hic modi incidunt nisi libero magnam eius quidem debitis sit aut quod omnis, reprehenderit deleniti
                iste eos possimus veniam error rerum ducimus fuga nulla atque culpa! Beatae, laborum qui corrupti
                laboriosam voluptate quam molestias numquam error ipsam!
            </p>
        </div>
    </div>



    </head>

    <body>
        <section class="values-section">
            <div class="container">
                <h2 class="values-title fw-bolder text-dark">Our Values</h2>
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('website/assets/img/1.jpg') }}" class="card-img-top" alt="Value 1">
                            <div class="card-body">
                                <p class="card-text">
                                    Elit purus magna donec mattis amet, leo varius sed. Ut metus sed convallis
                                    pretium sollicitudin turpis semper vulputate.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('website/assets/img/1.jpg') }}" class="card-img-top" alt="Value 2">
                            <div class="card-body">
                                <p class="card-text">
                                    Elit purus magna donec mattis amet, leo varius sed. Ut metus sed convallis
                                    pretium sollicitudin turpis semper vulputate.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('website/assets/img/1.jpg') }}" class="card-img-top" alt="Value 3">
                            <div class="card-body">
                                <p class="card-text">
                                    Elit purus magna donec mattis amet, leo varius sed. Ut metus sed convallis
                                    pretium sollicitudin turpis semper vulputate.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container my-5">
            <div class="row align-items-center p-4">
                <!-- Text Content -->
                <div class="col-lg-6">
                    <h2 class="fw-bolder text-dark">Why eei</h2>
                    <p class="text-muted">
                        Dui consectetur gravida platea ut dis diam. Enim morbi proin auctor et nisi phasellus.
                        Ultricies pharetra, id quam facilisis urna, enim.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Free Consulting With Expert Saving Money
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Dui consectetur gravida platea ut dis diam. proin auctor
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Dui consectetur gravida plat
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Saving Money For The Future
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Dui consectetur gravida plat
                        </li>
                    </ul>
                </div>

                <!-- Image Section -->
                <div class="col-lg-6">
                    <img src="{{ asset('website/assets/img/1.png') }}" class="img-fluid rounded" alt="Industry image">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-middle">
                    <h1 class="text-dark fw-bold">Certificates</h1>
                    <a href="/certificate"><span class="text-danger">View More <img src="assets/img/Vector33.svg"
                                alt="vector"></span></a>

                </div>



                <div class="col-md-6 col-lg-4" style="display: flex; justify-content: center; align-items: center;">
                    <div style="padding-bottom: 35px; width: 329px; height: 468px; padding-top: 35px; margin-bottom: 55px;">
                        <div class="curser-pointer">
                            <img src="{{ asset('website/assets/img/cer-card.svg') }}" style="width: 317px; height: 272px;"
                                data-bs-toggle="modal" data-bs-target="#myModal" class="zoom-effect" />
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{asset('website/assets/img/certificationiso.png')}}"
                                            alt="certification" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 mt-3"
                            style="font-weight: 700; font-size: 26px; line-height: 32px; color: rgba(22, 28, 45, 1);">
                            certification of Quality </div>
                        <p class=""
                            style="color: rgba(144, 144, 144, 1); font-size: 20px; font-weight: 300; line-height: 36px;">
                            Elit purus magna donec mattis amet, leo varius sed.Elit purus magna donec mattis amet,
                            leo varius sed.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" style="display: flex; justify-content: center; align-items: center;">
                    <div
                        style="padding-bottom: 35px; width: 329px; height: 468px; padding-top: 35px; margin-bottom: 55px;">
                        <div class="curser-pointer">
                            <img src="{{ asset('website/assets/img/cer-card.svg') }}" style="width: 317px; height: 272px;"
                                data-bs-toggle="modal" data-bs-target="#myModal" class="zoom-effect" />
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{asset('website/assets/img/certificationiso.png')}}"
                                            alt="certification" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 mt-3"
                            style="font-weight: 700; font-size: 26px; line-height: 32px; color: rgba(22, 28, 45, 1);">
                            certification of Quality </div>
                        <p class=""
                            style="color: rgba(144, 144, 144, 1); font-size: 20px; font-weight: 300; line-height: 36px;">
                            Elit purus magna donec mattis amet, leo varius sed.Elit purus magna donec mattis amet,
                            leo varius sed.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" style="display: flex; justify-content: center; align-items: center;">
                    <div
                        style="padding-bottom: 35px; width: 329px; height: 468px; padding-top: 35px; margin-bottom: 55px;">
                        <div class="curser-pointer">
                            <img src="{{ asset('website/assets/img/cer-card.svg') }}"
                                style="width: 317px; height: 272px;" data-bs-toggle="modal" data-bs-target="#myModal"
                                class="zoom-effect" />
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{asset('website/assets/img/certificationiso.png')}}"
                                            alt="certification" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 mt-3"
                            style="font-weight: 700; font-size: 26px; line-height: 32px; color: rgba(22, 28, 45, 1);">
                            certification of Quality </div>
                        <p class=""
                            style="color: rgba(144, 144, 144, 1); font-size: 20px; font-weight: 300; line-height: 36px;">
                            Elit purus magna donec mattis amet, leo varius sed.Elit purus magna donec mattis amet,
                            leo varius sed.</p>
                    </div>
                </div>
            </div>

        </div>



      
        <div class="container py-5">
            <div class="row text-center g-3">
                <div class="col-md-4">
                    <div class="service-icon bg-danger w-25 m-auto text-white mb-3"
                        style="border-radius: 50%;padding: 8px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h4 class="service-title">Switchgear Safety</h4>
                    <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus
                        magna
                        donec mattis amet, leo varius sed.</p>
                </div>
                <div class="col-md-4">
                    <div class="service-icon bg-danger w-25 m-auto text-white mb-3"
                        style="border-radius: 50%;padding: 8px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h4 class="service-title">Compliance Assured</h4>
                    <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus
                        magna
                        donec mattis amet, leo varius sed.</p>
                </div>
                <div class="col-md-4">
                    <div class="service-icon bg-danger w-25 m-auto text-white mb-3"
                        style="border-radius: 50%;padding: 8px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h4 class="service-title">Operational Efficiency</h4>
                    <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus
                        magna
                        donec mattis amet, leo varius sed.</p>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    @endsection
