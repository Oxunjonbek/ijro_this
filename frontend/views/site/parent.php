 <!-- Project Overview -->
    <?php foreach ($company as $key => $com) : ?>
     <!-- UI components start -->
     <div class="row" id="ui">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
<h4 class="card-title text-center">Ахборот коммуникация технологияларини жорий қилиш ва ривожлантириш <br>бошқармасининг 2021 йил март-май ойлари учун ЙЎЛ ХАРИТАСИ</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <?php
                $tadbirlar = common\models\Tadbir::find()->where(['company_id'=>$com->id])->all(); ?>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered mb-10">
                         <thead>
                            <tr>
                                <th>Тадбир номи</th>
                                <th>Амалга ошириш механизми</th>
                                <th>Эришиладиган натижа ва кўрсаткичлар</th>
                                <th>Муддати</th>
                                <th>Изох</th>
                                <th>Ижро ҳолати</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tadbirlar as $key => $tadbir) : ?>
                                <tr>

                                    <td class="width-300 height-300 ">

                                      <?=$tadbir->tadbir_name ?>
                                  </td>
                                  <td class="width-300 height-300 "> 
                                     <?=$tadbir->tadbir_content ?>
                                 </td>
                                 <td class="width-300 height-300 ">
                                     <?=$tadbir->tadbir_description ?>
                                 </td>
                                 <td class="width-300 height-300 ">
                                     <?=$tadbir->masullar ?>
                                 </td>
                                 <td class="width-50"><?=$tadbir->tadbir_date ?></td>
                                 <td class="width-100"><?=$tadbir->tadbir_result ?></td>

                                 <td class="width-100">
                                  <?php if($tadbir->tadbir_status==="bajarildi"): ?>
                                    <button value="бажарилди" type="button" class="btn btn-success mr-1 mb-1">бажарилди</button>
                                    <?php elseif($tadbir->tadbir_status==="bajarilmadi"): ?>
                                    <button value="бажарилмади" type="button" class="btn btn-danger mr-1 mb-1">Муддати ўтиб ижро қилинган</button>
                                    <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                    <button value="иш жараёнида" type="button" class="btn btn-primary mr-1 mb-1">иш жараёнида</button>
                                  <?php elseif($tadbir->tadbir_status==="ijroda"): ?>
                                  <button value="ижрода" type="button" class="btn btn-warning mr-1 mb-1">ижрода</button>
                                  <?php endif; ?>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- UI components end -->
<?php endforeach;?>
<!--/ Project Overview -->