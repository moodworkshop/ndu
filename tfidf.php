<?php ini_set("display_erros",1); include "library.php"; ?>
<?php include "header.php"; ?>
<!-- body here -->
	<div class="row">
        <div class="col-md-12">
		    <div class="panel panel-default">
  			    <div class="panel-heading">TF-IDF詞彙向量產出：請依指示操作</div>
  		            <div class="isku_list panel-body" style="overflow-y: auto; height: 400px;">
                        <form action="tfidf_sendtask.php" method="post" encType="multipart/form-data">
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