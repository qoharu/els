<?php 
    include 'application/views/header.php';
    $i=0;
    $j = array('Ecommerce', 'Enterprise Management', 'Strategic Planning and Business', 'Information Communication Technology');
    $data = array($ec, $em, $spb, $ict);
?>
    <div class="pull-right col-md-5 isi">
        <a href="http://localhost/els/discussion/discussion_archive" title="Archive" class="btn btn-flat btn-lg bg-navy"><span class="fa fa-file-archive-o"></span> &nbsp;Archive</a>
        <a href="http://localhost/els/discussion/open" title="Archive" class="btn btn-flat btn-lg bg-blue">&nbsp;Open forum</a>
        <?php if (isbe()): ?>
            <a class="btn btn-flat btn-lg btn-primary" href="<?php echo site_url('discussion/my_discussion') ?>">My discussion</a>
        <?php endif ?>
    </div>
        <h2 class="panel col-md-2 col-md-offset-5 isi-dash text-center">Vote Topic</h2>
     
<div class="col-md-12 isi">
<?php foreach ($data as $vote): ?>
    <div class="col-md-3">
        <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-blue">
                <h4><?php echo $j[$i] ?></h4>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <?php 
                    if (@$vote[0]->voted + @$vote[1]->voted + @$vote[0]->voted ) {
                        $disabled = 'disabled';
                        $link = '#';
                    }else{
                        $disabled = '';
                        $link = '';
                    }

                    if (isbe() || isadmin()) {
                        $link = '#';
                        $disabled = '';
                    }
                ?>
                    <?php foreach ($vote as $yo): ?>
                        <?php 
                            $active = ($yo->voted) ? 'active' : '' ;
                            if (empty($link)) {
                                $linkyo = site_url('discussion/vote_topic/'.$yo->id_discussion);
                                $disabledyo = $disabled;
                            }else{
                                $disabledyo = 'disabled';
                                $linkyo = $link;
                            }
                        ?>
                        <li class="<?php echo @$active.' '.@$disabledyo ?>"><a href="<?php echo $linkyo ?>"><?php echo $yo->title ?> (<?php echo $yo->fullname ?>) <span class="pull-right badge bg-blue"><?php echo $yo->vote ?></span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
<?php $i++ ?>
<?php endforeach ?> 
</div>