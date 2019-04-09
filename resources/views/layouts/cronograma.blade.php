{{-- <div class="container">
    <table class="table table-borded" style="border-radius: .5rem; overflow: hidden;">
        <thead>
            <tr class="text-center w-100">
                Semana de cursos 2019
            </tr>
        </thead>
        @foreach ($cronograms as $day)
        <tr class="bg-dark text-light">
            <th>{{$day[0]->dia_mes}}</th>
<th class="text-right" colspan="5">Cronograma TADS</th>
</tr>
@foreach ($day as $value)

@if ($value->type != 'mini-curso')
<tr>
    <td class="bg-light text-dark">
        {{substr($value->horario_inicio, 0,5)}} - {{substr($value->horario_fim, 0,5)}}</td>

    <td style="background: {{$value->cor}}" class="text-light">
        {{$value->title}}
    </td>
</tr>
@endif
@endforeach
<th colspan="5">

</th>
<tr>
    @php
    $cont = 0;
    @endphp
    @foreach ($day as $key => $value)
    @if ($value->type == 'mini-curso' && $cont< 1) <td class="bg-light text-dark">
        {{substr($value->horario_inicio, 0,5)}} - {{substr($value->horario_fim, 0,5)}}
        </td>
        @php
        $cont = 1;
        @endphp
        @endif
        @if ($value->type == 'mini-curso')
        <td style="background: {{$value->cor}}" class="text-light">
            {{$value->title}}
        </td>
        @endif

        @endforeach
</tr>

@endforeach
</table>

</div> --}}

<div class="container">
    <div class="col-12 rounded">
        <div class="row">
            <div class="col-12">
                @foreach ($cronograms as $element)
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
                            <p class="text-center">
                                {{$value->title}}
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
                                        <p class="text-center">
                                            {{$value->title}}
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
</div>
