CREATE TABLE pessoa(
  id_pessoa BISERIAL PRIMARY KEY,
  nome_pessoa CHARACTER VARYING NOT NULL,
  data_aniversario DATE NOT NULL,
  data_hora_cadastro TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT NOW()
);

CREATE TABLE produto(
	id_produto BIGSERIAL PRIMARY KEY,
	codigo CHARACTER VARYING NOT NULL UNIQUE,
	descricao CHARACTER VARYING NOT NULL UNIQUE,
	valor DECIMAL(15,2) NOT NULL DEFAULT 0
);

CREATE TABLE venda(
	id_venda BIGSERIAL PRIMARY KEY,
	id_cliente REFERENCES cliente(id_cliente),
	data_hora TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW()
);

CREATE TABLE venda_item(
	id_venda_item BIGSERIAL PRIMARY KEY,
	id_venda REFERENCES venda(id_venda),
	id_produto REFERENCES produto(id_produto),
	valor_venda DECIMAL(15,2) NOT NULL,
	qtd INT NOT NULL
);