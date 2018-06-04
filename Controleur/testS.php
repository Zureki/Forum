<?php

print ("premier session id : ");
echo session_id();

echo "<BR>";

session_start();
print ("second session id : ");
echo session_id();

echo "<BR>";

 $_SESSION['toto']="toto";
 echo $_SESSION['toto'];

echo "<BR>";
echo "<a href='testS2.php'>TestS2</a>";


?>