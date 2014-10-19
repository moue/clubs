<div id='index-randomizer'>

<?php 
    include 'includes/common.php'; 

	// grab two random club sports for the randomizer
	$sports_result = mysql_query('SELECT * FROM sports_master ORDER BY RAND() LIMIT 2') or die(mysql_error());
	    
	// grab 13 random clubs for the randomizer
	$clubs_result = mysql_query('SELECT * FROM club_master ORDER BY RAND() LIMIT 8') or die(mysql_error());
	
	// grab tag references and create reference array
	$tag_ref = mysql_query("SELECT tag_id, tag_string FROM tag_ref")
	  or die(mysql_error());
	$refs_array = array();
	while($ref = mysql_fetch_array($tag_ref)) {
	  $refs_array[$ref["tag_id"]] = $ref["tag_string"];
	} 

  // create html for each club
	while ($row = mysql_fetch_array($clubs_result)) { 
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
	  echo '<a href=#'.$row["club_id"].' data-toggle="modal"><div class="box '.$class_tag_string.'">' 
	    .$row["name"].'</div></a>';
	  
	  // create html for modal view
	  include 'includes/content/clubs_modals.php';	  	 
	}
	
	while ($row = mysql_fetch_array($sports_result)) {
		echo '<a href=#s'.$row["sports_id"].' data-toggle="modal"><div class="box cat15">' 
	    .$row["sport_name"].'</div></a>';
		include 'includes/content/sports_modals.php';
	}
?>

</div>
