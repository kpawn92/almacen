<script>
    $(document.getElementById('libros')).ready(function() {
        /* Enviar formulario - libros */
        $('#sub_l').click(function() {
            var formLibro = $('#form2').serialize();
            console.log(formLibro);
            $.ajax({
                    url: '<?php echo base_url('/save_book'); ?>',
                    type: 'POST',
                    data: $('#form2').serialize(),
                })
                .done(function(res) {
                    $('#resp-book').html(res);
                    var cajaDos = document.getElementById('alert3');
                    cajaDos.style.display = '';
                    $("#alert3").show();
                    setTimeout(function() {
                        $("#alert3").hide();
                    }, 6000);
                })
        });

        /* Mostrar Tabla libros-registrados */

        var accion = "listarLibro";

        var tableBooks = $('#books').DataTable({
            ajax: {
                "url": "<?php echo base_url('/list_book'); ?>",
                "method": "POST",
                "data": {
                    accion: accion
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
                                       <button type="button" class="del-student btn btn-danger"><i class="dripicons-trash"></i></button>`
                }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
        });

        /*  */
        $("#books tbody").on('click', 'tr', function() {
            var data2 = tableBooks.row(this).data();
            console.log(data2);
            $("#id_libro").val(data2.id_book);
            //$("#id-del").val(data.id);
            $("#ecodigo").val(data2.codigo);
            $("#etitulo").val(data2.titulo);
            $("#eprecio").val(data2.precio);
            $("#eautor").val(data2.autor);
            $("#eisbn").val(data2.isbn);
            $("#ecantidad").val(data2.cantidad);

            /*$(".del-student").on("click", function() {
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
                    url: '<?php //echo base_url('/del_student'); 
                            ?>',
                    type: 'POST',
                    data: {
                        id: id
                    }
                });
            }*/
        });

        $("#edit_book").click(function() {
            $.ajax({
                url: '<?php echo base_url('/edit_book'); ?>',
                type: 'POST',
                data: $('#form-editbook').serialize(),
            }).done(function(res) {
                $('#respuesta-book').html(res);
                tableBooks.ajax.reload();
                var alerta2 = document.getElementById('alerta2');
                alerta2.style.display = '';
                $("#alerta2").show();
                setTimeout(function() {
                    $("#alerta2").hide();
                }, 4000);
            });
        });
    });
</script>