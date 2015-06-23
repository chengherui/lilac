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
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>抱歉!</strong> 您没有权限使用该功能，如需使用，请找管理员申请，谢谢！
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
