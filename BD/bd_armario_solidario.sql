CREATE DATABASE armarinho_teste;
USE armarinho_teste;

CREATE TABLE Acao (
    id_acao INT AUTO_INCREMENT PRIMARY KEY,
    nome_acao VARCHAR(50),
    publicoAlvo_acao VARCHAR(50),
    dataInicio_acao DATE,
    dataFim_acao DATE,
    qntdBeneficiarios INT,
    meta_acao VARCHAR(100),
    descricao_acao VARCHAR(200)
);

CREATE TABLE Doador (
    id_doador INT AUTO_INCREMENT PRIMARY KEY,
    nome_doador VARCHAR(50),
    cpf_doador INT,
    dataNasc_doador DATE,
    contatoTelefone INT,
    contatoEmail_doador VARCHAR(50),
    cep_doador VARCHAR(8),
    senhaDoador INT,
    confirmarSenhaDoador INT,
    usernameDoador VARCHAR(50)
);

CREATE TABLE Instituicao (
    id_instituicao INT AUTO_INCREMENT PRIMARY KEY,
    cnpj_instituicao VARCHAR(18),
    nomeFantasia_instituicao VARCHAR(20),
    razaoSocial_instituicao VARCHAR(20),
    missao_instituicao VARCHAR(200),
    tipoInstituicao VARCHAR(50),
    areaAtuacao_instituicao VARCHAR(50),
    contatoEmail_instituicao VARCHAR(20),
    contatoRedeSocial_instituicao VARCHAR(1000),
    id_acao INT,
    cep_instituicao INT
);

CREATE TABLE Peca (
    id_peca INT AUTO_INCREMENT PRIMARY KEY,
    descricao_peca VARCHAR(50),
    tipo_vestimenta VARCHAR(50),
    tempoUso_peca VARCHAR(50),
    tamanho_peca VARCHAR(2),
    estado_peca VARCHAR(50),
    dataCompra_peca DATE,
    genero_peca VARCHAR(20),
    faixaEtaria_peca VARCHAR(20),
    id_doador INT
);

CREATE TABLE Transacao (
    id_transacao INT AUTO_INCREMENT PRIMARY KEY,
    cep_retirada VARCHAR(9),
    estado_retirada VARCHAR(50),
    cidade_retirada VARCHAR(50),
    bairro_retirada VARCHAR(50),
    rua_retirada VARCHAR(50),
    numLocal_retirada INT,
    contatoTelefone_retirada VARCHAR(14),
    contatoEmail_retirada VARCHAR(30),
    id_pedido INT
);

CREATE TABLE Pedido (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    qntd_pedido INT,
    id_instituicao INT,
    id_doador INT,
    id_peca INT
);

CREATE TABLE Local_Instituicao (
    cep_instituicao INT PRIMARY KEY,
    estado_instituicao VARCHAR(50),
    cidado_instituicao VARCHAR(50),
    bairro_instituicao VARCHAR(50),
    rua_instituicao VARCHAR(50),
    numLocal_instituicao INT
);

CREATE TABLE Local_Doador (
    cep_doador VARCHAR(8) PRIMARY KEY,
    estado_doador VARCHAR(50),
    cidado_doador VARCHAR(50),
    bairro_doador VARCHAR(50),
    rua_doador VARCHAR(50),
    numLocal_doador INT
);

-- Chaves estrangeiras
ALTER TABLE Doador ADD CONSTRAINT FK_Doador_2
    FOREIGN KEY (cep_doador)
    REFERENCES Local_Doador (cep_doador);

ALTER TABLE Instituicao ADD CONSTRAINT FK_Instituicao_2
    FOREIGN KEY (id_acao)
    REFERENCES Acao (id_acao);

ALTER TABLE Instituicao ADD CONSTRAINT FK_Instituicao_3
    FOREIGN KEY (cep_instituicao)
    REFERENCES Local_Instituicao (cep_instituicao);

ALTER TABLE Peca ADD CONSTRAINT FK_Peca_2
    FOREIGN KEY (id_doador)
    REFERENCES Doador (id_doador);

ALTER TABLE Transacao ADD CONSTRAINT FK_Transacao_2
    FOREIGN KEY (id_pedido)
    REFERENCES Pedido (id_pedido);

ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_1
    FOREIGN KEY (id_instituicao)
    REFERENCES Instituicao (id_instituicao);

ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_3
    FOREIGN KEY (id_doador)
    REFERENCES Doador (id_doador);

ALTER TABLE Pedido ADD CONSTRAINT FK_Pedido_4
    FOREIGN KEY (id_peca)
    REFERENCES Peca (id_peca);
