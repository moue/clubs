<!--<? include 'includes/facebook_common.php' ?>-->

    <div class="row-fluid">
      <div class="span12">
        <div class="span3">
          <div class="sidebar" style="padding-top: 15px; position: fixed;">
            <!--<?
            if($uid != 0): ?>
            <img src="https://graph.facebook.com/<?echo $uid?>/picture?type=normal" style="padding-left: 20px;">
            <h4 style="padding-left: 40px;"><?echo $name?><h4>
            <? endif; ?>-->
            
            <div id="filters">
            <!--
            <?
            if($uid != 0): ?>
              <label class="checkbox">
                <input type="checkbox" value="">
                Joined Clubs
              </label>
              <label class="checkbox">
                <input type="checkbox" value="">
                Starred
              </label>
              <label class="checkbox">              
                <input type="checkbox" value="">
                Friend's Clubs
              </label>
	            <hr>
            <? endif; ?>
            -->
        
              <label class="checkbox">              
                <input type="checkbox" value="*" id="all">
                All 
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat1">
                Academic/Pre-Professional
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat2">
                Arts
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat15">
                Athletics
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat13">
                Campus Life
              </label>
              <label class="checkbox">              
                <input type="checkbox" value=".cat3">
                Cultural/Racial
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat4">
                Gender/Sexuality
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat5">
                Government/Politics
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat6">
                Health/Wellness
              </label>
              <label class="checkbox">              
                <input type="checkbox" value=".cat7">
                Media/Publications 
              </label>            
              <label class="checkbox">              
                <input type="checkbox" value=".cat8">
                Public Service
              </label>             
              <label class="checkbox">              
                <input type="checkbox" value=".cat9">
                Recreation 
              </label>             
              <label class="checkbox">              
                <input type="checkbox" value=".cat10">
                Religious
              </label>
              <label class="checkbox">              
                <input type="checkbox" value=".cat11">
                Social
              </label>
              <label class="checkbox">
                <input type="checkbox" value=".cat12">
                Women's Initiative
              </label>
            </div>
        </div> <!-- span3 -->
        <div class="span9" style="margin-left: 0px" >
          <br>
            <span>Search:&nbsp;</span>
            <input type="text" name="search-isotope" id="search-isotope" value class="span9 input-medium search-query">
            <!--<button type="submit" class="btn">Search</button>-->
            <!-- <select class="span3">
              <option># of Members</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>  -->           
          <hr>
          <div class = "span12 container" style="margin-left:0px; min-height: 670px; overflow-x: hidden;" id="clubs_wrapper">
          

<?php

	// Grab club master list
	$club_list = mysql_query("SELECT club_id, name, blurb, size, involvement, email, site, 
	                            address, election_month, update_date, pic FROM club_master") 
	  or die(mysql_error());
  
  // Grab tag references and create reference array.	
	$tag_ref = mysql_query("SELECT tag_id, tag_string FROM tag_ref")
	  or die(mysql_error());
	$refs_array = array();
	while($ref = mysql_fetch_array($tag_ref)) {
	  $refs_array[$ref["tag_id"]] = $ref["tag_string"];
	} 

    // Create html for each club    
	while ($row = mysql_fetch_array($club_list)) { 
	  $cid = $row["club_id"];
	  
    // Grab Tags
	  $tags = mysql_query("SELECT club_tag FROM club_tags WHERE club_id ='".$row["club_id"]."'")
	    or die(mysql_error());
	    
	  // Create Tag String
	  $class_tag_string = "";
	  $tag_string = "";
	  while($tag = mysql_fetch_array($tags)) {
	    $class_tag_string = $class_tag_string . " cat" . $tag["club_tag"];
	    if(empty($tag_string))
	      $tag_string = $refs_array[$tag["club_tag"]];
	    else
  	    $tag_string = $tag_string . ", " . $refs_array[$tag["club_tag"]]; 
	  }
	
	  // This is for isotope.
	  echo '<a href=#'.$row["club_id"].' class="'.$row["club_id"].'" data-toggle="modal"><div class="box-small '.$row["club_id"].' '.$class_tag_string.'">
	  	<span class="name">' 
	    .$row["name"].'</span></div></a>';
	  
	  // Create html for modal view.
	  include 'includes/content/clubs_modals.php';
	}
	
	// Grab sports master list
	$sports_list = mysql_query("SELECT * FROM sports_master");
	
	while ($row = mysql_fetch_array($sports_list)) { 
	  // This is for isotope.
	  echo '<a href=#s'.$row["sports_id"].' class="'.$row["sports_id"].'" data-toggle="modal"><div class="'.$row["club_id"].' box-small cat15">
	  	<span class="name">' 
	    .$row["sport_name"].'</span></div></a>';
	   
	  // Create html for modal view.  
	  include 'includes/content/sports_modals.php';
  }
?>
</div>
        </div> <!-- span9 -->
      </div> <!-- span12 -->
    </div>

