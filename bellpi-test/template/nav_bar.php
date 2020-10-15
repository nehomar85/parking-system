  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand fa fa-car" href="index.php"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#parking" aria-controls="parking" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="parking">
      <ul class="navbar-nav mr-auto">
		<!-- PARKING -->
		<li class="nav-item <?php if($active=="parking") echo "active";?>">
		  <a class="nav-link <?php if($active=="parking") echo "text-primary";?>" href="index.php">Parqueadero</a>
		</li>
		<!-- PROMOCIONES -->
        <li class="nav-item <?php if($active=="configuracion") echo "active";?>">
          <a class="nav-link <?php if($active=="configuracion") echo "text-primary";?>" href="setup.php">Configuraciones</a>
        </li>
		<!-- INFORMES -->
        <li class="nav-item <?php if($active=="reporte") echo "active";?>">
          <a class="nav-link <?php if($active=="reporte") echo "text-primary";?>" href="report.php">Reportes</a>
        </li>
      </ul>
    </div>
  </nav>