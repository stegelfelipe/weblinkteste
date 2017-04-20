<?php
class Conexao
{
  //Abaixo as respectivas variaveis para cada atributo de nossa classe
  public $usuario  = "u975149306_root";
  public $senha    = "102030";
  public $hostname = "mysql.weblink.com.br";
  public $banco    = "u975149306_cat";

  //Dois atributos extras, um para guardar o comando sql e outro para guardar o link conexao
  var $link     = "";

  //Definir método setConectar, tem a função de executar os códigos para conexao ao banco de dados
  
  function setConectar()
  {
    //Faz a conexao com ao banco e armazena na variavel this->link
    $this->link = mysqli_connect($this->hostname, $this->usuario, $this->senha) or die (mysqli_error());
    
    //Seleciona o banco a ser usado no mysql
    mysqli_select_db( $this->link, $this->banco);
  }
}
