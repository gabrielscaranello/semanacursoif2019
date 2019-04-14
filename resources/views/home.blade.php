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
                        <p>Diversos minicursos voltados para a área de tecnologia.</p>
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
                        <h5>Palestras</h5>
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
                        <p>Bate-papo, troca de informações e expriências entre os participantes.</p>
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
                        <p>Evento planejado com cuidado e qualidade.</p>
                    </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

            <div class="col-12 col-md-6">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".2s">

                    <div class="edu_feature_img">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                        <div class="edu_feature_text">
                            <h5>Contribuição</h5>
                            <p>Este ano a Semana de cursos do Eixo de Informação e Comunicação do IFPR — Campus Assis Chateaubriand está arrecadando alimentos para serem doados a instituições que atendem pessoas carentes no município. Para participar
                                dos nossos minicursos basta se inscrever e no dia traz consigo alimentos não perecíveis em um valor equivalente a 10 reais, contamos com a sua ajuda e esperamos a sua participação.</p>
                            <p>
                                <span class="note-donation">Observação: Essa contriução é necessaria apenas uma vez, você contribui e aproveita a semana toda.</span>
                            </p>
                        </div>
                    <!-- Single Feature Text Area End -->
                </div>
            </div>

            <div class="col-12 col-md-6">
                <!-- Single Feature Area Start -->
                <div class="edu_single_feature wow fadeInUp" data-wow-delay=".2s">

                    <div class="edu_feature_img">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <!-- Single Feature Image Area End -->
                        <div class="edu_feature_text">
                            <h5>Localização</h5>
                            <iframe class="location-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3633.378034364908!2d-53.50941838553872!3d-24.402930984271716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3a9c6591382c9%3A0x1455e88df731e652!2sIFPR%2C+Instituto+Federal+do+Paran%C3%A1+campus+Assis+Chateaubriand!5e0!3m2!1spt-BR!2sbr!4v1555271082940!5m2!1spt-BR!2sbr" frameborder="0" style="border:0" allowfullscreen></iframe>
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
    <div class="col-12 pb-3" v-if="!(images.length > 0)">
        <p class="text-center text-dark">
            Ainda não temos as fotos do evento, teremos em breve.
        </p>
    </div>

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
            <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
                <div class="single_advisor item wow fadeInUp w-100" data-wow-delay="0.4s">
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
                    <h3>Minicursos</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="row">
                        <div class="col-10">
                            <p class="my-0 py-0">
                                <strong>Atenção!</strong> Note que extistem minicursos ministrados pelo IIN e outros pelo TADS, atente-se ao escolher qual se cadastrar.
                            </p>
                            <p class="my-0 py-0">
                                As inscrições terão início em 15/04 - segunda-feira. Obrigado!
                            </p>
                        </div>
                        <div class="col-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="minicurso-select col-md-12 mb-3">
                <div @click="alterMiniCurso" :class="{'active': minicursoTurma == 'IIN'}">IIN</div>
            <div @click="alterMiniCurso" :class="{'active': minicursoTurma == 'TADS'}">TADS
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp minicurso-card" v-for="value in miniCursos" data-wow-delay=".2s" v-if="value.turma == minicursoTurma">
        <div class="single_latest_news_area m-bottom-15 single-item">
            <div class="single_latest_news_img_area">
                <div class="image-minicurso" :style="'background-image: url('+value.image+')'"></div>
                <!-- Catagory -->
                <a class="news-catagory bg-primary">
                    @{{value.category}}
                </a>
            </div>
            <div class="single_latest_news_text_area p-15">
                <a class="news-headline" href="#">
                    @{{value.name}}
                </a>
                <div class="post-meta">
                    <div class="col-12 p-0">
                        <a href="#"><i class="fa fa-user  mr-1" aria-hidden="true"></i>
                            @{{value.autors}}
                        </a>
                    </div>
                    <div class="col-12 p-0">
                        <a href="#"><i class="fa fa-calendar-o mr-1" aria-hidden="true"></i>
                            @{{value.day}}
                        </a>
                    </div>
                    <div class="col-12 p-0">
                        <a><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>
                            @{{value.hour}}
                        </a>
                    </div>

                    <div class="col-12 p-0">
                        <a class="text-lowercase">
                            <i class="fa fa-ticket-alt mr-1" aria-hidden="true"></i>
                            <span>
                                @{{value.vagas}} vagas</span>
                        </a>
                    </div>

                    <div class="col-12 p-0">
                        <a class="text-lowercase">
                            <i class="fa fa-check mr-1" aria-hidden="true"></i>
                            <span>
                                @{{value.vagas_preenchidas}} inscritos</span>
                        </a>
                    </div>
                </div>

                <a class="btn btn-pill btn-success m-top-15" @click.prevent.stop="registerMiniCurso(value.id, value.name)">Increver-se</a>
            </div>
        </div>
    </div>


    </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->


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

@endsection
