<?php

namespace frontend\modules\profile\controllers;

use common\components\SessionFlash;
use common\models\Profile;
use frontend\models\search\ProfileSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $getID = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();

        return $this->render('index', [
            'model' => $this->findModel($getID->id),
        ]);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $getID = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $model = $this->findModel($getID->id);

        $model->modified = date('Y-m-d H:i:s');
        $model->modifiedBy = Yii::$app->user->id;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            SessionFlash::sessionSuccessUpdate();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpload()
    {
        $getID = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $model = $this->findModel($getID->id);
        $model->modified = date('Y-m-d H:i:s');
        $model->modifiedBy = Yii::$app->user->id;
        $old_image = $model->foto;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->foto) {
                if ($model->foto->extension !== 'jpg' && $model->foto->extension !== 'png' && $model->foto->extension !== 'jpeg') {
                    SessionFlash::sessionErrorCustom('File harus berupa gambar dengan format jpg/jpeg/png.');
                    return $this->redirect(['upload']);
                } else {
                    if ($model->foto->size > 1024 * 1024) {
                        SessionFlash::sessionErrorCustom('File harus berukuran kurang dari 1MB.');
                        return $this->redirect(['upload']);
                    } else {
                        $file = sha1($model->nama . date('Y-m-d H:i:s')) . '.' . $model->foto->extension;

                        if ($old_image !== 'default.png') {
                            @unlink(Yii::getAlias('@frontend') . '/web/upload/profile/' . $old_image);
                            @unlink(Yii::getAlias('@frontend') . '/web/upload/profile/thumb/' . $old_image);
                        }

                        if ($model->foto->saveAs(Yii::getAlias('@frontend') . '/web/upload/profile/' . $file)) {
                            Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/profile/' . $file, 200, 200)
                                ->save(Yii::getAlias('@frontend') . '/web/upload/profile/thumb/' . $file, ['quality' => 100]);
                            $model->foto = $file;
                        }
                    }
                }
            }

            if (empty($model->foto)) {
                $model->foto = $old_image;
            }

            if ($model->save()){
                SessionFlash::sessionSuccessUpdate();
                return $this->redirect(['index']);
            }else{
                SessionFlash::sessionErrorUpdate();
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }

}
