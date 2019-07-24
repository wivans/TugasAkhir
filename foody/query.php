



<html>

<link rel="stylesheet" type="text/css" href="style.css">
<head>
  <title>Tes</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
  <div class="header">
    <a href="#default" class="logo">Selamat Datang di Sistem Foody</a>
    <div class="header-right">
      <a class="active" href="index.php">Home</a>
      <a href="query.php">Studi Kasus</a>
      <a href="form1.php">Tambah Instance</a>
    </div>
  </div>

  <div class="row content">
    <div class="large-8 columns large-centered">
      <div class="callout">
        <form method="GET" action="#">
          <div class="dropdown" style="left: 600px; top: 2px">
            <button class="dropbtn">List Query Benar</button>
            <div class="dropdown-content">
              <a href="#" onclick="query1()">Studi Kasus 1</a>
              <a href="#" onclick="query2()">Studi Kasus 2</a>
              <a href="#" onclick="query3()">Studi Kasus 3</a>
              <a href="#" onclick="query4()">Studi Kasus 4</a>
              <a href="#" onclick="query5()">Studi Kasus 5</a>
              <a href="#" onclick="query6()">Studi Kasus 6</a>
              <a href="#" onclick="query7()">Studi Kasus 7</a>
              <a href="#" onclick="query8()">Studi Kasus 8</a>
              <a href="#" onclick="query9()">Studi Kasus 9</a>
              <a href="#" onclick="query10()">Studi Kasus 10</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row content">
    <div class="large-8 columns large-centered">
      <div class="callout">
        <form method="GET" action="#">
          <div class="dropdown" style="left: 800px; top: -65px">
            <button class="dropbtn">List Query Salah</button>
            <div class="dropdown-content">
              <a href="#" onclick="queryS1()">Studi Kasus 1</a>
              <a href="#" onclick="queryS2()">Studi Kasus 2</a>
              <a href="#" onclick="queryS3()">Studi Kasus 3</a>
              <a href="#" onclick="queryS4()">Studi Kasus 4</a>
              <a href="#" onclick="queryS5()">Studi Kasus 5</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="ex1" class="modal" style="width: 500px;">
   <div class="row">
    <div class="large-10 columns large-centered">
    </div>
    <div id="judul" style="left: 1000px"></div>
    <br>
    <div id="penjelasan" style="left: 1000px"></div>
    <hr>
    <div id="disini" style="left: 1000px"></div>
  </div>
</div>




<script
src="jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

<script type="text/javascript">


  function query1()
  {
    $.ajax("query1.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Bahan yang dipakai untuk Makanan dengan cara penyajian di Rebus";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?name<br/>
      WHERE {<br/>
        &emsp; ?Bahan foo:DiRebus ?Makanan.<br/>
        &emsp; ?Bahan rdfs:label ?name .<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }



</script>

<script type="text/javascript">

  function query2()
  {
    $.ajax("query2.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Makanan yang dikemas menggunakan Daun Pisang";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
        &emsp;  ?Makanan foo:DiKemas ?Kemasan.<br/>
        &emsp;  ?Makanan foo:DiKemas foo:Daun_Pisang.<br/>
        &emsp;  ?Makanan rdfs:label ?nama.<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">

  function query3()
  {
    $.ajax("query3.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan kandungan bahan pada makanan capcay";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
        &emsp;  ?Bahan foo:DiTumis ?Makanan.<br/>
        &emsp;  ?Bahan foo:DiTumis foo:Capcay.<br/>
        &emsp;  ?Bahan rdfs:label ?nama.<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">

  function query4()
  {
    $.ajax("query4.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan minuman yang memiliki rasa pahit";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
       ?Minuman foo:Memiliki_Rasa ?Rasa.<br/>
       ?Minuman foo:Memiliki_Rasa  foo:Pahit.<br/>
       ?Minuman rdfs:label ?nama.<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }

</script>

<script type="text/javascript">

  function query5()
  {
    $.ajax("query5.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan makanan, minuman, dan buah yang memiliki rasa manis";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT  ?nama1<br/>
      WHERE {<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Buah foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Buah foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Minuman foo:Memiliki_Rasa foo:Manis.<br/>
        &emsp;  ?Minuman foo:Memiliki_Rasa foo:Manis;<br/>
        &emsp; &emsp; &emsp;  rdfs:label ?nama1.<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">


  function query6()
  {
    $.ajax("query6.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Makanan yang memiliki Rasa Pedas";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE { ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        ?Makanan foo:Memiliki_Rasa foo:Pedas.<br/>
        ?Makanan rdfs:label ?nama.<br/>
      }

      `;
      $('#ex1').modal('show');
    });

  }



</script>

<script type="text/javascript">


  function query7()
  {
    $.ajax("query7.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Bahan yang digunakan sebagai pelengkap dari suatu makanan beserta nama makanan terkait";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama1 ?nama2<br/>
      WHERE { ?Bahan foo:Sebagai_Pelengkap ?Makanan;<br/>
       rdfs:label ?nama1.<br/>
       ?Makanan rdfs:label ?nama2.<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }



</script>

<script type="text/javascript">


  function query8()
  {
    $.ajax("query8.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "menampilkan makanan yang dikemas dengan plastik";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
       ?Makanan foo:DiKemas ?Kemasan.<br/>
       ?Makanan foo:DiKemas  foo:Plastik.<br/>
       ?Makanan rdfs:label ?nama.<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }



</script>

<script type="text/javascript">


  function query9()
  {
    $.ajax("query9.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Kemasan yang digunakan untuk sate ayam";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/> 
       ?Makanan foo:DiKemas ?Kemasan.<br/>
       foo:Sate_Ayam foo:DiKemas ?Kemasan.<br/>
       ?Kemasan rdfs:label ?nama.<br/>
     }

     `;
     $('#ex1').modal('show');
   });

  }



</script>

<script type="text/javascript">


  function query10()
  {
    $.ajax("query10.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "menampilkan minuman yang memiliki rasa manis";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
       ?Minuman foo:Memiliki_Rasa ?Rasa.<br/>
       ?Minuman foo:Memiliki_Rasa  foo:Manis.<br/>
       ?Minuman rdfs:label ?nama.<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }



</script>

<script type="text/javascript">

  function queryS1()
  {
    $.ajax("queryS1.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Bahan yang digunakan sebagai pelengkap dari suatu makanan beserta nama makanan nya. Kesalahan terdapat pada baris ke 4.";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama1<br/>
      WHERE {<br/>
        &emsp;  ?Bahan foo:DiPanggang ?Makanan.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
        &emsp;  ?Makanan foo:Memiliki_Rasa foo:Asin.<br/>
        &emsp;  ?Bahan rdfs:label ?nama1.<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">

  function queryS2()
  {
    $.ajax("queryS2.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan menampilkan kandungan bahan pada makanan capcay. Kesalahan pada output Makanan";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
        ?Bahan foo:DiTumis ?Makanan.<br/>
        ?Bahan foo:DiTumis foo:Capcay.<br/>
        ?Makanan rdfs:label ?nama. <br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">

  function queryS3()
  {
    $.ajax("queryS3.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan makanan  untuk porsi individu. kesalahan pada pengaksesan atribut";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
        ?Makanan foo:Porsi ?jml.<br/>
        ?Makanan rdfs:label ?nama.<br/>
        FILTER (?jml='Individu').<br/>
      }
      `;
      $('#ex1').modal('show');
    });

  }

</script>

<script type="text/javascript">

  function queryS4()
  {
    $.ajax("queryS4.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan bahan biasanya dipakai untuk makanan dengan penyajian di rebus. kesalahan pada pengaksesan nama individu";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?Bahan<br/>
      WHERE {<br/>
       ?Bahan foo:DiRebus ?Makanan.<br/>
       ?Bahan rdfs:label ?name .<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }

</script>

</script>

<script type="text/javascript">

  function queryS5()
  {
    $.ajax("queryS5.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
      document.getElementById("judul").innerHTML = "Menampilkan Makanan yang memiliki rasa yang pedas. kesalahan sintaks pada baris ke 1";
      document.getElementById("penjelasan").innerHTML = `

      SELECT DISTINCT ?nama<br/>
      WHERE {<br/>
       ?Makanan foo:Memiliki_Rasa ?Rasa.<br/>
       ?Makanan foo:Memiliki_Rasa foo:Pedas.<br/>
     }
     `;
     $('#ex1').modal('show');
   });

  }

</script>



</ul>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>


<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script type="text/javascript" >
  $('#form1').on('submit', function(e){
    $('#ex1').modal('show');
    e.preventDefault();
  });
</script>
<script type="text/javascript" >
  $('#form2').on('submit', function(e){
    $('#ex2').modal('show');
    e.preventDefault();
  });
</script>
</html>
