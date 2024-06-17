<?php echo $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<input type="text" class="form-control" id="url">
		</div>
		<div class="col-md-5">
			<button type="button" class="form-control">SCRAP</button>
		</div>
	</div>
	<div id="table_container">
		<table class="table table-sm table-striped align-middle" >
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>TOTAL LINKS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pages as $pg){?>
                <tr>
                    <td><a href="page/<?= $pg['id'] ?>"><?= $pg['name']?></a></td>
                    <td><?= $pg['total_links'] ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>

		<?= $pager->links('default') ?>
	</div>
</div>
<?php echo $this->endSection(); ?>