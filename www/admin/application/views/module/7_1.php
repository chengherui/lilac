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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>unit_id</th>
                        <th>到期时间</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $length = count($res);
                for($i = 0; $i < $length; $i++) {
                    $j = $i + 1;
                    echo "<tr>";
                    echo "<td>" . $j . "</td>";
                    echo "<td>" . $res[$i][0] . "</td>";
                    echo "<td>" . $res[$i][1] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            <a type="button" class="btn btn-primary btn-large" href="/module_7/index">返回</a>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
