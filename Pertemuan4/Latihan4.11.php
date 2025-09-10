<?php
class Perulangan{

Public function loop(){
   {
    $i = 0;
    do {
        $i++;
        echo $i.'<br/>';
    }
    while ($i <= 9);
     }
  }
}

$objekperulangan = new Perulangan();
echo $objekperulangan->loop()."<br />";
?>
