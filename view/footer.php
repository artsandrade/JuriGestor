<footer>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione sair para encerrar sua sessão</div>
        <div class="modal-footer text-justify">
          <form action="../model/efetuaLogout.php" method="POST">
            <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Voltar</button>
            <button class="btn btn-danger pl-auto" name="efetuaLogout" id="efetuaLogout">Sair</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="../node_modules/bootstrap-fileinput/js/fileinput.js"></script>
  <script src="../node_modules/bootstrap-fileinput/js/locales/pt-BR.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/sb-admin.js"></script>
</footer>
</body>

</html>