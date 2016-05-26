<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">journal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


                <h3>Pending</h3>
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Title</th>
                      <th>File</th>
                      <th>View</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  <?php foreach ($pending_journal as $data): ?>
                    <tr>
                      <td><?php echo $data->id_journal ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><?php echo $data->file ?></td>
                      <td><?php echo $data->views ?></td>
                      <td><?php echo $data->created_at ?></td>
                      <td></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>

                  <h3>Published Journal</h3>
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Title</th>
                      <th>File</th>
                      <th>View</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  <?php foreach ($journal as $data): ?>
                    <tr>
                      <td><?php echo $data->id_journal ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><?php echo $data->file ?></td>
                      <td><?php echo $data->views ?></td>
                      <td><?php echo $data->created_at ?></td>
                      <td></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>

                </div>
                </div>
                </section>
                </div>
