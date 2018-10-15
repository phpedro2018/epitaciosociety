
<?php
require_once("php/config.php"); 
 include 'php/head.php'; ?>

<script>
  $(function() {
   $("#myModal").modal();
});
</script>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Para confirmar reserva...</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Ligue para o número 989658954 ou envie uma mensagem no WhatsApp
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="horarios.php" class="btn btn-danger" >Fechar</a>
          <a href="tel:+5585989658954" class="btn btn-success ">Ligar agora</a>
          <a href="https://api.whatsapp.com/send?phone=5585989658954" class="btn btn-success ">
          Confirmar pelo WhatsApp
         </a>
        </div>
        
      </div>
    </div>
  </div>