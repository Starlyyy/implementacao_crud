<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Novo Modulo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="d-flex mt-5">

            <!-- CONTEÚDO -->
            <main class="flex-fill content">

                <!-- TÍTULO + VOLTAR -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Novo módulo</h2>
                    <a href="<?= URL_BASE ?>/modulos" class="btn btn-outline-secondary">
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

                        <form action="<?= URL_BASE ?>/modulos/salvar" method="post" enctype="multipart/form-data">

                            <div class="row g-3">
                                <!-- Nome -->
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= $modulo['nome'] ?? '' ?>">
                                    <?php if (isset($erros['nome'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['nome'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Descrição -->
                                <div class="col-md-6">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <input type="text" class="form-control <?= isset($erros['descricao']) ? 'is-invalid' : '' ?>" id="descricao" name="descricao" value="<?= $modulo['descricao'] ?? '' ?>">
                                    <?php if (isset($erros['descricao'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['descricao'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Estrelas -->
                                <div class="col-md-6">
                                    <label for="min_estrelas_liberacao" class="form-label">Min. estrelas para liberar</label>
                                    <input type="number" class="form-control <?= isset($erros['min_estrelas_liberacao']) ? 'is-invalid' : '' ?>" id="min_estrelas_liberacao" name="min_estrelas_liberacao" value="<?= $modulo['min_estrelas_liberacao'] ?? '' ?>">
                                    <?php if (isset($erros['min_estrelas_liberacao'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['min_estrelas_liberacao'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Material de apoio -->
                                <div class="col-md-6">
                                    <label for="material_apoio" class="form-label">Material de apoio</label>
                                    <input type="text" class="form-control <?= isset($erros['material_apoio']) ? 'is-invalid' : '' ?>" id="material_apoio" name="material_apoio" value="<?= $modulo['material_apoio'] ?? '' ?>">
                                    <?php if (isset($erros['material_apoio'])): ?>
                                        <div class="invalid-feedback d-block"><?= $erros['material_apoio'] ?></div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>