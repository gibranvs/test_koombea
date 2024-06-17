<?php echo $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 page_title">
			<?= $page['name'] ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<a href="<?= base_url() ?>" class="back_btn">< BACK</a>
		</div>
	</div>
	<div id="table_container">
		<table class="table table-sm table-striped align-middle" >
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>LINK</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($links as $lnk){?>
                <tr>
                    <td><?= htmlspecialchars($lnk['name'])?></td>
                    <td><?= $lnk['link']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>

        <div class="pagination-container">
			<?= $pager->links('default') ?>
		</div>
	</div>
</div>
<?php echo $this->endSection(); ?>