
<?php
	$academic_ids = mysql_query("SELECT club_id FROM club_tags WHERE club_tag=1") or 
    die(mysql_error());
	while ($row = mysql_fetch_array($academic_ids)) {
	    $academic_club = mysql_query("SELECT * FROM club_master WHERE club_id='%d'",
	}
    ?>
</div>

