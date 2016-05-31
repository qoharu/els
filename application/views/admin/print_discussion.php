<?php include 'application/views/header.php' ?>
<?php $i=0; ?>
	<div class="row">
		<div class="content">
			<img class="logo-exp pull-right" src="<?php echo base_url('assets/img/Experta-Logo.png') ?>">
			<h3>Discussion Report</h3>
			<div class="col-md-3"><strong>Discussion Starter</strong> : <?php echo $detail->fullname ?></div>
			<div class="col-md-3"><strong>Email : </strong><?php echo $detail->email ?></div>
			<div class="col-md-3"><strong>NIK : </strong><?php echo $detail->nik ?></div>
			<div class="col-md-3"><strong>Expert : </strong><?php echo $detail->expert_name ?></div>
			<hr>
			<div class="col-md-3"><strong>Title</strong> : <?php echo $detail->title ?></div>
			<div class="col-md-3"><strong>Scope</strong> : <?php echo $detail->scope_name ?></div>
			<div class="col-md-3"><strong>Status</strong> : <?php echo switchstatus($detail->status)['title'] ?></div>
			<div class="col-md-3"><strong>URL</strong> : <?php echo $url ?></div>
			<div class="col-md-3"><strong>Created at</strong> : <?php echo $detail->created_at ?></div>
			<div class="col-md-3" ><strong>Updated at</strong> : <?php echo $detail->updated_at ?></div>
			<br>
			<strong>Content :</strong>
			<div class="well col-md-12"><?php echo $detail->content ?></div>
			<strong>Summary :</strong> 
			<div class="well col-md-12"><?php echo $detail->summary ?></div>
			<strong>Participant :</strong> 
			<table class="table table-bordered">
				<tbody>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Expert</th>
                      <th>Response Count</th>
                    </tr>
                    <?php foreach ($participant as $data): ?>
                    	<?php 
                    	if (empty($data->fullname)) {
                    		$fullname = explode('@', $data->email)[0];
                    	}else{
                    		$fullname = $data->fullname;
                    	}
                    	?>
                    <tr>
                      <td><?php echo $data->id_user ?></td>
                      <td><?php echo $fullname ?></td>
                      <td><?php echo $data->email ?></td>
                      <td><?php echo $data->expert_name ?></td>
                      <td><?php echo $data->count ?></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach ?>
                    <?php if ($i == 0): ?>
                    	<td colspan="5">Response data not found</td>
                    <?php endif ?>
                </tbody>
			</table>
		</div>
	</div>
<script type="text/javascript">
	window.print();
 	setTimeout(window.close, 100);
</script>