<?= $this->extend('layout/index') ?>

<?= $this->section('cari') ?>
<div class="cari">
	<input href="" placeholder="Cari">
</div>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="container">
	<div class="content">
		<div class="home">	
		<?php foreach ($modoro as $m): ?>
			<div class="box-home">
				<div class="h-info">
					<p class="value one"><?= $m['feature'] == '' ?  '-' : $m['feature'];  ?></p>
				</div>
				<div class="h-info">
					<p >Level</p>
					<p class="value"><?= $m['level'] ?></p>
				</div>
				<div class="h-info">
					<p>Work Time</p>
					<p class="value"><?= $m['work_time'] ?> Menit</p>
				</div>
				<div class="h-info">
					<p>Break Time</p>
					<p class="value"><?= $m['break_time'] ?> Menit</p>
				</div>
			</div>		
		<?php endforeach ?>
		<?= $pager->SimpleLinks() ?>
		</div>
	</div>
</div>
<?= $this->endsection() ?>


