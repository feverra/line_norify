<?php

class notify {

    protected $key;

    public function __construct($key) {
        $this->key = $key;
    }

    public function sent($text) {
        $post_data = 'message=' . $text;
        $url = 'https://notify-api.line.me/api/notify';
        $chpost = curl_init($url);
        curl_setopt($chpost, CURLOPT_POST, true);
        curl_setopt($chpost, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($chpost, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($chpost, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chpost, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded; charser=UTF-8',
            'Authorization: Bearer ' . $this->key
        ));
        $result = curl_exec($chpost);
        curl_close($chpost);
        return $result;
    }

    public function status() {
        $url = 'https://notify-api.line.me/api/status';
        $chpost = curl_init($url);
        curl_setopt($chpost, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($chpost, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chpost, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded; charser=UTF-8',
            'Authorization: Bearer ' . $this->key
        ));
        $result = curl_exec($chpost);
        curl_close($chpost);
        return $result;
    }

    public function revoke($Confirm) {
        if ($Confirm === 1) {

            $url = 'https://notify-api.line.me/api/revoke';
            $chpost = curl_init($url);
            curl_setopt($chpost, CURLOPT_POST, true);
            curl_setopt($chpost, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($chpost, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chpost, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded; charser=UTF-8',
                'Authorization: Bearer ' . $this->key
            ));
            $result = curl_exec($chpost);
            curl_close($chpost);
            return $result;
        } else {
            return FALSE;
        }
    }    

}
