<table width="100%">
    <tr>
        <td colspan="4" style="text-align: center;"><h3>Dados Certificação</h3></td>
    </tr>
    <tr>
        <td><b>Código da certificação:</b></td>
        <td>{{ $data['certification']->report_code }}</td>
        <td><b>Data da certificação:</b></td>
        <td>{{ $data['certification']->date }}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center;"><h3>Dados do extintor</h3></td>
    </tr>
    <tr>
        <td><b>Código do extintor:</b></td>
        <td>{{ $data['extinguisher']->code }}</td>
        <td><b>Numeração:</b></td>
        <td>{{ $data['extinguisher']->numeration }}</td>
    </tr>
    <tr>
        <td><b>Capacidade: </b></td>
        <td>{{ $data['extinguisher']->capacity }}</td>
        <td><b>Carga:</b></td>
        <td>{{ $data['extinguisher']->charge }}</td>
    </tr>
    <tr>
        <td><b>Local: </b></td>
        <td>{{ $data['extinguisher']->location }}</td>
    </tr>
    <tr>
        <td><b>Data de geração desse relatório:</b></td>
        <td>{{ date('d/m/Y H:i') }}</td>
    </tr>
</table>
<br>
<h3 style="text-align: center;">Checklist</h3>
@foreach ($data['answers'] as $answer)
<p>{{ $answer->question->question }}: {{ $answer->alternative->alternative }}</p>
<p>Descrição: {{ $answer->description }}</p>
@endforeach

<h3 style="text-align: center;">Foto de identificação</h3>
{{--<img width="150px" src="data:image/jpeg;base64,{{ $data['answers'][0]->photo }}">--}}
<hr style="margin: 0 auto; width: 40%;">