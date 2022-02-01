<?php 
  echo 'Ola';
?>

//alerts
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<body>
	<div class="container mt-2">

		<!-- Input field to accept user input -->
		<textarea id="textarea" rows="4" cols="50"></textarea><br>
		
		<!-- Button to invoke the modal -->
		<button type="button"
			class="btn btn-success btn-sm" data-toggle="modal"
      data-target="#exampleModal" id="submit">Submit
		</button>

		<!-- modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"
							id="exampleModalLabel">
							Entered Data
						</h5>
						
						<button type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close">

							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>

					<div class="modal-body">

						<!-- Data passed is displayed
							in this part of the
							modal body -->
						<p id="modal_body"></p>

						<button type="button"
							class="btn btn-warning btn-sm"
							data-toggle="modal"
							data-target="#exampleModal">
							Proceed
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#submit").click(function () {
			var text = $("#textarea").val();
			$("#modal_body").html(text);
		});
	</script>
</body>
