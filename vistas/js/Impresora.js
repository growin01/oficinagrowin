$(document).ready(function() {
    var imprimirfacturaPOS = $("#imprimirfacturaPOS").val();
    nompreempresa = $("#NombreEmpresaVentas").val();
    Impresoratermica = $("#Impresora").val();
    rncempresa = $("#RncEmpresaVentas").val();
    DireccionEmpresaVentas = $("#DireccionEmpresaVentas").val();
    correo = $("#CorreoEmpresaVentas").val();
    telefono = $("#TelefonoEmpresaVentas").val();
    fecha =$("#Fechafacturaimp").val();
    

if(imprimirfacturaPOS == "1"){
    var idVenta = $("#id_FacturaPOS").val();


    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({
        url:"ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            ncf = respuesta["NCF_Factura"];
            rnccliente = respuesta["Rnc_Cliente"];
            nombrecliente = respuesta["Nombre_Cliente"];
            subtotal = respuesta["Neto"];
            descuentos = respuesta["Descuento"];
            itbis = respuesta["Impuesto"];
            total = respuesta["Total"];
            nuevoMetodoPago = respuesta["Metodo_Pago"];
            nuevoVendedor = respuesta["Nombre_Vendedor"];
    
    switch (nuevoMetodoPago) {
                          
        case '01':                 
            var formapago = "EFECTIVO";
        break;
        case '02':                  
            var formapago = "CHEQUES_TRANSFERENCIAS_DEPOSITO";            
         break;
        case '03':
            var formapago = "TARJETA_CREDITO_DEBITO";
                        
        break;
        case '04':
            var formapago = "VENTA A CREDITO"; 
        break;
                         
    }

 

  if(respuesta["EXTRAER_NCF"] == "FP1"){
        
        texto = "RECIBO";
    
    }else if(respuesta["EXTRAER_NCF"] == "B02"){

        texto = "FACTURA VALIDA PARA CONSUMIDOR FINAL";

    }else{

        texto = "FACTURA PARA CREDITO FISCAL";
    }

let nombreImpresora = Impresoratermica;            
let impresora = new Impresora();
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("RNC: "+rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write(rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
impresora.imprimirEnImpresora(nombreImpresora)
    .then(valor => {
        console.log("Al imprimir: " + valor);
    });



 }
})



$("#imprimirfacturaPOS").val(2);
}

});/*btnimprimir funcion*/
 
