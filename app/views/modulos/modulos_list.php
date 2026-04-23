<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Implementacao CRUD modulos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="styleshxeet">
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Listagem de modulos</h2>
            <a href="<?= URL_BASE ?>/modulos/cadastrar" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Modulo
            </a>
        </div>

        <!-- CARD COM TABELA -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Descrição</th>
                                <th class="px-4 py-3">Mínimo de Estrelas para Liberação</th>
                                <th class="px-4 py-3">Material de Apoio</th>
                                <th class="px-4 py-3 text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $modulo): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><a href='<?= URL_BASE ?>/fases/fases_list?id_modulo=<?= $modulo['id_modulo'] ?>'><?= $modulo['nome'] ?></a></td>
                                    <td class="px-4 py-3 align-middle"><?= $modulo['descricao'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $modulo['min_estrelas_liberacao'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $modulo['material_apoio'] ?></td>
                                    <td class="px-4 py-3 align-middle text-end">
                                        <a href='<?= URL_BASE ?>/modulos/modulo?id=<?= $modulo['id_modulo'] ?>' class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="<?= URL_BASE ?>/modulos/editar?id=<?= $modulo['id_modulo'] ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="<?= URL_BASE ?>/modulos/excluir?id=<?= $modulo['id_modulo'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir este módulo?')">
                                            <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>