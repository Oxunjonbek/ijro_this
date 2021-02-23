<?= $form->field($model, 'sinf')->widget(MultipleInput::className(), [
        'rendererClass' => ListRenderer::className(),
        'max' => 20,
        'iconSource' => MultipleInput::ICONS_SOURCE_FONTAWESOME,
        'allowEmptyList' => false,
        'enableGuessTitle' => true,
        'theme' => MultipleInput::THEME_BS,
        'addButtonPosition' => MultipleInput::POS_FOOTER,
        'layoutConfig' => [
            'wrapperClass' => 'col-sm-12',
        ],
        'cloneButton' => true,
        'columns' => [
            [
                'name'  => 'grade_id',
                'type'  => 'dropDownList',
                'title' => 'Sinf',
                'defaultValue' => 1,
                'items' => [$grade]
            ],
            [
                'name'  => 'full_name',
                'title' => 'FIO',
                'defaultValue' => 'FIO',
                'enableError' => true,
                'options' => [
                    'type' => 'text',
                    'class' => 'input-priority',
                ]
            ],
            // [
            //     'name'  => 'birth_date',
            //     'type'  => DateTimePicker::className(),
            //     'title' => 'Tug`ilgan kuni',
            //     'defaultValue' => date('d-m-Y h:i')
            // ],
            [
                'name'  => 'birth_date',
                'type'  => \kartik\date\DatePicker::className(),
                'title' => 'Tug`ilgan kuni',
                'value' => function($data) {
                    return $data['day'];
                },
            // 'items' => [
            //     '0' => 'Saturday',
            //     '1' => 'Monday'
            // ],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd.mm.yyyy',
                        'todayHighlight' => true
                    ]
                ]
            ],

            [
                'name'  => 'gender_id',
                'type'  => 'dropDownList',
                'title' => 'Jinsi',
                'defaultValue' => null,
                'items' => [$gender]
            ]

        ]
    ])->label(false);
    ?>


    <?phpcredits(
    )
     // var_dump($model->load(Yii::$app->request->post()));die();
        if($model->load(Yii::$app->request->post()) ){
            // var_dump(Yii::$app->request->post());exit();
            foreach ($model->sinf as   $value) {
                $model->full_name = $value['full_name'];
                $model->grade_id = $value['grade_id'];
                $model->birth_date = $value['birth_date'];
                $model->gender_id = $value['gender_id'];
                $s=$model->save();
            }
            if ($s) {

                $result['success'] = 1;
                // $result['view'] = $this->render('_form', ['model' => new Pupil() ]);
                $result['view'] = $this->redirect(['index']);
            }
        }
    ?>



    

    <?= $form->field($model, 'student')->widget(MultipleInput::className(), [
        'rendererClass' => ListRenderer::className(),
        'max' => 20,
        'iconSource' => MultipleInput::ICONS_SOURCE_FONTAWESOME,
        'allowEmptyList' => false,
        'enableGuessTitle' => true,
        'theme' => MultipleInput::THEME_BS,
        'addButtonPosition' => MultipleInput::POS_FOOTER,
        'layoutConfig' => [
            'wrapperClass' => 'col-sm-12',
        ],
        'cloneButton' => true,
        'columns' => [
            [
                'name'  => 'pupil_id',
                'type'  => 'dropDownList',
                'title' => 'O`quvchi',
                // 'defaultValue' => 1,
                'items' => [$pupil]
            ],
            [
                'name'  => 'full_name',
                'title' => 'FIO',
                'defaultValue' => 'FIO',
                'enableError' => true,
                'options' => [
                    'type' => 'text',
                    'class' => 'input-full_name',
                ]
            ],
            // [
            //     'name'  => 'birth_date',
            //     'type'  => DateTimePicker::className(),
            //     'title' => 'Tug`ilgan kuni',
            //     'defaultValue' => date('d-m-Y h:i')
            // ],
            [
                'name'  => 'birth_date',
                'type'  => \kartik\date\DatePicker::className(),
                'title' => 'Tug`ilgan kuni',
                'value' => function($data) {
                    return $data['day'];
                },
            // 'items' => [
            //     '0' => 'Saturday',
            //     '1' => 'Monday'
            // ],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd.mm.yyyy',
                        'todayHighlight' => true
                    ]
                ]
            ],

            [
                'name'  => 'gender_id',
                'type'  => 'dropDownList',
                'title' => 'Jinsi',
                // 'defaultValue' => 'Erkak',
                'items' => [$gender]
            ]

        ]
    ])->label(false);
    ?>