    function postpone(id) {
        var url = "departStudentManage/eventPostpone/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
    function postponeco(id) {
        var url = "collegStudentManage/eventPostpone/" + id;
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
    
    function discoco(id) {
        var url = "collegStudentManage/eventdisco/" + id;
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
    
    function extensionco(id) {
        var url = "collegStudentManage/eventExtension/" + id;
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
    
    function resumeco(id) {
        var url = "collegStudentManage/eventResume/" + id;
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
    
 function freezingco(id) {
        var url = "collegStudentManage/eventFreezing/" + id;
        $.get(url, function(data) {
            $('#events').html(data);
        });

    }
    
    $("#cye").change(function() {
        var f = document.getElementById("cye").value;
        var url = "departStudentManage/viewEventRecord/"+$.trim(f);
        $.get(url, function(data) {
            $('#eventview').html(data);
        });
    });
    
     $("#cye2").change(function() {
        var f = document.getElementById("cye2").value;
        var url = "collegStudentManage/viewEventRecord/"+$.trim(f);
        $.get(url, function(data) {
            $('#eventview').html(data);
        });
    });