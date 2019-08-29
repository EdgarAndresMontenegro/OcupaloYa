    </main>

    <footer class="page-footer font-small">
        <div class="white darken-2 black-text py-3" style="font-family: arial;">
            <div class="container">
                <div class="row ">
                    <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-start mt-3 mt-lg-0">
                        <small class="text-muted">© 2019 Copyright</small>
                        <a class="black-text" href="https://mdbootstrap.com/education/bootstrap/"> 
                            <img src="<?php echo RUTA_IMG; ?>/logo-color.png" alt="logotipo" class="img-fluid ml-2" style="height: 20px;" title="Ocupalo Ya" data-toggle="tooltip">
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-right mt-3 mt-lg-0">
                        <small class="text-muted">Powered by</small>
                        <a class="black-text" href="https://mdbootstrap.com/education/bootstrap/"> 
                            <img src="<?php echo RUTA_IMG; ?>/logo-powered.png" alt="logotipo" class="img-fluid ml-2" style="height: 25px;" title="Hyperlink Soluciones Empresariales" data-toggle="tooltip">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>             


    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/jquery-3.3.1.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/mdb.min.js"></script>
    <!-- Your custom js (optional) -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/script.js"></script>
    <!-- Your custom js (optional) -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/dashboard/dashboard.js"></script>
    <!-- Your custom js (inactividad en la página) -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/inactividad.js"></script>
    <!-- Your custom js (funciones de los formularios) -->
    <script type="text/javascript" src="<?php echo RUTA_JS; ?>/form.js"></script>
    <!-- Your custom js (optional) -->
    <script>
        new WOW().init();
         // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</body>
</html>