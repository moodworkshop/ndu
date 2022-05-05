<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->

	  <div class="row">
        <div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-heading">建立分析工作</div>
  				<div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
	  			    <p>分析平台：可於網站上直接上傳資料後執行並下載結果<p>
                    <div>
                        <ul>
                            <li><a href="cutword1.php">結巴中文斷詞</a></li>
                            <li><a href="cutword2.php">CKIP中文斷詞</a></li>
                            <li><a href="wordfreq.php">詞頻計算與文字雲</a></li>
                            <li><a href="tfidf.php">TF-IDF語言模型分析</a></li>
                            <li><a href="lda.php">LDA語言模型分析</a></li>
                            <li><a href="sentiment.php">情感分析</a></li> 
                        </ul>
                    </div>
  				</div>
			</div> 
        </div>
      </div>
<!-- body here -->
<?php include "footer.php"; ?>