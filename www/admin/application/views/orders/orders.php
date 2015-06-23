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
              <li><a href="#orders_query" data-toggle="tab">报单查询</a></li>
              <?php 
                  if($this->session->userdata('roleid') == 3) {
                      echo "<li class=\"active\"><a href=\"#orders1_query\" data-toggle=\"tab\">待初审</a></li>";
                  } else {
                      echo "<li><a href=\"#orders1_query\" data-toggle=\"tab\">待初审</a></li>";
                  }
              ?>
              <li><a href="#orders2_query" data-toggle="tab">初审补充材料</a></li>
              <?php 
                  if($this->session->userdata('roleid') <= 2) {
                      echo "<li class=\"active\"><a href=\"#orders4_query\" data-toggle=\"tab\">待终审 </a></li>";
                  } else {
                      echo "<li><a href=\"#orders4_query\" data-toggle=\"tab\">待终审 </a></li>";
                  }
              ?>
              
              <li><a href="#orders5_query" data-toggle="tab">终审补充材料</a></li>
              <li><a href="#orders3_query" data-toggle="tab">初审未通过</a></li>
              <li><a href="#orders6_query" data-toggle="tab">终审未通过</a></li>
              <li><a href="#orders7_query" data-toggle="tab">完成</a></li>
              <?php 
                  if($this->session->userdata('roleid') <= 2) {
                      echo "<li><a href=\"#orders_update\" data-toggle=\"tab\">修改状态</a></li>";
                  }
              ?>
              
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade" id="orders_update">
                    <?php
                    $attributes = array('class'=>'form');
                    echo form_open('/admin/users/updateOrder', $attributes);
                    ?>
                        <div class="control-group"><div class="controls">
                          <input type="text" class="input-large" name="id" placeholder="订单id">
                          <label class="help-inline hide"></label>
                        </div></div>
                        <select name="newstatus">
                            <option value="1">待初审</option>
                            <option value="2">初审补充材料</option>
                            <option value="3">初审未通过</option>
                            <option value="4">待终审</option>
                            <option value="5">终审补充材料</option>
                            <option value="6">终审未通过</option>
                            <option value="7">完成</option>
                        </select>
                        <br/>
                        <button type="submit" class="btn btn-primary">确定修改</button>
                    </form>
              </div>
              <div class="tab-pane fade" id="orders_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->load->library('session');
                    $roleid = $this->session->userdata('roleid');
                    $length = count($orders);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders[$i][0] . "</td>";
                        echo "<td>" . $orders[$i][1] . "</td>";
                        echo "<td>" . $orders[$i][2] . "</td>";
                        echo "<td>" . $orders[$i][3] . "</td>";
                        echo "<td>" . $orders[$i][4] . "</td>";
                        echo "<td>" . $orders[$i][5] . "</td>";
                        echo "<td>" . $orders[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders[$i][0] . "'>查看</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <?php 
                  if($this->session->userdata('roleid') == 3) {
                      echo "<div class=\"tab-pane fade active in\" id=\"orders1_query\">";
                  } else {
                      echo "<div class=\"tab-pane fade\" id=\"orders1_query\">";
                  }
              ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders1);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders1[$i][0] . "</td>";
                        echo "<td>" . $orders1[$i][1] . "</td>";
                        echo "<td>" . $orders1[$i][2] . "</td>";
                        echo "<td>" . $orders1[$i][3] . "</td>";
                        echo "<td>" . $orders1[$i][4] . "</td>";
                        echo "<td>" . $orders1[$i][5] . "</td>";
                        echo "<td>" . $orders1[$i][6] . "</td>";
                        if($roleid <= 2) {
                            echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders1[$i][0] . "'>查看</a></td>";
                        } else {
                            echo "<td><a target='_blank' href='/admin/verify/index?id=" . $orders1[$i][0] . "'>审核</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="orders2_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders2);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders2[$i][0] . "</td>";
                        echo "<td>" . $orders2[$i][1] . "</td>";
                        echo "<td>" . $orders2[$i][2] . "</td>";
                        echo "<td>" . $orders2[$i][3] . "</td>";
                        echo "<td>" . $orders2[$i][4] . "</td>";
                        echo "<td>" . $orders2[$i][5] . "</td>";
                        echo "<td>" . $orders2[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders2[$i][0] . "'>查看</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="orders3_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders3);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders3[$i][0] . "</td>";
                        echo "<td>" . $orders3[$i][1] . "</td>";
                        echo "<td>" . $orders3[$i][2] . "</td>";
                        echo "<td>" . $orders3[$i][3] . "</td>";
                        echo "<td>" . $orders3[$i][4] . "</td>";
                        echo "<td>" . $orders3[$i][5] . "</td>";
                        echo "<td>" . $orders3[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders3[$i][0] . "'>查看</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <?php
                  if($this->session->userdata('roleid') <= 2) {
                      echo "<div class=\"tab-pane fade active in\" id=\"orders4_query\">";
                  } else {
                      echo "<div class=\"tab-pane fade\" id=\"orders4_query\">";
                  }
              ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders4);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders4[$i][0] . "</td>";
                        echo "<td>" . $orders4[$i][1] . "</td>";
                        echo "<td>" . $orders4[$i][2] . "</td>";
                        echo "<td>" . $orders4[$i][3] . "</td>";
                        echo "<td>" . $orders4[$i][4] . "</td>";
                        echo "<td>" . $orders4[$i][5] . "</td>";
                        echo "<td>" . $orders4[$i][6] . "</td>";
                        if($roleid <= 2) {
                            echo "<td><a target='_blank' href='/admin/verify/index?id=" . $orders4[$i][0] . "'>审核</a></td>";
                        } else {
                            echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders4[$i][0] . "'>查看</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="orders5_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders5);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders5[$i][0] . "</td>";
                        echo "<td>" . $orders5[$i][1] . "</td>";
                        echo "<td>" . $orders5[$i][2] . "</td>";
                        echo "<td>" . $orders5[$i][3] . "</td>";
                        echo "<td>" . $orders5[$i][4] . "</td>";
                        echo "<td>" . $orders5[$i][5] . "</td>";
                        echo "<td>" . $orders5[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders5[$i][0] . "'>查看</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="orders6_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders6);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders6[$i][0] . "</td>";
                        echo "<td>" . $orders6[$i][1] . "</td>";
                        echo "<td>" . $orders6[$i][2] . "</td>";
                        echo "<td>" . $orders6[$i][3] . "</td>";
                        echo "<td>" . $orders6[$i][4] . "</td>";
                        echo "<td>" . $orders6[$i][5] . "</td>";
                        echo "<td>" . $orders6[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders6[$i][0] . "'>查看</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="orders7_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#报单编号</th>
                            <th>申请人</th>
                            <th>申请金额</th>
                            <th>联系方式</th>
                            <th>申请时间</th>
                            <th>订单状态</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($orders7);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $orders7[$i][0] . "</td>";
                        echo "<td>" . $orders7[$i][1] . "</td>";
                        echo "<td>" . $orders7[$i][2] . "</td>";
                        echo "<td>" . $orders7[$i][3] . "</td>";
                        echo "<td>" . $orders7[$i][4] . "</td>";
                        echo "<td>" . $orders7[$i][5] . "</td>";
                        echo "<td>" . $orders7[$i][6] . "</td>";
                        echo "<td><a target='_blank' href='/admin/detail/index?id=" . $orders7[$i][0] . "'>查看</a></td>";
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
