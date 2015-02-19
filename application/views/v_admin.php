<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Hello, Mark!</h1>
		
	</div>
</div>

<div class="container">
	<!-- Example row of columns -->
	<div class="row">

		<div class="col-md-12">
			<?php if($this->session->flashdata('msg')):?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('msg');?>
						</div>
			<?php endif?>
			
			<h3>Updates</h3>
			<a href="admin/update_db" class="btn btn-primary">Update DB</a>
		</div>
	</div>
	<hr>
</div>
