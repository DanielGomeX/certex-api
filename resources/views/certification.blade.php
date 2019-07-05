<table width="100%">
    <tr>
        <td><b>Código da certificação:</b></td>
        <td>{{ $data['certification']->report_code }}</td>
        <td><b>Data da certificação:</b></td>
        <td>{{ $data['certification']->date }}</td>
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
