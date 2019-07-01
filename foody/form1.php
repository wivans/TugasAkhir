<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Insert Instance</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body >


  <div class="header">
  <a href="#default" class="logo">Selamat Datang di Sistem Foody</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
    <a href="query.php">Studi Kasus</a>
    <a href="form1.php">Tambah Instance</a>
  </div>
</div>

  <div class="container">  
  <form id="contact" action="insert.php" method="post">
    <h3>Memasukkan instance baru</h3>
    <h4>Isi data berikut.</h4>
    <fieldset>
      <input placeholder="Kelas" type="text" name="kelas"  tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="individu" type="text" name="individu" tabindex="2" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
  
  

</body>

</html>
