<html>
	<head>
		<title>Adicionar Categorias</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="bootstrap/css/style.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.js"></script>
		<script src="bootstrap/js/bootstrap.min.js""></script>
		<script src="bootstrap/js/jquery-sortable.js""></script>
		<script src="bootstrap/js/sortable.js""></script>
		<script src="bootstrap/js/modal.js""></script>
	</head>
	<body>
		<div class="panel panel-default">
  			<div class="panel-heading"><center><h3>TESTE VAGA DESENVOLVEDOR</h3></center></div>
  				<div class="panel-body">
  					<div id="exTab2" class="container">	
						<ul class="nav nav-tabs">
							<li class="active"><a  href="#1" data-toggle="tab">Add Categoria</a>
							</li>
							<li><a href="#2" data-toggle="tab">Listar Categorias - Recursivo</a>
							</li>
							<li><a href="#3" data-toggle="tab">Listar Categorias - Interativo</a>
							</li>
						</ul>
						<div class="tab-content ">
							<div class="tab-pane active" id="1">
								</br>
			          			<form action="processar.php" method="post">
				    				<div class="row">
				  						<div class="col-lg-3">
				    						<div class="input-group">
												Categoria: <input type="text" class="form-control" name="categoria" required>
											</div>	
										</div>
										<div class="col-lg-3">
				    						<div class="input-group">
												Categoria Pai: 
												<? 
												include_once("class/Categoria.class.php");
												$CategoriaPai = new Categoria;
												$CategoriaPai->getCategoria(); ?>
											</div>	
										</div>
									</div></br>
									<div class="row">
				  						<div class="col-lg-2">
				    						<div class="input-group">
				    							<button type="submit" class="btn btn-default">Cadastrar</button>
				    						</div>
				    					</div>
									</div>
								</form>
							</div>
					        <div class="tab-pane" id="2">
					        	</br>
					        	<?
					        	$Categorias = new Categoria;
								$Categorias->listarCategoriaRecursive(0); ?>
							</div>
							<div class="tab-pane" id="3">
								</br>
								<ol class='vertical'> 
				        	   	<?
					        	$Categorias = new Categoria;
								$Categorias->listarCategoriaIterative(0); ?>
								</ol>
								<div id="abrirModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
								    <div class="modal-dialog modal-md">
								        <div class="modal-content">
								            <div class="modal-body">
								                <div class="panel-body">
								    				<h4>Alterar para a Categoria:</h4>
								                    <form id="modalExemplo" method="post" action="processar.php">
								                        <input type="hidden" name="idcategoria" id="campo">
								                        <div class="form-group">
															<?
															$AlterarCategoriaPai = new Categoria;
															$AlterarCategoriaPai->getCategoria(); ?>
														</div>
														<div class="input-group">
									    					<button type="submit" class="btn btn-default">Alterar</button>
									    				</div>
								                    </form>
								                </div>
								            </div>
								        </div>
								    </div>
								</div>
								<!-- mascara para cobrir o site -->  
								<div id="mascara"></div>
							</div>
						</div>
					</div>
  				</div>
  				<div class="panel-footer"><center>Desenvolvido por Felipe Stegel @2017</center></div>
			</div>
            <center><img src="img/logo_weblink.png"></center>
		</div>		        	 
	</body>
</html>
