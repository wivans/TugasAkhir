  <!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Gifood</title>
  
  
  
      <link rel="stylesheet" href="css/form.css">

  
</head>

<body>

<a href="index.php">Back</a>

  <div class="container">  
  <form id="contact" action="update.php" method="post">
    <h3>Tambah Anotasi</h3>
    <h3>Penambahan Anotasi untuk <?php echo $_GET['entity'] ?></h3>

    <fieldset>
      <input placeholder="Ketik disini" type="text" name="individu" tabindex="2"   required>
      <input placeholder="Individu" type="hidden" name="individu2" tabindex="2" value="<?php echo $_GET['entity'] ?>"  required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Ubah</button>
    </fieldset>
    
  </form>
</div>
  
  

</body>

</html>
