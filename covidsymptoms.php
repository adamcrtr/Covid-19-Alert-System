











<?=template_header('covidsymptoms')?>

<div class="container headerbanner">
    <div class="row text-center">
      <div class="col-sm-12 ">
          <h4>Covid-19 Information</h4>
        </div>
    </div>
</div>



<div class="container headerbanner">
    <div class="row">
      <div class="col-sm-4 imgspace">
          <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands.jpg" />
          <div class="centered text">Hands</div>
      </div>
        <div class="col-sm-4 imgspace">
            <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face.jpg" />
            <div class="centered text">Face</div>
        </div>
        <div class="col-sm-4 imgspace">
            <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space2.jpg" />
            <div class="centered text">Space</div>
        </div>
    </div>
</div>

<div class="container headerbanner">
    <div class="row">
      <div class="col-sm-4 imgspace">
          <img class="img-fluid headimg" height="300px" width="300px" src="imgs/hands2.jpg" />
      </div>
        <div class="col-sm-4 imgspace">
            <img class="img-fluid headimg" height="300px" width="300px" src="imgs/face2.jpg" />
        </div>
        <div class="col-sm-4 imgspace">
            <img class="img-fluid headimg"  height="300px" width="300px" src="imgs/space.jpg" />
        </div>
    </div>
</div>

<hr class="space1">


<div class="container ">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="text-center topheader">Below is a graph showing Covid-19 vaccines administered to date</h1>
      <!--Iframe below is for the graph -->
<iframe src="https://ourworldindata.org/grapher/cumulative-covid-vaccinations?tab=chart&stackMode=absolute&country=England~Wales~Northern%20Ireland~Scotland&region=World" loading="lazy" style="width: 100%; height: 600px; border: 0px none;"></iframe>
  </div>
 </div>
</div>

<hr class="space">


<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">

      <h1 id="symtpomshead">Covid-19 Symptoms</h1>
      <p>These are some of the known covid symptoms, if you feel like you have any of these please contact your GP or click <a href="https://www.gov.uk/get-coronavirus-test"> Here </a> for more information on how to book a test </p>

    </div>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">
      <h1>Main Symptoms</h1>
    </div>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="col-sm-4 text-center ">

      <h2 id="symtpomshead" class="">A high temperature</h2>
      <p class="">An example if your back or chest is hot to touch. </p>

    </div>

    <div class="col-sm-4 text-center ">

      <h2 id="symtpomshead" class="">New, continous cough</h2>
      <p class="">If you are coughing a lot for more than an hour. </p>

    </div>

    <div class="col-sm-4 text-center ">

      <h2 id="symtpomshead" class="">Change or loss to smell or taste</h2>
      <p class="">Example being if you cannot tast or smell, but can also include things smelling or tasting differently. </p>

    </div>
  </div>
</div>



<hr class="space1">


<div class="container">
  <div class="row">
    <div class="col-sm-12 text-center">

      <h1 id="">Vaccine Information</h1>
      <p> Here is some information from the NHS about the vaccine click <a href="https://www.nhs.uk/conditions/coronavirus-covid-19/coronavirus-vaccination/coronavirus-vaccine/"> Here </a> for more information. </p>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4 text-center ">


      <p class="">Currently the vaccine is being given to those most at risk, such as those ages 80 or over. </p>

    </div>

    <div class="col-sm-4 text-center ">


      <p class="">You must be registered with a GP surgery, this will then allow you to receive a letter when it is your time. </p>

    </div>

    <div class="col-sm-4 text-center ">


      <p class="">The vaccine is administered by an injection, this injection is put inot the upper arm. Clinical trials and safety checks have ensured the vaccine is safe.</p>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4 text-center ">


      <p class="">Side effects on the vaccine include, where the needle went in the arm may be sore. Feeling tired. A headache. Feeling Achy. Feeling sick. </p>

    </div>

    <div class="col-sm-4 text-center ">


      <p class="">The vaccine is effective if you have had the 1st dose, but the second dose gives you longer lating protection. </p>

    </div>

    <div class="col-sm-4 text-center ">


      <p class="">There are rare circumstances where the vaccine may give an allergic reaction. If you have ever had a serious allergic reaction tell the healthcare professional before receiving the vaccine.</p>

    </div>
  </div>
</div>


<?=template_footer()?>
