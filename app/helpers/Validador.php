<?php 

namespace app\helpers;

class Validador{
    public static function validarModulo(array $data): array{
        $erros = [];

        if (empty($data['nome'])) {
            $erros['nome'] = 'O nome do módulo é obrigatório.';
        }

        if (empty($data['descricao'])) {
            $erros['descricao'] = 'A descrição do módulo é obrigatória.';
        }

        if (empty($data['min_estrelas_liberacao']) || !is_numeric($data['min_estrelas_liberacao']) || $data['min_estrelas_liberacao'] < 0) {
            $erros['min_estrelas_liberacao'] = 'O mínimo de estrelas para liberação deve ser um número inteiro não negativo.';
        }

        return $erros;
    }

    public static function validarFase(array $data): array{
        $erros = [];

        if (empty($data['nome'])) {
            $erros['nome'] = 'O nome da fase é obrigatório.';
        }

        if (empty($data['id_modulo']) || !is_numeric($data['id_modulo']) || $data['id_modulo'] <= 0) {
            $erros['id_modulo'] = 'O ID do módulo é obrigatório.';
        }

        if (empty($data['tipo_fase'])) {
            $erros['tipo_fase'] = 'O tipo da fase deve ser selecionada.';
        }

        if (empty($data['conteudo'])) {
            $erros['conteudo'] = 'O conteúdo da fase é obrigatório.';
        }

        return $erros;
    }
}