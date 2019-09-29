$(document).ready(function() {
    $(".btn_delete_process").click(function(evt) {
        //console.log(this);
        var process_id = this.getAttribute('data-id');
        //console.log(this);
        var el = this;

        swal({
            title: "Acción irreversible",
            text: "¿Seguro que desea eliminar el proceso No. " + process_id,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2196F3",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: 'assets/ajax/listar_procesos.php',
                    method: 'POST',
                    data: "idProceso=" + process_id + "&idAccion=" + 1,
                    async: false,
                    success: function(result) {
                        result = JSON.parse(result)
                            //console.log(result);
                        if (result.codigo == 0) {
                            swal("Completo", result.mensaje, "success");
                            el.style.display = 'none';
                        }
                    }
                });
            }
        });











    });
});