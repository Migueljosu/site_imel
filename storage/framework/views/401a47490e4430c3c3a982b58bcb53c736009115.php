<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Inscrição</title>
</head>

<body>

    <h1>Recibo de Inscrição</h1>
    <p><strong>Aluno:</strong> <?php echo e($aluno->nome); ?> <?php echo e($aluno->sobrenome); ?></p>
    <p><strong>Número de Processo:</strong> <?php echo e($aluno->num_processo); ?></p>
    <p><strong>Recursos:</strong></p>
    
    <?php $__currentLoopData = $recursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recurso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $disciplina = $disciplinas->get($loop->index); // Acessa a disciplina mapeada
        ?>

        <?php if($disciplina): ?>
            <p>Disciplina: <?php echo e($disciplina); ?></p> <!-- Exibe o nome da disciplina -->
        <?php else: ?>
            <p>Disciplina não encontrada.</p> <!-- Caso a disciplina seja null -->
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    
</body>

</html>
<?php /**PATH C:\Users\user\OneDrive\Ambiente de Trabalho\site_imel\resources\views/recibo.blade.php ENDPATH**/ ?>