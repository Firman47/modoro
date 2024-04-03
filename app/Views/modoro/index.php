<?= $this->extend('layout/index') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="content">
		<div class="box">
			<div class="box-header">
				<h1>PPIT MODORO</h1>
			</div>
			<div class="box-body">
				<?php if (!empty($modoro)): ?>
					<?php if ($modoro['feature'] !== '') : ?>
						<?php if ($modoro['work_time'] !== ''): ?>
						<div class="hasil">
							<div class="timer">
								<div class="time">
									<p class="timer-display">00 : 00 : 00</p>
								</div>
								
								<div class="box-tbl">
										<button id="start" type="button">Start</button>
										<button id="stop" type="button">Stop</button>
										<button id="reset" type="button">reset</button>
								</div>
							</div>
							<div class="info">
								<div class="info-box">
									<div class="input">
										<label>LEVEL</label>
										<input type="" name="" value="<?= $modoro['level']; ?>"> 
									</div>
									<div class="input">
										<label>FEATURE</label>
										<input type="" name="" value="<?= $modoro['feature']; ?>"> 
									</div>
								</div>
								<div class="info-box">
									<div class="input">
										<label>WORK TIME</label>
										<input type="" name="" value="<?= $modoro['work_time']; ?>"> 
									</div>
									<div class="input">
										<label>BREAK TIME</label>
										<input type="" name="" value="<?= $break; ?>"> 
									</div>
								</div>
							</div>
							<div class="box-tbl selesai">
								<button id="" type="submit">Selesai</button>
							</div>
						</div>
						<?php else: ?>
							<form action="/modoro/hasil/<?= $modoro['id']; ?>" method="post">
							<?= csrf_field(); ?>
								<div class="time">
									<p class="timer-display">00 : 00 : 00</p>
									<div class="box-tbl">
										<button id="start" type="button">
											Start
										</button>
										<button id="stop" type="button">
											Stop
										</button>
										<button id="reset" type="button">
											reset
										</button>
									</div>
								</div>
								<div class="">
									<input class="menit" name="work" type="The" value="60">
								</div>
								<div class="box-tbl">	
									<button>Tambah</button>
								</div>
							</form>
						<?php endif ?>
					<?php else: ?>
						<form action="/modoro/<?= $modoro['id']; ?>	" method="post">
						<?= csrf_field(); ?>

							<div class="input">
								<label>Feature</label>
								<input type="text" name="feature" value="<?= $modoro['feature']; ?>">
							</div>
							<div class="box-tbl">
								<button type="submit">Tambah</button>
							</div>
						</form>	
					<?php endif; ?>
				<?php else : ?>
					<form action="/modoro" method="post">
					<?= csrf_field(); ?>

						<div class="input">
							<label>Level</label>
							<select name="level">
								<option value="newcomer">newcomer 35%</option>
								<option value="reguler">reguler 28%</option>
								<option value="enthusiast">enthusiast 20%</option>
							</select>
						</div>
						<div class="box-tbl">
							<button type="submit">Pilih</button>
						</div>
					</form>
				<?php endif ?>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	let [miilliseconds, seconds, minutes, hours] = [0, 0, 0, 0];
	let timeRef = document.querySelector('.timer-display');
	let menits = document.querySelector('.menit');
	let menit = 0;
	let int = null;

	document.getElementById("start").addEventListener('click', () =>{
		if (int !== null) {
			clearInterval(int);
		}
		int = setInterval(displayTimer, 10);


	});

	document.getElementById('stop').addEventListener('click', () => {
		clearInterval(int);
	});

	document.getElementById('reset').addEventListener('click', () => {
		clearInterval(int);
		[miilliseconds, seconds, minutes, hours] = [0, 0, 0, 0];
		timeRef.innerHTML = '00 : 00 : 00 :00';
		menit = 0;

	});

	function displayTimer() {
		miilliseconds+= 10;
		if (miilliseconds == 1000) {
			miilliseconds = 0;
			seconds++;
			if (seconds == 60) {
				seconds = 0;
				minutes++;
				menit++;
				if (minutes == 60) {
					minutes = 0;
					hours++;
				}
			}

		}

		let h = hours < 10 ? "0" + hours : hours;
		let m = minutes < 10 ? "0" + minutes : minutes;
		let s = seconds < 10 ? "0" + seconds : seconds;
		let ms = 
			miilliseconds < 10
			? "00" + miilliseconds
			: miilliseconds < 100
			? "0" + miilliseconds
			: miilliseconds;


		timeRef.innerHTML = `${h} : ${m} : ${s}`;

		let mnt = menit < 10 ? "0" + menit : menit;
		menits.innerHTML = mnt;


	} 
</script>

<?= $this->endsection() ?>

