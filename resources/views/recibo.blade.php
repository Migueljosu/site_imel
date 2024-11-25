<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Inscrição</title>
</head>

<body>

    <h1>Recibo de Inscrição</h1>
    <p><strong>Aluno:</strong> {{ $aluno->nome }} {{ $aluno->sobrenome }}</p>
    <p><strong>Número de Processo:</strong> {{ $aluno->num_processo }}</p>
    <p><strong>Recursos:</strong></p>
    
    @foreach ($recursos as $recurso)
        @php
            $disciplina = $disciplinas->get($loop->index); // Acessa a disciplina mapeada
        @endphp

        @if ($disciplina)
            <p>Disciplina: {{ $disciplina }}</p> <!-- Exibe o nome da disciplina -->
        @else
            <p>Disciplina não encontrada.</p> <!-- Caso a disciplina seja null -->
        @endif
    @endforeach

    
    
</body>

</html>
