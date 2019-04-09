@extends('layouts.app')

@section('onlypagestyle')
<link href="{!!asset('assets/site/css/home.css')!!}" rel="stylesheet">
<link href="{!!asset('assets/site/css/cronogram.css')!!}" rel="stylesheet">
@endsection
@section('onlypagescript')

@endsection

@section('content')

<section id="inicio">
    <div id="carouselTop" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselTop" data-slide-to="0" class="active"></li>
            <li data-target="#carouselTop" data-slide-to="1"></li>
            <li data-target="#carouselTop" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{!!asset('/assets/site/img/bg-img/semana-de-cursos-ifpr-tads-2019.png')!!}" alt="Semana de cursos ifpr 2019" title="Semana de cursos ifpr 2019">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{!!asset('/assets/site/img/bg-img/semana-de-cursos-ifpr-tads-2019-02.png')!!}" alt="Semana de cursos ifpr 2019" title="Semana de cursos ifpr 2019">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{!!asset('/assets/site/img/bg-img/semana-de-cursos-ifpr-tads-2019-03.png')!!}" alt="Semana de cursos ifpr 2019" title="Semana de cursos ifpr 2019">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselTop" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselTop" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<!-- ***** Feature Area Start ***** -->
<section class="special_feature_area education-version section_padding_100_70" id="evento">
    <div class="container wow fadeInUp" data-wow-delay=".1s">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h3>O Evento</h3>
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
                        <h5>Minicursos</h5>
                        <p>Diversos mini cursos voltados para a área de tecnologia.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".4s">
                    <div class="edu_feature_img">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                    <div class="edu_feature_text">
                        <h5>Palestra</h5>
                        <p>Palestras com profissionais e empresários.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".6s">
                    <div class="edu_feature_img">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                    <div class="edu_feature_text">
                        <h5>Compartilhamento</h5>
                        <p>Bate papo, troca de informações e expriência entre os participantes.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".8s">
                    <div class="edu_feature_img">
                        <i class="fa fa-th" aria-hidden="true"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                    <div class="edu_feature_text">
                        <h5>Organização</h5>
                        <p>Evento previamente planejado com cuidado excelência.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Special Feature Area End ***** -->


<!-- ***** Feature Area Start ***** -->
<section class="special_feature_area education-version section_padding_100_70" id="cronograma">
    <div class="container wow fadeInUp" data-wow-delay=".4s">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-clock" aria-hidden="true"></i>
                    <h3>Cronograma</h3>
                </div>
            </div>
        </div>
        @include('layouts.cronograma')
    </div>
</section>
<!-- ***** Special Feature Area End ***** -->




<!-- ***** Gallery area start ***** -->
<section class="gallery_area education-version section_padding_100_0 clearfix" id="galeria">
    <div class="container wow fadeInUp" data-wow-delay=".4s">
        <div class="row">
            <div class="col-12">
                <div class="edu_section_heading">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <h3>Galeria de Fotos</h3>
                </div>
            </div>
        </div>
    </div>
    <img class="image gallery-image wow fadeInUp" data-wow-delay=".6s" v-for="(image, i) in images" :src="image" :key="i" @click="index = i">
    <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>

</section>
<!-- ***** Gallery area end ***** -->

<!-- ***** Our Advisor Area Start ***** -->
<section class="our_advisor_area education-version clearfix section_padding_100_70" id="palestras">
    <div class="container wow fadeInUp" data-wow-delay=".2s">
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
                <div class="single_advisor item wow fadeInUp" data-wow-delay="0.4s">
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
    <div class="container wow fadeInUp" data-wow-delay=".2s">
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
            <div class="col-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".4s">
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
