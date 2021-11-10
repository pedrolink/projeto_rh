<?php
define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('db', 'db_projeto_rh');

$conexao = mysqli_connect(host, usuario, senha, db) or die ('Não foi possível conectar');