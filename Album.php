
<?php
session_start();
include 'header.php';

?>

<html>
<body>

<div class="container"style="border-radius: 34px!important;background-color:#fefffe!important;margin-bottom:2%;">
      <div class="contentcc "style="padding:2%;">
      <div class="row">
          <div class="col-sm-3">
            <div class="albumcover_page"><img class="img-fluid "src="Images/10_18_2021-11-59_3960712a7b6cbcc792502d877fb9a170c5.1000x1000x1.jpg"Style="
                  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;"></div></div>
                  <div class ="col-sm-9 ">

                      <h1 font-size="font-size:200%!important;">Igor</h1>

                     <div class="Userlink " >

              <a style = "color:black; text-decoration:none!important"href ="profile.php?id=' . $row['User_ID'] . '">
              tyler</a></div>
</div>
</br>
    <div class="col-sm-12">
<div class="Song">
    1. Hellen keller
    <audio src="horse.ogg" controls>

</audio></div>
</div>

</div>


</div>






<?php

?>

<style>
    .albumcover_page{box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;}
    .Song{margin-top:5%!important;padding:1%!important;width:100%; border-radius: 15px!important;Background-color:#f3f3f4;
        color:black!important; transition:.2s}
        .Song:hover{
            background-color:#f3f3f4!important;
        }

    </style>

</body>
</html>