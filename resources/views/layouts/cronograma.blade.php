<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-1">
            @foreach ($cronogramTADS as $element)
            <div class="col-12 mb-3 day">
                <div class="row text-light bg-dark py-2 font-weight-bold">
                    <div class="col-12 col-md-6 text-left">
                        {{$element[0]->dia_mes}} - {{$element[0]->dia_semana}}
                    </div>
                    <div class="col-12 col-md-6 text-right d-none d-md-block">Cronograma TADS</div>
                </div>
                @foreach ($element as $value)
                @if ($value->type != 'mini-curso')
                <div class="row hour">
                    <div class="py-2 col-12 col-md-3 col-lg-2 text-left bg-light text-dark font-weight-bold d-flex align-items-center">
                        {{substr($value->horario_inicio, 0,5)}} - {{substr($value->horario_fim, 0, 5)}}
                    </div>
                    <div class="item py-2 col-12 col-md-9 col-lg-10 text-left text-light" style="background-color: {{$value->cor}}">

                        <p class="text-left mb-0">
                            <strong>Título:</strong> {{$value->title}}
                        </p>

                        @if ($value->ministrante)
                        <p class="text-left my-0">
                            <b>Palestrante:</b> {{$value->ministrante}}
                        </p>
                        @endif
                        <p class="text-left my-0">
                            <b>Local:</b> {{$value->local}}
                        </p>

                    </div>
                </div>
                @endif
                @endforeach


                <div class="row hour">
                    <div class="py-2 col-12 col-md-3 col-lg-2 font-weight-bold text-dark d-flex align-items-center">
                        @for ($i = 0; $i
                        < sizeof($element); $i++) @if ($element[$i]->type == 'mini-curso')
                        {{substr($element[$i]->horario_inicio, 0, 5)}} - {{substr($element[$i]->horario_fim, 0, 5)}}
                        @break
                        @endif
                        @endfor
                    </div>
                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="col-12 px-0">
                            <div class="row">
                                @foreach ($element as $value)
                                @if ($value->type == 'mini-curso')
                                <div class="item item-secondary py-2 col-12 col-lg-6 text-left text-light" style="background-color: {{$value->cor}}">
                                    <p class="text-left my-0">
                                        <strong>Título:</strong> {{$value->title}}
                                    </p>

                                    <p class="text-left my-0">
                                        <b>Por:</b> {{$value->ministrante}}
                                    </p>
                                    <p class="text-left my-0">
                                        <b>Local:</b> {{$value->local}}
                                    </p>

                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
