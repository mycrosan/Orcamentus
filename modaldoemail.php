     <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Envie o orçamento para o e-mail do(a) cliente</h4>
                    </div>                  
                    <div class="modal-body">
                        <?php
                        if (empty($_SESSION['cesta'])) {
                            echo"Você ainda não tem produtos nesse orçamento, insira algum item!";
                        } else {
                            ?>
                            <form method ="post"action="enviar.php">               

                                <?php
                                echo "<input name='email_c' type='text' class='form-control input-lg' placeholder='E-mail do(a) " . $_SESSION['cliente'] . "' required><br>";
                                echo "<input name='email_ps' type='text' class='form-control input-lg' placeholder='Seu e-mail " . $_SESSION['empresa'] . "' required><br>";
//Mostra os valores para enviar por e-mail.
                                include"valoresSessao.php";
                                echo"<textarea  name='obs'class='form-control input-lg' placeholder='Observações' rows='5%'>";
                                echo "</textarea>";
                            }
                            ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    </form>