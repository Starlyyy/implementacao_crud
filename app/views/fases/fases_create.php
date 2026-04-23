<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Nova Fase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="d-flex mt-5">

            <!-- CONTEÚDO -->
            <main class="flex-fill content">

                <!-- TÍTULO + VOLTAR -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Nova Fase</h2>
                    <a href="<?= URL_BASE ?>/fases/fases_list" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>

                <!-- ALERTAS DE ERRO -->
                <?php if (isset($erros) && !empty($erros)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erros encontrados:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($erros as $erro): ?>
                                <li><?= $erro ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- CARD COM FORMULÁRIO -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <form action="<?= URL_BASE ?>/fases/salvar" method="post" enctype="multipart/form-data">

                            <div class="row g-3">
                                <!-- Nome -->
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= $fase['nome'] ?? '' ?>">
                                    <?php if (isset($erros['nome'])): ?>
                                        <div class="invalid-feedback"><?= $erros['nome'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- tipo de fase -->
                                <div class="col-md-6">
                                    <label for="tipo_fase" class="form-label">Tipo de fase</label>
                                    <select name="tipo_fase" id="tipo_fase" class="form-control <?= isset($erros['tipo_fase']) ? 'is-invalid' : '' ?>">
                                        <option value="">Selecione o tipo</option>
                                        <option value="P" <?= (isset($fase['tipo_fase']) && $fase['tipo_fase'] === 'P') ? 'selected' : '' ?>>Prática</option>
                                        <option value="Q" <?= (isset($fase['tipo_fase']) && $fase['tipo_fase'] === 'Q') ? 'selected' : '' ?>>Questão</option>
                                    </select>
                                    <?php if (isset($erros['tipo_fase'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['tipo_fase'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- conteudo -->
                                <div class="col-md-12">
                                    <label for="conteudo" class="form-label">Conteúdo</label>
                                    <textarea class="form-control <?= isset($erros['conteudo']) ? 'is-invalid' : '' ?>" id="conteudo" name="conteudo" rows="4"><?= $fase['conteudo'] ?? '' ?></textarea>
                                    <?php if (isset($erros['conteudo'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['conteudo'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Modulo -->
                                <div class="col-md-6">
                                    <label for="id_modulo" class="form-label">Módulo</label>
                                    <select name="id_modulo" id="id_modulo" class="form-control <?= isset($erros['id_modulo']) ? 'is-invalid' : '' ?>">
                                        <option value="">Selecione o módulo</option>
                                        <?php foreach ($modulos as $modulo): ?>
                                            <option value='<?= $modulo['id_modulo'] ?>' <?= (isset($fase['id_modulo']) && $fase['id_modulo'] == $modulo['id_modulo']) ? 'selected' : '' ?>>
                                                <?= $modulo['nome'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($erros['id_modulo'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['id_modulo'] ?></div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <!-- Botão Salvar -->
                            <div class="mt-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-check-circle"></i> Salvar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </main>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>