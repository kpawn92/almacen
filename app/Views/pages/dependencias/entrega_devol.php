<script>
    $(document).ready(function() {

        /* Botones */
        var btnCI = document.getElementById("btn-upEntrega");
        var btnSearch = document.getElementById("btn-upBuscar");
        var btnClose = document.getElementById("close-form");

        /* Content */
        var divSelectCI = document.getElementById("select-entrega");
        var divContentEntrega = document.getElementById("content-entrega");
        var divFormEntrega = document.getElementById("form-entrega");
        var divDttEntrega = document.getElementById("dataTable-entrega");
        var selectCI = document.getElementById("selectCI");

        var idEstudiante = document.getElementById("idEstudiante");
        var submitEntrega = document.getElementById("sub-entrega");
        var updateTabla = document.getElementById("btn-update-entrega");

        btnCI.addEventListener("click", function() {
            btnSearch.style.display = "";
            divSelectCI.style.display = "";


            /* Pedido de CI para el selector */
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/ci') ?>',
                success: function(response) {
                    $("#selectCI").html(response).fadeIn();
                }
            });
        });

        /* Busqueda para mostrar el contenido del estudiante seleccionado */
        btnSearch.addEventListener("click", function() {
            btnClose.style.display = "";
            btnCI.setAttribute('disabled', '');
            btnSearch.setAttribute('disabled', '');
            selectCI.setAttribute('disabled', '');
            idEstudiante.value = selectCI.value;
            idEstudiante.style.display = "";

            /* Mostrar los libros en el selector del form*/
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/books') ?>',
                success: function(res) {
                    $("#idLibro").html(res).fadeIn();
                }
            });

            var f = idEstudiante.value;


            var tableEntregados = $('#prestamosBook').DataTable({
                ajax: {
                    "url": "<?= base_url('/list_entrega'); ?>",
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
                        "data": "isbn"
                    },
                    {
                        "data": "fecha_entrega"
                    },
                    {
                        "data": "fecha_dev"
                    },
                    {
                        "defaultContent": `<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightLibro" aria-controls="offcanvasRight"><i class="dripicons-document-edit"></i></button>
                                       <button type="button" class="del-book btn btn-danger"><i class="dripicons-trash"></i></button>`
                    }
                ],
                "language": {
                    "url": "assets/json/Spanish.json"
                },
            });

            divFormEntrega.style.display = "";
            divContentEntrega.style.display = "";
            divDttEntrega.style.display = "";
        });
        /* Actualizar la Tabla */
        updateTabla.addEventListener("click", function() {
            tableEntregados.ajax.reload();
            console.log(selectCI.value);
        });

        /* Form send */
        submitEntrega.addEventListener("click", function() {
            $.ajax({
                    url: '<?php echo base_url('/save_entrega'); ?>',
                    type: 'POST',
                    data: $('#form4').serialize(),
                })
                .done(function(res) {
                    $('#resp-entrega').html(res);
                    var cajaAlert = document.getElementById('alert-entrega');
                    cajaAlert.style.display = '';
                    $("#alert-entrega").show();
                    setTimeout(function() {
                        $("#alert-entrega").hide();
                    }, 6000);
                });
        });

        /* Cerrar el contenido y destruir la tabla */
        btnClose.addEventListener("click", function() {
            divContentEntrega.style.display = "none";
            tableEntregados.clear().draw();
            tableEntregados.destroy();
            btnClose.style.display = "none";
            btnCI.removeAttribute('disabled');
            btnSearch.removeAttribute('disabled');
            selectCI.removeAttribute('disabled');
            // console.log(tableEntregados.clear().draw());
        });
    })
</script>