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
                <strong>注意!</strong> 店铺经用户产品到期时间查询，1、输入用户unit_id，每行一个，2、选择产品，3、查询。
            </div>
            <?php
            $attributes = array('class'=>'form');
            echo form_open('/module_7/checkProd', $attributes);
            ?>
                <div><textarea rows="10" name="unit_ids"></textarea></div>
                <div><select name="prod_id">
                    <option value="0">选择产品</option>
                    <option value="1">标准包</option>
                    <option value="9">装修分析</option>
                    <option value="10">来源分析</option>
                    <option value="16">首页效果分析</option>
                    <option value="12">访客直播室</option>
                </select></div>
                <legend></legend>
                <button type="submit" class="btn btn-primary btn-large">查询到期时间</button>
            </form>
        </div>
      </div>
    </div>
<?php
    $this->load->view('templates/footer');
?>
