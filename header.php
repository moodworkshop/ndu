<?php header("Pragma: no-cache"); ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>國防大學新聞系資料科學輔助系統</title>
    <link href="bootstrap-3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.1.1/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="jquery-ui-1.11.2.custom/jquery-ui.min.css" rel="stylesheet">
    <link href="bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap-select.min.js"></script>
    <script src="bootstrap-3.1.1/js/bootstrap.min.js"></script>
	  <script src="js/validator.js"></script>
	  <script src="js/jeditable.min.js"></script>
    <script src="jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
    <script src="bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <!--<script src="./ckeditor/ckeditor.js"></script>-->
    <!--<script src="./ckeditor/adapters/jquery.js"></script>-->
  </head>
<style>
body {
	padding-top: 64px;
}
</style>
  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">國防大學新聞系資料科學輔助系統</div>
        </div>
        
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">建立分析工作<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="cutword1.php">結巴中文斷詞</a></li>
              <li><a href="cutword2.php">CKIP中文斷詞</a></li>
              <li><a href="wordfreqcloud.php">詞頻計算與文字雲</a></li>
              <li><a href="tfidf.php">TF-IDF詞彙向量產出</a></li>
              <li><a href="lda.php">LDA語言模型分析</a></li>
              <li><a href="sentiment.php">情感分析</a></li>
            </ul>
          </li>
          <li><a href="results.php">查詢工作結果</a></li>
          <li><a href="codes.php">範例程式碼</a></li>
        </ul>
        <?php if ( isset($_SESSION["username"]) ) { ?>
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="logout.php">登出</a></li>
        </ul>
        <?php } ?>
        </div><!--/.nav-collapse -->
              </div>
    </div>
    <div class="container">

      <?php if ( !preg_match('/index\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
      <ol class="breadcrumb">

        <li><a href="index.php">首頁</a></li>

        <?php if ( preg_match('/create\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>建立分析工作</li>
        <?php } ?>

        <?php if ( preg_match('/results\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>查詢工作結果</li>
        <?php } ?>
        
	      <?php if ( preg_match('/codes\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>範例程式碼</li>
        <?php } ?>

        <?php if ( preg_match('/cutword1.*\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>結巴斷詞工具</li>
        <?php } ?>

        <?php if ( preg_match('/cutword2.*\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>CKIP斷詞工具</li>
        <?php } ?>

        <?php if ( preg_match('/wordfreqcloud.*\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>詞頻與文字雲工具</li>
        <?php } ?>

        <?php if ( preg_match('/tfidf.*\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>TF-IDF詞彙向量產出</li>
        <?php } ?>

        <?php if ( preg_match('/lda.*\.php/',$_SERVER["SCRIPT_NAME"]) ) { ?>
        <li>LDA語言模型分析</li>
        <?php } ?>

      </ol>
      <?php } ?>
