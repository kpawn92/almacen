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
                            <p id="resp"></p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <form action="" id="form2">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nombre">Nombre(s)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre o nombres">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="lastname">Apellidos</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="ci">CI</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000000000" id="ci" name="ci">
                                    <span class="font-13 text-muted">Ej. "921015xxx81"</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Textareas</label>
                                    <p class="text-muted font-13">
                                        Direcci&oacute;n particular
                                    </p>
                                    <textarea data-toggle="maxlength" class="form-control" maxlength="225" rows="2" placeholder="Esta área de texto tiene un límite de 225 caracteres." name="direccion"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nombre">Nombre(s)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre o nombres">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="lastname">Apellidos</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="ci">CI</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000000000" id="ci" name="ci">
                                    <span class="font-13 text-muted">Ej. "921015xxx81"</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Textareas</label>
                                    <p class="text-muted font-13">
                                        Direcci&oacute;n particular
                                    </p>
                                    <textarea data-toggle="maxlength" class="form-control" maxlength="225" rows="2" placeholder="Esta área de texto tiene un límite de 225 caracteres." name="direccion"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <button class="btn btn-warning" type="button" id="sub_l">Enviar form</button>
                <a class="btn btn-primary" href="#dow-student" id="btn-listBook">Mostrar Listado <i class="uil-angle-double-down"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>