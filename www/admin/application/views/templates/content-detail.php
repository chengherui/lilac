            <ul class="nav nav-tabs">
              <li class="active"><a href="#detail_basic" data-toggle="tab">基本信息</a></li>
              <li><a href="#detail_house" data-toggle="tab">房产抵押</a></li>
              <li><a href="#detail_car" data-toggle="tab">车辆抵押</a></li>
              <li><a href="#detail_other" data-toggle="tab">其它抵押</a></li>
              <li><a href="#detail_comment" data-toggle="tab">备注&补充</a></li>
              <li><a href="#detail_news" data-toggle="tab">审核记录</a></li>
            </ul>

            <div id="TabContent" class="tab-content">

              <div class="tab-pane fade" id="detail_news">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>时间</th>
                      <th>审核评论</th>
                      <th>审核结论</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php 
                        if($verifies!=null) {
                            foreach($verifies as $one) {
                                $curs = "";
                                switch($one->newstatus) {
                                    case 1:
                                        $curs = "待初审";
                                        break;
                                    case 2:
                                        $curs = "初审补充材料";
                                        break;
                                    case 3:
                                        $curs = "初审未通过";
                                        break;
                                    case 4:
                                        $curs = "待终审";
                                        break;
                                    case 5:
                                        $curs = "终审补充材料";
                                        break;
                                    case 6:
                                        $curs = "终审未通过";
                                        break;
                                    case 7:
                                        $curs = "完成";
                                        break;
                                        
                                }
                                echo "<tr>";
                                echo "<td>" . $one->create_time . "</td>";
                                echo "<td>" . $one->verifycomment . "</td>";
                                echo "<td>" . $curs . "</td>";
                                echo "</tr>";
                            }
                        }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="detail_comment">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>备注</td>
                      <td><?php if($comment!=null) echo $comment->description; ?></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs. "'>" . $comment->commentimgs. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs2. "'>" . $comment->commentimgs2. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs3. "'>" . $comment->commentimgs3. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs4. "'>" . $comment->commentimgs4. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs5. "'>" . $comment->commentimgs5. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($comment!=null) echo ("<a target='_blank' href='" . $comment->commentimgs6. "'>" . $comment->commentimgs6. "</a>") ?></td>
                      <td><?php if($comment!=null) echo ($comment->commentimgs6info) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="detail_other">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>其它抵押</td>
                      <td><?php if($other!=null) echo $other->description ?></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs . "'>" . $other->otherimgs . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs2 . "'>" . $other->otherimgs2 . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs3 . "'>" . $other->otherimgs3 . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs4 . "'>" . $other->otherimgs4 . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs5 . "'>" . $other->otherimgs5 . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($other!=null) echo ("<a target='_blank' href='" . $other->otherimgs6 . "'>" . $other->otherimgs6 . "</a>") ?></td>
                      <td><?php if($other!=null) echo ($other->otherimgs6info) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="detail_car">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>车辆编号</td>
                      <td><?php if($car!=null) echo ($car->carid) ?></td>
                    </tr>
                    <tr>
                      <td>行驶里程</td>
                      <td><?php if($car!=null) echo ($car->mileage) ?></td>
                    </tr>
                    <tr>
                      <td>车辆级别</td>
                      <td><?php if($car!=null) echo ($car->cartype) ?></td>
                    </tr>
                    <tr>
                      <td>燃油种类</td>
                      <td><?php if($car!=null) echo ($car->fueltype) ?></td>
                    </tr>
                    <tr>
                      <td>品牌车系</td>
                      <td><?php if($car!=null) echo ($car->carbrand) ?></td>
                    </tr>
                    <tr>
                      <td>排量</td>
                      <td><?php if($car!=null) echo ($car->emissions) ?></td>
                    </tr>
                    <tr>
                      <td>购车时间</td>
                      <td><?php if($car!=null) echo ($car->buytime) ?></td>
                    </tr>
                    <tr>
                      <td>购车价格</td>
                      <td><?php if($car!=null) echo ($car->buyprice) ?></td>
                    </tr>
                    <tr>
                      <td>二手车估价</td>
                      <td><?php if($car!=null) echo ($car->assessedprice) ?></td>
                    </tr>
                    <tr>
                      <td>评估机构</td>
                      <td><?php if($car!=null) echo ($car->assessedagency) ?></td>
                    </tr>
                    <tr>
                      <td>车辆照片</td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs. "'>" . $car->carimgs. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs2. "'>" . $car->carimgs2. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs3. "'>" . $car->carimgs3. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs4. "'>" . $car->carimgs4. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs5. "'>" . $car->carimgs5. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->carimgs6. "'>" . $car->carimgs6. "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->carimgs6info) ?></td>
                    </tr>
                    <tr>
                      <td>其它照片</td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs. "'>" . $car->otherimgs . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs2. "'>" . $car->otherimgs2 . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs3. "'>" . $car->otherimgs3 . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs4. "'>" . $car->otherimgs4 . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs5. "'>" . $car->otherimgs5 . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($car!=null) echo ("<a target='_blank' href='" . $car->otherimgs6. "'>" . $car->otherimgs6 . "</a>") ?></td>
                      <td><?php if($car!=null) echo ($car->otherimgs6info) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="detail_house">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>房屋位置</td>
                      <td><?php if($house!=null) echo ($house->houseaddr) ?></td>
                    </tr>
                    <tr>
                      <td>建筑面积</td>
                      <td><?php if($house!=null) echo ($house->size) ?></td>
                    </tr>
                    <tr>
                      <td>抵押情况</td>
                      <td><?php if($house!=null) echo ($house->mortgage) ?></td>
                    </tr>
                    <tr>
                      <td>评估值单价</td>
                      <td><?php if($house!=null) echo ($house->avgassessedval) ?></td>
                    </tr>
                    <tr>
                      <td>评估总价</td>
                      <td><?php if($house!=null) echo ($house->totalval) ?></td>
                    </tr>
                    <tr>
                      <td>评估机构</td>
                      <td><?php if($house!=null) echo ($house->assessedagency) ?></td>
                    </tr>
                    <tr>
                      <td>家访图片</td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs. "'>" . $house->houseimgs. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs2. "'>" . $house->houseimgs2. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs3. "'>" . $house->houseimgs3. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs4. "'>" . $house->houseimgs4. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs5. "'>" . $house->houseimgs5. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->houseimgs6. "'>" . $house->houseimgs6. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->houseimgs6info) ?></td>
                    </tr>
                    <tr>
                      <td>调查评估表</td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs. "'>" . $house->investigationimgs. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs2. "'>" . $house->investigationimgs2. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs3. "'>" . $house->investigationimgs3. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs4. "'>" . $house->investigationimgs4. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs5. "'>" . $house->investigationimgs5. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->investigationimgs6. "'>" . $house->investigationimgs6. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->investigationimgs6info) ?></td>
                    </tr>
                    <tr>
                      <td>其它补充资料</td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs. "'>" . $house->otherimgs. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgsinfo) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs2. "'>" . $house->otherimgs2. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgs2info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs3. "'>" . $house->otherimgs3. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgs3info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs4. "'>" . $house->otherimgs4. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgs4info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs5. "'>" . $house->otherimgs5. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgs5info) ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><?php if($house!=null) echo ("<a target='_blank' href='" . $house->otherimgs6. "'>" . $house->otherimgs6. "</a>") ?></td>
                      <td><?php if($house!=null) echo ($house->otherimgs6info) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade active in" id="detail_basic">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>订单编号</td>
                      <td><?php if(isset($data)) echo ($data->id) ?></td>
                    </tr>
                    <tr>
                      <td>提交人</td>
                      <td><?php echo ($data->nick) ?></td>
                    </tr>
                    <tr>
                      <td>申请时间</td>
                      <td><?php echo ($data->create_time) ?></td>
                    </tr>
                    <tr>
                      <td>订单状态</td>
                      <td><?php echo ($data->info) ?></td>
                    </tr>
                    <tr>
                      <td>贷款额度</td>
                      <td><?php echo ($data->loanamount) ?></td>
                    </tr>
                    <tr>
                      <td>贷款期限</td>
                      <td><?php echo ($data->loanmonths) ?></td>
                    </tr>
                    <tr>
                      <td>贷款用途</td>
                      <td><?php echo ($data->loanuse) ?></td>
                    </tr>
                    <tr>
                      <td>还款来源</td>
                      <td><?php echo ($data->repaysource) ?></td>
                    </tr>
                    <tr>
                      <td>月均流水</td>
                      <td><?php echo ($data->avgmonthbill) ?></td>
                    </tr>
                    <tr>
                      <td>征信概况</td>
                      <td><?php echo ($data->creditoverview) ?></td>
                    </tr>
                    <tr>
                      <td>借款人姓名</td>
                      <td><?php echo ($data->borrowername) ?></td>
                    </tr>
                    <tr>
                      <td>借款人年龄</td>
                      <td><?php echo ($data->borrowerage) ?></td>
                    </tr>
                    <tr>
                      <td>借款人身份证</td>
                      <td><?php echo ($data->borrowerid) ?></td>
                    </tr>
                    <tr>
                      <td>借款人婚姻状况</td>
                      <td><?php echo ($data->borrowermarrage) ?></td>
                    </tr>
                    <tr>
                      <td>借款人性别</td>
                      <td><?php echo ($data->borrowersex) ?></td>
                    </tr>
                    <tr>
                      <td>借款人电话</td>
                      <td><?php echo ($data->borrowerphone) ?></td>
                    </tr>
                    <tr>
                      <td>借款人住址</td>
                      <td><?php echo ($data->borroweraddr) ?></td>
                    </tr>
                    <tr>
                      <td>借款人工作单位</td>
                      <td><?php echo ($data->borrowerwork) ?></td>
                    </tr>
                    <tr>
                      <td>共借人姓名</td>
                      <td><?php echo ($data->coborrowername) ?></td>
                    </tr>
                    <tr>
                      <td>共借人年龄</td>
                      <td><?php echo ($data->coborrowerage) ?></td>
                    </tr>
                    <tr>
                      <td>共借人身份证</td>
                      <td><?php echo ($data->coborrowerid) ?></td>
                    </tr>
                    <tr>
                      <td>与借款人关系</td>
                      <td><?php echo ($data->coborrowerrelation) ?></td>
                    </tr>
                    <tr>
                      <td>共借人性别</td>
                      <td><?php echo ($data->coborrowersex) ?></td>
                    </tr>
                    <tr>
                      <td>共借人电话</td>
                      <td><?php echo ($data->coborrowerphone) ?></td>
                    </tr>
                    <tr>
                      <td>共借人住址</td>
                      <td><?php echo ($data->coborroweraddr) ?></td>
                    </tr>
                    <tr>
                      <td>担保人姓名</td>
                      <td><?php echo ($data->guarantorname) ?></td>
                    </tr>
                    <tr>
                      <td>担保人年龄</td>
                      <td><?php echo ($data->guarantorage) ?></td>
                    </tr>
                    <tr>
                      <td>担保人身份证</td>
                      <td><?php echo ($data->guarantorid) ?></td>
                    </tr>
                    <tr>
                      <td>与借款人关系</td>
                      <td><?php echo ($data->guarantorrelation) ?></td>
                    </tr>
                    <tr>
                      <td>担保人性别</td>
                      <td><?php echo ($data->guarantorsex) ?></td>
                    </tr>
                    <tr>
                      <td>担保人电话</td>
                      <td><?php echo ($data->guarantorphone) ?></td>
                    </tr>
                    <tr>
                      <td>担保人住址</td>
                      <td><?php echo ($data->guarantoraddr) ?></td>
                    </tr>
                    <tr>
                      <td>提交时位置</td>
                      <td><?php echo ($data->geoinfo) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
