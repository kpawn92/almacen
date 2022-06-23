<script>
    $(document).ready(function() {
        /* Buttons */
        const btnloadCI = document.getElementById("btn-upEntrega");

        const btnSearch = document.getElementById("btn-buscar");
        const btnClose = document.getElementById("close-form");
        const btnFormEntrega = document.getElementById("sub-entrega");

        /* Divs */
        let divSelectEntrega = document.getElementById("select-entrega");
        let divContentEntrega = document.getElementById("content-entrega");
        let divFormEntrega = document.getElementById("form-entrega");
        let divDttEntrega = document.getElementById("dataTable-entrega");

        /* Tags */
        let selectCI = document.getElementById("selectCI");
        let idStudent = document.getElementById("idEstudiante");
        let idBook = document.getElementById("idLibro");

        divSelectEntrega.style.display = "";

        /* Get CI */
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('/ci') ?>',
            success: function(response) {
                $("#selectCI").html(response).fadeIn();
            }
        });

        btnloadCI.addEventListener("click", function() {
            btnSearch.style.display = "";


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
            selectCI.setAttribute('disabled', '');
            //updateTbEntrega.style = "";
            btnSearch.style.display = "none";
            btnClose.style.display = "";
            divFormEntrega.style = "";
            divDttEntrega.style = "";
            /* ci = selectCI.value;
            idStudent.value = ci
            console.log(ci); */

            let ci = selectCI.value;

            dttEntrega(ci);


            btnClose.addEventListener("click", function() {
                //tableEntregados.destroy();
                //tableEntregados.clear().draw();
                selectCI.removeAttribute('disabled');
                //btnSearch.style = "";
                //btnloadCI.removeAttribute('disabled');
                divContentEntrega.style.display = "none";
                btnloadCI.style.display = "none";
                btnSearch.style = "";
                btnClose.style.display = "none";

                ci = null;
                console.log(ci);
            });
        });

        btnSearch.addEventListener("click", function() {
            selectCI.setAttribute('disabled', '');
            ci = selectCI.value;
            divContentEntrega.style = "";

            //let printCI = $('#dataTable-entrega input[type=search]');




 
            let printCI = $('#dataTable-entrega input[type=search]').prop({
                'value': ci
            }).keyup(); 

            btnClose.style = "";
            //console.log(ci);

        })

        /* btnSearch.addEventListener("click", function entrega() {}); */

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
        });

        function dttEntrega(ci) {
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
                        "defaultContent": `<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightLibro" aria-controls="offcanvasRight"><i class="uil-calendar-slash"></i></button>
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
            }).search(ci).draw();

        }
    })
</script>