$(document).ready(function() {
  -    var drugs = [
-        {
-            "eligible":'#HKYab4TIAXs-uGIJ6IdkP7Q-val',
-            "available":'#sA9bxsRppLr-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#cCoaev12dkA-lxM1zKPHql2-val', '#cCoaev12dkA-BQrHxULahIt-val', '#cCoaev12dkA-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#P6nVr0o4O8O-uGIJ6IdkP7Q-val',
-            "available":'#cCCL5yNl301-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#BJpjOFTE4By-lxM1zKPHql2-val', '#BJpjOFTE4By-BQrHxULahIt-val', '#BJpjOFTE4By-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#W9g7M8URMFw-uGIJ6IdkP7Q-val',
-            "available":'#ZrjzeUlhXGt-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#BziHjcQApsK-lxM1zKPHql2-val', '#BziHjcQApsK-BQrHxULahIt-val', '#BziHjcQApsK-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#D9UegHR72F7-uGIJ6IdkP7Q-val',
-            "available":'#Kj2VNr4bNmK-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#gS1q4X2MVoZ-lxM1zKPHql2-val', '#gS1q4X2MVoZ-BQrHxULahIt-val', '#gS1q4X2MVoZ-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#YdumyTaJeaY-uGIJ6IdkP7Q-val',
-            "available":'#IctQGELdKnU-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#KsCk2qDzS64-lxM1zKPHql2-val', '#KsCk2qDzS64-BQrHxULahIt-val', '#KsCk2qDzS64-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#KhlPt64ioMc-uGIJ6IdkP7Q-val',
-            "available":'#ySw4xVVyeJm-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#In36kh0TzrP-lxM1zKPHql2-val', '#In36kh0TzrP-BQrHxULahIt-val', '#In36kh0TzrP-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#DPxobo6eezJ-uGIJ6IdkP7Q-val',
-            "available":'#gOnXFvuLClY-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#GCAsIyAZwOK-lxM1zKPHql2-val', '#GCAsIyAZwOK-BQrHxULahIt-val', '#GCAsIyAZwOK-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#R5wsRAcTOtA-uGIJ6IdkP7Q-val',
-            "available":'#n0X9iB1Z5uS-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#BA15xJDbRj9-lxM1zKPHql2-val', '#BA15xJDbRj9-BQrHxULahIt-val', '#BA15xJDbRj9-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#evvqSpYy99J-uGIJ6IdkP7Q-val',
-            "available":'#AT7PchtF6Jy-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#IvHr1VP6TuX-lxM1zKPHql2-val', '#IvHr1VP6TuX-BQrHxULahIt-val', '#IvHr1VP6TuX-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#mzbVXqclpu5-uGIJ6IdkP7Q-val',
-            "available":'#kolbisAPN7E-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#zKdLjb0BCd9-lxM1zKPHql2-val', '#zKdLjb0BCd9-BQrHxULahIt-val', '#zKdLjb0BCd9-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#tAwlvOWI8B7-uGIJ6IdkP7Q-val',
-            "available":'#uidgoKCVqH5-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#eTyCergUgzE-lxM1zKPHql2-val', '#eTyCergUgzE-BQrHxULahIt-val', '#eTyCergUgzE-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#LJB7RfGvrG0-uGIJ6IdkP7Q-val',
-            "available":'#YWDoPIllkt0-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#C5ewV9j0Mn2-lxM1zKPHql2-val', '#C5ewV9j0Mn2-BQrHxULahIt-val', '#C5ewV9j0Mn2-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#ZvujG4RrPc1-uGIJ6IdkP7Q-val',
-            "available":'#osJioPTXB4g-uGIJ6IdkP7Q-val',
-            "notAvailable":[ '#M5zy8zoP7EH-lxM1zKPHql2-val', '#M5zy8zoP7EH-BQrHxULahIt-val', '#M5zy8zoP7EH-TrmsDE6SUZI-val' ]
-        },
-        {
-            "eligible":'#WAZAQkuQonf-uGIJ6IdkP7Q-val',
-            "available":'#QWQ7zRKzB72-uGIJ6IdkP7Q-val',
-            "notAvailable":['#JTowgI3PsPu-lxM1zKPHql2-val','#JTowgI3PsPu-BQrHxULahIt-val','#JTowgI3PsPu-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#UNw1l9iegze-uGIJ6IdkP7Q-val',
-            "available":'#MzcpotiXVvW-uGIJ6IdkP7Q-val',
-            "notAvailable":['#rpPLykmvj5q-lxM1zKPHql2-val','#rpPLykmvj5q-BQrHxULahIt-val','#rpPLykmvj5q-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#QMJFvvldROR-uGIJ6IdkP7Q-val',
-            "available":'#sAkIbYaBsaI-uGIJ6IdkP7Q-val',
-            "notAvailable":['#OvZbmWQ5f9t-lxM1zKPHql2-val','#OvZbmWQ5f9t-BQrHxULahIt-val','#OvZbmWQ5f9t-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#VkOXLYjgLi3-uGIJ6IdkP7Q-val',
-            "available":'#g0104zD4mcr-uGIJ6IdkP7Q-val',
-            "notAvailable":['#irZ1Dr5ApdU-lxM1zKPHql2-val','#irZ1Dr5ApdU-BQrHxULahIt-val','#irZ1Dr5ApdU-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#yH3JhljDGOn-uGIJ6IdkP7Q-val',
-            "available":'#nN3JgHEkhGB-uGIJ6IdkP7Q-val',
-            "notAvailable":['#oForWHhvhDO-lxM1zKPHql2-val','#oForWHhvhDO-BQrHxULahIt-val','#oForWHhvhDO-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#nAcASD6oJnq-uGIJ6IdkP7Q-val',
-            "available":'#eCBVJOvugx2-uGIJ6IdkP7Q-val',
-            "notAvailable":['#R9pqmvX0wjX-lxM1zKPHql2-val','#R9pqmvX0wjX-BQrHxULahIt-val','#R9pqmvX0wjX-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#v0s3CE7BDP9-uGIJ6IdkP7Q-val',
-            "available":'#kXThHIW0757-uGIJ6IdkP7Q-val',
-            "notAvailable":['#doj7ctZXlUd-lxM1zKPHql2-val','#doj7ctZXlUd-BQrHxULahIt-val','#doj7ctZXlUd-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#Y9phB9UEDnJ-uGIJ6IdkP7Q-val',
-            "available":'#n91UibSDCbn-uGIJ6IdkP7Q-val',
-            "notAvailable":['#hJFXbI7mqYe-lxM1zKPHql2-val','#hJFXbI7mqYe-BQrHxULahIt-val','#hJFXbI7mqYe-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#xCi9Tmrc02p-uGIJ6IdkP7Q-val',
-            "available":'#rgjKbtNpQhJ-uGIJ6IdkP7Q-val',
-            "notAvailable":['#k5Ib2ZI15gi-lxM1zKPHql2-val','#k5Ib2ZI15gi-BQrHxULahIt-val','#k5Ib2ZI15gi-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#TY366LzijW7-uGIJ6IdkP7Q-val',
-            "available":'#TlCxeushoLG-uGIJ6IdkP7Q-val',
-            "notAvailable":['#fBBVYXHX6C3-lxM1zKPHql2-val','#fBBVYXHX6C3-BQrHxULahIt-val','#fBBVYXHX6C3-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#wf8dkCABbpg-uGIJ6IdkP7Q-val',
-            "available":'#Yh7sP6tK3zs-uGIJ6IdkP7Q-val',
-            "notAvailable":['#QMUpcLcqTH9-lxM1zKPHql2-val','#QMUpcLcqTH9-BQrHxULahIt-val','#QMUpcLcqTH9-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#wulZUjTylFh-uGIJ6IdkP7Q-val',
-            "available":'#zW6Mv7dxX0m-uGIJ6IdkP7Q-val',
-            "notAvailable":['#AWSCnZDZMY7-lxM1zKPHql2-val','#AWSCnZDZMY7-BQrHxULahIt-val','#AWSCnZDZMY7-TrmsDE6SUZI-val']
-        }
-        ,
-        {
-            "eligible":'#l8Loy8OUvpp-uGIJ6IdkP7Q-val',
-            "available":'#trmpgLgJHH8-uGIJ6IdkP7Q-val',
-            "notAvailable":['#XZD4OwsOfEQ-lxM1zKPHql2-val','#XZD4OwsOfEQ-BQrHxULahIt-val','#XZD4OwsOfEQ-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#hQoqbHReXb9-uGIJ6IdkP7Q-val',
-            "available":'#eg4dUnMo0fN-uGIJ6IdkP7Q-val',
-            "notAvailable":['#dYnHhIKFQ4x-lxM1zKPHql2-val','#dYnHhIKFQ4x-BQrHxULahIt-val','#dYnHhIKFQ4x-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#Evd9MB34LXb-uGIJ6IdkP7Q-val',
-            "available":'#A7be6IMQrzx-uGIJ6IdkP7Q-val',
-            "notAvailable":['#FfZDA8gewPo-lxM1zKPHql2-val','#FfZDA8gewPo-BQrHxULahIt-val','#FfZDA8gewPo-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#CSSLCIYLGyY-uGIJ6IdkP7Q-val',
-            "available":'#J5ZUSjCZ6Hn-uGIJ6IdkP7Q-val',
-            "notAvailable":['#uH5ofwNwn5q-lxM1zKPHql2-val','#uH5ofwNwn5q-BQrHxULahIt-val','#uH5ofwNwn5q-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#Bd6nWAqZajQ-uGIJ6IdkP7Q-val',
-            "available":'#QFSiKjAzKlR-uGIJ6IdkP7Q-val',
-            "notAvailable":['#sl4veP08Lwf-lxM1zKPHql2-val','#sl4veP08Lwf-BQrHxULahIt-val','#sl4veP08Lwf-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#SxrahNKV8kx-uGIJ6IdkP7Q-val',
-            "available":'#HO4gZ5R8Iaa-uGIJ6IdkP7Q-val',
-            "notAvailable":['#OXYM1N5ujpM-lxM1zKPHql2-val','#OXYM1N5ujpM-BQrHxULahIt-val','#OXYM1N5ujpM-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#IkKR0e6rNrx-uGIJ6IdkP7Q-val',
-            "available":'#OhMOjK2Hb3z-uGIJ6IdkP7Q-val',
-            "notAvailable":['#jQkw9S3irL1-lxM1zKPHql2-val','#jQkw9S3irL1-BQrHxULahIt-val','#jQkw9S3irL1-TrmsDE6SUZI-val']
-        },
-        {
-            "eligible":'#JMwk7Sl2ySP-uGIJ6IdkP7Q-val',
-            "available":'#UiChWiTcM83-uGIJ6IdkP7Q-val',
-            "notAvailable":['#NQ46g527c8j-lxM1zKPHql2-val','#NQ46g527c8j-BQrHxULahIt-val','#NQ46g527c8j-TrmsDE6SUZI-val']
-        }
-    ];
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
