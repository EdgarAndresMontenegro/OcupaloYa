<div class="container">
	<div class="row align-items-stretch mb-3">
		<div class="col-12 col-md-6 col-lg-3 mb-4">
			<div class="card text-white card text-center blue">
				<div class="card-body">
					<p class="text-white text-center h5">Ventas del mes</p>
					<p class="mb-5">
						<small>El valor mostrado nos indica la cantidad de ingresos generados en el mes <?php echo ConvertTrait::month_and_year( date('Y-m-d') ); ?>.</small>
					</p>
					<div class="card-title text-center" style="position: relative;">
						<span class="display-1">7M</span>
						<sup class="sup-card-sales h6">COP</sup>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-3 mb-4">
			<div class="card text-center border-top-primary">
				<div class="card-body">
					<p class="text-primary text-center h5">Recientes</p>
					<p>
						<small>Los siguientes datos hacen referencia a la cantidad de inmuebles agregados recientemente a la plataforma.</small>
					</p>
					<span class="min-chart" id="chart-recent" data-percent="56">
						<span class="percent"></span>
					</span>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-6 mb-4">
			<div class="card text-center text-white border-top-success">
				<div class="card-body">
					<p class="text-success text-center h5">Destacados: 2019</p>
					<canvas id="char-prominent-immovable"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="row align-items-stretch mb-3">
		<div class="col-12 col-lg-6 mb-4">
			<div class="card text-center text-white border-top-warning">
				<div class="card-body">
					<p class="text-warning text-center h5">Ganancias <?php echo ConvertTrait::month( date('Y-m-d') )."/".ConvertTrait::month( date('Y-m-d', strtotime("-1 months")) ); ?></p>
					<canvas id="char-earnings"></canvas>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-6 mb-4">
			<div class="card text-center text-white border-top-danger">
				<div class="card-body">
					<p class="text-danger text-center h5">Crecimiento de clientes</p>
					<canvas id="char-user-growth"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="row align-items-stretch mb-3">
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card text-center text-white border-top-primary">
				<div class="card-body">
					<p class="text-primary text-center h5">Tipo inmuebles</p>
					<canvas id="char-type-immovable"></canvas>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card text-center text-white border-top-success">
				<div class="card-body">
					<p class="text-success text-center h5">Reservas</p>
					<canvas id="char-booking"></canvas>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-4 mb-4">
			<div class="card text-center text-white border-top-danger">
				<div class="card-body">
					<p class="text-danger text-center h5">Usabilidad seguimiento/favoritos</p>
					<canvas id="char-usability"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
