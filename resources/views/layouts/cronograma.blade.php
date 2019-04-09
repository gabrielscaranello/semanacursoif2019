<div class="container">
    <table class="table table-borded" style="border-radius: .5rem; overflow: hidden;">
        <thead>
            <tr class="text-center w-100">
                Semana de cursos 2019
            </tr>
        </thead>
        @foreach ($cronograms as $day)
        <tr class="bg-dark text-light">
            <td>{{$day[0]->dia_mes}}</td>
            <td class="text-right">Cronograma TADS</td>
        </tr>
        @foreach ($day as $value)

        <tr>
            <td style="width: 15%;" class="bg-light text-dark">
                {{substr($value->horario_inicio, 0,5)}} - {{substr($value->horario_fim, 0,5)}}</td>

            <td style="width: 85%; background: {{$value->cor}}" class="text-light">
                {{$value->title}}
            </td>
        </tr>

        @endforeach
        @endforeach
    </table>

</div>
