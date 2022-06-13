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
                <h4 class="page-title">Formulario para pr&eacute;stamo de libros</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row shadow-lg p-3 mb-5 mt-4 bg-body rounded">
        <div class="mb-3 col-3">
            <!-- Single Select -->
            <select class="form-control select2" data-toggle="select2" id="selectCI">                           
            </select>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('/ci'); ?>',
                success: function (response) {
                    $("#selectCI").html(response).fadeIn();
                }
            })
        })
        /*var x = document.getElementById("fk_carrera").value;
        console.log(x);*/
    </script>
</div>