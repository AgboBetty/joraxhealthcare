@extends('layouts.app')

@section('content')
{{-- {{dd($page_data)}} --}}
    <div>
        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                            <h2 class="h-ultra">Jorax Healthcare Group</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                            <h5 class="h-light">Jorax healthcare is a Pharmaceutical company which specializes in marketing of other Pharmaceutical companies’ products and provides medical products and services in Nigeria.</h4>
                            </div>
                            <div class="well well-trans">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <ul class="lead-list">
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Supply of Drugs and medical equipment</strong><br />We provide the best healthcare services and qulaity products</span></li>
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Contract Marketing and  Business Management</strong><br />We have the best marketing strategy you can always trust</span></li>
                                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Get in touch with jorax elite pharmacists</strong><br />Contact Jorax today for your personal and business needs</span></li>
                                </ul>
                                <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                    <a href="#partner" class="btn btn-skin btn-lg">Contact US <i class="fa fa-angle-right"></i></a>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <img src="img/dummy/person_1.png" class="img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: intro -->

        <!-- Section: boxes -->
        <section id="boxes" class="home-section paddingtop-80">

            <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                    <i class="fa fa-check fa-3x circled bg-skin"></i>
                    <h4 class="h-bold">Make an appoinment</h4>
                    <p>
                        Contact us today and book your appointment for your mediacal consultancy or business management.
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                    <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                    <h4 class="h-bold">Contract Marketing</h4>
                    <p>
                    Jorax does marketing services to cultivate a unique brand to distinguish itself from its competitors 
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">
                    <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                    <h4 class="h-bold">Help by specialist</h4>
                    <p>
                        Jorax team are dedicated Pharmacists who ensure that their customers are satisfied at the end of the day.
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                    <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                    <h4 class="h-bold">Mission and Vision</h4>
                    <p>
                        To provide quality and efficacious products to people who need them within the shortest time possible.
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </section>
        <!-- /Section: boxes -->

        <section id="callaction" class="home-section paddingtop-40">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="callaction bg-gray">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="wow fadeInUp" data-wow-delay="0.1s">
                                <div class="cta-text">
                                    <h3>Subscribe To Our News letter!</h3>
                                    <p>Keep up to date with the latest developments in the field of modern medicine</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                    <div class="cta-btn">
                                        <form method="POST" action="{{url('/subscribe')}}">
                                            @csrf
                                            <input type="email" name="email" placeholder="mail@gmail.com" style="margin-right: 20px" />
                                            <button type="submit" class="btn btn-skin btn-lg">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- Section: services -->
        <section id="service" class="home-section nopadding paddingtop-60">

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <img src="img/dummy/person_2.jpg" class="img-responsive" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-stethoscope fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Healthcare</h5>
                                    <p>Trust jorax with your health today, No regrets!!.</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-wheelchair fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Logistics</h5>
                                    <p>Relax distance is not a barrier to place an order.</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-plus-square fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Pharmacy</h5>
                                    <p>We dispence quality drugs to improve your health.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-h-square fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Staff Training</h5>
                                    <p> provide training for our staff to improve their skils</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-filter fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Marketing</h5>
                                    <p>We market other company Pharmaceutical products.</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-user-md fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Consultancy</h5>
                                    <p>We are always attentive to the needs of our customers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: services -->

        <!-- Section: team -->
        <section id="doctor" class="home-section bg-gray paddingbot-60">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="section-heading text-center">
                            <h2 class="h-bold">Jorax Team</h2>
                            <p>Jorax has elite and seasoned Pharmacists</p>
                        </div>
                    </div>
                    <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="filters-container" class="cbp-l-filters-alignLeft">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (<div class="cbp-filter-counter"></div>)</div>
                            <?php 
                                if (isset($page_data['team'])) {
                                    $member_types = array();
                                    foreach ($page_data['team'] as $element) {
                                        $member_types[$element['type']][] = $element;
                                    }
                                    $member_types = array_keys($member_types);
                                }
                            ?>
                            @isset($member_types)
                                @foreach ($member_types as $item)
                                    <div data-filter=".{{$item}}" class="cbp-filter-item">{{ucfirst($item)}} (<div class="cbp-filter-counter"></div>)</div>
                                @endforeach
                            @endisset

                            {{-- <div data-filter=".cardiologist" class="cbp-filter-item">Cardiologist (<div class="cbp-filter-counter"></div>)</div>
                            <div data-filter=".psychiatrist" class="cbp-filter-item">Psychiatrist (<div class="cbp-filter-counter"></div>)</div>
                            <div data-filter=".neurologist" class="cbp-filter-item">Neurologist (<div class="cbp-filter-counter"></div>)</div> --}}
                        </div>

                        <div id="grid-container" class="cbp-l-grid-team">
                            <ul>
                                @isset($page_data['team'])
                                    @foreach ($page_data['team'] as $item)
                                        <li class="cbp-item {{$item['type']}}">
                                            <a href="welcome/team?name={{$item['name']}}&&type={{$item['type']}}&&about={{$item['about']}}&&image={{url($item['image'])}}" class="cbp-caption cbp-singlePage">
                                                <div class="cbp-caption-defaultWrap">
                                                    <img src="{{url($item['image'])}}" alt="" width="100%">
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body">
                                                            <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="welcome/team?name={{$item['name']}}&&type={{$item['type']}}&&about={{$item['about']}}&&image={{url($item['image'])}}" class="cbp-singlePage cbp-l-grid-team-name">{{$item['name']}}</a>
                                            <div class="cbp-l-grid-team-position">{{$item['type']}}</div>
                                        </li>
                                    @endforeach
                                @endisset
                                {{-- <li class="cbp-item psychiatrist">
                                    <a href="welcome/team?name=Alice Grue&&type=Psychiatrist&&about=Hello&&image=img/team/1.jpg" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/1.jpg" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="welcome/team?name=Alice Grue&&type=Psychiatrist&&about=Hello&&image=img/team/1.jpg" class="cbp-singlePage cbp-l-grid-team-name">Alice Grue</a>
                                    <div class="cbp-l-grid-team-position">Psychiatrist</div>
                                </li>
                                <li class="cbp-item cardiologist">
                                    <a href="welcome/team?name=Joseph Murphy&&type=Cardiologist&&about=Hello&&image=img/team/2.jpg" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/2.jpg" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="welcome/team?name=Joseph Murphy&&type=Cardiologist&&about=Hello&&image=img/team/2.jpg" class="cbp-singlePage cbp-l-grid-team-name">Joseph Murphy</a>
                                    <div class="cbp-l-grid-team-position">Cardiologist</div>
                                </li>
                                <li class="cbp-item cardiologist">
                                    <a href="welcome/team?name=Alison Davis&&type=Cardiologist&&about=Hello&&image=img/team/3.jpg" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/3.jpg" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="welcome/team?name=Alison Davis&&type=Cardiologist&&about=Hello&&image=img/team/3.jpg" class="cbp-singlePage cbp-l-grid-team-name">Alison Davis</a>
                                    <div class="cbp-l-grid-team-position">Cardiologist</div>
                                </li>
                                <li class="cbp-item neurologist">
                                    <a href="welcome/team?name=Adam Taylor&&type=Neurologist&&about=Hello&&image=img/team/4.jpg" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/4.jpg" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="welcome/team?name=Adam Taylor&&type=Neurologist&&about=Hello&&image=img/team/4.jpg" class="cbp-singlePage cbp-l-grid-team-name">Adam Taylor</a>
                                    <div class="cbp-l-grid-team-position">Neurologist</div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: team -->

        <!-- Section: products -->
        <section id="facilities" class="home-section paddingbot-60">
            <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Products</h2>
                        <p>Get the best drug quality from jorax pharmacy</p>
                    </div>
                </div>
                <div class="divider-short"></div>
                </div>
            </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="wow bounceInUp" data-wow-delay="0.2s">
                            <div id="owl-works" class="owl-carousel">

                                @isset($page_data['product'])
                                    @foreach ($page_data['product'] as $item)
                                        <div class="item">
                                            <a href="{{url($item['image'])}}" title="{{$item['name']}}" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{url($item['image'])}}">
                                                <img src="{{url($item['image'])}}" class="img-responsive" alt="img">
                                            </a>
                                        </div>
                                    @endforeach
                                @endisset

                                {{-- <div class="item"><a href="img/photo/ray2.jpg" title="PHARM RAY" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/photo/ray2.jpg"><img src="img/photo/ray2.jpg" class="img-responsive" alt="img"></a></div>
                                <div class="item"><a href="img/photo/fabian.jpg" title="PHARM FABIAN" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/photo/fabian.jpg"><img src="img/photo/fabian.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/ala.jpg" title="PHARM EBUKA" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/photo/ala.jpg"><img src="img/photo/ala.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/agustine.jpg" title="PHARM AGUSTINE" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/photo/agustine.jpg"><img src="img/photo/agustine.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/fabian.jpg" title="PHARM FABIAN" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/photo/fabian.jpg"><img src="img/photo/fabian.jpg" class="img-responsive " alt="img"></a></div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: products -->

        <!-- Section: testimonial -->
        <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

            <div class="carousel-reviews broun-block">
            <div class="container">
                <div class="row">
                <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-md-4 col-sm-6">
                        <div class="block-text rel zmin">
                            <a title="" href="#">WELLOVIT-OMEGA</a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                            </div>
                            <p>Thanks to jorax heathcare for recommending wellovit-omega capsules which helped to boost my immune system and protecting me from neuro disorder...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/betty.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">Betty Agbo</a>
                            <span>Enugu, Nigeria</span>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hidden-xs">
                        <div class="block-text rel zmin">
                            <a title="" href="#">CONSULTANCY SERVICES</a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                            <span
                                data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                            </div>
                            <p>jorax healthcare is a fast and reliable source for any healthcare information, they respond quickly whenever i call on them. contact jorax today and you wont regret it ...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/ben.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">Benjamin okokoh</a>
                            <span>Lagos, Nigeria</span>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                        <div class="block-text rel zmin">
                            <a title="" href="#">ANUREX-PAIN RELIEF</a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                            </div>
                            <p>I was having severe discomfort and pain caused by pile, jorax healthcare recommended annurex for me, which After 6 months of usage i got cured from pile  ...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/joy.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">Joy Eze</a>
                            <span>Nsukka, Nigeria</span>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
                        <div class="block-text rel zmin">
                            <a title="" href="#">DISTRIBUTION SERVICES</a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                            </div>
                            <p>With jorax healthcare, distance is never a barrier. Whenever i place an order , i get my healthcare products delivered at specified time ...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/mj.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">Maryjane</a>
                            <span>Ebonyi, Nigeria</span>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hidden-xs">
                        <div class="block-text rel zmin">
                            <a title="" href="#">HEALTH LIVING-WELLOVIT </a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                            <span
                                data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                            </div>
                            <p>I came across jorax advert about wellovit-omega and placed an order for one. The drug is amazing as it has helped improve my skin and boosts my immune system...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/ibiam.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">Ibiam Charles</a>
                            <span>Abuja, Nigeria</span>
                        </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                        <div class="block-text rel zmin">
                            <a title="" href="#">MEDICAL CONSULTANCY</a>
                            <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                            </div>
                            <p>For the past 2 years, i have trusted jorax healthcare for my personal health issues and they have never failed me. jorax gives maximum attention to customers ...</p>
                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                        </div>
                        <div class="person-text rel text-light">
                            <img src="img/testimonials/kossy.jpg" alt="" class="person img-circle" />
                            <a title="" href="#">kossy Abafor</a>
                            <span>Owerri, Nigeria</span>
                        </div>
                        </div>
                    </div>


                    </div>

                    <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </section>
        <!-- /Section: testimonial -->

        <!-- Contact Us -->
        {{-- @include('layouts.pricing') --}}

        <!-- Contact Us -->
        @include('layouts.contactus')

    </div>
    </div>

@endsection

