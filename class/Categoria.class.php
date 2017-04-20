<?

class Categoria{

    public $categoriaPai;
    public $categoria;
    public $idcategoriaPai;
    public $idcategoria;
    public $link;
   

    // Metodo construtor setamos aqui o que queremos que ele faça ao criar o objeto
    function __construct(){
        //inclue a classe conexao se não estiver incluida
        include_once("Conexao.class.php");
        //criamos a nossa conexao com o banco de dados e selecionamos o banco
        //Criar uma variavel para armazer a instancia(objeto) da classee conexao
        $oConexao = new Conexao();
        
        //Executar o metodo setConectar da classe Conexao
        $oConexao->setConectar(); 

        $this->link = mysqli_connect($oConexao->hostname,$oConexao->usuario,$oConexao->senha,$oConexao->banco);

    }

    function setCategoria($categoria, $idCategoriaPai){
        $sql = "INSERT INTO categorias (titulo, idCategoriaPai) values ('$categoria', '$idCategoriaPai')";
        mysqli_query($this->link, $sql);
    }

     function getCategoria(){
        $sql = "SELECT * FROM categorias";
        $getSelect = mysqli_query($this->link, $sql);
        print "<select class='form-control' name='categoria_pai'>";
        print "<option value=''>Selecione</option>";
        while($l = mysqli_fetch_array($getSelect)){
            $this->idcategoriaPai = $l["idCategoria"];
            $this->categoria = $l["titulo"];
            print "<option value='{$this->idcategoriaPai}'>{$this->categoria}</option>";
        }
        print "</select>";
    }

    function alterarCategoria($idCategoria, $idCategoriaPai){
        $sql = "UPDATE categorias SET idCategoriaPai = $idCategoriaPai WHERE idCategoria = $idCategoria";
        mysqli_query($this->link, $sql);
    }   

    function listarCategoriaRecursive($categoriaPai) {
        echo "<ul>";   
            $sql = "SELECT * FROM categorias WHERE idcategoriaPai = '$categoriaPai'";
            $categorias = mysqli_query($this->link, $sql);
                   
            // Passando por cada resultado encontrado no banco de dados
            foreach($categorias as $row) {
                echo "<li>".$row["titulo"];
                $this->listarCategoriaRecursive($row["idCategoria"]);  // recursividade
                echo "</li>";
            }
        echo "</ul>";
    }

    function listarCategoriaIterative($categoriaPai) {
        $sql = "SELECT * FROM categorias WHERE idcategoriaPai = '$categoriaPai'";
        $categorias = mysqli_query($this->link, $sql);
        echo "<ol>";           
            // Passando por cada resultado encontrado no banco de dados
            foreach($categorias as $row) {
                echo "<li><a data-toggle='modal' data-target='#abrirModal' onclick='setaDadosModal(".$row['idCategoria'].")'>".$row['titulo'];
                $this->listarCategoriaIterative($row["idCategoria"]);  // recursividade
                echo "</a></li>";
            }
        echo "</ol>";
    }
}
