<?php include 'application/views/header.php' ?>
<?php
    $judul = array("Ecommerce", "Enterprise Management", "Strategic Planning & Business", "Information Communication Technology");
    $data = array($ec, $em, $spb, $ict);
    $warna = array("bg-blue", "bg-green", "bg-yellow", "bg-red");
    $i = 0;
?>
<div class="container">
	<div class="row isi well">
		<div class="box box-widget widget-user-2">

        <?php foreach ($data as $d): ?>
            <?php
                $j = 0;
                if ($i == 0) {
                    $class = "widget-user-header";
                }else{
                    $class = "widget-user-header2";
                }
            ?>

            <div class=" <?php echo $class.' '.$warna[$i] ?>">
                <h4><?php echo $judul[$i] ?></h4>
            </div>
            <div class="no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($d as $ece): ?>
                        <li>
                            <a href="<?php echo site_url('cop/bp_view/'.$ece->id_cop) ?>">
                                <?php echo $ece->keterangan ?> <span class="pull-right badge bg-red"><?php echo $ece->fullname ?></span>
                            </a>
                        </li>
                        <?php $j++; ?>
                    <?php endforeach ?>
                    <?php if ($j == 0): ?>
                        <li><a>Tidak ada</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <?php $i++; ?>
        <?php endforeach ?>
        </div>
	</div>
</div>