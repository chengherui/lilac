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
              <li class="active"><a href="#user_query" data-toggle="tab">用户查询</a></li>
              <li><a href="#user_add" data-toggle="tab">用户添加</a></li>
              <li><a href="#user_updatePass" data-toggle="tab">用户密码更新</a></li>
              <li><a href="#user_delete" data-toggle="tab">用户删除</a></li>
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade active in" id="user_query">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>登录名</th>
                            <th>昵称</th>
                            <th>头衔</th>
                            <th>归属id</th>
                            <th>phone</th>
                            <th>更新时间</th>
                            <th>状态</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($users);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $users[$i][0] . "</td>";
                        echo "<td>" . $users[$i][1] . "</td>";
                        echo "<td>" . $users[$i][2] . "</td>";
                        echo "<td>" . $users[$i][3] . "</td>";
                        echo "<td>" . $users[$i][4] . "</td>";
                        echo "<td>" . $users[$i][5] . "</td>";
                        echo "<td>" . $users[$i][6] . "</td>";
                        if($users[$i][7] == 1) {
                            echo "<td>正常</td>";
                        } else {
                            echo "<td>已删除</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="user_add">
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/admin/users/userAdd', $attributes);
                ?>
                    <select id="roleid" name="roleid" onchange="$('.role4').hide();$('.role'+$('#roleid').val()).show();">
                      <option value="3">区域经理</option>
                      <option value="2">总经理</option>
                      <option value="4">业务经理</option>
                    </select>
<?php
    $this->load->view('admin/lists');
?>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="loginname" placeholder="登录名">
                    </div></div>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="nick" placeholder="用户昵称">
                    </div></div>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="passwd" placeholder="初始密码">
                    </div></div>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="phone" placeholder="联系方式">
                    </div></div>
                    <p></p>
                    <button type="submit" class="btn btn-primary btn-large">添加</button>
                </form>
              </div>

              <div class="tab-pane fade" id="user_updatePass">
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/admin/users/userUpdatePass', $attributes);
                ?>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="loginname" placeholder="用户登录名">
                    </div></div>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="password" placeholder="新密码">
                    </div></div>
                    <button type="submit" class="btn btn-primary btn-large">更新密码</button>
                </form>
              </div>

              <div class="tab-pane fade" id="user_delete">
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/admin/users/userDelete', $attributes);
                ?>
                    <div class="control-group"><div class="controls">
                    <input type="text" class="input-large" name="name" placeholder="用户登录名">
                    </div></div>
                    <button type="submit" class="btn btn-primary btn-large">删除</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
