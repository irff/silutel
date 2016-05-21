<?php include "header.php" ?>

  <div class="container">
    <div class="page-header">
      <div class="row">
        <div class="col-md-12">
          <h1>LOGIN</h1>
        </div>
      </div>    
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">        
        <form class="form-signin" method="post" action="auth-login.php">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
          <br>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>

<?php include "footer.php" ?>
