<?php

/*
 * CRIAR TABELAS DAS SALAS POR DIA
 * Sala Base
 */
$CriarTabelaDoDiaAgendado = "CREATE TABLE $tabelaDataAgendamento(
 id int(11) NOT NULL AUTO_INCREMENT,
 matricula_aluno int(11) DEFAULT NULL,
 nome_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 responsavel_pagamento varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 descricao_aula varchar(5000) DEFAULT NULL,
 data varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 sala varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 prof varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 entrada varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 saida varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 materia varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 qtd_hora float NOT NULL,
 valor float NOT NULL,
 pagamento varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
