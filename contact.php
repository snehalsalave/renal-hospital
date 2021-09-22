<?php //include('view/header.php'); ?> 
<!DOCTYPE html>
<head>
<title>Form submission</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

<div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>

<form id="formcontact" action="javascript:void(0)" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>
<script>
$(document).ready(function(){
    $(".notification").hide()
    $("#formcontact").submit(function(){
        var formdata=$("#formcontact").serialize();
        console.log(formdata);

        $.ajax({
          type:'post',
          url:'ajax/contactUs.php',
          data:formdata,
          success:function(response){
          let res=JSON.parse(response);
        //   console.log(res);
          if(res.status=="success")
          {
              $(".notification").show();
              $(".notification").html(res.msg);
          }else{
              $(".notification").show();
              $(".notification").html(res.msg);
          }
          }
        })
    })
})
</script>
</body>
</html>