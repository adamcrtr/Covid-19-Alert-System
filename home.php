<?php
// Get the 4 most recently added products
//$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
//$stmt->execute();
//$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--Below used for page routing-->
<?=template_header('Home')?>

<div class="container headerbanner">
    <div class="row text-center">
      <div class="col-sm-12 ">
          <h4>Home</h4>
        </div>
    </div>
</div>

<!--First row of images -->
<div class="container headerbanner">
    <div class="row">
      <div class="col-sm-4 imgspace">
          <!--image 1 -->
          <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands.jpg" alt="Image of hands" />
          <div class="centered text">Hands</div>
      </div>
        <div class="col-sm-4 imgspace">
            <!--iimage 2-->
            <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face.jpg" alt="Image of someone wearing a mask" />
            <div class="centered text">Face</div>
        </div>
        <div class="col-sm-4 imgspace">
            <!--Image 3-->
            <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space2.jpg" alt ="Image of someone giving space" />
            <div class="centered text">Space</div>
        </div>
    </div>
</div>




<!--Second row of images -->
<div class="container headerbanner">
    <div class="row">
      <div class="col-sm-4 imgspace">
         <!--Image 1 -->
          <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands2.jpg" />
      </div>
        <div class="col-sm-4 imgspace">
          <!--Image 2 -->
            <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face2.jpg" />
        </div>
        <div class="col-sm-4 imgspace">
          <!--Image 3 -->
            <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space.jpg" />
        </div>
    </div>
</div>

<hr class="space1">

<!--Page header and description -->
<div class="container ">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-center topheader">Below data from oxford university</h1>
      <!--Iframe below is for the graph -->
    <iframe src="https://ourworldindata.org/grapher/covid-tests-cases-deaths-per-million?tab=chart&stackMode=absolute&time=2020-03-07..latest&country=~GBR&region=World" loading="lazy" style="width: 100%; height: 600px; border: 0px none;"></iframe>
  </div>
 </div>
</div>

<hr class="space1">

<!--section for video  -->
<div class="container">
  <div class="row">
    <div class="col-sm-8 containerside" id="side">
      <!-- 16:9 -->
      <h4 class="text-center">Watch this government video for guidance on how to minimise infection</h4>
      <div class="embed-responsive embed-responsive-16by9">
        <!--Video Iframe-->
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1CUrxdTd1bc"></iframe>

      </div>
    </div>

    <!--Section for RSS news feed -->
    <div class="col-sm-4" id="rss">
      <h4 class="text-center">Useful news feeds from the BBC</h4>
      <!--Script below points to actual news feed -->
      <script src="//rss.bloople.net/?url=http%3A%2F%2Ffeeds.bbci.co.uk%2Fnews%2Fhealth%2Frss.xml&showtitle=false&type=js"></script>
    </div>
  </div>
</div>



<!--template footer adds footer to page -->
<?=template_footer()?>
