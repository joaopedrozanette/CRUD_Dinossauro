<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Dinossauro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
        }
        .img-container {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        .info-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        .info-value {
            font-size: 1.15rem;
            font-weight: 500;
            color: #212529;
        }
        .info-block {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1rem 1.25rem;
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">

            <?php if (isset($dinossauro)): ?>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark mb-0">
                        <span class="fs-3 me-2">🦖</span><?= $dinossauro['nome'] ?>
                    </h2>
                    <a href="<?= URL_BASE ?>/dinossauros" class="btn btn-outline-secondary btn-action bg-white shadow-sm">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <div class="row g-4 align-items-center">

                            <div class="col-md-5">
                                <div class="img-container d-flex align-items-center justify-content-center">
                                    
                                    <?php if (!empty($dinossauro['imagem'])): ?>
                                        <img src="<?= $dinossauro['imagem'] ?>" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Imagem do <?= $dinossauro['nome'] ?>">
                                    <?php else: ?>
                                        <div class="text-muted text-center">
                                            <i class="bi bi-image" style="font-size: 3.5rem; opacity: 0.5;"></i>
                                            <p class="mt-2 mb-0 fw-medium">Sem imagem</p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="col-md-7">

                                <h4 class="fw-bold text-primary border-bottom pb-2 mb-4">
                                    <i class="bi bi-info-circle me-2"></i>Ficha Técnica
                                </h4>

                                <div class="d-flex flex-column gap-3">
                                    
                                    <div class="info-block border border-light">
                                        <div class="info-label"><i class="bi bi-tag-fill me-1"></i> Espécie</div>
                                        <div class="info-value"><?= $dinossauro['especie'] ?? 'Não informada' ?></div>
                                    </div>

                                    <div class="info-block border border-light">
                                        <div class="info-label"><i class="bi bi-speedometer2 me-1"></i> Peso Estimado</div>
                                        <div class="info-value">
                                            <?= isset($dinossauro['peso']) ? $dinossauro['peso'] . ' <span class="text-muted fs-6">kg</span>' : '-' ?>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            <?php else: ?>

                <div class="text-center py-5">
                    <i class="bi bi-search text-secondary opacity-50 mb-3" style="font-size: 4rem;"></i>
                    <h3 class="fw-bold text-dark">Dinossauro não encontrado</h3>
                    <p class="text-muted mb-4">O registro que você está procurando não existe ou foi removido.</p>
                    <a href="<?= URL_BASE ?>/dinossauros" class="btn btn-primary btn-action px-4">
                        <i class="bi bi-arrow-left"></i> Voltar para a lista
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

</body>
</html>