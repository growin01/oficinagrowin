$(document).on("click",".btnCostoActivof, .btnDAcumulada, .btnValorSalvamento, .btnVidaUtil", function(){
        
        var CostoActivof = $("#CostoActivof").val();
        var DAcumulada = $("#DAcumulada").val();
        var ValorSalvamento = $("#ValorSalvamento").val();
        var VidaUtil = $("#VidaUtil").val();


var DepreciacionMensual = ((CostoActivof -  DAcumulada)- ValorSalvamento)/(VidaUtil*12);

$("#DepreciacionMensual").val(DepreciacionMensual);
$("#DepreciacionMensual").number(true, 2);
  
  });
$(document).on("click","#VidaUtil", function(){
        
        var CostoActivof = $("#CostoActivof").val();
        var DAcumulada = $("#DAcumulada").val();
        var ValorSalvamento = $("#ValorSalvamento").val();
        var VidaUtil = $("#VidaUtil").val();


var DepreciacionMensual = ((CostoActivof -  DAcumulada)- ValorSalvamento)/(VidaUtil*12);

$("#DepreciacionMensual").val(DepreciacionMensual);
$("#DepreciacionMensual").number(true, 2);
  
  });
$(document).on("keyup","#CostoActivof, #DAcumulada, #ValorSalvamento, #VidaUtil", function(){
        
        var CostoActivof = $("#CostoActivof").val();
        var DAcumulada = $("#DAcumulada").val();
        var ValorSalvamento = $("#ValorSalvamento").val();
        var VidaUtil = $("#VidaUtil").val();


var DepreciacionMensual = ((CostoActivof -  DAcumulada)- ValorSalvamento)/(VidaUtil*12);

$("#DepreciacionMensual").val(DepreciacionMensual);
$("#DepreciacionMensual").number(true, 2);
  
  });
