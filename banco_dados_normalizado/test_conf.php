<?php
$con = mysql_connect('localhost','root','');
$select_db = mysql_select_db('contemporaneo2',$con);
echo $QueryBuscar = "
SELECT m.id_sala,
       m.nome_disciplina,
       MIN(m.entrada),
       MAX(m.saida)
FROM (
    SELECT h.entrada AS entrada,
           (h.entrada + INTERVAL 30 MINUTES) AS saida,
           h.nome_disciplina AS nome_disciplina,
           h.id_sala AS id_sala
    FROM horario h
    INNER JOIN disciplina d ON h.nome_disciplina = d.nome_disciplina
    WHERE h.compartilhada = 1
) m
GROUP BY m.id_sala, m.nome_disciplina
";
$ExeQrBuscar = mysql_query($QueryBuscar);

while($Return = mysql_fetch_assoc($ExeQrBuscar)){
	print_r($Return);
}