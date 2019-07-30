$(document).ready(function() {
    $("tbody").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            removeUser(event.target.attributes[1].nodeValue);
        }
        if (event.target.className == "material-icons info_button") {
            //console.log(event.target.id);
            show_modal_info(event.target.attributes[1].nodeValue);
        }
        //console.log(event);
    });

    $("#btn_eliminarUsuario").click(function(event) {
        removeUser(event.target.getAttribute('data-id'));
    });

    $("#btn_cancelar_cambios").click(function(event) {
        cancelar_actualizar_funcion(event.target.getAttribute('data-id'));
    });

    $("#btn_guardar_cambios").click(function(event) {
        actualizar_funcion_orientador(event.target.getAttribute('data-id'));
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
            $("#user_modal_information").closeModal();
        } else {
            swal("Cancelado", "Acción cancelada.", "error");
        }
    });
};

function show_modal_info(id) {
    $('#user_modal_information').openModal();
}

function cancelar_actualizar_funcion(id) {
    swal("Cancelado", "Modificaciones descartadas.", "error");
}

function actualizar_funcion_orientador(id) {
    swal("Completo", "Datos actualizados", "success");
}