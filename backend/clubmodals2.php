<?php
	
	include '../includes/common.php'; 
	
	if(isset($_POST['url'])) {
    $url = $_POST['url'];
	}

	// grab all info from data for club with matching url
	$result = mysql_query('SELECT * FROM club_master WHERE club_id ="'.$url.'"') or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	
	// Grab Tags
	  $tags_result = mysql_query("SELECT club_tag FROM club_tags WHERE club_id ='".$url."'") or die(mysql_error());
	  
	  echo $tags_result;
	  
	  $tag = mysql_fetch_array( $tags_result);
	  
	  echo $tag; 
	  
	  $tag_string = "";
	  while($tags = mysql_fetch_array( $tags_result)) {
	    if(empty($tag_string)) {
	      $tag_string = $refs_array[$tags["club_tag"]];
	      echo $tag_string;
	    }
	    else {
  	    $tag_string = $tag_string . ", " . $refs_array[$tags["club_tag"]]; 
  	    echo $tag_string;
  	  }
	  }
	  
	  echo $tag_string;
	
	
	$protected_email = hide_email($row["email"]);
  
  switch($row["size"]) {
    case 0:
      $size = "1-9";
      break;
    case 1:
      $size = "10-25";
      break;
    case 2:
      $size = "26-50";
      break;
    case 3:
      $size = "51-75";
      break;
    case 4:
      $size = "76-100";
      break;
    case 5:
      $size = "> 100";
      break;
  }

	echo '<div id='.$row["club_id"].' class="modal hide fade" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  
 
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>'.$row["name"].'</h3>
    <p>'.$tag_string.'</p>
  <hr>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span8">
      <p>'.$row["blurb"].'</p>
      
      <hr>
      <p>Number of Members: '.$size.'</p>
              <p>Involvement: '.$row["involvement"].'</p>'
              /*
        if(!empty($protected_email)):
          '<p>Group Email: '.$protected_email.'</p>'
        if(!empty($row["site"]))
          echo '<p>Group Website: <a href='.$row["site"].'>'.$row["site"],'</a></p>';
      ?>
      </div>
    
    </div>  
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
*/
?>
