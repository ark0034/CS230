<?php 

include 'dbhandler.php';

$id = $_GET['id'];
$sqlAvg = "SELECT AVG(ratingnum) AS AVGRATE FROM reviews WHERE itemid='$id' ORDER BY revdate DESC LIMIT 5";
$sqlCount = "SELECT count(ratingnum) AS Total FROM reviews WHERE itemid='$id'";

$query = mysqli_query($conn, $sqlAvg);
$query2 = mysqli_query($conn, $sqlCount);

$row = mysqli_fetch_array($query);
$row2 = mysqli_fetch_array($query2);

$avg = round($row['AVGRATE'],1);

echo '<div class="container" style="text-align: center;">
<h5 style="margin-top: 15px;">The Avg Rating for this Item: '.$avg.' stars</h5>
<div class="container" style="margin-bottom: 10px;">
'.stars($avg).'
</div>
<p>Number of ratings: '.round($row2['Total'],1),'</p>
</div>';

function stars($av){
    $s = "";
    if ($av == 0) {
        for ($i=0; $i < 5; $i++) { 
            $s .= '<i class="fa fa-star fa-2x" style="color:grey"></i>';
        }  
    }
    for ($i=0; $i < floor($av); $i++) { 
        $s .= '<i class="fa fa-star fa-2x" style="color:goldenrod"></i>';
    }
    if (($av - floor($av)) > 0.4) {
        $s .= '<i class="fas fa-star-half fa-2x" style="color:goldenrod"></i>';
    }
    return $s;
}