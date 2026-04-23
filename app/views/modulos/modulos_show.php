<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Dados do modulo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <?php if (isset($modulo)): ?>
            <!-- TÍTULO + VOLTAR -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Detalhes do modulo <i><?= $modulo['nome'] ?></i></h2>
                <a href="<?= URL_BASE ?>/modulos" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar para Lista
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-2">

                        <!-- INFO -->
                        <div class="col-12">
                            <div class="mb-3">
                                <h3 class="mb-0 text-primary text-center"><?= $modulo['nome'] ?></h3>
                            </div>

                            <hr class="my-4">

                            <div class="row g-3 ">
                                <div class="col-sm-4 p-3">
                                    <small class="text-muted d-block uppercase text-xs">Descricao</small>
                                    <span class="fw-bold"><?= $modulo['descricao'] ?? 'Não informada' ?></span>
                                </div>
                                <div class="col-sm-4 p-3">
                                    <small class="text-muted d-block uppercase text-xs">Min. estrelas para liberar:</small>
                                    <span class="fw-bold"><?= $modulo['min_estrelas_liberacao'] ?? 'Não informado' ?></span>
                                </div>
                                <div class="col-sm-4 p-3">
                                    <small class="text-muted d-block uppercase text-xs">Material de apoio:</small>
                                    <span class="fw-bold"><?= $modulo['material_apoio'] ?? 'Não informado' ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Modulo não encontrado.
                <div class="mt-3">
                    <a href="<?= URL_BASE ?>/modulos" class="btn btn-warning">Voltar para Lista</a>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>