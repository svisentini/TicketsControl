<?php
session_start();
include('conexao.php');
$conexao = Banco::conectar();

if(empty($_POST['input-login-username']) || empty($_POST['input-login-password'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['input-login-username']);
$senha = mysqli_real_escape_string($conexao, $_POST['input-login-password']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['username'] = $usuario;
	header('Location: tickets-filter.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}