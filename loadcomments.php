<?php include 'connect.php'?>
<?php
    $commentNewCount=$_POST['commentNewCount'];
    $query="SELECT * FROM scribble";
    $result=mysqli_query($connection,$query);
    $val=mysqli_num_rows($result);

$query="Select * from scribble LIMIT $commentNewCount";
if($result=mysqli_query($connection,$query)){
    if(mysqli_num_rows($result)>0){
        echo "<br>";
        while($rows=mysqli_fetch_assoc($result))
        {
            
            echo " <div class='d-block p-2 bg-light text-dark rounded-pill'>";
            echo "<p>";
            echo $rows["Name"];
            echo "<br>";
            echo $rows["Sthoughts"];
            echo "</p>";
            echo "</div>";
            echo "<br>";
            
        }
        if($commentNewCount>=$val){
            echo "No More Comments";
            echo "<script>";
            echo "$('#hiddenbutton').css('display','none');";
            echo "</script>";
        }
    else{
        echo $val-$commentNewCount." More Comments below";
    }
    }
    else{
        echo "No More Comments";
            echo "<script>";
            echo "$('#hiddenbutton').css('display','none');";
            echo "</script>";
    }

}
else{
    echo "COULD NOT CONNECT TO THE DATABASE";
}
?>