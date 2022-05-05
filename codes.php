<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->
	<div class="row">
        <div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-heading">範例程式碼</div>
  				<div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
                    <p>已置放於Google Colab，可在線上執行，或下載後再依需求進行修改調整</p>
                    <div>
                        <ul>
                            <li><a href="sample1.php">中文斷詞1 (中研院CKIP)</a></li>
                            <li><a href="sample2.php">中文斷詞2 (結巴)</a></li>
                            <li><a href="sample3.php">詞頻計算與文字雲</a></li>
                            <li><a href="sample4.php">LDA分析</a></li>
                            <li><a href="sample5.php">TF-IDF分析</a></li>
                            <li><a href="sample6.php">PTT資料抓取</a></li>
                            <li><a href="sample7.php">習近平發言資料抓取</a></li>
                            <li><a href="sample8.php">Facebook API資料抓取</a></li>
                            <li><a href="sample9.php">情感分析分數計算(以大連或台大情感資料庫為例)</a></li>
                        </ul>
                    </div>
                    <p>預設檔案下載，執行上述程式碼時可使用這些預設檔案測試，可在連結上按右鍵另存下載</p>
                    <div>
                        <ul>
                            <li><a href="testdata.txt">文字檔(每行為一筆資料)</a></li>
                            <li><a href="textuserdict.txt">使用者自訂字典(每行為一個詞彙)</a></li>
                            <li><a href="stopwordsdict.txt">停用詞字典(每行唯一個詞彙)</a></li>
                        </ul>
                    </div>
  				</div>
			</div>
        </div>
    </div>
<!-- body here -->
<?php include "footer.php"; ?>
