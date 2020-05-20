<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="loderanimation.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ayush's Scribble Space</title>
    


  </head>
  <?php include 'connect.php'?>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Ayush's Scribble Space</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-primary my-2 my-sm-0" type="button"  data-toggle="modal" data-target="#exampleModal">Scribble your thoughts</button>
          </form>
</div>
      </nav>


      <div class="collapse show" id="MyCard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ayush Mishra</h5>
          <h6 class="card-subtitle mb-2 text-muted">B.Tech- Computer Science and Engineering</h6>
          <h6 class="card-subtitle mb-2 text-muted">Pranveer Singh Institute of Technology(2016-2020)</h6>
          <p class="card-text">
            If you are on this page, it means you played an important role in making my College life so interesting,
            fun and full of memories. So first of all thanks a lot for being there, in that moment- for that special 
            memory, and along with it also thanks for taking out a moment from your busy life to relive "that memory" here.
            Since the time i realized that there won't really be another college day and this final year won't really 
            finish like the previous final years, i felt quite sad cos of those many plans, parties and treats that couldn't
            happen and most of all cos that final SCRIBBLE day where we would have got the opportunity to openly express our
            emotions for one last time. So, that's how i have came up with this scribble space. Consider this blank space that
            blank shirt of mine, your keyboard as that pen and scribble whatever you feel like saying for me. Complaints, 
            Compliments, Grievances, Memories all accepted. 
            Eagerly waiting to read it...!!


          </p>
          <button class="btn btn-sm btn-primary float-left" type="button"  data-toggle="modal" data-target="#exampleModal">Scribble your thoughts</button>
         <br>
         <br>
         <button class="btn btn-sm btn-primary loadcomment" type="button" data-toggle="collapse" data-target="#MyCard" aria-expanded="true" aria-controls="MyCard">See what others scribbled</button>
        </div>
      </div>
</div>

<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

    <div id="comments">
      
</div>

<button class="btn btn-sm btn-primary float-right loadcomment" id="hiddenbutton" type="button" style="display:none">Load More Comments</button>
 
<script>
  $(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});
</script>
<script>
      $(document).ready(function(){
        var commentcount=0;
        $('.loadcomment').click(function(){
          commentcount = commentcount+4;
          $('#comments').load('loadcomments.php',
          {
            commentNewCount: commentcount
          });
          $('#hiddenbutton').css('display','block');
        })
      })
      </script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Express yout Thoughts here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="form-group">
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name here" required>
            <small id="emailHelp" class="form-text text-muted">You can use fake names and nicknames too but i believe you'll prefer leaving this msg with your real name so that i know who it is.</small>

          </div>
          <div class="form-group">
            <textarea class="form-control" name="thoughts" id="exampleFormControlTextarea1" onkeyup="countChar(this)" maxlength="500" placeholder="Express your feeling here" rows="5" required></textarea>
            <small id="emailHelp" class="form-text text-muted float-right" >Remaining Characters: <span id='charCount'>500</span></small>
            <div>
              <br>
    </div>
          </div>
        <div class="form-group">
        <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
        <button type="submit" id="postthoughts" class="btn btn-primary float-right" name="post">Post</button>
    </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charCount').text(500 - len);
        }
      };
</script>

<?php
if(isset($_POST["post"]))
{
  $name=$_POST["name"];
  $thoughts=$_POST["thoughts"];
  $query="INSERT INTO scribble(name,sthoughts) VALUES ('$name','$thoughts')";
  if(mysqli_query($connection,$query)){
   echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
  echo "<strong>Thank You So Much!</strong> Have a good day and a marvellous life.";
  echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    echo "<span aria-hidden='true'>&times;</span>";
  echo "</button>";
 echo "</div>";
  }
  else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
  echo "<strong>Upload Error!</strong> Could not upload your query please ensure you did not use any special characters or emoji. Alternatively you can also send your message over whatsapp.";
  echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    echo "<span aria-hidden='true'>&times;</span>";
  echo "</button>";
 echo "</div>";

  }

}
?>



    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>