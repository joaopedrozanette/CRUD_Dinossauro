<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Novo Dinossauro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🦖 Novo Dinossauro</h2>
        <a href="<?= URL_BASE ?>/dinossauros" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= URL_BASE ?>/dinossauros/salvar" method="post">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Espécie</label>
                        <input type="text" name="especie" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Peso (kg)</label>
                        <input type="number" step="0.01" name="peso" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Imagem (URL)</label>
                        <input type="text" name="imagem" class="form-control">
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <button class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Salvar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>