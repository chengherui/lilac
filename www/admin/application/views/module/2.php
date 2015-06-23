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
                <li class="dropdown active">
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
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>注意!</strong> 店铺经店铺名查询对应unit_id，请在下方框输入，每行一个，最多同时查100,000个。
                </div>
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/module_2/convertNickname', $attributes);
                ?>
                    <div><textarea rows="10" name="nicknames"></textarea></div>
                    <button type="submit" class="btn btn-primary btn-large">查询 >></button>
                </form>
              </div>
              <div class="tab-pane fade" id="unit_id2nickname">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>注意!</strong> 店铺经用户unit_id查询对应店铺名，请在下方框输入，每行一个，最多同时查100,000个。
                </div>
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/module_2/convertUnit_id', $attributes);
                ?>
                    <div><textarea rows="10" name="unit_ids"></textarea></div>
                    <button type="submit" class="btn btn-primary btn-large">查询 >></button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
