<?php
/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @autor      Sandy da Silva Santos
 */
session_start(); // Inicia a sess�o
?>
<html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Criar orçamento, fazer orçamento online, orçamento online" />
        <meta name="description" content="Crie orçamentos para seus cliente de forma fácil, rápida e objetiva e o melhor é grátis" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crie orçamentos para seus clientes online e grátis ferramenta para MEI,Autônomos e Micro Empresários</title>    
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/formatapreco.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/layout.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="shortcut icon" href="http://www.orcamentus.com.br/favicon.ico" type="image/x-icon" />
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            //Função js para formatar o preço

            function init()
            {
                $(document).ready(function() {
                    $('#input2').priceFormat({
                        prefix: '',
                        centsSeparator: ',',
                        thousandsSeparator: '.',
                        clearPrefix: 'true'
                        
                    });
                });

            }

            $(document).ready(init);

            $(function() {
                $('#input').bind('keydown', soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
            });
            $(function() {
                $('#input2').bind('keydown', soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
            });

            function soNums(e) {

                //teclas adicionais permitidas (tab,delete,backspace,setas direita e esquerda)
                keyCodesPermitidos = new Array(8, 9, 37, 39, 46);

                //numeros e 0 a 9 do teclado alfanumerico
                for (x = 48; x <= 57; x++) {
                    keyCodesPermitidos.push(x);
                }

                //numeros e 0 a 9 do teclado numerico
                for (x = 96; x <= 105; x++) {
                    keyCodesPermitidos.push(x);
                }

                //Pega a tecla digitada
                keyCode = e.which;

                //Verifica se a tecla digitada é permitida
                if ($.inArray(keyCode, keyCodesPermitidos) != -1) {
                    return true;
                }
                return false;
            }
        </script>     

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-48342615-1', 'orcamentus.com.br');
            ga('send', 'pageview');

        </script>

    </head>
    <body>        
    <center>

        <!-- Include all compiled plugins (below), or include individual files as needed -->       

        <?php
        ?>     
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"> <img src="img/logo.png"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li data-toggle="modal" data-target="#myModal"><a href="#">Enviar por e-mail</a></li>  
                        <li ><a href="imprimir.php" >Imprimir Página</a></li>
                        <!--<li><a href="#">Salvar no computador</a></li> -->
                        <li><a href="destroisessao.php">Limpar o orçamento</a></li> 

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Pesquisar">
                            </div>
                            <button type="submit" class="btn btn-default">Pesquisar</button>
                        </form>
                        <li><a href="http://www.mycrosan.com.br"><img src="img/mylogo.png"></a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <form id="formulario" method="post"  role="form" action="insere.php">
            <!-- Grade contendo o cliente e empresa -->
            <div class="row">

                <div class="col-md-6">
                    <span class="glyphicon glyphicon-user"></span>
                    <label for="cliente">Cliente:</label>
                    <input type ="text" class="form-control" name="cliente"   placeholder="Nome do cliente" value="<?php echo @$_SESSION['cliente']; ?>"required>
                </div>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    <label for="cliente">Empresa:</label>
                    <input type ="text" class="form-control" name="empresa"   placeholder="Seu nome ou da empresa" value="<?php echo @$_SESSION['empresa']; ?>"required>             
                </div>

            </div>

            <!-- Grade contendo os campos para inserir valores no orçamento -->

            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="cliente">Produto:</label>
                        <input type ="text"  name="descricao" placeholder="Produto ou serviço" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cliente">Unidade:</label>
                        <select class="form-control" name="unidade">            
                            <option value="un" selected>un</option>
                            <option value="mt">m</option>
                            <option value="kg">kg</option> 
                            <option value="l">l</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="cliente">Quantidade:</label>
                        <input type ="text"   name="quant" id="input" placeholder="Quantidade" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cliente">Preço:</label>
                        <div class="input-group">

                            <span class="input-group-addon">R$</span>
                            <input type="text" id="input2" name="p_unitario" class="form-control" placeholder="Preço unitário" required>
                           
                        </div>

                    </div>
                </div>


                <!-- Botão Inserir no orçamento -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-lg">Inserir no orçamento</button>
                    </div>

                </div>


        </form>
        <?php
        include"valoresSessao.php";
        include "modaldoemail.php";
        ?>
        
   
                    </center>
                    </body>
                    </html>

