<?php include "header.php" ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12 isi">
					<div class="col-md-12 well">
					<form action="<?php echo site_url('journal/browse') ?>" method="GET">
						<div class="input-group">
		                    <input type="text" name="q" class="form-control" placeholder="Search" >
		                    <span class="input-group-btn">
		                    	<button class="btn btn-primary btn-flat" type="submit">Search!</button>
		                	</span>
		                </div>
					</form>
					</div>
					<div  class="col-md-12 well">
						<a href="<?php echo site_url('journal/newpost') ?>" title="New post" class="btn btn-primary btn-lg btn-flat pull-right"><i class="fa fa-plus"></i></a>
						<h2>Jurnal Populer</h2>
						<hr>
						<?php $i=0 ?>
						<?php foreach ($listjournal as $journal): ?>
								<div class="col-md-4">
									<div class="box box-primary">
										<div class="box-header with-border">
									    	<h3 class="box-title"><strong><a href="<?php echo site_url('journal/view/'.$journal->id_journal) ?>"><?php echo $journal->title; ?></a></strong></h3>
									    	<div class="author">
										    	Oleh : 
										    		<a href="<?php echo site_url('user/'.$journal->id_user) ?>">
										    			<strong><?php echo $journal->fullname ?></strong>
										    		</a>
									    	</div>
									    </div>
									    <div class="box-body">
										    <p><?php echo $journal->description ?></p>
									    	<span class="pull-right badge bg-blue"><?php echo $journal->directorate_name ?></span>
									    </div>
									</div>
								</div>
							<?php $i++; ?>
						<?php endforeach ?>

					</div>
				</div>

			</div>

		</div>

	</body>
</html>
