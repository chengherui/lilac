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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">模板管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#query_tem" data-toggle="tab">查看所有</a></li>
                        <li><a href="#manipulate_tem" data-toggle="tab">操作模板</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">发布管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="tab">发布历史</a></li>
                        <li><a href="#" data-toggle="tab">发布</a></li>
                    </ul>
                </li>
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade active in" id="query_tem">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>tips_id</th>
                            <th>名称</th>
                            <th>创建人</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($users);
                    for($i = 0; $i < $length; $i++) {
                        echo "<tr>";
                        echo "<td>" . $users[$i][0] . "</td>";
                        echo "<td>" . $users[$i][1] . "</td>";
                        echo "<td>" . $users[$i][2] . "</td>";
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
