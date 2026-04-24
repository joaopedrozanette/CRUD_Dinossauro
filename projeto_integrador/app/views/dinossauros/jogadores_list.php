<h1>Galeria de Dinossauros</h1>

<?php if (App\Core\Auth::isLogged()): ?>
    <a href="/dinossauros/novo" style="background: green; color: white; padding: 10px; text-decoration: none;">+ Cadastrar Novo</a>
<?php endif; ?>

<table border="1" style="width: 100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dinossauros as $d): ?>
        <tr>
            <td><?= htmlspecialchars($d['nome']) ?></td>
            <td><?= htmlspecialchars($d['especie']) ?></td>
            <td>
                <a href="/dinossauros/ver?id=<?= $d['id'] ?>">Visualizar</a>
                
                <?php if (App\Core\Auth::isLogged()): ?>
                    | <a href="/dinossauros/editar?id=<?= $d['id'] ?>">Editar</a>
                    | <a href="/dinossauros/excluir?id=<?= $d['id'] ?>" onclick="return confirm('Excluir este dinossauro?')">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>