<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->
	<div class="row">
        <div class="col-md-12">
		    <div class="panel panel-default">
  			    <div class="panel-heading">LDA語言模型分析：請依指示操作</div>
  		            <div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
                        <form action="lda_sendtask.php" method="post" encType="multipart/form-data">
                            <div>取詞詞頻下限(0-1)<input type="text" name="min_df" value="0.1"></div>
                            <div>取詞詞頻上限(0-1)<input type="text" name="max_df" value="0.9"></div>
                            <div>最多取幾個主題(2-20)<input type="text" name="num_of_topics" value="5"></div>
                            <div>每個主題顯示幾個詞<input type="text" name="num_of_words" value="5"></div>
                            <div>請選擇文件檔案：每行代表一筆資料</div>
                            <div><input type="file" name="doc"></div>
                            <br/>
                            <div><input type="submit" value="下一步驟"></div>
                        </form>  
                    </div>
                </div>
		    </div>
        </div>
    </div>
<!-- body here -->
<?php include "footer.php"; ?>