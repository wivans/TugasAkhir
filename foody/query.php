



<html>

<link rel="stylesheet" type="text/css" href="style.css">
<head>
  <title>Tes</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
  <h1>Testing Query</h1>
  <a href="index.php">back</a>

  <h2>Contoh Study Kasus</h2>
  <ul>

    <div class="row content">
      <div class="large-6 columns large-centered">
        <div class="callout">
          <form method="GET" action="#">
            <div class="dropdown" style="left: 200px">
              <button class="dropbtn">List Query</button>
              <div class="dropdown-content">
                <a href="#" onclick="query1()">Query 1</a>
                <a href="#" onclick="query2()">Query 2</a>
                <a href="#" onclick="query3()">Query 3</a>
                <a href="#" onclick="query4()">Query 4</a>
                <a href="#" onclick="query5()">Query 5</a>
                <a href="#" onclick="query6()">Query 6</a>
                <a href="#" onclick="query7()">Query 7</a>
                <a href="#" onclick="query8()">Query 8</a>
                <a href="#" onclick="query9()">Query 9</a>
                <a href="#" onclick="query10()">Query 10</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="ex1" class="modal" style="width: 300px;">
     <div class="row">
      <div class="large-10 columns large-centered">
      </div>
      <div id="judul" style="left: 1000px"></div>
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
        document.getElementById("judul").innerHTML = "ini query1";
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
        $('#ex1').modal('show');
      });

    }

  </script>

</script>

<script type="text/javascript">

  function query10()
  {
    $.ajax("query10.php")
    .done(function(res)
    {
      document.getElementById("disini").innerHTML = res;
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
