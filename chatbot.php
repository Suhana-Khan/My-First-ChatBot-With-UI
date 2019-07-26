<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
  background: #1ddced;
  background-image: url(c.jpeg);
 
}

.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  
 
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
  
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.container1 img {
  float: left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

div.sticky {
  position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  margin-top: 200px;
  background-color: #ddd;
  padding: 10px 0 0 10px;
  font-size: 20px;
}
.square {
  height: auto;
  width: 700px;
  padding: 8px;
  background-color: #fff;
  border: 2px solid #dedede;
  
}
</style>
</head>
<body>

<span id="ref">
<div class="square">
<center><h2>My First ChatBot</h2></center>
<br/>
  <?php 
    $query="select * from chats1";
    $res=mysqli_query($conn,$query);
    while($data=mysqli_fetch_array($res)){
      $user=$data['user'];
      $chatbot=$data['chatbot'];
      $date=$data['date'];
  ?>
 
  <div class="container1 darker" style="margin-left: 350px;">
    <img src="asshu.jpg" class="right" style="width:40%;">
    <p><?php echo $user;?></p>
    <span class="time-left"><?php //echo $date;?></span>
  </div>
  
  <div class="container1" style="margin-right: 350px;">
    <img src="sadiq.jpg" style="width:40%;">
    <p id="message"><?php echo $chatbot;?></p>
    <span class="time-right"><?php //echo $date;?></span>
  </div>


<?php } ?>
<div class="sticky">
  <div class="row">
     <div class="col-md-12">
       <div class="input-group mb-3">
          <input type="text" class="form-control" id="msg">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
            </div>
        </div>
   </div>
  </div>
</div>
</div>
</span>
<br/>

<script type="text/javascript">
  function send(){
    var text=$('#msg').val().toLowerCase();
    
     $.ajax({
                type:"post",
                url:"mysearch.php",
                data:{text:text},
                success:function(data){
                    //alert(data);
                    $('#ref').load(' #ref');
                }
      });
  }
</script>

</body>
</html>

