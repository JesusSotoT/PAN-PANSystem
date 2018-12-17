<?php
session_start();

$numRegAc = $_POST['numRegAc'];

if ( $numRegAc <= 0 ) {

   header("Location: home2-user.php?error=302");
}

?>
<html lang="es">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pan-Pan System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/google-roboto-300-700.css" rel="stylesheet" / </head> <body class="sidebar-mini">
    <div class="wrapper">
        <div class="sidebar" data-active-color="red" data-background-color="black" data-image="assets/img/sidebar-1_1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="#" class="simple-text">
                    <p>PAN-PAN</p>
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    P-P
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">

                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="php/logout.php">Configuraciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="">
                        <a href="home2-user.php">
                            <i class="material-icons">dashboard</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="material-icons">add</i>
                            <p>Nueva Solicitud</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="nueva_solicitud-user.php">
                            <i class="material-icons">history</i>
                            <p>Historial de Solicitudes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brand" href="#"> Inicio </p>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="container-fluid" style="background-color: white;">
                        <form name="registro_solicitud" id="registro_solicitud" action="php/registro_solicitud+M.php" method="POST" enctype="multipart/form-data">
                            <?php for ($i=1; $i<=$numRegAc; $i++) {  ?>
                            <!--Aqui va Codigo de Formularios creador por for -->
                            <!--Primera linea de llenado del Formulario -->
                            <h5 class="" style="color: #F38B02; font-weight: bold;">Pedido <?php echo $i; ?></h5>
                            <div class="row">
                                <div id="registro" name="registro" class="registro">
                                      <div class="form-group" hidden="true">
                                        <label class="label-control">ID</label>
                                        <input type="text" class="form-control" id="estatus" name="pedido[<?= $i ?>][id]" value="NULL">
                                    </div>
                                     <div class="col-md-4" hidden="true">
                                        <div class="form-group" >
                                            <input type="text" id="fecha_entrega" name="pedido[<?= $i ?>][fecha_solicitud]" class="form-control datepicker" value="<?php echo date(" d-m-y"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control">Fecha de entrega</label>
                                            <input type="text" id="fecha_entrega" name="pedido[<?= $i ?>][fecha_entrega]" class="form-control datepicker" value="<?php echo date(" d-m-y"); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control">Escriba el nombre: </label>
                                            <input type="text" id="nombre_cliente" name="pedido[<?= $i ?>][nombre_cliente]" class="form-control" placeholder="Juan Perez">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label-control">Seleccione </label>
                                            <?php 
                  include "conexion.php";
                  $query =  "SELECT * FROM sabores WHERE activo = '1' " ;
                  $result = $conn->query($query);
              ?>
                                            sabor del Pastel: <select class="form-control" data-style="btn btn-link" id="sabor_pastel" name="pedido[<?= $i ?>][sabor_pastel]">
                                                <option value="0">Seleccione sabor</option>
                                                <?php 
                  while ($row = $result->fetch_array())
                  {
                  ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['sabor']; ?>
                                                </option>
                                                <?php
                }
                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Primera linea de llenado del Formulario -->

                          <!--Segunda linea de llenado del Formulario -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control">Seleccione </label>
                                        <?php 
                  include "conexion.php";
                  $query =  "SELECT * FROM medidas_p WHERE activo = '1' " ;
                  $result = $conn->query($query);
              ?>
                                        Tamaño del Pastel: <select class="form-control" data-style="btn btn-link" id="medidas_pastel" name="pedido[<?= $i ?>][medidas_pastel]">
                                            <option value="0">Seleccione Tamaño</option>
                                            <?php 
                  while ($row = $result->fetch_array())
                  {
                  ?>
                                            <option value="<?php echo $row['id']; ?>">
                                                <?php echo $row['medida']; ?>
                                            </option>
                                            <?php
                }
                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="label-control">Personas </label>
                                        <input type="number" class="form-control" id="no_personas" name="pedido[<?= $i ?>][no_personas]" placeholder="0">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-control">Diseño</label>
                                        <input type="text" class="form-control" id="diseno" name="pedido[<?= $i ?>][diseno]" placeholder="Hello Kitty , Globos , flores , etc...">
                                    </div>
                                </div>
                                <div class="form-group" hidden="true">
                                        <label class="label-control">Estatus</label>
                                        <input type="text" class="form-control" id="estatus" name="pedido[<?= $i ?>][estatus]" value="1">
                                    </div>
                                   
                                <div class="col-md-2 col-sm-2">
                                    <legend style="color: white;">Regular Image</legend>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-warning btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" id="imagen" name="pedido[<?= $i ?>]" />
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr size="8" style="margin-top: 5px; margin-bottom: 5px; border-width: 5px; border-color: #AC0034;">
                            <?php } ?>
                             <div class="row">
                            <div class="text-center">
                                <div class="col-md-2"></div>
                                <input type="submit" name="registro" id="registro" class="btn btn-success col-md-2"></input>
                                <div class="col-md-4"></div>
                                <button type="button" href="home2-user.php" class="btn btn-danger col-md-2"> Cancelar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                        document.write(new Date().getFullYear())
                        </script>, Powered by
                        <a href="http://pan-pan.mx/" target="_blank">PAN-PAN</a>.
                    </p>
                </div>
            </footer>
        </div>
        </body>
        <!--   Core JS Files   -->
        <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/material.min.js" type="text/javascript"></script>
        <script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
        <!-- Forms Validations Plugin -->
        <script src="assets/js/jquery.validate.min.js"></script>
        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="assets/js/moment.min.js"></script>
        <!--  Charts Plugin -->
        <script src="assets/js/chartist.min.js"></script>
        <!--  Plugin for the Wizard -->
        <script src="assets/js/jquery.bootstrap-wizard.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/bootstrap-notify.js"></script>
        <!--   Sharrre Library    -->
        <script src="assets/js/jquery.sharrre.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="assets/js/bootstrap-datetimepicker.js"></script>
        <!-- Vector Map plugin -->
        <script src="assets/js/jquery-jvectormap.js"></script>
        <!-- Sliders Plugin -->
        <script src="assets/js/nouislider.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!--<script src="assets/js/jquery.select-bootstrap.js"></script>-->
        <!-- Select Plugin -->
        <script src="assets/js/jquery.select-bootstrap.js"></script>
        <!--  DataTables.net Plugin    -->
        <script src="assets/js/jquery.datatables.js"></script>
        <!-- Sweet Alert 2 plugin -->
        <script src="assets/js/sweetalert2.js"></script>
        <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="assets/js/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="assets/js/fullcalendar.min.js"></script>
        <!-- TagsInput Plugin -->
        <script src="assets/js/jquery.tagsinput.js"></script>
        <!-- Material Dashboard javascript methods -->
        <script src="assets/js/material-dashboard.js"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="assets/js/demo.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initVectorMap();
        });

        $(document).ready(function() {
            var dataTable = $('#por_pagar').DataTable({

                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },

                "oPaginate": false,
                "searching": false,
                "processing": false,
                "serverSide": true,
                "ajax": {
                    url: "php/por_pagar-ajax-data.php", // json datasource
                    type: "post", // method  , by default get
                    error: function() { // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No encontre la tabla</th></tr></tbody>');
                        $("#lookup_processing").css("display", "none");

                    }
                }
            });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {

            $('.datepicker').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove',
                    inline: true
                }
            });
        });
        </script>
        <script>
        var $TABLE = $("#registro");
        $(".table-add").on("click", function() {
            var $clone = $TABLE.find("div.registro").clone(true).removeClass('hide');
            $TABLE.find('registro').append($clone);
        });

        $(".table-remove").on("click", function() {
            $(this).parents("tr").detach();
        });
        </script>

</html>