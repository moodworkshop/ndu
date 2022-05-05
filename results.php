<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->

	  <div class="row">
      <div class="col-md-12">
			  <div class="panel panel-default">
  			  <div class="panel-heading">工作結果查詢</div>
  			  <div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
            <div>
              <form method="post" action="results.php">
                <div>請輸入工作編號進行查詢：<input type="text" name="ts"></div>
                <div><input type="submit" value="查詢"></div>
              </form>
            </div>
            <?php if ( isset($_REQUEST["ts"]) ) { ?>
            <hr>
            <?php
              $str = file_get_contents( "projects/" . $_REQUEST["ts"] . "/metadata.txt" );
              $strs = explode(",",$str);
            ?>
            <div>工作編號：<?php echo $_REQUEST["ts"]; ?></div>
            <div>任務：<?php echo $strs[0]; ?></div>
            <div>PID：<?php echo $strs[3]; ?></div>
            <div>開始：<?php echo date("Y-m-d h:m:s",$strs[1]); ?></div>
            <div>結束：<?php echo date("Y-m-d h:m:s",$strs[2]); ?></div>
            <div>目前狀態：<?php echo $strs[4]; ?></div>
            <br/>
            <div>資料下載; 請在項目上按右鍵另存連結即可下載</div>
            <ul>
              <?php if ( $strs[0] == '結巴斷詞' or $strs[0] == 'CKIP斷詞' ) { ?>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/results.txt">斷詞完成檔案</a></li>
              <?php } ?>

              <?php if ( $strs[0] == '詞頻計算與文字雲' ) { ?>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/results.txt">CSV詞頻檔</a></li>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/my_wordcloud.png">文字雲圖檔</a></li>
              <?php } ?>

              <?php if ( $strs[0] == 'TFIDF詞彙向量產出' ) { ?>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/column_names.txt">欄位名稱</a></li>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/one_hot_encoded.txt">One Hot編碼檔</a></li>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/tfidf_encoded.txt">TFIDF編碼檔</a></li>
              <?php } ?>

              <?php if ( $strs[0] == 'LDA語言模型分析' ) { ?>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/results.txt">LDA語言模型分析</a></li>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/scores.txt">CSV Coherence Score檔</a></li>
              <?php } ?>

              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/stdout.txt">問題診斷用檔案1</a></li>
              <li><a href="projects/<?php echo $_REQUEST["ts"]; ?>/stderr.txt">問題診斷用檔案2</a></li>
            </ul>
            <?php } ?>
  				</div>
			  </div>
      </div>
    </div>

<!-- body here -->
<?php include "footer.php"; ?>
