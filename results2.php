<?php include "header.php"; ?>


<p>分析結果查詢<p>

<?php
$strs = explode(",",file_get_contents( "./projects/" . $_REQUEST["ts"] . "/metadata.txt"));
?>
<p>
<div>工作類型：<?php echo $strs[0];?></div>
<div>開始時間：<?php echo date("Y-m-d h:i:s",$strs[1]);?></div>
<div>結束時間：<?php echo date("Y-m-d h:i:s",$strs[2]);?></div>
<div>系統編號：<?php echo $strs[3];?></div>
<div>執行狀態：<?php echo $strs[4];?></div>
</p>

<p>成果檔案下載</p>

<div><button>回到主選單</button></div>

<?php include "footer.php"; ?>
