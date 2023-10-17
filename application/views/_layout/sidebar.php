<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">

				<a style="color: #fff;" class="nav-link collapsed" href="<?= base_url('usuario') ?>" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon" style="color: #fff;"><i class="fa-solid fa-images"></i></div>
					Comunicados
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="<?= base_url('comunicado/view_cadastra_comunicado') ?>" style="color: #fff;"><i class="fas fa-plus me-2"></i> Cadastrar</a>
						<a class="nav-link" href="<?= base_url('comunicado/view_lista_comunicados') ?>" style="color: #fff;"><i class="fas fa-list me-2"></i>Listar</a>
					</nav>
				</div>

				<a style="color: #fff;" class="nav-link" href="<?= base_url('usuario/view_usuarios') ?>">
					<div class="sb-nav-link-icon" style="color: #fff;" ><i class="fas fa-users"></i></div>
					Usuários
				</a>

			</div>
		</div>
		<div class="sb-sidenav-footer" style="background-color: #6c63ff; color: #fff;">
			<div class="small">Logado como:</div>
			<?= $_SESSION['usuario']['usuario'] ?>
		</div>
	</nav>
</div>
