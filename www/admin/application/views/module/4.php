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
              <li class="active"><a href="#give_history" data-toggle="tab">授权历史</a></li>
              <li><a href="#give_prod" data-toggle="tab">授权</a></li>
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade" id="give_prod">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>注意!</strong> 店铺经用户产品授权，1、输入用户unit_id，每行一个，2、选择授权产品，3、输入授权天数，4、授权（授权操作无法回滚，请再三确认）。
                </div>
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/module_4/giveProd', $attributes);
                ?>
                    <div><textarea rows="10" name="unit_ids"></textarea></div>
                    <div><select name="prod_id">
                        <option value="0">选择产品</option>
                        <option value="1">标准包</option>
                        <option value="9">装修分析</option>
                        <option value="10">来源分析</option>
                        <option value="16">首页效果分析</option>
                        <option value="12">访客直播室</option>
                        <option value="17">宝贝矩阵</option>
                    </select></div>
                    <input type="text" name="days" placeholder="输入授权天数（单位：天）">天
                    <legend></legend>
                    <button type="submit" class="btn btn-primary btn-large">授权 >></button>
                </form>
              </div>
              <div class="tab-pane fade active in" id="give_history">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>用户</th>
                            <th>产品id</th>
                            <th>天数</th>
                            <th>授权时间</th>
                            <th>授权unit_id</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($res);
                    for($i = 0; $i < $length; $i++) {
                        echo "<tr>";
                        echo "<td>" . $res[$i][0] . "</td>";
                        echo "<td>" . $res[$i][1] . "</td>";
                        echo "<td>" . $res[$i][2] . "</td>";
                        echo "<td>" . $res[$i][3] . "</td>";
                        echo "<td>" . $res[$i][4] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
