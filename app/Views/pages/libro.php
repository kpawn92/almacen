<div class="row" id="libros" style="display: none;">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item active">Libros</li>
                    </ol>
                </div>
                <h4 class="page-title">Entrada de los libros</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row" id="formulario-book" style="display: contents;">
        <div class="col-12">
            <div class="shadow-lg p-3 mb-5 mt-4 bg-body rounded">
                <h4 class="header-title">Formulario</h4>

                <p class="text-muted font-13">Lorem ipsum <code>{Breve descripcion del form}</code> dolor sit amet
                    consectetur adipisicing elit. Atque iusto cum, vel cupiditate quaerat modi quis porro dolores est
                    incidunt exercitationem quibusdam tempore repudiandae, enim deserunt dolorum eos excepturi rerum.
                    Aut, culpa mollitia hic quidem, vel ex veritatis assumenda vero minus repudiandae dolor inventore
                    accusamus deleniti cum placeat sapiente blanditiis dolorum expedita enim repellendus perspiciatis
                    quasi quae. Quia, accusamus commodi?</p>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="alert alert-primary" role="alert" id="alert3" style="display: none">
                            <i class="dripicons-information me-2"></i>
                            <p id="resp-book"></p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <form action="" id="form2">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="codigo">C&oacute;digo:</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Entre el c&oacute;digo">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="titulo">T&iacute;tulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Entre el titulo">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="precio">Precio:</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Entre el precio">
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Portada del libro:</label>
                                    <input type="text" id="imagen" name="portada" class="form-control" placeholder="Subir la imagen">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="autor">Autor:</label>
                                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Entre el autor">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="isbn">ISBN:</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Entre el isbn">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="cantidad">Cantidad en existencia:</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Entre la cantidad">
                                </div>
                            </div>
                        </div>
                </div>
                <button class="btn btn-warning" type="button" id="sub_l">Enviar form</button>
                <a class="btn btn-primary" href="#dow-book" id="btn-listBook">Mostrar Listado <i class="uil-angle-double-down"></i></a>
                </form>
            </div>
        </div>
    </div>
    <form action="<?php echo base_url('/save_book'); ?>" method="post">
    <input type="text" value="Hola">
    <input type="submit" value="enviar">
    </form>
    <?= $this->include('pages/dependencias/books'); ?>
</div>