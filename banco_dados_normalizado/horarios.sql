/*Nova estrutura usando normalizações*/
CREATE TABLE horarios(
	entrada time NOT NULL,
	id_sala int(11) UNSIGNED NOT NULL,
	nome_disciplina VARCHAR(30) NULL,
	compartilhada int(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (id_sala, entrada),
	FOREIGN KEY (nome_disciplina) REFERENCES disciplinas(nome_disciplina),
	FOREIGN KEY (id_sala) REFERENCES salas(id_sala)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;