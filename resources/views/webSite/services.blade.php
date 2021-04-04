@extends('webSite.layouts.master')
@section('title')
    {{config('app.name')}} - Services
@stop
@section('content')
<!-- Start Services  -->
<div class="services-box-main">
    <div class="container">
        <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>OUR MISSION</h3>
                    <p>We provide the distance for the customer and make him able to buy through the Internet </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>OUR VISION</h3>
                    <p>Our vision in this site is that it helps the customer and provides him with very many things, including not moving from one place to another</p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>We are Trusted</h3>
                    <p>We are confident that this site will provide many things, including preserving our health, preventing our virus from being infected, and applying the law of spacing and not crowding. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>We are Updating</h3>
                    <p>We are working on updating the site, adding releases from time to time and resolving all defects </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>OUR GOAl</h3>
                    <p>Our goal is to provide all the new and practicing technology in our time, and it is very popular to buy on the Internet. </p>
                </div>
            </div>
        </div>

        <div class="row my-12 ">
            <div class="col-2">
                <h2 class="noo-sh-title">Meet Our Team</h2>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('assets/webSite/images/img-1.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-google-plus"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-youtube"></a>
                            </li>
                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0">
                </div>
            </div>
            <div class="col-sm-4 col-lg-4">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('assets/webSite/images/img-2.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Kristiana</h3> <span class="post">Web Developer</span> </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-google-plus"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-youtube"></a>
                            </li>
                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>

        </div>

    </div>
</div>
<!-- End Services -->
@endsection
