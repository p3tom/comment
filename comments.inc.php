<?php
function setQuestion($conn){
    if(isset($_POST['Submitquestion'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "INSERT INTO question(uid, date, message) VALUES('$uid', '$date', '$message')";
        $result = mysqli_query($conn, $sql);
        
    }
}

function getQuestion($conn){
    $sql = "SELECT * FROM question";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
       echo"<div class='comment-box'><p>"; 
          echo $row['uid']."<br>";
          echo $row['date']."<br>";
          echo nl2br($row['message']);
        echo"</p>
            <form class='edit-form' method='POST' action='editcomment.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button>Edit</button>
            </form>
            <form class='reply-form' method='POST' action='replycomment.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button>Reply</button>
            </form>
        </div>";
    }  
}

function editQuestion($conn){
    if(isset($_POST['Submitquestion'])){
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "UPDATE question SET message='$message', date='$date'  WHERE cid='$cid'";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");
    }
}

