<?php

include_once "base.php";

if(empty($_SESSION['total'])) {
    $today = date("Y-m-d");
    $chkdate = nums("total",["date"=>$today]);
    if($chkdate>0){
        $total = find("total", ["date"=>$today]);
        $_SESSION['total']=$total['total']+1;
        $total['total']=$total['total'] + 1;
        save("total", $total);
    }else{
        $total = ["date" => $today, "total" => 1];
        $_SESSION['total']=1;
        save("total", $total);
    }
}
$sum=q("select sum(`total`) from `total`")[0][0];
?>

<div id="title">
    <?= date("m 月 d 號 l"); ?> | 今日瀏覽: <?= $_SESSION['total']; ?> | 累積瀏覽: <?=$sum;?>
    <a href="index.php" style="float:right;">回首頁</a>
</div>
<div id="title2">
    <a href="index.php"><img src="./icon/02B01.jpg" alt="健康促進網-回首頁" title="健康促進網-回首頁"></a>
</div>