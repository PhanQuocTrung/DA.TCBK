<html>
 <head>
  <title>RPi Cam Preview</title>
  <script src="script_min.js"></script>
 </head>
<?php
	if(isset($_POST['button_on_white']))
	{
		system("gpio write 8 1");
	}
	else if(isset($_POST['button_off_white']))
	{
		system("gpio write 8 0");
	}
        else if(isset($_POST['button_on_ir']))
        {
                system("gpio write 9 1");
        }
        else if(isset($_POST['button_off_ir']))
        {
                system("gpio write 9 0");
        }

$time=$temp=$hum=0;
$row = 1;
if(($handle = fopen("log.csv", "r")) !== FALSE) {
   while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
       $time=$data[1]; 
       $temp=$data[2];
       $hum= $data[3];
   }
   fclose($handle);
}
?>

 <body onload="setTimeout('init();', 100);" style="background:#000000">
  <center>
   <b><font face="Arial" color="#FFFFFF">RPI Cam Birdhouse interface</b>
   <br><br>
   <div><img id="mjpeg_dest" /></div>
   <br>
   <form method="post">
    <table border='1' align='center' bgcolor='#848484' bordercolor='#FFFFFF'  cellpadding='3'>
     <tr>
      <td>LED white</td>
      <td>
       <button name="button_on_white">ON</button>
       <button name="button_off_white">OFF</button>
      </td>
     </tr>
     <tr>
      <td>LED IR</td>
      <td>
       <button name="button_on_ir">ON</button>
       <button name="button_off_ir">OFF</button>
      </td>
     </tr>
     <tr>
      <td>Last measure</td>
      <td align="center"><?php echo "<p>$time</p>"; ?></td>
     </tr>
     <tr>
      <td>Temperature</td>
      <td align="center"><?php echo "<p>$temp&deg;C</p>"; ?></td>
     </tr>
     <tr>
      <td>Humidit&#233</td>
      <td align="center"><?php echo "<p>$hum%</p>\n"; ?></td>
    </table>
   </form>
   </font>
   <p>
    <input type="button" onclick="document.location.href='parameters.php';" value="Paremeters">
   </p>
  </center>
 </body>
</html>
