<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Módulo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><?= isset($modulo['id_modulo']) ? 'Editar' : 'Novo' ?> Modulo</h2>
            <a href="<?= URL_BASE ?>/modulos" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/modulos/<?= isset($modulo['id_modulo']) ? 'atualizar' : 'salvar' ?>" method="post">
                    <?php if (isset($modulo['id_modulo'])): ?>
                        <input type="hidden" name="id" value="<?= $modulo['id_modulo'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $modulo['nome'] ?? '' ?>">
                        <?php if (isset($erros['nome'])): ?>
                            <div class="text-danger small"><?= $erros['nome'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= $modulo['descricao'] ?? '' ?></textarea>
                        <?php if (isset($erros['descricao'])): ?>
                            <div class="text-danger small"><?= $erros['descricao'] ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="min_estrelas_liberacao" class="form-label">Mínimo de Estrelas</label>
                        <input type="number" class="form-control" id="min_estrelas_liberacao" name="min_estrelas_liberacao" value="<?= $modulo['min_estrelas_liberacao'] ?? '' ?>">
                        <?php if (isset($erros['min_estrelas_liberacao'])): ?>
                            <div class="text-danger small"><?= $erros['min_estrelas_liberacao'] ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="material_apoio" class="form-label">Material de Apoio</label>
                        <input type="text" class="form-control" id="material_apoio" name="material_apoio" value="<?= $modulo['material_apoio'] ?? '' ?>">
                        <?php if (isset($erros['material_apoio'])): ?>
                            <div class="text-danger small"><?= $erros['material_apoio'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> <?= isset($modulo['id_modulo']) ? 'Atualizar' : 'Salvar' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
