$(document).ready(function() {
    var drugs=[];
    $('#medicine tbody tr').each(function(indexRow,indexVal) {
        drugs.push({
            "eligible":"#"+$('td:eq(2)',indexVal).find('.entryselect').attr('id'),
            "available":"#"+$('td:eq(3)',indexVal).find('.entryselect').attr('id'),
            "notAvailable":["#"+$('td:eq(4)',indexVal).find('.entryselect').attr('id'),"#"+$('td:eq(5)',indexVal).find('.entryselect').attr('id'),"#"+$('td:eq(6)',indexVal).find('.entryselect').attr('id')]

        });
    });
    console.log(JSON.stringify(drugs));
    // Ids of all Fields on dataset
    function saveOnAutoChange(currentDataElementComboStr) {
        // Save after Auto change
        var dataElementComboStr = currentDataElementComboStr.substr(currentDataElementComboStr.indexOf("#") + 1);
        dataElementId=dataElementComboStr.split(/\-/)[0];
        optionComboId=dataElementComboStr.split(/\-/)[1];
        saveBoolean( dataElementId, optionComboId );
    }
    function enableAndDisableFieldsOnSelectActionsAccordingly() {
        $.each(drugs, function(index, drug) {
            // Disabling of all "Available?" column inputs and Removal of False option for all "If No" columns inputs
            $(drug.notAvailable.join(',')+','+drug.available).attr('disabled', 'true');
            $(drug.notAvailable.join(',')).find('option[value="false"]').remove();
            // Disabling and enabling of "Available?" and "If No" fields on value changes
            $(drug.eligible).on('change', function() {
                if( ($(drug.eligible).val()=='false') || ($(drug.eligible).val()=='') )  {
                    $(drug.notAvailable.join(',')+','+drug.available).attr('disabled', 'true').val('');
                }else if($(drug.eligible).val()=='true') {
                    $(drug.available).removeAttr('disabled');
                };
            });
            $(drug.available).on('change', function() {
                if( ($(drug.available).val()=='true') || ($(drug.available).val()=='') )  {
                    $(drug.notAvailable.join(',')).attr('disabled', 'true').val('');
                    $.each(drug.notAvailable, function(index, value) {
                        $(value).on('change', function() {
                            if( ($(value).val()=='true'))  {
                                $(drug.notAvailable.join(',')).not(value).attr('disabled', 'true');
                                saveOnAutoChange(value);
                            }else{
                                $(drug.notAvailable.join(',')).not(value).removeAttr('disabled');
                                saveOnAutoChange(value);
                            };
                        });
                    });
                }else if($(drug.available).val()=='false') {
                    $(drug.notAvailable.join(',')).removeAttr('disabled');
                    $.each(drug.notAvailable, function(index, value) {
                        $(value).on('change', function() {
                            if( ($(value).val()=='true'))  {
                                $(drug.notAvailable.join(',')).not(value).attr('disabled', 'true');
                                saveOnAutoChange(value);
                            }else{
                                $(drug.notAvailable.join(',')).not(value).removeAttr('disabled');
                                saveOnAutoChange(value);
                            };
                        });
                    });
                };
            });
            $.each(drug.notAvailable, function(index, value) {
                $(value).on('change', function() {
                    if( ($(value).val()=='true'))  {
                        $(drug.notAvailable.join(',')).not(value).attr('disabled', 'true');
                        saveOnAutoChange(value);
                    }else{
                        $(drug.notAvailable.join(',')).not(value).removeAttr('disabled');
                        saveOnAutoChange(value);
                    };
                });
            });
            // Disabling and enabling of "Available?" and "If No" fields based on already filled values
            if( ($(drug.eligible).val()+''=='false') || ($(drug.eligible).val()=='') )  {
                $(drug.notAvailable.join(',')+','+drug.available).attr('disabled', 'true').val('');
                saveOnAutoChange(drug.available);
            }else if($(drug.eligible).val()+''=='true') {
                $(drug.available).removeAttr('disabled');
                saveOnAutoChange(drug.available);
            };
            if( ($(drug.available).val()+''=='true') || ($(drug.available).val()=='') )  {
                $(drug.notAvailable.join(',')).attr('disabled', 'true').val('');
                $.each(drug.notAvailable, function(index, value) {
                    saveOnAutoChange(value);
                });
            }else if($(drug.available).val()+''=='false') {
                $(drug.notAvailable.join(',')).removeAttr('disabled');
                $.each(drug.notAvailable, function(index, value) {
                    saveOnAutoChange(value);
                });
            };
        });
    }
    // Run on first Fresh Data Entry form.
    enableAndDisableFieldsOnSelectActionsAccordingly();
    // Event trigger on Orgunit/Period Switching
    $( 'body' ).bind( 'dhis-web-dataentry-form-loaded', function() {
        alert('Tracer Medicine Form Loaded Completely');
        enableAndDisableFieldsOnSelectActionsAccordingly();
    } );
});
