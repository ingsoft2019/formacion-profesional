$(document).ready(function() {
    $("tbody").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            removeUser(event.target.id);
        }
        if (event.target.className == "material-icons info_button") {
            //console.log(event.target.id);
            show_modal_info(event.target.id);
        }
        console.log(event.target);
    });

});


function render_lista_usuarios() {
    //FUNCION AJAX PARA CARGAR TODOS LOS USUARIOS
}

//funcion para remover visualmente al usuario Falta agregar AJAX para eliminarlo de la base de datos.
const removeUser = (id) => {
    swal({
        title: "¿Seguro que desea eliminar a " + $('#' + id).find("td").eq(1).html() + "?",
        text: "Los cambios se guardarán permanentemente.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2196F3",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm) {
        if (isConfirm) {
            const user = $(`.user_row[id=${id}]`);
            user.hide("slow", function() { $(this).remove(); })
            swal("Completo", "Usuario eliminado.", "success");
        } else {
            swal("Cancelado", "Acción cancelada.", "error");
        }
    });
};

function show_modal_info(id) {
    $('#user_modal_information').openModal();
}