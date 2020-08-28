
$(document).ready(function(){
    var id_js;
    var mode="normal";

    $("#switch").on("click",function(){
    mode="superfast";
    $("#mode").html('<i class="fa fa-bolt" aria-hidden="true"></i> SuperFast Mode <i class="fa fa-bolt" aria-hidden="true"></i>');
    $("#switch").hide();
    $("#reset").show();
    });

    $("#reset").on("click",function(){
    mode="normal";
    $("#mode").html('<i class="fa fa-clock-o" aria-hidden="true"></i>Manual Attendance Marker<i class="fa fa-clock-o" aria-hidden="true"></i>');
    $("#reset").hide();
    $("#switch").show();
    });

    function timeFunction() {
            setTimeout(function(){}, 4000);
    }

    function SuperFast(){
        setInterval(() => {
            document.getElementById('Mark').click(); 
            return;           
            }, 1000);
        console.log("You are using SuperFast Mode");
    }
    $(document).on('click','.btn-success',function(){
        id_js = $('#ID_TXT').val();
        $('form').submit(function(event) {
                $.ajax({
                    url:'server.php',
                    type:'POST',
                    data:{
                        'Mark':1,
                        'id':id_js,
                    },
                    success: function(response){
                        $('#result').html(response);
                    }
                });
            event.preventDefault();    
        });  
    });
});