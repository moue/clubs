<script>
	$('.container').keypress(function() {
		$.ajax({
			url:"index-randomizer.php"
			type: "post",
			success: function(data) {
				$('.container').replaceWith(data);
				console.log(data);
			}
		})
		return false;
	};		
</script>
