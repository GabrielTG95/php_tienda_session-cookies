<?php
if (!isset($_COOKIE["politicaCookie"])) { ?>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Política de cookies</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Debes aceptar la política de cookies</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="aceptar">Aceptar</button>
          <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          <button type="button" class="btn btn-primary" id="configurar">Configurar</button>
        </div>
      </div>
    </div>
    <script src="../content/js/politica.js"></script>
  <?php
}
?>