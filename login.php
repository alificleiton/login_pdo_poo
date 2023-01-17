<!-- Cabeçalho ------------------------------------------- -->
<? include_once "cabecalho.php"; ?>

<?php 

require_once 'Usuario.php';
$objUsuario = new Usuario();
if(isset($_POST['btLogar'])){
  $objUsuario->logaUsuario($_POST);
}

?>


  <!-- seção de home  ------------------------------------------------->
  <section class="menu" id="menu">
    <div class="form">
      <div class="form-content">
        <header>Login</header>
          <form action="#" method="post">
            <div class="field input-field">
              <input required name="email" type="email" placeholder="Email" class="input">
            </div>
            <div class="field input-field">
              <input required name="senha" type="password" placeholder="Password" class="password">
              <i class="bx bx-hide eye-icon"></i>
            </div>
            <div class="form-link">
              <a href="#" class="forgot-pass">Forgot password?</a>
            </div>

            <? if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>
              <div class="text-danger">
                Usuário ou senha inválido(s)
              </div>
            <? } ?>

            <? if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>
              <div class="text-danger">
                Faça login antes de entrar nas páginas protegidas
              </div>
            <? } ?>


            <div class="field button-field">
              <button name="btLogar" type="submit">Login</button>
            </div>
          </form>
          <div class="form-link">
            <span>Don't have an account?<a href="singup.html">Signup</a></span>
          </div>
          
          <div class="line"></div>

          <ul class="sci">
            <li><img src="imagens/face.png" width="40px"></li>
            <li><img src="imagens/insta.png" width="40px"></li>
            <li><img src="imagens/twiter.png" width="40px"></li>
          </ul>
          
      </div>
    </div>
  </section>


  <footer class="footer">
    <span class="footer-title">Alifi Cleiton</span>
    <p>Copyright 2023<br><a href="#">ACS CURSOS ONLINE</a> <br>All Rights Reserved.</p>
  </footer>

  <script type="text/javascript" src="js/script.js"></script>
    
</body>
</html>