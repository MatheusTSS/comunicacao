<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_layout/header') ?>

<body class="sb-nav-fixed">

	<?php $this->load->view('_layout/topbar') ?>

	<div id="layoutSidenav">

		<?php $this->load->view('_layout/sidebar') ?>

		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">

					<?php $this->load->view($tela) ?>
					
				</div>
			</main>

			<?php $this->load->view('_layout/footer') ?>

		</div>
	</div>

	<?php $this->load->view('_layout/scripts') ?>
	
</body>

</html>
