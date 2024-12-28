@extends('website.eei.app')
@section('content')
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner slider-half">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('website/assets/img/1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption text-start">
                    <h1 class="fw-bold">Egyptian Company for Electrical Industries</h1>
                    <p>With lots of unique blocks, you can easily build a page without coding. Build your next
                        consultancy
                        website within few minutes.</p>
                    <a href="#" class="btn btn-danger">Explore Our Services</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('website/assets/img/2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption text-start">
                    <h1 class="fw-bold">Egyptian Company for Electrical Industries</h1>
                    <p>With lots of unique blocks, you can easily build a page without coding. Build your next
                        consultancy
                        website within few minutes.</p>
                    <a href="#" class="btn btn-danger">Explore Our Services</a>
                </div>
            </div>
        </div>

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true"
                style="width: 12px; height: 12px;"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                style="width: 12px; height: 12px;"></button>
        </div>
    </div>


    <div class="container">
        <div class="who-are-we row">
            <!-- Section 1: Text Content -->
            <div class="text-section col-xl-6 col-6 col-md-12">
                <h1>Who Are We</h1>
                <p>With lots of unique blocks, you can easily build a page without coding. Build your next landing page.
                    With lots of unique blocks, you can easily build a page without coding. Build your next landing
                    page.
                </p>
                <a href="#">More about us <span class="ms-2">&rarr;</span></a>
                <div class="logo mt-3">
                    <img src="{{ asset('website/assets/img/logo.svg') }}" alt="Company Logo">
                </div>
            </div>

            <!-- Section 2: Images -->
            <div class="image-section col-xl-6 col-6 col-md-12 m-auto">
                <img src="{{ asset('website/assets/img/1.jpg') }}" class="mt-5" alt="Image 1">
                <img src="{{ asset('website/assets/img/1.jpg') }}" alt="Image 2">
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row text-center">



            <div id="overlay" class="overlay">
                <img src="{{ asset('website/assets/img/loading.gif') }}" alt="Loading..." class="overlay-gif" />
            </div>


            <div class="col-md-4 service-animation mt-4" onclick="showOverlay()">
                <div class="service-icon bg-danger w-25 m-auto text-white mb-3" style="border-radius: 50%;padding: 8px;">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h4 class="service-title">Switchgear Safety</h4>
                <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus magna
                    donec mattis amet, leo varius sed.</p>
            </div>
            <div class="col-md-4 mt-4" onclick="showOverlay()">
                <div class="service-icon bg-danger w-25 m-auto text-white mb-3" style="border-radius: 50%;padding: 8px;">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h4 class="service-title">Compliance Assured</h4>
                <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus magna
                    donec mattis amet, leo varius sed.</p>
            </div>
            <div class="col-md-4 mt-4" onclick="showOverlay()">
                <div class="service-icon bg-danger w-25 m-auto text-white mb-3" style="border-radius: 50%;padding: 8px;">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h4 class="service-title">Operational Efficiency</h4>
                <p class="service-description">Elit purus magna donec mattis amet, leo varius sed. Elit purus magna
                    donec mattis amet, leo varius sed.</p>
            </div>
        </div>
    </div>

    <div class="services-section">
        <h2 class="services-title fw-bold">Our Services</h2>
        <p class="services-description w-75 text-center m-auto mb-5 ">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum molestiae corrupti reiciendis blanditiis vero
            minima, modi consectetur. Quod, non possimus ducimus magni numquam nemo vitae error eum nobis placeat
            praesentium delectus explicabo beatae officiis fuga cum? Excepturi harum quam numquam necessitatibus quia
        </p>

        <div class="container section-boex-vsd">
            <div class="row">
                @if ($categoryProducts)
                    @foreach ($categoryProducts as $cat)
                        <div class="col-md-6 mb-4"> <!-- Use col-md-6 for two items per row -->
                            <div class="box">
                                <div class="imgBox d-flex align-items-center">
                                    <div class="data">
                                        <h3 class="fx-bold text-dark">{{ $cat->name }}</h3>
                                        <p class="py-5">
                                            With lots of unique blocks, you can easily build a page without coding.
                                            Build your next landing page.
                                        </p>
                                        <a href="/categories/{{ $cat->id }}" class="btn btn-danger">More About Service →</a>
                                    </div>
                                </div>

                                <div class="content">
                                    @if ($cat->products->isNotEmpty())
                                        <ul>
                                            @foreach ($cat->products as $product)
                                                <li>
                                                    <strong>{{ $product->name }}</strong>
                                                    {{-- {{ $product->description }} --}}
                                                    {{-- <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50"> --}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        {{-- <p>No products available in this category.</p> --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No categories found.</p>
                @endif
            </div>
        </div>






        <div class="mt-5">
            <a href="get-services">
                <button class="btn btn-getstarted bg-danger text-white w-75 rounded">Show More Details</button>
            </a>
        </div>




    </div>
    <div class="container my-5">
        <div class="row align-items-center p-4">
            <!-- Text Content -->
            <div class="col-lg-6">
                <h2 class="fw-bold">Why eei</h2>
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


    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Frequently asked questions</h2>
            <p class="text-muted px-5">
                Et pulvinar nec interdum integer id urna molestie porta nullam. A, donec ornare sed turpis pulvinar
                purus
                maecenas quam a. Erat porttitor pharetra sed in mauris elementum sollicitudin.
            </p>
        </div>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Enim sodales consequat adipiscing facilisis massa venenatis, non lorem lobortis?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Venenatis nulla sagittis nunc, lobortis nec sollicitudin neque, dolor?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Vestibulum at eros. Nulla vitae elit libero, a pharetra augue.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Varius ultrices molestie tellus fermentum, viverra ipsum scelerisque etiam lorem?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Donec id elit non mi porta gravida at eget metus.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Nulla etiam vitae, at sagittis, nibh ultrices mattis feugiat faucibus?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                    </div>
                </div>
            </div>
            <!-- FAQ Item 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Sagittis consectetur gravida nec turpis eros, id sit et, dictum?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
