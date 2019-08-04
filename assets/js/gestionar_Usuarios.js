var funcion_actual_orientador = 0;

$(document).ready(function() {
    $("tbody").click(function(event) {
        if (event.target.className == "material-icons remove_button") {
            removeUser(event.target.attributes[1].nodeValue);
        }
        if (event.target.className == "material-icons info_button") {
            get_perfil(event.target.attributes[1].nodeValue);
            show_modal_info();
            //console.log($('#slc_funcion_orientador').val());
        }
    });

    $("#btn_eliminarUsuario").click(function(event) {
        removeUser(event.target.getAttribute('data-id'));
    });

    $("#btn_cancelar_cambios").click(function(event) {
        $('#user_modal_information').closeModal();
    });

    $("#btn_guardar_cambios").click(function(event) {
        actualizar_funcion_orientador(event.target.getAttribute('data-id'));
    });

    $('#slc_funcion_orientador').change(function() {
        setTimeout(function() {
            //console.log($('#slc_funcion_orientador').val());
            //console.log(funcion_actual_orientador);
            $('#btn_guardar_cambios').show();
            if ($('#slc_funcion_orientador').val() == null) {
                $('#btn_guardar_cambios').hide();
            } else if (jQuery.compare($('#slc_funcion_orientador').val(), funcion_actual_orientador)) {
                $('#btn_guardar_cambios').hide();
            } else {
                $('#btn_guardar_cambios').show();
            }
        }, 300);
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
            $.ajax({
                url: './assets/ajax/gestion_perfiles.php?accion=delete',
                method: 'POST',
                data: "id=" + id,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                }

            });
        } else {
            swal("Cancelado", "Acción cancelada.", "error");
        }
    });
};

function show_modal_info() {
    $('#user_modal_information').openModal();
    setTimeout(function() {
        //console.log($('#slc_funcion_orientador').val());
        funcion_actual_orientador = $('#slc_funcion_orientador').val();
    }, 500);
}

function actualizar_funcion_orientador(id) {
    parametros = "id=" + id + "&" +
        "funcion=" + $('#slc_funcion_orientador').val();
    $.ajax({
        url: './assets/ajax/gestion_perfiles.php?accion=update',
        method: 'POST',
        data: parametros,
        dataType: 'json',
        success: function(data) {
            swal("Completo", "Datos actualizados", "success");
            //console.log(data.funcion);
            //console.log($("#slc_funcion_orientador option:selected").text());
            funcion_actual_orientador = $('#slc_funcion_orientador').val();
            get_perfil(id);
            const user = $(`.user_row[id=${id}]`);
            user.find(".lbl_tipo_usuario").text($('#slc_funcion_orientador option:selected').toArray().map(item => item.text).join());
        }
    });
}

function get_perfil(id) {
    $.ajax({
        url: './assets/ajax/gestion_perfiles.php',
        method: 'POST',
        data: "id=" + id,
        dataType: 'json',
        success: function(data) {
            // console.log(data)
            $(".Identidad").html(data["Identidad"]);
            $(".NombreC").html(data["Nombre"] + "<br>" + data["Apellidos"]);
            $(".Carrera").html(data["Carrera"]);
            $(".Correo").html(data["Correo"]);
            $(".Celular").html(data["Celular"]);
            $('#btn_guardar_cambios').attr("data-id", data["ID"]);

            if (data.Cuenta) {
                $(".Cuenta").parent().show();
                $(".Cuenta").html(data["Cuenta"]);
            } else {
                $(".Cuenta").parent().hide();
            }

            if (data.Carrera) {
                $(".Carrera").parent().show();
                $(".Carrera").html(data["Carrera"]);
            } else {
                $(".Carrera").parent().hide();
            }

            if (data.TipoUsuario !== 'Estudiante') {
                //$('#btn_guardar_cambios').show();
                $('#btn_guardar_cambios').hide();
                $(".tipo").show();
                $.ajax({
                    url: './assets/ajax/gestion_perfiles.php?tipos=d',
                    method: 'POST',
                    data: "id=" + id,
                    dataType: 'json',
                    success: function(data) {
                        let tipos = [];
                        for (let d of data) {
                            tipos.push(parseInt(d.tipos));
                        }
                        $('#slc_funcion_orientador').val(tipos);
                        $('#slc_funcion_orientador').material_select();
                    }
                });
            } else {
                $('#btn_guardar_cambios').hide();
                $(".tipo").hide();
            }

        }
    })
}

jQuery.extend({
    compare: function(arrayA, arrayB) {
        if (arrayA.length != arrayB.length) { return false; }
        // sort modifies original array
        // (which are passed by reference to our method!)
        // so clone the arrays before sorting
        var a = jQuery.extend(true, [], arrayA);
        var b = jQuery.extend(true, [], arrayB);
        a.sort();
        b.sort();
        for (var i = 0, l = a.length; i < l; i++) {
            if (a[i] !== b[i]) {
                return false;
            }
        }
        return true;
    }
});