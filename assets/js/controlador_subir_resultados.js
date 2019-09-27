$(document).ready(function() {
    ocultar();
    carga();
    $("#btn_cerrar").click(function() {
        $('#exampleModal').closeModal();
        $('body').attr('style', 'overflow-y: auto !important');
        $("#url-modal").html("");
    });
});

function mostrarPdf(id,proceso) {
    $.ajax({
        url: "./peticiones_subir_resultados.php",
        method: 'GET',
        data: "CODIGO_FUNCION=3"+"&idestudiante="+id+"&idproceso="+proceso,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            $("#modal-data").val(respuesta);
            const html=`<embed src="${respuesta}" frameborder="0" width="100%" height="275px">`;
            $("#url-modal").append(html);
        }
    });
    
}

function eliminarPdf(idestudiante,idproceso) {
    $.ajax({
        url: "./peticiones_subir_resultados.php",
        method: 'GET',
        data: "CODIGO_FUNCION=2"+"&idestudiante="+idestudiante+"&idproceso="+idproceso,
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            if(respuesta.match(/Error/g)){
                swal({   
                    title: "Atencion",   
                    text: respuesta,   
                    type: "danger",   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Ok", 
                    closeOnConfirm: true 
                })
            }else{
                swal({   
                    title: "¡Bien hecho!",   
                    text: respuesta,   
                    type: "success",      
                    confirmButtonText: "Ok", 
                    closeOnConfirm: true
                }, function(){  
                    window.open("./subir_resultados.php","_self")
                });
            }   
        }
    });
}

function ocultar() {
    var l=$("#interaciones").val();
    for (let i = 0; i < l; i++) {
        document.getElementById('show-clear'+i).style.display = 'none';
    }
    
}

function carga() {
    console.log($("#interaciones").val());
    $.ajax({
        url: "./peticiones_subir_resultados.php",
        method: 'GET',
        data: "CODIGO_FUNCION=1",
        dataType: 'json', //data para saber que funcion en php usara.
        success: function(respuesta) {
            console.log(respuesta);
            var l=$("#interaciones").val();
            var form = [];
            for (var i = 0; i < l; i++) {
                 form[i]=$("#form_g"+i).serializeArray();
            }
            console.log(form);
            console.log(form[0][0]['value']);
            var unico=0;
            for (var i = 0; i < form.length; i++) {
                for (var j = 0; j < 2; j++) {
                    for (var l = 0; l < respuesta.length; l++) {
                        if (form[j][i]['value']==respuesta[l]["idEstudiante"]) {
                            if (unico!=respuesta[l]["idEstudiante"]) {
                                console.log(true);
                                console.log(j);
                                document.getElementById('show-clear'+j).style.display = 'block';
                                $("#up-load"+j).find("*").prop("disabled", true);
                                unico = respuesta[l]["idEstudiante"];
                            }
                        }
                    }
                } 
            }
        }
    });
}

/*fnction insertarPdf(){
    //console.log(idproceso);
    var form = $('#form_g')[0];

    var data = new FormData(form);
    console.log(data);

    $.ajax({
        url: "assets/ajax/peticiones_subir_resultados.php",
        method: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache:false,
        success: function(respuesta) {
            console.log(respuesta);
        }
    });
}
*/
