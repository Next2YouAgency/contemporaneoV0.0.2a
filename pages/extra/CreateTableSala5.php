<?php

/*
 * CRIAR TABELAS DAS SALAS POR DIA
 * Sala 5
 */
$CriarTabelaDoDiaAgendadoSala5 = "CREATE TABLE $tabelaDataAgendamentoSala5(
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
