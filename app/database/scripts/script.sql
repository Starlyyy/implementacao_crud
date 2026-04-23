create table if not exists modulos(
    id_modulo INT AUTO_INCREMENT PRIMARY KEY,
    nome CHAR(50) NOT NULL,
    descricao VARCHAR(2000) NOT NULL,
    min_estrelas_liberacao INT(3) NOT NULL,
    material_apoio VARCHAR(200) NOT NULL
);

create table if not exists fases(
    id_fase INT AUTO_INCREMENT PRIMARY KEY,
    id_modulo INT,
    tipo_fase CHAR(1) NOT NULL,
    nome CHAR(50) NOT NULL,
    conteudo VARCHAR(2000) NOT NULL,
    
    CONSTRAINT fk_fase_modulo
        FOREIGN KEY (id_modulo)
        REFERENCES modulos(id_modulo)
);

-- NOTAS PARA O PROFESSOR: As colunas em comentario se tratam de atributos que mais dizem sobre as relacoes com outras tabelas e/ou funcionalidades da aplicacao; Para uma implementacao mais facil, optei por remove-las.

-- INSERTS NA TABELA MODULO
INSERT INTO modulos (nome, descricao, min_estrelas_liberacao, material_apoio) VALUES
('Introdução', 'Conceitos básicos e primeiros passos no sistema.', 0, 'manual_intro.pdf'),
('Hardware', 'Aprendizado sobre peças e componentes de celulares.', 3, 'hardware_guia.pdf'),
('Software', 'Instalação de sistemas, aplicativos e manutenção.', 6, 'software_tutorial.pdf');


-- INSERTS NA TABELA FASE
-- Q: Questao; P: Pratica [Propenso a mudancas futuras na implementacao real do PI]
INSERT INTO fases (id_modulo, tipo_fase, nome, conteudo) VALUES

(1, 'Q', 'Boas-vindas', 'Qual a função principal do sistema?'),
(1, 'Q', 'Primeiros Passos','Como acessar o menu principal?'),
(1, 'P', 'Teste Inicial', 'Complete o cadastro inicial.'),

(2, 'Q', 'Peças Internas', 'Qual componente armazena energia?'),
(2, 'Q', 'Tela Touch', 'Qual peça exibe imagem?'),
(2, 'P', 'Montagem', 'Monte corretamente o aparelho.'),

(3, 'Q', 'Sistema Operacional', 'Qual sistema é comum em celulares?'),
(3, 'Q', 'Aplicativos', 'Onde baixar apps?'),
(3, 'P', 'Formatação', 'Realize backup antes da formatação.');