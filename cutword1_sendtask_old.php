<?php
ini_set("display_errors",1);
include "header.php";
?>

<p>結巴斷詞工具</p>

<?php
#檢查文本檔案
$doc = file_get_contents( $_FILES["doc"]["tmp_name"] );

#檢查自訂辭典
$userdict = file_get_contents( $_FILES["userdict"]["tmp_name"] );

#檢查停用詞
$stopwords = file_get_contents( $_FILES["stopwords"]["tmp_name"] );

#建立專案資料夾
$ts = time() . rand(10,99);
$path = "./projects/" . $ts . "/";
mkdir( $path );
chdir( $path );

#放入各個工作檔
move_uploaded_file($_FILES["doc"]["tmp_name"], "doc.txt");
move_uploaded_file($_FILES["userdict"]["tmp_name"], "userdict.txt");
move_uploaded_file($_FILES["stopwords"]["tmp_name"], "stopwords.txt");

#呼叫Python執行
$command =  '../../cutword1.py' . ' > /dev/null 2>&1 & echo $!; ';
$pid = exec($command, $output);

#建立meta data
$fp = fopen("metadata.txt","w");
fputs($fp,"結巴斷詞," . time() . ",0," . $pid . ",執行中");
fclose($fp);

?>

<p>工作已排程，請記下工作編號以便後續查詢：<?php echo $ts; ?></p>

<p><a href="index.php"><button>回到系統首頁</button></a></p>

<?php include "footer.php"; ?>
