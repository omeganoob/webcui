<?php
    session_start();
    $cmt = $_REQUEST['cmt'];
    $userid = $_REQUEST['userid'];
    $productid = $_REQUEST['productid'];
    $date = date("y-m-d");
    $conn = mysqli_connect("localhost","root","mysql","giuaky");
    $sql = "INSERT INTO `comment` (`userID`, `IDproduct`, `cmt`, `date`) VALUES ('".$userid."', '".$productid."', '".$cmt."', '".$date."');";
    $query = mysqli_query($conn, $sql);

    $sql = "SELECT id, username FROM `taikhoan` WHERE id = " .$userid;
    $query = mysqli_query($conn, $sql);
    $userinfo = mysqli_fetch_row($query);
    $user = $userinfo[1];

    echo "
        <div class='comment'>
            <p class='cmt-user'><span class='glyphicon glyphicon-user'></span>".$user."<span class='text-muted small'> - ".$date."</span><p>
            <div class='cmt-commment'>
                ".$cmt."
            </div>                                         
        </div>
    ";
?>