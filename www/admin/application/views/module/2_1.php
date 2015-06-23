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
            <ul class="nav nav-tabs">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">店铺经业务<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#nickname2unit_id" data-toggle="tab">nickname->unit_id</a></li>
                        <li><a href="#unit_id2nickname" data-toggle="tab">unit_id->nickname</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">网站统计业务<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="tab">查询1</a></li>
                        <li><a href="#" data-toggle="tab">查询2</a></li>
                    </ul>
                </li>
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade active in" id="nickname2unit_id">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong> 成功的结果。
                </div>
                <div><textarea rows="10">
                <?php
                    echo $results;
                ?>
                </textarea></div>
                <a type="button" class="btn btn-primary btn-large" href="/module_2/index">返回</a>
                <a type="button" class="btn btn-primary btn-large"<?php $href = ' href="/module_4/index?unit_ids=' . $results . '"'; echo $href;?>>复制后去授权</a>
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
              <div class="tab-pane fade" id="unit_id2nickname">
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
