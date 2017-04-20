<?php

include_once("class/Categoria.class.php");

//Criando e Instanciando o objeto

$categoriaPai = new Categoria;
$idcategoria = new Categoria;
$categoria = new Categoria;
$listar = new Categoria;

//Atribuindo valores ao objeto
if(empty($_POST["categoria_pai"])){
	$categoriaPai->idCategoriaPai = 0;	
}else{
	$categoriaPai->idCategoriaPai = $_POST["categoria_pai"];
}

if(!empty($_POST["categoria"])){
	$categoria->titulo = $_POST["categoria"];
}

if(!empty($_POST["idcategoria"])){
	$idcategoria->idCategoria = $_POST["idcategoria"];
}


if($categoria->titulo){

//chamando a funcao que faz o insert	
$categoria->setCategoria($categoria->titulo, $categoriaPai->idCategoriaPai);
echo "<script>alert('Categoria cadastrado com sucesso!'); document.location='index.php';</script>";
}else{

//chamando a funcao que faz o update
$idcategoria->alterarCategoria($idcategoria->idCategoria, $categoriaPai->idCategoriaPai);

echo "<script>alert('Categoria alterada com sucesso!'); document.location='index.php';</script>";
}



