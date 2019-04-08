<table class="table table-striped">
    <thead>
        <th>
        <td>
            Semana de Cursos 2019
        </td>
        </th>
    </thead>
    @foreach ($cronograms as $value)
    <tr>
        <td>
            {{$value->dia_mes}}
            {{$value->dia_semana}}
        </td>
        <td>
            PROGRAMAÇÃO SEMANA DE CURSOS TADS
        </td>
    </tr>
    @foreach ($value as $element)
    <tr>
        <td>
            {{$element->hora_inicio}} - {{$element->hora_fim}}
        </td>
        <td>
          {{$element->title}}
        </td>
    </tr>
    @endforeach
    @endforeach
</table>
