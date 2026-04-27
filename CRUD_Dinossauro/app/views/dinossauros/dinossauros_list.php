<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Dinossauros</title>
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
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: #6c757d;
            border-bottom: 2px solid #dee2e6;
        }
        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-weight: 500;
            border-radius: 8px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark mb-0">
                <span class="fs-3 me-2">🦖</span>Dinossauros
            </h2>
            <a href="<?= URL_BASE ?>/dinossauros/cadastrar" class="btn btn-primary fw-semibold px-4 shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-plus-lg me-1"></i> Novo Dinossauro
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
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
                                    <td class="px-4 py-3 fw-medium text-dark"><?= $d['nome'] ?></td>
                                    <td class="px-4 py-3 text-secondary"><?= $d['especie'] ?? '-' ?></td>
                                    <td class="px-4 py-3 text-secondary"><?= $d['peso'] ?? '-' ?> kg</td>
                                    <td class="px-4 py-3 text-end">
                                        
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="<?= URL_BASE ?>/dinossauros/dinossauro?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-primary btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>

                                            <?php if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['perfil'] === 'admin'): ?>

                                                <a href="<?= URL_BASE ?>/dinossauros/editar?id=<?= $d['id'] ?>" class="btn btn-sm btn-outline-warning btn-action">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>

                                                <a href="<?= URL_BASE ?>/dinossauros/excluir?id=<?= $d['id'] ?>"
                                                    class="btn btn-sm btn-outline-danger btn-action"
                                                    onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                                                    <i class="bi bi-trash"></i> Excluir
                                                </a>

                                            <?php endif; ?>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</body>

</html>