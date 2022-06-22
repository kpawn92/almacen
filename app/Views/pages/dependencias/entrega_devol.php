<script>
    $(document).ready(function() {
        /* Buttons */
        const btnloadCI = document.getElementById("btn-upEntrega");
        const btnSearch = document.getElementById("btn-upBuscar");
        const btnClose = document.getElementById("close-form");
        const btnFormEntrega = document.getElementById("sub-entrega");
        const updateTbEntrega = document.getElementById("btn-update-entrega");

        /* Divs */
        let divSelectEntrega = document.getElementById("select-entrega");
        let divContentEntrega = document.getElementById("content-entrega");
        let divFormEntrega = document.getElementById("form-entrega");
        let divDttEntrega = document.getElementById("dataTable-entrega");

        /* Tags */
        let selectCI = document.getElementById("selectCI");
        let idStudent = document.getElementById("idEstudiante");
        let idBook = document.getElementById("idLibro");

        btnloadCI.addEventListener("click", function() {
            btnSearch.style.display = "";
            divSelectEntrega.style.display = "";

            /* Get CI */
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/ci') ?>',
                success: function(response) {
                    $("#selectCI").html(response).fadeIn();
                }
            });
        });

        btnSearch.addEventListener("click", function() {
            divContentEntrega.style.display = "";
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/books') ?>',
                success: function(res) {
                    $("#idLibro").html(res).fadeIn();
                }
            });

            btnloadCI.setAttribute('disabled', '');
            //btnSearch.setAttribute('disabled', '');
            //selectCI.setAttribute('disabled', '');
            btnClose.style.display = "";
            divFormEntrega.style.display = "";
            divDttEntrega.style.display = "";
            let ci = selectCI.value;
            idStudent.value = ci
            console.log(ci);
            

            let tableEntregados = $('#prestamosBook').DataTable({
                ajax: {
                    "url": "<?= base_url('/list_entrega'); ?>",
                    "method": "POST",
                    "data": {
                        ci: ci
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

            btnClose.addEventListener("click", function() {
                tableEntregados.destroy();
                tableEntregados.clear().draw();
                //selectCI.removeAttribute('disabled');
                //btnSearch.removeAttribute('disabled');
                btnloadCI.removeAttribute('disabled');
                btnClose.style.display = "none";
                divContentEntrega.style.display = "none";

            });
            

        });

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
                })
        })


    })
</script>