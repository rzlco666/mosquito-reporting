<?php

namespace frontend\modules\warga\controllers;

use common\components\SessionFlash;
use common\models\Pelaporan;
use common\models\Profile;
use frontend\models\search\PelaporanSearch;
use Yii;
use yii\bootstrap5\Html;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * PelaporanController implements the CRUD actions for Pelaporan model.
 */
class PelaporanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pelaporan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Pelaporan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $id = Yii::$app->encrypter->decrypt($id);
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => 'Pelaporan - ' . $model->profile->nama,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal']) .
                    Html::a('Edit', ['update', 'id' => Yii::$app->encrypter->encrypt($id)], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Displays a single foto Pelaporan model.
     * @param integer $id
     * @return mixed
     */
    public function actionFoto($id)
    {
        $id = Yii::$app->encrypter->decrypt($id);
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => 'Foto Pelaporan - ' . $model->profile->nama,
                'content' => $this->renderAjax('foto', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal'])
            ];
        } else {
            return $this->render('foto', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Finds the Pelaporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pelaporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pelaporan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Pelaporan model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Pelaporan();
        $getID = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $model->profile_id = $getID->id;
        $model->status = 0;
        $model->created = date('Y-m-d H:i:s');
        $model->createdBy = Yii::$app->user->id;
        $model->modified = date('Y-m-d H:i:s');
        $model->modifiedBy = Yii::$app->user->id;
        $old_image = $model->foto;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => 'Buat Pelaporan',
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal']) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])

                ];
            } else if ($model->load($request->post())) {

                $model->foto = UploadedFile::getInstance($model, 'foto');
                if ($model->foto) {
                    if ($model->foto->extension !== 'jpg' && $model->foto->extension !== 'png' && $model->foto->extension !== 'jpeg') {
                        SessionFlash::sessionErrorCustom('File harus berupa gambar dengan format jpg/jpeg/png.');
                        return $this->redirect(['index']);
                    } else {
                        if ($model->foto->size > 1024 * 1024) {
                            SessionFlash::sessionErrorCustom('File harus berukuran kurang dari 1MB.');
                            return $this->redirect(['index']);
                        } else {
                            $file = sha1($model->profile->nama . date('Y-m-d H:i:s')) . '.' . $model->foto->extension;

                            if ($old_image !== 'default.png') {
                                @unlink(Yii::getAlias('@frontend') . '/web/upload/pelaporan/' . $old_image);
                            }

                            if ($model->foto->saveAs(Yii::getAlias('@frontend') . '/web/upload/pelaporan/' . $file)) {
                                $model->foto = $file;
                            }
                        }
                    }
                }

                if (empty($model->foto)) {
                    SessionFlash::sessionErrorCustom('Foto tidak boleh kosong.');
                    return $this->redirect(['index']);
                }

                if (empty($model->alamat) || $model->alamat == null){
                    $model->alamat = $model->profile->alamat;
                }

                if ($model->save()){
                    SessionFlash::sessionSuccessCreate();
                    return $this->redirect(['index']);
                }
            } else {
                return [
                    'title' => 'Buat Pelaporan',
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal']) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                SessionFlash::sessionSuccessCreate();
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing Pelaporan model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $id = Yii::$app->encrypter->decrypt($id);
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->modified = date('Y-m-d H:i:s');
        $model->modifiedBy = Yii::$app->user->id;
        $old_image = $model->foto;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => 'Update Pelaporan - ' . $model->profile->nama,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal']) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            } else if ($model->load($request->post())) {

                $model->foto = UploadedFile::getInstance($model, 'foto');
                if ($model->foto) {
                    if ($model->foto->extension !== 'jpg' && $model->foto->extension !== 'png' && $model->foto->extension !== 'jpeg') {
                        SessionFlash::sessionErrorCustom('File harus berupa gambar dengan format jpg/jpeg/png.');
                        return $this->redirect(['index']);
                    } else {
                        if ($model->foto->size > 1024 * 1024) {
                            SessionFlash::sessionErrorCustom('File harus berukuran kurang dari 1MB.');
                            return $this->redirect(['index']);
                        } else {
                            $file = sha1($model->profile->nama . date('Y-m-d H:i:s')) . '.' . $model->foto->extension;

                            if ($old_image !== 'default.png') {
                                @unlink(Yii::getAlias('@frontend') . '/web/upload/pelaporan/' . $old_image);
                            }

                            if ($model->foto->saveAs(Yii::getAlias('@frontend') . '/web/upload/pelaporan/' . $file)) {
                                $model->foto = $file;
                            }
                        }
                    }
                }

                if (empty($model->foto)) {
                    if (empty($old_image) || $old_image == null){
                        SessionFlash::sessionErrorCustom('Foto tidak boleh kosong.');
                        return $this->redirect(['index']);
                    }else{
                        $model->foto = $old_image;
                    }
                }

                if ($model->save()){
                    SessionFlash::sessionSuccessUpdate();
                    return $this->redirect(['index']);
                }
            } else {
                return [
                    'title' => 'Update Pelaporan - ' . $model->profile->nama,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-secondary float-left', 'data-bs-dismiss' => 'modal']) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit'])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                SessionFlash::sessionSuccessUpdate();
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Pelaporan model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $id = Yii::$app->encrypter->decrypt($id);
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            SessionFlash::sessionSuccessDelete();
            return $this->redirect(['index']);
        } else {
            /*
            *   Process for non-ajax request
            */
            SessionFlash::sessionSuccessDelete();
            return $this->redirect(['index']);
        }


    }
}
