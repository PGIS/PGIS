$(document).ready(function(){
$("table > tbody >tr").each(function(trIndex,trValue){
	$(this).find("input[data-info='used']").attr("readonly","readonly");
    $(this).find("option[value='']").remove();
    $(this).find("option[value='true']").html("Applicable");
    $(this).find("option[value='false']").html("Not applicable");
    $(this).find("td:nth-child(4)").each(function(row,val){
    var trPossiblePrev=$(trValue).find("td:nth-child(3)").html();
    var trObtainedPrev=$(val).find("input[name='entryfield']").val(); 
    var selectedOpt=$(val).find("select option:selected").val();
      if(selectedOpt=='false'){
            $(trValue).find("td:nth-child(3)").text("0");
            $(val).find("input[name='entryfield']").attr("disabled","disabled");
            valueServer(val,trPossiblePrev,trObtainedPrev);
             }else if(selectedOpt=='true'){
                $(val).find("input[name='entryfield']").removeAttr("disabled");
                valueServer(val,trPossiblePrev,trObtainedPrev);
                 }


    $(this).find("select").bind("change",function(){
          if($(this).val()=="false"){
            $(val).find("input[name='entryfield']").attr("disabled","disabled");
            $(trValue).find("td:nth-child(3)").text("0");
            var id = $( val ).find("input[name='entryfield']").attr( 'id' );
             var OtbainedTotal=parseInt($("div#cde table tbody tr:last td:nth-child(4)").find("input[name='indicator']").val());
             var idPerc = $("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']").attr( 'id' );
             var currentNumber = $("div#cde table tbody tr:last td:nth-child(3)").text();
                    $("div#cde table tbody tr:last td:nth-child(3)").text(parseInt(currentNumber)+parseInt(trPossiblePrev));
             var TotalMaxPoints=parseInt($("div#cde table tbody tr:last td:nth-child(3)").html());
              console.log(TotalMaxPoints);
              var parcentageServed=(OtbainedTotal/TotalMaxPoints)*100;
              var split = dhis2.de.splitFieldId( id );
              var splitPerc = dhis2.de.splitFieldId( idPerc );
                    var ou = dhis2.de.getCurrentOrganisationUnit();
                    var pe = $( '#selectedPeriodId' ).val();
                    var dataElementId = split.dataElementId;
                    var optionComboId = split.optionComboId;
                    var dataElementIdPerc = splitPerc.dataElementId;
                    var optionComboIdPerc = splitPerc.optionComboId; 
                    var dataValue={
                        'de': dataElementId,
                        'co': optionComboId,
                        'ou': ou,
                        'pe': pe,
                        'value': ''
                    };
                    var dataValuePerc={
                        'de': dataElementIdPerc,
                        'co': optionComboIdPerc,
                        'ou': ou,
                        'pe': pe,
                        'value': parcentageServed
                    };
                    $.ajax({
                        url: '../api/dataValues',
                        data: dataValue,
                        dataType:"json",
                        type: 'post',
                        success: function(data, textStatus, jqXHR)
                        {
                             ($( val ).find("input[name='entryfield']")).val(data);
                                dhis2.de.updateIndicators();
                                dhis2.de.updateDataElementTotals( dataElementId );
                                console.log("Added successifly");
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                             
                                setHeaderDelayMessage("There is an error while deleting value");
                            
                        }
                    });
                    $.ajax({
                        url: '../api/dataValues',
                        data: dataValuePerc,
                        dataType:"json",
                        type: 'post',
                        success: function(data, textStatus, jqXHR)
                        {
                            ($("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']")).val(parcentageServed);
                             dhis2.de.updateIndicators();
                             dhis2.de.updateDataElementTotals( dataElementIdPerc );
                             console.log("Added successifly");
                             
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          setHeaderDelayMessage("There is an error while inserting value");
                             
                        }
                    });
            
               
         }else if($(this).val()=="true"){
            $(val).find("input[name='entryfield']").removeAttr("disabled");
            $(val).find("input[name='entryfield']").val(trObtainedPrev);
            $(trValue).find("td:nth-child(3)").html(trPossiblePrev); 
              valueServer(val,trPossiblePrev,trObtainedPrev);
           
}
});
});
});
});
 function valueServer(val,trPossiblePrev,trObtainedPrev){
	   var OtbainedTotal=parseInt($("div#cde table tbody tr:last td:nth-child(4)").find("input[name='indicator']").val());
             var id = $( val ).find("input[name='entryfield']").attr( 'id' );
             var idPerc = $("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']").attr( 'id' );
             var currentNumber = $("div#cde table tbody tr:last td:nth-child(3)").text();
                    $("div#cde table tbody tr:last td:nth-child(3)").text(parseInt(currentNumber)+parseInt(trPossiblePrev));
             var TotalMaxPoints=parseInt($("div#cde table tbody tr:last td:nth-child(3)").html());
              console.log(TotalMaxPoints);
             var parcentageServed=(OtbainedTotal/TotalMaxPoints)*100;
             var split = dhis2.de.splitFieldId( id );
             var splitPerc = dhis2.de.splitFieldId( idPerc );
                    var ou = dhis2.de.getCurrentOrganisationUnit();
                    var pe = $( '#selectedPeriodId' ).val();
                    var dataElementId = split.dataElementId;
                    var optionComboId = split.optionComboId;
                    var dataElementIdPerc = splitPerc.dataElementId;
                    var optionComboIdPerc = splitPerc.optionComboId;
                    var dataValue={
                        'de': dataElementId,
                        'co': optionComboId,
                        'ou': ou,
                        'pe': pe,
                        'value': trObtainedPrev
                    };
                    var dataValuePerc={
                        'de': dataElementIdPerc,
                        'co': optionComboIdPerc,
                        'ou': ou,
                        'pe': pe,
                        'value': parcentageServed
                    };
                    $.ajax({
                        url: '../api/dataValues',
                        data: dataValue,
                        dataType:"json",
                        type: 'post',
                        success: function(data, textStatus, jqXHR)
                        {
                            ($( val ).find("input[name='entryfield']")).val(trObtainedPrev);
                             dhis2.de.updateIndicators();
                             dhis2.de.updateDataElementTotals( dataElementId );
                             console.log("Added successifly");
                             
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          setHeaderDelayMessage("There is an error while inserting value");
                             
                        }
                    });
                    $.ajax({
                        url: '../api/dataValues',
                        data: dataValuePerc,
                        dataType:"json",
                        type: 'post',
                        success: function(data, textStatus, jqXHR)
                        {
                            ($("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']")).val(parcentageServed);
                             dhis2.de.updateIndicators();
                             dhis2.de.updateDataElementTotals( dataElementIdPerc );
                             console.log("Added successifly");
                             
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          setHeaderDelayMessage("There is an error while inserting value");
                             
                        }
                    });
	 }
