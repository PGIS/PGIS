 $(document).ready(function(){
  var totalCol4=0;
 $("table > tbody >tr:not(:last)").each(function(trIndex,trValue){
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
             var id = $( val ).find("input[name='entryfield']").attr( 'id' );
             var split = dhis2.de.splitFieldId( id );
                var ou = dhis2.de.getCurrentOrganisationUnit();
                    var pe = $( '#selectedPeriodId' ).val();
                    var dataElementId = split.dataElementId;
                    var optionComboId = split.optionComboId;
                    var dataValue={
                        'de': dataElementId,
                        'co': optionComboId,
                        'ou': ou,
                        'pe': pe,
                        'value': ''
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
                             
                                console.log("There is an error while deleting value");
                            
                        }
                    });
             var TotalMaxPoints=parseInt(totalCol4);
            valueServer(val,trPossiblePrev,trObtainedPrev,TotalMaxPoints);
             }else if(selectedOpt=='true'){
                $(val).find("input[name='entryfield']").removeAttr("disabled");
                var TotalMaxPoints=parseInt(totalCol4);
                valueServer(val,trPossiblePrev,trObtainedPrev,TotalMaxPoints);
                 }

     
    $(this).find("select").bind("change",function(){
          if($(this).val()=="false"){
            $(val).find("input[name='entryfield']").attr("disabled","disabled");
            $(trValue).find("td:nth-child(3)").text("0");
            var id = $( val ).find("input[name='entryfield']").attr( 'id' );
             var OtbainedTotal=parseInt($("div#cde table tbody tr:last td:nth-child(4)").find("input[name='indicator']").val());
             var idPerc = $("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']").attr( 'id' );
              var TotalMaxPoints=parseInt(totalCol4-trPossiblePrev);
              totalCol4=totalCol4-trPossiblePrev;
              $("td#Total").html(totalCol4);
              var parcentageServed=(OtbainedTotal/TotalMaxPoints)*100;
               ($("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']")).val(parcentageServed);
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
            var TotalMaxPoints=parseInt(totalCol4+(+trPossiblePrev));
            totalCol4=totalCol4+trPossiblePrev;
              $("td#Total").html(totalCol4);;
            valueServer(val,trPossiblePrev,trObtainedPrev,TotalMaxPoints);
           
}
});
});
var col4 = parseFloat($(trValue).find('td:nth-child(3)').html()); 
           totalCol4 += isNaN(col4) ? 0 : col4;

});
$("td#Total").html(totalCol4);
 console.log(totalCol4);
 });
 function valueServer(val,trPossiblePrev,trObtainedPrev,TotalMaxPoints){
	   var OtbainedTotal=parseInt($("div#cde table tbody tr:last td:nth-child(4)").find("input[name='indicator']").val());
             var id = $( val ).find("input[name='entryfield']").attr( 'id' );
             var idPerc = $("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']").attr( 'id' );
               var parcentageServed=(OtbainedTotal/TotalMaxPoints)*100;
             ($("div#cde table tbody tr:last td:nth-child(5)").find("input[name='entryfield']")).val(parcentageServed);
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
                          console.log("There is an error while inserting value");
                             
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
                          console.log("There is an error while inserting value");
                             
                        }
                    });
	 }
