<div class="row" id="entrega" style="display: none;">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item active">Pr&eacute;stamo</li>
                    </ol>
                </div>
                <h4 class="page-title">Proceso para el pr&eacute;stamo de libros</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row shadow-lg p-3 mb-5 mt-4 bg-body rounded">
        <h4 class="header-title">Formulario</h4>

        <p class="text-muted font-13">Lorem ipsum <code>{Breve descripcion del form}</code> dolor sit amet
            consectetur adipisicing elit. Atque iusto cum, vel cupiditate quaerat modi quis porro dolores est
            incidunt exercitationem quibusdam tempore repudiandae, enim deserunt dolorum eos excepturi rerum.
            Aut, culpa mollitia hic quidem, vel ex veritatis assumenda vero minus repudiandae dolor inventore
            accusamus deleniti cum placeat sapiente blanditiis dolorum expedita enim repellendus perspiciatis
            quasi quae. Quia, accusamus commodi?</p>
        <br>
        <h4 class="page-title">
            <button class="btn btn-warning ms-2" id="btn-upEntrega"><i class="mdi mdi-autorenew"></i> Cargar CI</button>
            <button class="btn btn-primary ms-2" id="btn-upBuscar" style="display: none;"><i class="uil-search-alt"></i> Buscar</button>
            <button type="button" class="btn btn-dark ms-2" id="close-form" style="display: none;"><i class="mdi mdi-window-close"></i> Deseleccionar</button>
        </h4>

        <div class="mb-3 col-md-3 col-sm-12" style="display: none;" id="select-entrega">
            <!-- Single Select -->
            <label class="form-label" for="id_student">Seleccione el <strong>carne de identidad</strong></label>
            <select class="form-control select2" data-toggle="select2" id="selectCI" name="id_student">
            </select>
        </div>

        <div class="row" id="content-entrega">
            <div class="col-md-6 col-lg-6 col-sm-12" id="form-entrega" style="display: none;">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <h4 class="header-title">Formulario</h4>

                    <p class="text-muted font-13">Lorem ipsum <code>{Breve descripcion del form}</code> dolor sit amet
                        consectetur adipisicing elit. Atque iusto cum, vel cupiditate quaerat modi quis porro dolores est
                        incidunt exercitatiom repellendus perspiciatis
                        quasi quae. Quia, accusamus commodi?</p>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-primary" role="alert" id="alert4" style="display: none">
                                <i class="dripicons-information me-2"></i>
                                <p id="resp-entrega"></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <form action="" id="form4">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" class="form-control" id="idEstudiante" name="fk_estudiante">
                                    <div class="mb-3">
                                        <label class="form-label" for="idLibro">Libro <code>(c&oacute;digo|t&iacute;tulo)</code>:</label>
                                        <select class="form-control select2" data-toggle="select2" id="idLibro" name="fk_libro">
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fecha de entrega</label>
                                        <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <button class="btn btn-warning" type="button" id="sub_l">Enviar form</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12" id="dataTable-entrega" style="display: none;">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <div class="row">
                        <h4 class="header-title">Libros pendientes<button class="btn btn-primary ms-2" id="btn-update-book"><i class="mdi mdi-autorenew"></i></button></h4>
                    </div>
                    <p class="text-muted font-13">Lorem ipsum <code>{Breve descripcion del DataTable}</code> dolor sit amet
                        consectetur adipisicing elit. Atque iusto cum, vel cupiditate quaerat modi quis porro dolores est
                        incidunt exercitatidolorum expedita enim repellendus perspiciatis
                        quasi quae. Quia, accusamus commodi?</p>

                    <div class="row">
                        <table id="prestamosBook" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>T&iacute;tulo</th>
                                    <th>ISBN</th>
                                    <th>Fecha de entrega</th>
                                    <th>Fecha devoluci&oacute;n</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div id="dow-entrega"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            var divEntrega = document.getElementById("select-entrega");
            var divDttEntrega = document.getElementById("dataTable-entrega");
            var divFormEntrega = document.getElementById("form-entrega");
            var btnSearch = document.getElementById("btn-upBuscar");
            var btnClose = document.getElementById("close-form");
            var divContentEntrega = document.getElementById("content-entrega");
            //console.log(divEntrega.style.display);

            $("#btn-upEntrega").click(function() {
                divEntrega.style.display = "";
                btnSearch.style.display = "";

                //divDttEntrega.style.display = "";
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('/ci') ?>',
                    success: function(response) {
                        $("#selectCI").html(response).fadeIn();
                    }
                })
            });
            /*setInterval(function() {
                $.ajax({
                    type: 'POST',
                    url: '<? //echo base_url('/ci'); 
                            ?>',
                    success: function(response) {
                        $("#selectCI").html(response).fadeIn();
                    }
                })
            }, 2000);*/
            document.getElementById("btn-upBuscar").addEventListener("click", setPrestamo);

            function setPrestamo() {
                divContentEntrega.style.display = "";
                divFormEntrega.style.display = "";
                btnClose.style.display = "";
                var idStudent = document.getElementById("selectCI").value;
                document.getElementById("idEstudiante").value = idStudent;

                var selectorCI = document.getElementById('selectCI');

                // ✅ Set the disabled attribute
                selectorCI.setAttribute('disabled', '');
                document.getElementById("btn-upEntrega").setAttribute('disabled', '');
                document.getElementById("btn-upBuscar").setAttribute('disabled', '');

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('/books') ?>',
                    success: function(res) {
                        $("#idLibro").html(res).fadeIn();
                    }
                });

                console.log(idStudent);
            }

            btnClose.addEventListener("click", closeDiv);

            function closeDiv() {
                divContentEntrega.style.display = "none";
                btnClose.style.display = "none";
                // ✅ Remove the disabled attribute
                document.getElementById('selectCI').removeAttribute('disabled');
                document.getElementById("btn-upEntrega").removeAttribute('disabled');
                document.getElementById("btn-upBuscar").removeAttribute('disabled');
            }
            /*var f = "listarLibro";

            var tableEntregados = $('#prestamosBook').DataTable({
                ajax: {
                    "url": "<?php //echo base_url('/list_entrega'); 
                            ?>",
                    "method": "POST",
                    "data": {
                        f: f
                    }
                },
                columns: [{
                        "data": "codigo"
                    },
                    {
                        "data": "titulo"
                    },
                    {
                        "data": "precio"
                    },
                    {
                        "data": "autor"
                    },
                    {
                        "data": "isbn"
                    },
                    {
                        "data": "cantidad"
                    },
                    {
                        "defaultContent": `<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightLibro" aria-controls="offcanvasRight"><i class="dripicons-document-edit"></i></button>
                                       <button type="button" class="del-book btn btn-danger"><i class="dripicons-trash"></i></button>`
                    }
                ],
                "language": {
                    "url": "assets/json/Spanish.json"
                },
            });*/
        });
    </script>
</div>