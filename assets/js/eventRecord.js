    function postpone(id) {
        var url = "departStudentManage/eventPostpone/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
    function disco(id) {
        var url = "departStudentManage/eventdisco/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
     function extension(id) {
        var url = "departStudentManage/eventExtension/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
    function resume(id) {
        var url = "departStudentManage/eventResume/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
    function freezing(id) {
        var url = "departStudentManage/eventFreezing/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
     