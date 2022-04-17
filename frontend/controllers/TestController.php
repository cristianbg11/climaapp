<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class TestController extends Controller {
    public $mod='config';
    public $currMod='visualizacion';
    function callRest($url, $token, $ispost = false, $payload = null) {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'Accept: application/json',
            'Accept: application/pdf',
            'Authorization: Bearer ' . $token));

        $output = curl_exec($ch);
        if ($output == FALSE) {

            echo curl_error($ch);
            die();
        }
        curl_close($ch);
        return $output;
    }

    function createApiUser() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_URL, 'https://climared.com/api/v1/user/create');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $payload = [
            'name' => 'Cristian Bueno',
            'email' => 'crisflowbg11@gmail.com',
            'password' => '12345678',
            'device_name' => 'DESKTOP-A8NHE56'
        ];
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));



        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'Accept: application/json'));

        $output = curl_exec($ch);
        if ($output == FALSE) {

            echo curl_error($ch);
            die();
        }
        curl_close($ch);
        return $output;
    }

    public function actionApi() {
        //createApiUser();
//$ret=createToken();
        $payload = [
            'email' => 'crisflowbg11@gmail.com',
            'password' => '12345678',
            'device_name' => 'DESKTOP-A8NHE56'
        ];
        $cache = Yii::$app->cache;
        $data = $cache->get('allStations');
        if ($data === false) {
            $data = $this->callRest('https://climared.com/api/v1/stations', '16|n3qux5QoKUpY5EdkUo94WL11z2itHIZLFqyN9btu');
            $cache->set('allStations', $data,300);
        }
        //echo $data;die();
        $data = json_decode($data);
        //echo json_encode($data); die();
//      $data[]
//$ret=callRest('https://climared.com/api/v1/tokens/create','6|kl9Sjicb87UP1app9BKx62aqPRcwA10eHHauNmcN',true, json_encode($payload));
         return $this->render('api',['data'=>$data]);
    }

}
