 $(document).ready(function(){
 $("table > tbody >tr").each(function(trIndex,trValue){
    $(this).find("input[data-info='used']").attr("readonly","readonly");
    $(this).find("option[value='']").remove();
    $(this).find("option[value='true']").html("Applicable");
    $(this).find("option[value='false']").html("Not applicable");
    $(this).find("td:nth-child(4)").each(function(row,val){
    var trPossiblePrev=$(trValue).find("td:nth-child(3)").html();
     var trObtainedPrev=$(val).find("input[name='entryfield']").val(); 
     $(this).find("select").bind("change",function(){
       console.log(trPossiblePrev);
         console.log("YESS");
         console.log(trObtainedPrev);
         if($(this).val()=="false"){
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
                             
                                setHeaderDelayMessage("There is an error while deleting value");
                            
                        }
                    });
            $(trValue).find("td:nth-child(3)").text("0");
            var currentNumber = $("div#cde table tbody tr:last td:nth-child(3)").text();
            console.log(currentNumber); 
            $("div#cde table tbody tr:last td:nth-child(3)").text(parseInt(currentNumber)-parseInt(trPossiblePrev));
              
         }else if($(this).val()=="true"){
            $(val).find("input[name='entryfield']").removeAttr("disabled");
            $(val).find("input[name='entryfield']").val(trObtainedPrev);
            $(trValue).find("td:nth-child(3)").html(trPossiblePrev); 
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
                        'value': trObtainedPrev
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
                    var currentNumber = $("div#cde table tbody tr:last td:nth-child(3)").text();
                    console.log(currentNumber); 
                    $("div#cde table tbody tr:last td:nth-child(3)").text(parseInt(currentNumber)+parseInt(trPossiblePrev));
           
}

});
});
});
});
