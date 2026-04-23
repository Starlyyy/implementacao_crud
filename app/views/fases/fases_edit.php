<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Fase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0"><?= isset($fase['id_fase']) ? 'Editar' : 'Nova' ?> Fase</h2>
            <a href="<?= URL_BASE ?>/fases/fases_list" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/fases/<?= isset($fase['id_fase']) ? 'atualizar' : 'salvar' ?>" method="post">
                    <?php if (isset($fase['id_fase'])): ?>
                        <input type="hidden" name="id" value="<?= $fase['id_fase'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $fase['nome'] ?? '' ?>">
                        <?php if (isset($erros['nome'])): ?>
                            <div class="text-danger small"><?= $erros['nome'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_fase" class="form-label">Tipo de fase</label>
                        <select name="tipo_fase" id="tipo_fase" class="form-control">
                            <option value="">Selecione o tipo de fase</option>
                            <option value="Q" <?= (isset($fase['tipo_fase']) && $fase['tipo_fase'] === 'Q') ? 'selected' : '' ?>>Questao</option>
                            <option value="P" <?= (isset($fase['tipo_fase']) && $fase['tipo_fase'] === 'P') ? 'selected' : '' ?>>Pratica | Simulacao</option>
                        </select>
                        <?php if (isset($erros['tipo_fase'])): ?>
                            <div class="text-danger small"><?= $erros['tipo_fase'] ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="conteudo" class="form-label">Conteúdo</label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="3"><?= $fase['conteudo'] ?? '' ?></textarea>
                        <?php if (isset($erros['conteudo'])): ?>
                            <div class="text-danger small"><?= $erros['conteudo'] ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_modulo" class="form-label">Módulo</label>
                        <select name="id_modulo" id="id_modulo" class="form-control">
                            <option value="">Selecione o módulo</option>
                            <?php foreach ($modulos as $modulo): ?>
                                <option value="<?= $modulo['id_modulo'] ?>" <?= (isset($fase['id_modulo']) && $fase['id_modulo'] == $modulo['id_modulo']) ? 'selected' : '' ?>>
                                    <?= $modulo['nome'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($erros['id_modulo'])): ?>
                            <div class="text-danger small"><?= $erros['id_modulo'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> <?= isset($fase['id_fase']) ? 'Atualizar' : 'Salvar' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
