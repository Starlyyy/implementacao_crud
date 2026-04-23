<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Implementacao CRUD Fases</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Listagem de fases</h2>
            <div>
                <a href="<?= URL_BASE ?>/modulos" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left"></i> Voltar aos Módulos
                </a>
                <a href="<?= URL_BASE ?>/fases/cadastrar" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Nova Fase
                </a>
            </div>
        </div>

        <!-- CARD COM TABELA -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Tipo de Fase</th>
                                <th class="px-4 py-3">Conteúdo</th>
                                <th class="px-4 py-3 text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $fase): ?>
                                <tr>
                                    <td class="px-4 py-3 align-middle"><?= $fase['nome'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $fase['tipo_fase'] ?></td>
                                    <td class="px-4 py-3 align-middle"><?= $fase['conteudo'] ?></td>
                                    <td class="px-4 py-3 align-middle text-end">
                                        <a href="<?= URL_BASE ?>/fases/excluir?id=<?= $fase['id_fase'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir esta fase?')">
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