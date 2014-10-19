<div class = "span12 container" id="clubs_wrapper">

<?php
	$result = mysql_query("SELECT club_id, name, blurb, size, involvement, email, site, 
	                            address, election_month, update_date, pic FROM club_master") 
	or die(mysql_error());
	$tag_ref = mysql_query("SELECT tag_id, tag_string FROM tag_ref")
	  or die(mysql_error());
	$refs_array = array();
	while($ref = mysql_fetch_array($tag_ref)) {
	  $refs_array[$ref["tag_id"]] = $ref["tag_string"];
	} 
	while ($row = mysql_fetch_array($result)) { 
	  $cid = $row["club_id"];
      
      // grab tags
	  $tags = mysql_query("SELECT club_tag FROM club_tags WHERE club_id ='".$row["club_id"]."'")
	    or die(mysql_error());
	    
	  // create tag string
	  $class_tag_string = "";
	  $tag_string = "";
	  while($tag = mysql_fetch_array($tags)) {
	    $class_tag_string = $class_tag_string . " cat" . $tag["club_tag"];
	    if(empty($tag_string))
	      $tag_string = $refs_array[$tag["club_tag"]];
	    else
  	    $tag_string = $tag_string . ", " . $refs_array[$tag["club_tag"]]; 
	  }
	 
	  // this is for the clubs list
	  echo '<div class="item '.$class_tag_string.'"> <a href=#'.$row["club_id"].' data-toggle="modal">'
	    .$row["name"].'</a> </div>';
	  
	  // this is for the modal view
	  include 'includes/content/clubs_modals.php';
	}
    ?>
</div>
