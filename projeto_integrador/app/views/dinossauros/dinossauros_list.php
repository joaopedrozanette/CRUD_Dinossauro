<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Dinossauros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🦖 Dinossauros</h2>
        <a href="<?= URL_BASE ?>/dinossauros/cadastrar" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Novo
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Espécie</th>
                        <th class="px-4 py-3">Peso</th>
                        <th class="px-4 py-3 text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($lista as $d): ?>
                        <tr>
                            <td class="px-4 py-3"><?= $d['nome'] ?></td>
                            <td class="px-4 py-3"><?= $d['especie'] ?? '-' ?></td>
                            <td class="px-4 py-3"><?= $d['peso'] ?? '-' ?> kg</td>
                            <td class="px-4 py-3 text-end">

                                <a href="<?= URL_BASE ?>/dinossauros/dinossauro?id=<?= $d['id'] ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>