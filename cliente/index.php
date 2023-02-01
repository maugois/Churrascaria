<h2>
  <strong><?php echo $_GET['cliente']; ?></strong>, Bem vindo à sua área de cliente
  
  <?php 
  $hash64 = base64_encode('1234');
  $md5Base = md5($hash64);

  echo $md5Base;
  echo $hash64;
  echo '<br>';
  echo base64_decode($hash64);
  ?>
</h2>