create table armarinho_teste;
use armarinho_teste;

CREATE TABLE Acao (
    id_acao int PRIMARY KEY,
    nome_acao varchar(50),
    publicoAlvo_acao varchar(50),
    dataInicio_acao date,
    dataFim_acao date,
    qntdBeneficiarios int,
    meta_acao varchar(100),
    descricao_acao varchar(200)
    
);

CREATE TABLE Doador 
(
    id_doador int PRIMARY KEY,
    nome_doador varchar(50),
    cpf_doador int,
    dataNasc_doador date,
    contatoTelefone int,
    contatoEmail_doador varchar(50),
    cep_doador varchar(8),
    senhaDoador int,
    confirmarSenhaDoador int,
    usernameDoador varchar(50)
    
);

CREATE TABLE Instituicao (
    id_instituicao int AUTO-INCREMENT PRIMARY KEY,
    cnpj_instituicao varchar(18),
    nomeFantasia_instituicao varchar(20),
    razaoSocial_instituicao varchar(20),
    missao_instituicao varchar(200),
    tipoInstituicao varchar(50),
    areaAtuacao_instituicao varchar(50),
    contatoEmail_instituicao varchar(20),
    contatoRedeSocial_instituicao varchar(1000),
    id_acao int,
    cep_instituicao int(8)
);

CREATE TABLE Peca (
    id_peca int PRIMARY KEY,
    descricao_peca varchar(50),
    tipo_vestimenta varchar(50),
    tempoUso_peca varchar(50),
    tamanho_peca varchar(2),
    estado_peca varchar(50),
    dataCompra_peca date,
    genero_peca varchar(20),
    faixaEtaria_peca varchar(20),
    id_doador int
);

CREATE TABLE Transacao (
    id_transacao int PRIMARY KEY,
    cep_retirada varchar(9),
    estado_retirada varchar(50),
    cidade_retirada varchar(50),
    bairro_retirada varchar(50),
    rua_retirada varchar(50),
    numLocal_retirada int,
    contatoTelefone_retirada varchar(14),
    contatoEmail_retirada varchar(30),
    id_pedido int
);

CREATE TABLE Pedido (
    id_pedido int PRIMARY KEY,
    qntd_pedido int,
    id_instituicao int,
    id_doador int,
    id_peca int
);

CREATE TABLE Local_Instituicao (
    cep_instituicao int(8) PRIMARY KEY,
    estado_instituicao varchar(50),
    cidado_instituicao varchar(50),
    bairro_instituicao varchar(50),
    rua_instituicao varchar(50),
    numLocal_instituicao int
);

CREATE TABLE Local_Doador (
    cep_doador varchar(8) PRIMARY KEY,
    estado_doador varchar(50),
    cidado_doador varchar(50),
    bairro_doador varchar(50),
    rua_doador varchar(50),
    numLocal_doador int
);
 
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