<?php
  session_start();
  $_SESSION['verifLog']=false;
?>

<html>
<form action="verifylog.php" method="post">
<p>
Connexion <br/><br/>

  <label>Pseudo
    <input type="text" name="pseudo" />
  </label><br/>

  <label>Pass
    <input type="password" name="pass" />
  </label><br/>

    <input type="submit" name="login" value="LogIn" />
</p>
</form>



<br/><br/><br/>






<form action="verify.php" method="post">
<p>
Inscription <br/><br/>
</p>
  <label>pseudo
    <input type="text" name="pseudo" />
  </label><br/>

  <label>pass
    <input type="password" name="pass" />
  </label><br/>

  <label>Confirm pass
    <input type="password" name="confirm" />
  </label><br/>

  <label>email
    <input type="text" name="email" />
  </label><br/>

    <input type="submit" name="register" value="register" />
</form>

</html>