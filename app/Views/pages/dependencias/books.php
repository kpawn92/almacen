<script>
    $(document.getElementById('libros')).ready(function() { 
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
        })
    });
</script>