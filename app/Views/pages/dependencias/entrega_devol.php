<script>
    $(document).ready(function() {
        /* Buttons */
        const btnloadCI = document.getElementById("btn-upEntrega");
        const btnListCI = document.getElementById("btn-listCI");
        const btnClose = document.getElementById("close-form");
        const btnFormEntrega = document.getElementById("sub-entrega");

        /* Divs */
        let divSelectEntrega = document.getElementById("select-entrega");
        let divContentEntrega = document.getElementById("content-entrega");
        let divFormEntrega = document.getElementById("form-entrega");
        let divDttEntrega = document.getElementById("dataTable-entrega");

        /* Tags */
        let selectCI = document.getElementById("selectCI");
        //let idStudent = document.getElementById("idEstudiante");
        let idBook = document.getElementById("idLibro");

        divSelectEntrega.style.display = "";

        identidades();

        btnListCI.addEventListener("click", function() {
            identidades();
        });

        /* Get CI */
        function identidades() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/ci') ?>',
                success: function(response) {
                    $("#selectCI").html(response).fadeIn();
                }
            });
        }

        /* Table entregas */
        let f = "listarEntegados"
        let tableEntregados = $('#prestamosBook').DataTable({
            ajax: {
                "url": "<?= base_url('/list_entrega'); ?>",
                "method": "POST",
                "data": {
                    f: f
                }
            },
            columns: [{
                    "defaultContent": `<button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightLibro" aria-controls="offcanvasRight"><i class="uil-calendar-slash"></i></button>
                                       <button type="button" class="del-book btn btn-danger"><i class="dripicons-trash"></i></button>`
                },
                {
                    "data": "ci"
                },
                {
                    "data": "codigo"
                },
                {
                    "data": "titulo"
                },
                {
                    "data": "fecha_entrega"
                },
                {
                    "data": "fecha_dev"
                }
            ],
            "language": {
                "url": "assets/json/Spanish.json"
            },
        });

        /* Load content-entrega */
        btnloadCI.addEventListener("click", function() {

            divContentEntrega.style.display = "";
            btnListCI.style.display = "none";

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/books') ?>',
                success: function(res) {
                    $("#idLibro").html(res).fadeIn();
                }
            });

            btnloadCI.setAttribute('disabled', '');
            selectCI.setAttribute('disabled', '');
            //updateTbEntrega.style = "";
            btnClose.style.display = "";
            divFormEntrega.style = "";
            divDttEntrega.style = "";
            /* ci = selectCI.value;
            console.log(ci); 
            idStudent.value = selectCI.value*/

            let ci = selectCI.value;
            $('#dataTable-entrega input[type=search]').prop({
                'value': ci
            }).keyup().hide();
            
            $('#prestamosBook_filter label').hide();

            let ciID = ci

            /* Get ID del ci seleccionado */
            $.ajax({
                url: '<?php echo base_url('/id_ci') ?>',
                type: 'POST',
                data: {
                    ci: ci
                }
            }).done(function(respuest) {
                $('#idEstudiante').val(respuest);
            });

            /* Cerrar la orden */
            btnClose.addEventListener("click", function() {
                //tableEntregados.destroy();
                //tableEntregados.clear().draw();
                selectCI.removeAttribute('disabled');
                btnloadCI.removeAttribute('disabled');
                divContentEntrega.style.display = "none";
                btnloadCI.style = "";
                btnClose.style.display = "none";
                btnListCI.style = "";

                ci = null;
                console.log(ci);
            });
        });

        /* Send form entrega */
        btnFormEntrega.addEventListener("click", function() {
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

        /* Autocarga de la table-entrega */
        setInterval(function() {
            tableEntregados.ajax.reload();
        }, 3000);
    })
</script>