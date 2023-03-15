<?php
  include "../classes/User.php";

  # Instantiate an object
  $user = new User;

  # Call the ogin method
  $user->login($_POST);


?>