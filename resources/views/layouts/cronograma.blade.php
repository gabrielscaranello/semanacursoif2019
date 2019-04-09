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

<div class="col-12">
    <div class="row">
        <div class="col-12">Cronograma</div>
        <div class="col-12">

            @foreach ($cronograms as $element)
              <div class="row">
                  <div class="col-3 text-left">
                    {{$element[0]->dia_mes}} - {{$element[0]->dia_semana}}
                  </div>
                  <div class="col-9 text-right">tads</div>
              </div>
              @foreach ($element as $value)
                @if ($value->type != 'mini-curso')
                  <div class="col-3 text-left">
                    {{$value->horario_inicio}} - {{$value->horario_fim}}
                  </div>
                  <div class="col-9 text-right">tads</div>
                @endif
              @endforeach
            @endforeach
        </div>
    </div>
</div>
