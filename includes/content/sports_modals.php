<?php
  echo '<div id=s'.$row["sports_id"].' class="modal hide fade" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">';
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <?php
      echo '<h3>'.$row["sport_name"].'</h3>
            <p>Athletics</p>';
    ?>
  <hr>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span8">
      <?php
        //echo $row["sport_html"];
      ?>
      </div>
      <div class="span4">
      
      </div>
    </div>  
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>