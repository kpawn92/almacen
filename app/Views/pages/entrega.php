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
        <h4 class="page-title">
            <button class="btn btn-warning ms-2" id="btn-upEntrega"><i class="uil-file-search-alt"></i> Generar reporte</button>
            <button class="btn btn-dark ms-2" id="btn-listCI"><i class=" uil-users-alt "></i>+</button>
            <button type="button" class="btn btn-dark ms-2" id="close-form" style="display: none;"><i class="mdi mdi-window-close"></i> Close</button>
        </h4>

        <div class="mb-3 col-md-3 col-sm-12" style="display: none;" id="select-entrega">
            <!-- Single Select -->
            <label class="form-label" for="id_student">Seleccione el <strong>carne de identidad</strong></label>
            <select class="form-control select2" data-toggle="select2" id="selectCI" name="id_student">
            </select>
        </div>

        <div class="row" id="content-entrega">
            <div class="col-md-3 col-lg-3 col-sm-12" id="form-entrega" style="display: none;">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <h4 class="header-title">Pr&eacute;stamo</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert" id="alert-entrega" style="display: none">
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
                                        <label class="form-label">Fecha de entrega <code>(mm/dd/YYYY):</code></label>
                                        <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="fecha_entrega">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning" type="button" id="sub-entrega">Enviar form</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9 col-sm-12" id="dataTable-entrega" style="display: none;">
                <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                    <div class="row">
                        <h4 class="header-title">Libros pendientes</h4>
                    </div>
                    <p class="text-muted font-13">Lorem ipsum <code>{Breve descripcion del DataTable}</code> dolor sit amet
                        consectetur adipisicing elit. Atque iusto cum, vel cupiditate quaerat modi quis porro dolores est
                        incidunt exercitatidolorum expedita enim repellendus perspiciatis
                        quasi quae. Quia, accusamus commodi?</p>

                    <div class="row">
                        <table id="prestamosBook" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Accion</th>
                                    <th>CI</th>
                                    <th>Codigo</th>
                                    <th>T&iacute;tulo</th>
                                    <th>F/ entrega</th>
                                    <th>F/ devoluci&oacute;n</th>
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
    <!-- <form action="<?php //echo base_url('/id_ci') ?>" method="post">
        <input type="text" value="44234234222" name="ciID">
        <input type="submit" value="">
    </form> -->
    <?= $this->include('pages/dependencias/entrega_devol'); ?>
</div>