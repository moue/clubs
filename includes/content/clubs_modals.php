<?php
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
  aria-labelledby="myModalLabel" aria-hidden="true">';
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <?php
      echo '<h3>'.$row["name"].'</h3>
            <p>'.$tag_string.'</p>';
    ?>
  <hr>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span8">
      <?php
        echo '<p>'.$row["blurb"].'</p>';
      ?>
      <hr>
      <?php    
        echo '<p>Number of Members: '.$size.'</p>
              <p>Involvement: '.$row["involvement"].'</p>';
        if(!empty($protected_email))
          echo '<p>Group Email: '.$protected_email.'</p>';
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
