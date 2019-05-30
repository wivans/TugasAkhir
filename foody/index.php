<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Ontology</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,400italic' rel='stylesheet' type='text/css'>
  <!-- foundation css -->
  <link rel="stylesheet" href="foundation/css/app.css">
  <!-- icon -->
  <link rel="stylesheet" href="foundation/bower_components/foundation-icons/foundation-icons.css">

  <meta class="foundation-mq">
</head>
<body>
  <div id="wrapper">
    <div data-sticky-container>
      <div data-sticky data-margin-top='0' data-top-anchor="top" data-btm-anchor="content:bottom">
        <div class="top-bar"> 
          <div class="row">
            <div class="large-2 columns large-centered">
             <h4><strong>Foody <br>
              <a href="query.php">test Query</a> <br>
              <a href="form.php">Test insert</a>
              </strong></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

  <br><br>


  <?php 
  require 'vendor/autoload.php';

  EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
  EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
  EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
  EasyRdf_Namespace::set('xml', 'http://www.w3.org/XML/1998/namespace');
  EasyRdf_Namespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
  EasyRdf_Namespace::set('foo', 'http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#');

  $graph = new EasyRdf_Graph();
  $graph->parseFile('foody.rdf', 'rdf');

  $localhost = "localhost/foody";


  ?>
  <div class="row content">
    <div class="large-6 columns large-centered">
      <div class="callout">
        <h6 class="subheader">PILIH MAKANAN, MINUMAN, dan BUAH</h6>
          <form method="GET" action="#">
            <div class="input-group">
              <select class="input-group-field" name="entity">
                <?php 
                  foreach($graph->allOfType('foo:Foody') as $name) {
                  echo "<option value='".$name."'>".str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $name->get('rdfs:label'))."</option>";
                }
                ?>
              </select>
              <div class="input-group-button">
                <input type="submit" class="button" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>


  <div class="row content">
    <div class="large-6 columns large-centered">
      <div class="callout">
        <h6 class="subheader">Cek Bahan</h6>
          <form method="GET" action="#">
            <div class="input-group">
              <select class="input-group-field" name="entity">
                <?php 
                  foreach($graph->allOfType('foo:Bahan') as $name) {
                  echo "<option value='".$name."'>".str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $name->get('rdfs:label'))."</option>";
                }
                ?>
              </select>
              <div class="input-group-button">
                <input type="submit" class="button" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>


  <div class="row">
    <div class="large-10 columns large-centered">
      <?php 
        if(isset($_GET['entity'])) {
          echo "
          <div class="."callout".">
            <h6 class="."subheader".">PENJELASAN</h6>";
            
            // Nama Instance
            $ins = $graph->resource($_GET['entity']);
            echo "<h3>".str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $ins->get('rdfs:label'))."</h3><br/>";
            echo '<a href="delete.php?entity='.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $ins->get('foo:Foody')).'">Hapus</a>';
            echo "<table>";
            echo "<tr>";

            // Name
            if($ins->get('rdfs:label')){
              echo "<tr><td>Alias</td><td>";
              foreach ($ins->all('rdfs:label') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }
            
            // Alias
            /*
		        if($ins->get('foo:Foody')){
              echo "<tr>";
              foreach ($ins->all('rdfs:label') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject)."<br/>";
              }
            }
            */
            
            // Rasa
            if($ins->get('foo:Memiliki_Rasa')){
              echo "<tr><td>Rasa</td><td>";
              foreach ($ins->all('foo:Memiliki_Rasa') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";

              }
              echo "</td></tr>";  
            }

            
            // Temperatur Makanan
            if($ins->get('foo:Temperatur')){
              echo "<tr><td>Temperatur</td><td>";
              foreach ($ins->all('foo:Temperatur') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            //dikemas
              if($ins->get('foo:DiKemas')){
              echo "<tr><td>Kemasan</td><td>";
              foreach ($ins->all('foo:DiKemas') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


            //Porsi
              if($ins->get('foo:Jumlah_Porsi')){
              echo "<tr><td>Porsi</td><td>";
              foreach ($ins->all('foo:Jumlah_Porsi') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject)."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //kandungan
              if($ins->get('foo:Mengandung')){
              echo "<tr><td>kandungan</td><td>";
              foreach ($ins->all('foo:Mengandung') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //bahan digoreng
              if($ins->get('foo:DiGoreng'))
              {
              echo "<tr><td>Bisa digunakan untuk (digoreng)</td><td>";
              foreach ($ins->all('foo:DiGoreng') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //Bahan DiRebus
              if($ins->get('foo:DiRebus'))
              {
              echo "<tr><td>Bisa digunakan untuk (direbus)</td><td>";
              foreach ($ins->all('foo:DiRebus') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //Bahan DiKukus
              if($ins->get('foo:DiKukus'))
              {
              echo "<tr><td>Bisa digunakan untuk (dikukus)</td><td>";
              foreach ($ins->all('foo:DiKukus') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //Bahan DiPanggang
              if($ins->get('foo:DiPanggang'))
              {
              echo "<tr><td>Bisa digunakan untuk (dipanggang)</td><td>";
              foreach ($ins->all('foo:DiPanggang') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


              //Bahan DiTumis
              if($ins->get('foo:DiTumis'))
              {
              echo "<tr><td>Bisa digunakan untuk (ditumis)</td><td>";
              foreach ($ins->all('foo:DiTumis') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


            //Bahan DiBakar
              if($ins->get('foo:DiBakar'))
              {
              echo "<tr><td>Bisa digunakan untuk (dibakar)</td><td>";
              foreach ($ins->all('foo:DiBakar') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }



              //DiAsap
              if($ins->get('foo:DiAsap'))
              {
              echo "<tr><td>Bisa digunakan untuk (diasap)</td><td>";
              foreach ($ins->all('foo:DiAsap') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#', "", $subject->get('rdfs:label'))."</a><br/>";
              }
              echo "</td></tr>";  
            }


		        /*
  		      // BirthDate
            if($ins->get('ihero:hasBirthDate')){
              echo "<tr>";
              echo "<td>birthDate</td><td>".str_replace('T00:00:00Z', "", $ins->get('ihero:hasBirthDate'))."</td></tr>";
            }
        
  		      // BirthPlace
            if($ins->get('ihero:hasBirthPlace')){
              echo "<tr><td>birthPlace</td><td>";
              foreach ($ins->all('ihero:hasBirthPlace') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // BirthYear
            if($ins->get('familyTree:hasBirthYear')){
              echo "<tr>";
              echo "<td>birthYear</td><td>".$ins->get('familyTree:hasBirthYear')."</td></tr>";
            }

            // DeathDate
            if($ins->get('ihero:hasDeathDate')){
              echo "<tr>";
              echo "<td>deathDate</td><td>".str_replace('T00:00:00Z', "", $ins->get('ihero:hasDeathDate'))."</td></tr>";
            }
        
            // DeathPlace
            if($ins->get('ihero:hasDeathPlace')){
              echo "<tr><td>deathPlace</td><td>";
              foreach ($ins->all('ihero:hasDeathPlace') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // DeathYear
            if($ins->get('familyTree:hasDeathYear')){
              echo "<tr>";
              echo "<td>deathYear</td><td>".$ins->get('familyTree:hasDeathYear')."</td></tr>";
            }

            // BurialPlace
            if($ins->get('ihero:hasBurialPlace')){
              echo "<tr><td>burialPlace</td><td>";
              foreach ($ins->all('ihero:hasBurialPlace') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // alternativeNames
            if($ins->get('ihero:alias')){
              echo "<tr><td>alternativeNames</td><td>";
              foreach ($ins->all('ihero:alias') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // birthName
            if($ins->get('ihero:hasBirthName')){
              echo "<tr>";
              echo "<td>birthName</td><td>".$ins->get('ihero:hasBirthName')."</td></tr>";
            }

            // hasFamilyName
            if($ins->get('familyTree:hasFamilyName')){
              echo "<tr>";
              echo "<td>surname</td><td>".$ins->get('familyTree:hasFamilyName')."</td></tr>";
            }

            // hasFirstGivenName
            if($ins->get('familyTree:hasFirstGivenName')){
              echo "<tr>";
              echo "<td>firstGivenName</td><td>".$ins->get('familyTree:hasFirstGivenName')."</td></tr>";
            }

            // hasNickName
            if($ins->get('ihero:hasNickName')){
              echo "<tr>";
              echo "<td>nickName</td><td>".$ins->get('ihero:hasNickName')."</td></tr>";
            }

            // alsoKnownAs
            if($ins->get('familyTree:alsoKnownAs')){
              echo "<tr>";
              echo "<td>alsoKnownAs</td><td>".$ins->get('familyTree:alsoKnownAs')."</td></tr>";
            }

            // formerlyKnownAs
            if($ins->get('familyTree:formerlyKnownAs')){
              echo "<tr>";
              echo "<td>formerlyKnownAs</td><td>".$ins->get('familyTree:formerlyKnownAs')."</td></tr>";
            }

            // honorificPrefix
            if($ins->get('ihero:hasHonorificPrefix')){
              echo "<tr><td>honorificPrefixe</td><td>";
              foreach ($ins->all('ihero:hasHonorificPrefix') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // nationality
            if($ins->get('ihero:hasNationality')){
              echo "<tr><td>nationality</td><td>";
              foreach ($ins->all('ihero:hasNationality') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // occupation
            if($ins->get('ihero:hasOccupation')){
              echo "<tr><td>occupation</td><td>";
              foreach ($ins->all('ihero:hasOccupation') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // rank
            if($ins->get('ihero:hasRank')){
              echo "<tr><td>rank</td><td>";
              foreach ($ins->all('ihero:hasRank') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject)."<br/>";
              }
              echo "</td></tr>";
            }

            // religion
            if($ins->get('ihero:hasReligion')){
              echo "<tr>";
              echo "<td>religion</td><td>".$ins->get('ihero:hasReligion')."</td></tr>";
            } 

            // spouse
            if($ins->get('familyTree:isSpouseOf')){
              echo "<tr><td>spouse</td><td>";
              foreach ($ins->all('familyTree:isSpouseOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasHusband
            if($ins->get('familyTree:hasHusband')){
              echo "<tr><td>husband</td><td>";
              foreach ($ins->all('familyTree:hasHusband') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasWife
            if($ins->get('familyTree:hasWife')){
              echo "<tr><td>wife</td><td>";
              foreach ($ins->all('familyTree:hasWife') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasParent
            if($ins->get('familyTree:hasParent')){
              echo "<tr><td>parent</td><td>";
              foreach ($ins->all('familyTree:hasParent') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasFather
            if($ins->get('familyTree:hasFather')){
              echo "<tr><td>father</td><td>";
              foreach ($ins->all('familyTree:hasFather') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasMother
            if($ins->get('familyTree:hasMother')){
              echo "<tr><td>mother</td><td>";
              foreach ($ins->all('familyTree:hasMother') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepParent
            if($ins->get('ihero:hasStepParent')){
              echo "<tr><td>stepParent</td><td>";
              foreach ($ins->all('ihero:hasStepParent') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepFather
            if($ins->get('ihero:hasStepFather')){
              echo "<tr><td>stepFather</td><td>";
              foreach ($ins->all('ihero:hasStepFather') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepMother
            if($ins->get('ihero:hasStepMother')){
              echo "<tr><td>stepMother</td><td>";
              foreach ($ins->all('ihero:hasStepMother') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }
         
            // hasChild
            if($ins->get('familyTree:hasChild')){
              echo "<tr><td>child</td><td>";
              foreach ($ins->all('familyTree:hasChild') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasSon
            if($ins->get('familyTree:hasSon')){
              echo "<tr><td>son</td><td>";
              foreach ($ins->all('familyTree:hasSon') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasDaughter
            if($ins->get('familyTree:hasDaughter')){
              echo "<tr><td>daughter</td><td>";
              foreach ($ins->all('familyTree:hasDaughter') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepChild
            if($ins->get('ihero:hasStepChild')){
              echo "<tr><td>stepChild</td><td>";
              foreach ($ins->all('ihero:hasStepChild') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepSon
            if($ins->get('ihero:hasStepSon')){
              echo "<tr><td>stepSon</td><td>";
              foreach ($ins->all('ihero:hasStepSon') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepDaughter
            if($ins->get('ihero:hasStepDaughter')){
              echo "<tr><td>stepDaughter</td><td>";
              foreach ($ins->all('ihero:hasStepDaughter') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasSibling
            if($ins->get('ihero:hasSibling')){
              echo "<tr><td>sibling</td><td>";
              foreach ($ins->all('ihero:hasSibling') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasBrother
            if($ins->get('familyTree:hasBrother')){
              echo "<tr><td>brother</td><td>";
              foreach ($ins->all('familyTree:hasBrother') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasSister
            if($ins->get('familyTree:hasSister')){
              echo "<tr><td>sister</td><td>";
              foreach ($ins->all('familyTree:hasSister') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepSibling
            if($ins->get('ihero:hasStepSibling')){
              echo "<tr><td>stepSibling</td><td>";
              foreach ($ins->all('ihero:hasStepSibling') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepBrother
            if($ins->get('ihero:hasStepBrother')){
              echo "<tr><td>stepBrother</td><td>";
              foreach ($ins->all('ihero:hasStepBrother') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // new -> hasStepSister 
            if($ins->get('ihero:hasStepSister')){
              echo "<tr><td>stepSister</td><td>";
              foreach ($ins->all('ihero:hasStepSister') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasAdjutant
            if($ins->get('ihero:hasAdjutant')){
              echo "<tr><td>adjutant</td><td>";
              foreach ($ins->all('ihero:hasAdjutant') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";
            }
            // hasAllegiance
            if($ins->get('ihero:hasAllegiance')){
              echo "<tr><td>allegiance</td><td>";
              foreach ($ins->all('ihero:hasAllegiance') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";
            }

            // hasAlly
            if($ins->get('ihero:isAllyOf')){
              echo "<tr><td>ally</td><td>";
              foreach ($ins->all('ihero:isAllyOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasBattle
            if($ins->get('ihero:hasBattle')){
              echo "<tr><td>Battle</td><td>";
              foreach ($ins->all('ihero:hasBattle') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasChairman
            if($ins->get('ihero:hasChairman')){
              echo "<tr><td>chairman</td><td>";
              foreach ($ins->all('ihero:hasChairman') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasCommander
            if($ins->get('ihero:hasCommander')){
              echo "<tr><td>commander</td><td>";
              foreach ($ins->all('ihero:hasCommander') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasEnemy
            if($ins->get('ihero:hasEnemy')){
              echo "<tr><td>enemy</td><td>";
              foreach ($ins->all('ihero:hasEnemy') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasGovernmentHead
            if($ins->get('ihero:hasGovernmentHead')){
              echo "<tr><td>governmentHead</td><td>";
              foreach ($ins->all('ihero:hasGovernmentHead') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasKnownPeople
            if($ins->get('ihero:hasKnownPeople')){
              echo "<tr><td>knownPeople</td><td>";
              foreach ($ins->all('ihero:hasKnownPeople') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasLeader
            if($ins->get('ihero:hasLeader')){
              echo "<tr><td>leader</td><td>";
              foreach ($ins->all('ihero:hasLeader') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasMember
            if($ins->get('ihero:hasMember')){
              echo "<tr><td>member</td><td>";
              foreach ($ins->all('ihero:hasMember') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // hasMilitaryBranch
            if($ins->get('ihero:hasMilitaryBranch')){
              echo "<tr><td>militaryBranch</td><td>";
              foreach ($ins->all('ihero:hasMilitaryBranch') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";  
            }

            // hasMilitaryCommand
            if($ins->get('ihero:hasMilitaryCommand')){
              echo "<tr><td>militaryCommand</td><td>";
              foreach ($ins->all('ihero:hasMilitaryCommand') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";  
            }

            // office
            if($ins->get('ihero:hasOffice')){
              echo "<tr><td>office</td><td>";
              foreach ($ins->all('ihero:hasOffice') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";
            }

            // officer
            if($ins->get('ihero:hasOfficer')){
              echo "<tr><td>officer</td><td>";
              foreach ($ins->all('ihero:hasOfficer') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";
            }


            // party
            if($ins->get('ihero:hasParty')){
              echo "<tr><td>party</td><td>";
              foreach ($ins->all('ihero:hasParty') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // predecessor
            if($ins->get('ihero:hasPredecessor')){
              echo "<tr><td>predecessor</td><td>";
              foreach ($ins->all('ihero:hasPredecessor') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // successor
            if($ins->get('ihero:hasSuccessor')){
              echo "<tr><td>successor</td><td>";
              foreach ($ins->all('ihero:hasSuccessor') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // president
            if($ins->get('ihero:hasPresident')){
              echo "<tr><td>president</td><td>";
              foreach ($ins->all('ihero:hasPresident') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // primeMinister
            if($ins->get('ihero:hasPrimeMinister')){
              echo "<tr><td>primeMinister</td><td>";
              foreach ($ins->all('ihero:hasPrimeMinister') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }           
                   
            // hasStudent
            if($ins->get('ihero:hasStudent')){
              echo "<tr><td>Student</td><td>";
              foreach ($ins->all('ihero:hasStudent') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // Subject 
            if($ins->get('ihero:hasSubject')){
              echo "<tr><td>Subject</td><td>";
              foreach ($ins->all('ihero:hasSubject') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";
            }

            // hasTeacher
            if($ins->get('ihero:hasTeacher')){
              echo "<tr><td>hasTeacher</td><td>";
              foreach ($ins->all('ihero:hasTeacher') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }  
            
            // vicePresident
            if($ins->get('ihero:hasVicePresident')){
              echo "<tr><td>vicePresident</td><td>";
              foreach ($ins->all('ihero:hasVicePresident') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isAllegianceOf
            if($ins->get('ihero:isAllegianceOf')){
              echo "<tr><td>isAllegianceOf</td><td>";
              foreach ($ins->all('ihero:isAllegianceOf') as $subject) {
                echo str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."<br/>";
              }
              echo "</td></tr>";
            }

            // isHusbandOf
            if($ins->get('familyTree:isHusbandOf')){
              echo "<tr><td>isHusbandOf</td><td>";
              foreach ($ins->all('familyTree:isHusbandOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isWifeOf
            if($ins->get('familyTree:isWifeOf')){
              echo "<tr><td>isWifeOf</td><td>";
              foreach ($ins->all('familyTree:isWifeOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isParentOf
            if($ins->get('familyTree:isParentOf')){
              echo "<tr><td>isParentOf</td><td>";
              foreach ($ins->all('familyTree:isParentOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isFatherOf
            if($ins->get('familyTree:isFatherOf')){
              echo "<tr><td>isFatherOf</td><td>";
              foreach ($ins->all('familyTree:isFatherOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isMotherOf
            if($ins->get('familyTree:isMotherOf')){
              echo "<tr><td>isMotherOf</td><td>";
              foreach ($ins->all('familyTree:isMotherOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isChildOf
            if($ins->get('familyTree:isChildOf')){
              echo "<tr><td>isChildOf</td><td>";
              foreach ($ins->all('familyTree:isChildOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isSonOf
            if($ins->get('familyTree:isSonOf')){
              echo "<tr><td>isSonOf</td><td>";
              foreach ($ins->all('familyTree:isSonOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isDaughterOf
            if($ins->get('familyTree:isDaughterOf')){
              echo "<tr><td>isDaughterOf</td><td>";
              foreach ($ins->all('familyTree:isDaughterOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isBrotherOf
            if($ins->get('familyTree:isBrotherOf')){
              echo "<tr><td>isBrotherOf</td><td>";
              foreach ($ins->all('familyTree:isBrotherOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isSisterOf
            if($ins->get('familyTree:isSisterOf')){
              echo "<tr><td>isSisterOf</td><td>";
              foreach ($ins->all('familyTree:isSisterOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isAllyOf
            if($ins->get('ihero:isAllyOf')){
              echo "<tr><td>isAllyOf</td><td>";
              foreach ($ins->all('ihero:isAllyOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isBattleOf
            if($ins->get('ihero:isBattleOf')){
              echo "<tr><td>isBattleOf</td><td>";
              foreach ($ins->all('ihero:isBattleOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isChairmanOf
            if($ins->get('ihero:isChairmanOf')){
              echo "<tr><td>isChairmanOf</td><td>";
              foreach ($ins->all('ihero:isChairmanOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isCommanderOf
            if($ins->get('ihero:isCommanderOf')){
              echo "<tr><td>isCommanderOf</td><td>";
              foreach ($ins->all('ihero:isCommanderOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isEnemyOf
            if($ins->get('ihero:isEnemyOf')){
              echo "<tr><td>isEnemyOf</td><td>";
              foreach ($ins->all('ihero:isEnemyOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }                   
            
            // isGovernmentHeadOf
            if($ins->get('ihero:isGovernmentHeadOf')){
              echo "<tr><td>isGovernmentHeadOf</td><td>";
              foreach ($ins->all('ihero:isGovernmentHeadOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isInauguralOf
            if($ins->get('ihero:isInauguralOf')){
              echo "<tr><td>isInauguralOf</td><td>";
              foreach ($ins->all('ihero:isInauguralOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isInfluencedOf
            if($ins->get('ihero:isInfluencedOf')){
              echo "<tr><td>isInfluencedOf</td><td>";
              foreach ($ins->all('ihero:isInfluencedOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isLeaderOf
            if($ins->get('ihero:isLeaderOf')){
              echo "<tr><td>isLeaderOf</td><td>";
              foreach ($ins->all('ihero:isLeaderOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isMilitaryBranchOf
            if($ins->get('ihero:isMilitaryBranchOf')){
              echo "<tr><td>isMilitaryBranchOf</td><td>";
              foreach ($ins->all('ihero:isMilitaryBranchOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isMilitaryCommandOf
            if($ins->get('ihero:isMilitaryCommandOf')){
              echo "<tr><td>isMilitaryCommandOf</td><td>";
              foreach ($ins->all('ihero:isMilitaryCommandOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isMinisterOf
            if($ins->get('ihero:isMinisterOf')){
              echo "<tr><td>isMinisterOf</td><td>";
              foreach ($ins->all('ihero:isMinisterOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isOfficeOf
            if($ins->get('ihero:isOfficeOf')){
              echo "<tr><td>isOfficeOf</td><td>";
              foreach ($ins->all('ihero:isOfficeOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isPartyOf
            if($ins->get('ihero:isPartyOf')){
              echo "<tr><td>isPartyOf</td><td>";
              foreach ($ins->all('ihero:isPartyOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isPersonOf
            if($ins->get('ihero:isPersonOf')){
              echo "<tr><td>isPersonOf</td><td>";
              foreach ($ins->all('ihero:isPersonOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isPredecessorOf
            if($ins->get('ihero:isPredecessorOf')){
              echo "<tr><td>isPredecessorOf</td><td>";
              foreach ($ins->all('ihero:isPredecessorOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isPrimeMinisterOf
            if($ins->get('ihero:isPrimeMinisterOff')){
              echo "<tr><td>isPrimeMinisterOf</td><td>";
              foreach ($ins->all('ihero:isPrimeMinisterOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isPresidentOf
            if($ins->get('ihero:isPresidentOf')){
              echo "<tr><td>isPresidentOf</td><td>";
              foreach ($ins->all('ihero:isPresidentOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }

            // isRepresentativeOf
            if($ins->get('ihero:isRepresentativeOf')){
              echo "<tr><td>isRepresentativeOf</td><td>";
              foreach ($ins->all('ihero:isRepresentativeOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }
          

            // isSuccessorOf
            if($ins->get('ihero:isSuccessorOf')){
              echo "<tr><td>isSuccessorOf</td><td>";
              foreach ($ins->all('ihero:isSuccessorOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";  
            }           

            // isSubjectOf 
            if($ins->get('ihero:isSubjectOf')){
              echo "<tr><td>isSubjectOf</td><td>";
              foreach ($ins->all('ihero:isSubjectOf') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";
            }

            // knownFor 
            if($ins->get('ihero:knownFor')){
              echo "<tr><td>knownFor</td><td>";
              foreach ($ins->all('ihero:knownFor') as $subject) {
                echo '<a href="?entity='.urlencode($subject).'">'.str_replace('http://www.semanticweb.org/asus/ontologies/2016/3/ihero/', "", $subject->get('familyTree:hasName'))."</a><br/>";
              }
              echo "</td></tr>";
            }

            echo "</table>";  
            echo "</div>";
        */
        }

        
        ?> 

      </div>
    </div>

    <footer>
      <div class="row">
        <!--
		<div class="medium-6 columns">
          <ul class="menu">
            <li><a href="#">Legal</a></li>
            <li><a href="#">Partner</a></li>
            <li><a href="#">Explore</a></li>
          </ul>
        </div>
        <div class="medium-6 columns">
          <ul class="menu float-right">
            <li class="menu-text">Tugas Akhir 2016</li>
          </ul>
        </div>
		-->
      </div>
    </footer>
  </div> 
</body>
</html>