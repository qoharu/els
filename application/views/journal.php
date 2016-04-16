<?php include "header.php" ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12 isi">
					<div class="col-md-12 well">
						<div class="input-group">
		                    <input type="text" class="form-control">
		                    <span class="input-group-btn">
		                    	<button class="btn btn-primary btn-flat" type="button">Search!</button>
		                	</span>
		                </div>
					</div>
					<?php var_dump($listjournal) ?>
					<div  class="col-md-12 well">
						<a href="<?php echo site_url('journal/newpost') ?>" title="New post" class="btn btn-primary btn-lg btn-flat pull-right"><i class="fa fa-plus"></i></a>
						<h2>Popular Journal</h2>
						<div class="col-md-3  well">
							Journal 1 asldjawidjlkj
						</div> 
						<div class="col-md-3 col-md-offset-1 well">
							Journal 1 asldjawidjlkj
						</div>
						<div class="col-md-3 col-md-offset-1 well">
							Journal 1 asldjawidjlkj
						</div>
						<div class="col-md-3  well">
							Journal 1 asldjawidjlkj
						</div> 
						<div class="col-md-3 col-md-offset-1 well">
							Journal 1 asldjawidjlkj
						</div>
						<div class="col-md-3 col-md-offset-1 well">
							Journal 1 asldjawidjlkj
						</div>
					</div>
				</div>

			</div>

		</div>

	</body>
</html>
