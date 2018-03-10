<?php
  $user ="root";
  $host="localhost";
  $pwd="";
  $db="ecommerce";
  $con = new mysqli($host,$user,$pwd,$db);
  function get_menu(){
      global $con;
      $result = $con->query("SELECT * FROM `menu`");
      while ($row = $result->fetch_object())
      {
          $menu_id=$row->menu_id;
          $menu_title=$row->menu_title;

          echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>$menu_title<b class='caret'></b></a></li>";


          $sub_sql=$con->query("SELECT * FROM submenu WHERE menu_id='".$menu_id."'");
          echo "<ul class='multi-column-dropdown'>";

          while($row=$sub_sql->fetch_object()){
              $sub_title=$row->sub_title;
              echo "<li><a class='list' href='#'>$sub_title</a></li>";
          }
          echo "</ul>";

      }
  }
  function get_category(){
      global $con;
      $result = $con->query("SELECT * FROM `categories`");
      while ($row = $result->fetch_object())
      {
          $cat_id=$row->cat_id;
          $cat_title=$row->cat_title;
          echo "<li><a href='#'>$cat_title</a></li>";
      }
  }
  function get_brand(){
      global $con;
      $result=$con->query("select * from `brand`");
      while ($row=$result->fetch_object()){
          $brand_id=$row->brand_id;
          $brand_title=$row->brand_title;
          echo "<li><a href='#'>$brand_title</a></li>";
      }
      mysqli_close($con);
  }



