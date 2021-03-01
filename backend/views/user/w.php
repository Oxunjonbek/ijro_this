 

 <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

  <?= $form->field($model, 'teacher_id')->widget(Select2::classname(), [
        /*'value' => 1,*/
        'data' => ArrayHelper::map(Teacher::find()->all(), 'id', 'full_name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>

    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
        /*'value' => 1,*/
        'data' => ArrayHelper::map(Parents::find()->all(), 'id', 'full_name'),
        'options' => ['placeholder' => 'Выберите', 'multiple' => false],
        'theme' => Select2::THEME_KRAJEE,
        'size' => 'xs',
    ]); ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control input-transparent']) ?>

    <?= $form->field($model, 'status')->textInput(['class' => 'form-control input-transparent']) ?>