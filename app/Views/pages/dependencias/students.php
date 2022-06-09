<script>
    $(document.getElementById('estudiante')).ready(function() {
        var funcion = "listar";
        var table = $('#students').DataTable({
            ajax: {
                "url": "<?php echo base_url('/list_student'); ?>",
                "method": "POST",
                "data": {
                    funcion: funcion
                }
            },
            columns: [{
                    "data": "nombre"
                },
                {
                    "data": "lastname"
                },
                {
                    "data": "ci"
                },
                {
                    "data": "direccion"
                },
                {
                    "data": "municipio"
                },
                {
                    "data": "carrera"
                },
                {
                    "data": "anno_academico"
                },
                {
                    "data": "brigada"
                },
                {
                    "defaultContent": `<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="dripicons-document-edit"></i></button>
                                       <button type="button" class="del-student btn btn-danger"><i class="dripicons-trash"></i></button>`
                }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
        });




        /*var btnUpdateListStudent = document.getElementById("btn-update");
        btnUpdateListStudent.addEventListener("click", reloadListStudent);

        function reloadListStudent() {

            table.ajax.reload();
            console.log("update")
        };*/
        $("#btn-update").on('click', function() {
            table.ajax.reload();
            var data = table.row().data();
            //console.log(data);
            ocultarDivTable(data);
        });

        $("#btn-listStudents").on('click', function() {
            table.ajax.reload();
            var data = table.row().data();
            ocultarDivTable(data);
        })

        function ocultarDivTable(data) {
            var divDatatableStudent = document.getElementById("dataTable-student");
            if (data == undefined) {
                divDatatableStudent.style.display = "none";
                //console.log("bien");
            } else {
                divDatatableStudent.style.display = "contents";
            }
        }

        $("#students tbody").on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);
            $("#id").val(data.id);
            $("#id-del").val(data.id);
            $("#enombre").val(data.nombre);
            $("#elastname").val(data.lastname);
            $("#eci").val(data.ci);
            $("#edireccion").val(data.direccion);

            $(".del-student").on("click", function() {
                var id = data.id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        borrarEstudiante(id);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        table.ajax.reload();
                        console.log('eliminado');
                    }
                })
                console.log(id);
            });

            function borrarEstudiante(id) {
                console.log("funcion");
                $.ajax({
                    url: '<?php echo base_url('/del_student'); ?>',
                    type: 'POST',
                    data: {
                        id: id
                    }
                });
            }
        });
        $("#edit_student").click(function() {
            $.ajax({
                url: '<?php echo base_url('/edit_student'); ?>',
                type: 'POST',
                data: $('#form-edit').serialize(),
            }).done(function(res) {
                $('#respuesta').html(res);
                table.ajax.reload();
                var alerta = document.getElementById('alerta');
                alerta.style.display = '';
                $("#alerta").show();
                setTimeout(function() {
                    $("#alerta").hide();
                }, 4000);
            });

            //$("#offcanvasRight").removeClass("show");

        });
        $('#sub_e').click(function() {
            //console.log(caja);
            $.ajax({
                    url: '<?php echo base_url('/save_student'); ?>',
                    type: 'POST',
                    data: $('#form').serialize(),
                })
                .done(function(res) {
                    $('#resp').html(res);
                    table.ajax.reload();
                    var caja = document.getElementById('alert');
                    caja.style.display = '';
                    $("#alert").show();
                    setTimeout(function() {
                        $("#alert").hide();
                    }, 6000);
                })
        })
    });
</script>