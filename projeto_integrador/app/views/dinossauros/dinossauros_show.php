<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Dinossauro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

<?php if (isset($dinossauro)): ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🦖 <?= $dinossauro['nome'] ?></h2>
        <a href="<?= URL_BASE ?>/dinossauros" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row g-4">

                <!-- IMAGEM -->
                <div class="col-md-4">
                    <div class="border rounded d-flex align-items-center justify-content-center bg-light" style="height: 250px; overflow: hidden;">
                        
                        <?php if (!empty($dinossauro['imagem'])): ?>
                            <img src="<?= $dinossauro['imagem'] ?>" class="img-fluid" style="object-fit: cover; height:100%;">
                        <?php else: ?>
                            <div class="text-muted text-center">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                                <p>Sem imagem</p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- INFO -->
                <div class="col-md-8">

                    <h4 class="text-primary mb-3">Informações</h4>

                    <p><strong>Espécie:</strong> <?= $dinossauro['especie'] ?? 'Não informada' ?></p>
                    <p><strong>Peso:</strong> <?= $dinossauro['peso'] ?? '-' ?> kg</p>

                </div>

            </div>

        </div>
    </div>

<?php else: ?>

    <div class="alert alert-warning">
        Dinossauro não encontrado.
    </div>

<?php endif; ?>

</div>

</body>
</html>