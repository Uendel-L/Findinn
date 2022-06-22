<?php

//testa a variável url que veio lá do htaccess
if (isset($_GET['url'])) //se estiver preenchida, pega o valor
{
    $url =  strtoupper($_GET['url']);
    // echo $url;
    switch ($url) {
        case "HOME":
            require "Controller/ControladorFormLivro.php";
            $controlador = new ControladorFormLivro();
            $controlador->processaRequisicao();
            break;
        case "INCLUIRLIVRO":
            require "Controller/ControladorNovoLivro.php";
            $controlador = new ControladorNovoLivro();
            $controlador->processaRequisicao();
            break;
        case "EXCLUIRLIVRO":
            require "Controller/ControladorLivroExcluir.php";
            $controlador = new ControladorLivroExcluir();
            $controlador->processaRequisicao();
            break;
        case "FORMALTERARLIVRO":
            require "Controller/ControladorFormLivroAlterar.php";
            $controlador = new ControladorFormLivroAlterar();
            $controlador->processaRequisicao();
            break;
        case "ALTERARLIVRO":
            require "Controller/ControladorLivroAlterar.php";
            $controlador = new ControladorLivroAlterar();
            $controlador->processaRequisicao();
            break;
        case "LISTARLIVRO":
            require "Controller/ControladorLivroListar.php";
            $controlador = new ControladorLivroListar();
            $controlador->processaRequisicao();
            break;
        default:
            require "Controller/ControladorLivroListar.php";
            $controlador = new ControladorLivroListar();
            $controlador->processaRequisicao();
            break;
    }
} else                     //senão, vai para uma página padrão, neste caso a home do site
    $url = '404.php';
