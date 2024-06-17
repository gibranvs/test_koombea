<?php echo $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="container">
	<div class="row scrap-form">
		<div class="col-md-7">
			<input type="text" class="form-control" id="url">
		</div>
		<div class="col-md-5">
			<button type="button" class="form-control btn btn-secondary" id="scrapBtn">SCRAP</button>
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
        <div class="pagination-container">
			<?= $pager->links('default') ?>
		</div>
	</div>
</div>
<?php echo $this->endSection(); ?>

<?php $this->section('scripts'); ?>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/home.js'); ?>"></script>
<?php echo $this->endSection(); ?>