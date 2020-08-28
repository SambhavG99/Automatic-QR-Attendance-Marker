<?php include('server.php')?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Attandance</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="styles_attend.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    </head>
    <body>
    <audio id="beep">
      <source src="beep.mp3" type="audio/mpeg"> 
    </audio>
    <div class="mode-set">
    <p id="mode"><i class="fa fa-clock-o" aria-hidden="true"></i>Manual Attendance Marker<i class="fa fa-clock-o" aria-hidden="true"></i></p>
    <button class="btn btn-warning" id="switch">Switch To Super Fast Auto Mode</button>
    <button class="btn btn-danger" id="reset" style="display:none;">Back to Manual Mode</button>
    </div>
    <div class="heading d-flex justify-content-center mt-2">
      <img src="img/hr.png" alt="HR Conclave Logo">
    </div> 
    
    
    <div class="d-flex justify-content-center mt-2">
      <video id="preview" width="330" height="330"></video>
    </div>  
    
       
    <div class="container"> 
        <p id="result" class="mt-2">__No Scans Yet__</p>
        <form class="form-group">
            <label for="ID" class="d-flex justify-content-center"> Your ID : </label>
            <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
                <input type="text" id="ID_TXT" class="form-control" name='id_txt'>
              </div>
              <div class="col-3"></div>
            </div>   
            <center>  
              <button class="btn btn-success" name="Mark" id='Mark'>MARK</button> 
            </center>
        </form>
    <div> 
    


<script src="script.js"></script> 
<script>

</script>
<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror:false});
      scanner.addListener('scan', function (content) { 
        var beep = document.getElementById('beep');
        beep.play();
        var queryID = content;   //UPDATE attendance SET ATTENDANCE='A' WHERE ID='$content'
        document.getElementById('ID_TXT').value = queryID;
        if (mode=="superfast") {
          SuperFast();
        }
      });

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
</script>

</body>


</html>
