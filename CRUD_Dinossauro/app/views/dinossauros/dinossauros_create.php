<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= isset($dinossauro['id']) ? 'Editar' : 'Novo' ?> Dinossauro</title>
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
        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.4rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.6rem 1rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
        }
    </style>
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark mb-0">
                    <span class="fs-3 me-2"><?= isset($dinossauro['id']) ? '📝' : '✨' ?></span>
                    <?= isset($dinossauro['id']) ? 'Editar' : 'Cadastrar' ?> Dinossauro
                </h2>

                <a href="<?= URL_BASE ?>/dinossauros" class="btn btn-outline-secondary btn-action bg-white">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <form method="POST"
                          action="<?= URL_BASE ?>/dinossauros/<?= isset($dinossauro['id']) ? 'atualizar' : 'salvar' ?>">

                        <?php if (isset($dinossauro['id'])): ?>
                            <input type="hidden" name="id" value="<?= $dinossauro['id'] ?>">
                        <?php endif; ?>

                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">Nome do Dinossauro</label>
                                <input type="text" name="nome" class="form-control" placeholder="Ex: Tiranossauro Rex"
                                       value="<?= $dinossauro['nome'] ?? '' ?>">
                                
                                <?php if (isset($erros['nome'])): ?>
                                    <div class="text-danger small mt-1 fw-medium">
                                        <i class="bi bi-exclamation-circle me-1"></i> <?= $erros['nome'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Espécie</label>
                                <input type="text" name="especie" class="form-control" placeholder="Ex: Theropoda"
                                       value="<?= $dinossauro['especie'] ?? '' ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Peso (kg)</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="peso" class="form-control" placeholder="0.00"
                                           value="<?= $dinossauro['peso'] ?? '' ?>">
                                    <span class="input-group-text bg-light text-secondary border-start-0" style="border-radius: 0 8px 8px 0;">kg</span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">URL da Imagem</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary border-end-0" style="border-radius: 8px 0 0 8px;">
                                        <i class="bi bi-link-45deg"></i>
                                    </span>
                                    <input type="text" name="imagem" class="form-control border-start-0" placeholder="https://..."
                                           value="<?= $dinossauro['imagem'] ?? '' ?>">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 text-secondary">

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-action px-4">
                                <?= isset($dinossauro['id']) ? '<i class="bi bi-check2-circle"></i> Atualizar Registro' : '<i class="bi bi-plus-circle"></i> Salvar Dinossauro' ?>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>