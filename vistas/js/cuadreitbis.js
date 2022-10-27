$(document).on("change", "#FechaCuadre", function(){
     
       
      	var FechaCuadre = $(this).val();
      	

        window.location = "index.php?ruta=cuadre-itbis&FechaCuadre="+FechaCuadre;

      
  })
function imprim1(imp1){
var printContents = document.getElementById('imp1').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;
    }

  /******************FORMATO NUMERICO A LA ENTRADA DE CUADRE ITBIS************/
    $("input[name=ITBISImportacion]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=SaldoAnterior]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=Retencion0205]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=Retencion0804]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
    /******************FORMATO NUMERICO A LA ENTRADA DE RESUMENTE FISCAL************/
    $("input[name=InvInicial]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=Nomina]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=Gasto_Depresiacion]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })
   $("input[name=Anticipo]").on('input', function (){ 

    this.value = this.value.replace(/[^,.0-9]/g,'');

   })


$(document).on("change", "#FechaDeclaracionIT1", function(){
     
       
        var FechaDeclaracionIT1 = $(this).val();
        

        window.location = "index.php?ruta=anexoA&FechaDeclaracionIT1="+FechaDeclaracionIT1;

      
  })
$(document).on("change", "#FechaDeclaracionIR17", function(){
     
       
        var FechaDeclaracionIR17 = $(this).val();
        

        window.location = "index.php?ruta=ir17&FechaDeclaracionIR17="+FechaDeclaracionIR17;

      
  })
$(document).on("click",".btnanexoA21, .btnanexoA22, .btnanexoA24, .btnanexoA27, .btnanexoA45C, .btnanexoA46C, .btnanexoA47C, .btnanexoA48C, .btnanexoA49C, .btnanexoA50C, .btnanexoA51C, .btnanexoA53C, .btnit1_12, .btnit1_13, .btnit1_14, .btnit1_29, .btnit1_31, .btnit1_35, .btnit1_36, .btnit1_37, .btnit1_40, .btnit1_61, .btnit1_64, .btnit1_65, .btnit1_66", function(){
     
       
        var FechaDeclaracionIT1 = $("#FechaDeclaracionIT1").val();
        var anexoA21 = $("#anexoA21").val();
        var anexoA22 = $("#anexoA22").val();
        var anexoA23 = $("#anexoA23").val();
        var anexoA24 = $("#anexoA24").val();
        var anexoA25 = $("#anexoA25").val();
        var anexoA27 = $("#anexoA27").val();
        var anexoA27 = $("#anexoA27").val();

        var anexoA45C = $("#anexoA45C").val();
        var anexoA46C = $("#anexoA46C").val();
        var anexoA47C = $("#anexoA47C").val();
        var anexoA48C = $("#anexoA48C").val();
        var anexoA49C = $("#anexoA49C").val();
        var anexoA50C = $("#anexoA50C").val();
        var anexoA51C = $("#anexoA51C").val();
        var anexoA53C = $("#anexoA53C").val();

        var it1_12 = $("#it1_12").val();
        var it1_13 = $("#it1_13").val();
        var it1_14 = $("#it1_14").val();
        var it1_29 = $("#it1_29").val();
        var it1_31 = $("#it1_31").val();
        var it1_35 = $("#it1_35").val();
        var it1_36 = $("#it1_36").val();
        var it1_37 = $("#it1_37").val();
        var it1_40 = $("#it1_40").val();
        var it1_61 = $("#it1_61").val();
        var it1_64 = $("#it1_64").val();
        var it1_65 = $("#it1_65").val();
        var it1_66 = $("#it1_66").val();


        
window.location = "index.php?ruta=anexoA&FechaDeclaracionIT1="+FechaDeclaracionIT1+
"&anexoA21="+anexoA21+
"&anexoA22="+anexoA22+
"&anexoA23="+anexoA23+
"&anexoA24="+anexoA24+
"&anexoA25="+anexoA25+
"&anexoA27="+anexoA27+
"&anexoA45C="+anexoA45C+
"&anexoA46C="+anexoA46C+
"&anexoA47C="+anexoA47C+
"&anexoA48C="+anexoA48C+
"&anexoA49C="+anexoA49C+
"&anexoA50C="+anexoA50C+
"&anexoA51C="+anexoA51C+
"&anexoA53C="+anexoA53C+
"&it1_12="+it1_12+
"&it1_13="+it1_13+
"&it1_14="+it1_14+
"&it1_29="+it1_29+
"&it1_31="+it1_31+
"&it1_35="+it1_35+
"&it1_36="+it1_36+
"&it1_37="+it1_37+
"&it1_40="+it1_40+
"&it1_61="+it1_61+
"&it1_64="+it1_64+
"&it1_65="+it1_65+
"&it1_66="+it1_66;

      
  })

$(document).on("keyup","#anexoA21, #anexoA22, #anexoA24, #anexoA27, #anexoA45C, #anexoA46C, #anexoA47C, #anexoA48C, #anexoA49C, #anexoA50C, #anexoA51C, #anexoA53C, #it1_12, #it1_13, #it1_14, #it1_29, #it1_31, #it1_35, #it1_36, #it1_37, #it1_40, #it1_61, #it1_64, #it1_65, #it1_66", function(){
  

this.value = this.value.replace(/[^0-9.]/g,'');


 })

$(document).on("click",".btnir17_18A, .btnir17_22A, .btnir17_25, .btnir17_29, .btnir17_30", function(){
     
       
        var FechaDeclaracionIR17 = $("#FechaDeclaracionIR17").val();
        var ir17_18A = $("#ir17_18A").val();
        var ir17_22A = $("#ir17_22A").val();
        var ir17_25 = $("#ir17_25").val();
        var ir17_29 = $("#ir17_29").val();
        var ir17_30 = $("#ir17_30").val();
        
        
        


        
window.location = "index.php?ruta=ir17&FechaDeclaracionIR17="+FechaDeclaracionIR17+
"&ir17_18A="+ir17_18A+
"&ir17_22A="+ir17_22A+
"&ir17_25="+ir17_25+
"&ir17_29="+ir17_29+
"&ir17_30="+ir17_30;

      
  })