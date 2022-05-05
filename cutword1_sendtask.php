<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->
	  <div class="row">
        <div class="col-md-12">
		  <div class="panel panel-default">
  			<div class="panel-heading">結巴斷詞工具：送出工作</div>
  		    <div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
            
            <?php if ( $_FILES["doc"]["tmp_name"] == "" ) { ?>
            <div>尚未指定文本檔案</div>
            <?php $stop = true; } ?>
            
            <?php if ( $_FILES["userdict"]["tmp_name"] == "" ) { ?>
            <div>尚未指定自定義字典</div>
            <?php $stop = true; } ?>

            <?php if ( $_FILES["stopwords"]["tmp_name"] == "" ) { ?>
            <div>尚未指定停用詞字典</div>
            <?php $stop = true; } ?>

            <?php if ( $stop ) { ?>
            <br/>
            <div>請回上一頁修正問題後重新送出</div>
            <div><a href="javascript: history.go(-1);"><button>回上一頁</button></a></div>
            <?php } else {
            //通過檢核後開始處理程序
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
            $command =  '../../cutword1.py' . ' > ./stdout.txt 2>stderr.txt & echo $!; ';
            $pid = exec($command, $output);

            #建立meta data
            $fp = fopen("metadata.txt","w");
            fputs($fp,"結巴斷詞," . time() . ",0," . $pid . ",執行中");
            fclose($fp);s
            ?>
            <p>工作已排程，請記下工作編號以便後續查詢：<?php echo $ts; ?></p>
            <p><a href="index.php"><button>回到系統首頁</button></a></p>
            <?php } ?>
            </div>
		  </div>
        </div>
      </div>

<!-- body here -->
<?php include "footer.php"; ?>


<?php
/*




*/
?>
