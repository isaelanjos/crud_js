<!DOCTYPE phtml>
<html>
<head>
	<title>Project CRUD JS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./vendor/twbs/bootstrap/dist/css/bootstrap.css">
	<!--<link rel="stylesheet" type="text/css" href="./vendor/twbs/bootstrap/dist/css/bootstrap-theme.css">-->
	<style type="text/css">
		body {
			background-color: #eee;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Inicio</a></li>
				<li class=""><a href="contato.php">Contato</a></li>
			</ul>
		</div>
	</div>
</nav>
<h1 style="margin-top: 85px;" align="center">Simples Formulário de Contato em JS</h1>
<div class="container">
	<form class="form-horizontal" id="formulario" method="POST">
	<div class="form-group">
		<label class="col-sm-4 control-label">Nome</label>
		<div class="col-sm-4"><input type="text" name="form_nome" id="form_nome" class="form-control" placeholder="Nome Completo" required="" autofocus=""></div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">E-mail</label>
		<div class="col-sm-4"><input type="text" name="form_email" id="form_email" class="form-control" placeholder="E-mail" required=""></div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Telefone</label>
		<div class="col-sm-4"><input type="text" name="form_telefone" id="form_telefone" class="form-control" placeholder="Telefone" required=""></div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Mensagem</label>
		<div class="col-sm-4"><textarea class="form-control" name="form_mensagem" id="form_mensagem" placeholder="Digite sua mensagem"></textarea></div>
	</div>
	<div class="form-group">
		<div align="center">
			<button type="submit" id="btnSubmit" class="btn btn-primary">Enviar</button>
		</div>				
	</div>
	</form>
</div>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Telefone</th>
				<th>Mensagem</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody id="tbodyContatos"></tbody>
	</table>
</div>

<div class="footer">
	<div class="container">
	<p class="muted credit">Desenvolvido por <a href="#">Isael Anjos</a><br>isael.r.anjos@gmail.com</p>
	</div>
</div>

<script type="text/javascript">
var app = new function() {
	
	var modo = "Insert";
    var tbContatos = localStorage.getItem("tbContatos");
    tbContatos = JSON.parse(tbContatos);
    if(tbContatos == null) tbContatos = [];

	this.Insert = function(){
	    var newContatos = {
			Nome : document.getElementById("form_nome").value,
			Email : document.getElementById("form_email").value,
			Telefone : document.getElementById("form_telefone").value,
			Mensagem : document.getElementById("form_mensagem").value
		};
	    tbContatos.push(newContatos);
	    localStorage.setItem("tbContatos", JSON.stringify(tbContatos));
	    alert("Registro Inserido com Sucesso!");
	    this.GetLista();
	}   

	this.Update = function(){
		alert("teste");
	}   

	this.Delete = function(item){
	    tbContatos.splice(item, 1);
	    localStorage.setItem("tbContatos", JSON.stringify(tbContatos));
	    alert("Registro Excluído com Sucesso!");
	    this.GetLista();
	}    
	    
	this.GetLista = function(){
		var html = '';
		for(var i in tbContatos){
			html += "<tr>";
			html += "<td>"+tbContatos[i]['Nome']+"</td>";
			html += "<td>"+tbContatos[i]['Email']+"</td>";
			html += "<td>"+tbContatos[i]['Telefone']+"</td>";
			html += "<td>"+tbContatos[i]['Mensagem']+"</td>";
        	html += '<td><a href="#" onclick="app.Delete('+i+')">Excluir</a> <a href="#" onclick="app.Update('+i+')">Alterar</a></td>';
			html += "</tr>";
		}
		return document.getElementById("tbodyContatos").innerHTML = html;
	}
	
	document.getElementById('formulario').onsubmit = function() {
		
        this.Insert();
        }

}
app.GetLista();
</script>

</body>
</html>
</body>
</html>