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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">维表查询<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#table_query_pinfo" data-toggle="tab">lz_event_pinfo</a></li>
                        <li><a href="#table_query_info" data-toggle="tab">lz_event_info</a></li>
                    </ul>
                </li>
              <li><a href="#table_mod" data-toggle="tab">维表维护</a></li>
            </ul>
            <div id="TabContent" class="tab-content">
              <div class="tab-pane fade active in" id="table_query_pinfo">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>pname</th>
                            <th>pid</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($res);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $res[$i][0] . "</td>";
                        echo "<td>" . $res[$i][1] . "</td>";
                        echo "<td>" . $res[$i][2] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="table_query_info">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>aid</th>
                            <th>pid</th>
                            <th>eid</th>
                            <th>xid</th>
                            <th>name</th>
                            <th>info</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $length = count($res2);
                    for($i = 0; $i < $length; $i++) {
                        $j = $i + 1;
                        echo "<tr>";
                        echo "<td>" . $res2[$i][0] . "</td>";
                        echo "<td>" . $res2[$i][1] . "</td>";
                        echo "<td>" . $res2[$i][2] . "</td>";
                        echo "<td>" . $res2[$i][3] . "</td>";
                        echo "<td>" . $res2[$i][4] . "</td>";
                        echo "<td>" . $res2[$i][5] . "</td>";
                        echo "<td>" . $res2[$i][6] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="table_mod">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>注意!</strong> 维表维护，在下面输入sql语句，直接在线上维表库执行！多条sql换行符区分，不要轻易换行哦！
                </div>
                <?php
                $attributes = array('class'=>'form');
                echo form_open('/mojing_1/modTable', $attributes);
                ?>
                    <div><textarea rows="10" name="modSql"></textarea></div>
                    <legend></legend>
                    <button type="submit" class="btn btn-primary btn-large">执行！</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
