<!DOCTYPE html>
<html>
    <head>
        <title> Fundamentos da Linguagem PHP </title>
        <link rel="stylesheet" href="../stylesheets/global.css">        
		<link rel="stylesheet" href="../stylesheets/1.css">        
    </head>
    <body>
    <h1> PHP + MySQL - Protótipo de Sistema Acadêmico </h1>
    <form action="" method="post">
        <fieldset>
        <legend> Exercício 1 - Dados do Aluno </legend>
        <div id="tabela">
            
            <div id=labels>
                <label class="alinhar"> Produto: </label>
                <label class="alinhar"> Preço: </label>
                <label class="alinhar"> Operação: </label>
            </div>
            <div id=inputs>
                <input type="text" name="nome" class="maior" autofocus> 
                <input type="number" step="0.01" name="preco" class="maior"> 
                <div><input type="radio" name="operacoes" value=1> Cadastrar </div>
                <div><input type="radio" name="operacoes" value=2> Calcular Media e Listar Produtos </div>
            </div>
            <div class="botao">


        </div>
        
        </fieldset>
        <button type="submit" name="enviar"> Executar Operação Selecionada </button>
    </form>
    <?php
        //Inserir as includes responsáveis pela conexão do PHP com o banco de dados.
        require "definicaoProjeto.php";
        $projeto = new Projeto();
        $projeto->conectar();
        
        //testar submit

        if(isset($_POST["enviar"]))
        {
            if(isset($_POST["operacoes"]))
            {
                switch($_POST["operacoes"])
                {
                    case 1: $projeto->cadastrar($_POST['nome'], $_POST['preco']);
                            break;
                    case 2: $projeto->retornarMedia();
                            break;
                    default: echo "Nao implementado";
                }
            }
            else
            {
                echo "<p> Você não selecionou nenhuma operação sobre o banco </p>";
            }
        }
        $projeto->encerrarConexao();
    ?>
    </body>
</html>