function fun_agre_producto() {
    div_continuar = document.getElementById('agre_producto').style.display = 'flex';
}

function fun_modif_producto(id) {
    div_continuar = document.getElementById('modif_producto').style.display = 'flex';
    alert(id);
}

function cancelar_agre() {
    div_continuar = document.getElementById('agre_producto').style.display = 'none';
}

function cancelar_modif() {
    div_continuar = document.getElementById('modif_producto').style.display = 'none';
}

function cancelar_producto() {
    div_continuar = document.getElementById('producto').style.display = 'none';
}

function fun_buscar_producto(id) {
        div_continuar = document.getElementById('producto').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../../carta/detalle_producto/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga
                                           $("#result_producto").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#result_producto").empty();
                                        $("#result_producto").append(data);      
                                    }
                            });
    }

    function fun_modif_producto(id) {
        div_continuar = document.getElementById('modif_producto').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../admin/detalle_producto/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga
                                           $("#modificar_prod").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#modificar_prod").empty();
                                        $("#modificar_prod").append(data);      
                                    }
                            });
    }

