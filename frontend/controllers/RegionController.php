<?php

namespace frontend\controllers;

use common\models\region\RegionCity;
use common\models\region\RegionDistrict;
use common\models\region\RegionSubdistrict;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class RegionController extends Controller
{
    public function actionCity()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $prov_id = $parents[0];
                $out = RegionCity::find()->where(['province_id' => $prov_id])->asArray()->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionDistrict()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $dist_id = $parents[0];
                $out = RegionDistrict::find()->where(['city_id' => $dist_id])->asArray()->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionSubDistrict()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $subd_id = $parents[0];
                $out = RegionSubdistrict::find()->where(['district_id' => $subd_id])->asArray()->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

}
