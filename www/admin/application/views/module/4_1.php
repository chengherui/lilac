<?php
    $this->load->view('templates/header');
?>
  </head>
  <body>
<?php
    $this->load->view('templates/nav');
?>
    <div class="container-fluid" id="left-content">
      <div class="row-fluid">
<?php
    $this->load->view('templates/left-content');
?>
        <div class="span10" id="right-content">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong></strong> 成功的结果。
            </div>
            <div><textarea rows="10">
            <?php
                echo $results;
            ?>
            </textarea></div>
            <a type="button" class="btn btn-primary btn-large" href="/module_4/index">返回</a>
            <hr>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong></strong> 未成功的列表。
            </div>
            <div><textarea rows="10">
            <?php
                echo $results_fail;
            ?>
            </textarea></div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
