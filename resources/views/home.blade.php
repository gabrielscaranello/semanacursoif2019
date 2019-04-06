@extends('layouts.app')

@section('onlypagestyle')
<link href="{!!asset('assets/site/css/home.css')!!}" rel="stylesheet">
@endsection
@section('onlypagescript')

@endsection

@section('content')
<!-- ***** Feature Area Start ***** -->
<section class="special_feature_area education-version section_padding_100_70" id="evento">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h3>o evento</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".2s">
                    <div class="edu_feature_img">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                    <div class="edu_feature_text">
                        <h5>Awesome Courses</h5>
                        <p>Classy is completely creative, clean &amp; 100% responsive website.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Special Feature Area End ***** -->



<!-- ***** Gallery area start ***** -->
<section class="gallery_area education-version section_padding_100_0 clearfix" id="galeria">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <h3>Photo Gallery</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery_full_width_images_area clearfix">

        @foreach ($gallery as $value)
        <!-- Single gallery Item Start -->
        <div class="single_gallery_item">
            <img src="{{$value->image}}" alt="">
            <!-- Hover Effect -->
            <div class="hover_overlay">
                <div class="classy-table">
                    <div class="classy-table-cell">
                        <div class="gallery_info">
                            <h6>{{$value->title}}</h6>
                            <p>{{$value->subtitle}}</p>
                        </div>
                        <div class="more_details text-center">
                            <a class="gallery_img" href="{{$value->image}}"><i class="pe-7s-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</section>
<!-- ***** Gallery area end ***** -->

<!-- ***** Our Advisor Area Start ***** -->
<section class="our_advisor_area education-version clearfix section_padding_100_70" id="palestras">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h3>Palestras</h3>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($palestras as $value)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single_advisor item wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Single advisor profile thumb -->
                    <div class="advisor_thumb image-palestra" style="background-image: url({!!($value->photo)!!})">
                        {{-- <img src="{!!asset($value->photo)!!}" alt="{{$value->name}}" title="{{$value->name}}">
                        <div></div> --}}

                        <div class="advisor_name">
                            <h5>{{$value->palestrante}}</h5>
                            <p>{{$value->name}}</p>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- ***** Our advisor Area End ***** -->





<!-- ***** Blog Area Start ***** -->
<section class="blog_area education-version section_padding_100_70" id="mini-cursos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fas fa-book-open"></i>
                    <h3>Mini Cursos</h3>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($miniCursos as $value)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single_latest_news_area m-bottom-15">
                    <div class="single_latest_news_img_area">
                        <div class="image-minicurso" style="background-image: url({!!($value->image)!!})"></div>
                        <!-- Catagory -->
                        <a class="news-catagory bg-primary">{{$value->category}}</a>
                    </div>
                    <div class="single_latest_news_text_area p-15">
                        <a class="news-headline" href="#">{{$value->title}}</a>
                        <div class="post-meta">
                            <div class="col-12 p-0">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{$value->autors}}</a>
                            </div>
                            <div class="col-12 p-0">
                                <a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{$value->day}}</a>
                            </div>
                            <div class="col-12 p-0">
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                        <p class="mini-curso-descript">{!!strip_tags(substr($value->descript, 0, 100))!!}</p>
                        <a class="btn btn-pill btn-success m-top-15" href="#">Increver-se</a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->

@endsection
