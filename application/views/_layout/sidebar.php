<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<a class="nav-link" href="index.html">
					<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
					Comunicados
				</a>
				<a class="nav-link" href="<?= base_url('usuario/view_usuarios')?>">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Usuários
				</a>
								
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logado como:</div>
			<?= $_SESSION['usuario']['usuario']?>
		</div>
	</nav>
</div>
