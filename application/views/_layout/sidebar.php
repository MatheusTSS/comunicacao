<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">

				<a class="nav-link collapsed" href="<?= base_url('usuario') ?>" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
					Comunicados
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="<?= base_url('comunicado/view_cadastra_comunicado') ?>">Cadastrar</a>
						<a class="nav-link" href="<?= base_url('comunicado/view_lista_comunicados') ?>">Listar</a>
					</nav>
				</div>

				<a class="nav-link" href="<?= base_url('usuario/view_usuarios') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Usuários
				</a>

			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logado como:</div>
			<?= $_SESSION['usuario']['usuario'] ?>
		</div>
	</nav>
</div>
