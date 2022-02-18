	<!-- Core Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/sweetalert.js"></script>
	<script src="../assets/js/notify.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#b-file').on('change', function(){
				var file = $(this).val().split('\\').pop();
				$('.custom-file-label').html(file);
			});
		});

		function confirm_delete(){
			if (confirm("Are you sure you want to delete? ")) return true;
			return false;
		}
	</script>
</body>
</html>