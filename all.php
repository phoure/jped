<?php
session_start();


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function curlResponseHeaderCallback($ch, $headerLine) {
    global $cookies;
    if (preg_match('/^Set-Cookie:\s*([^;]*)/mi', $headerLine, $cookie) == 1)
        $cookies[] = $cookie;
    return strlen($headerLine); // Needed by curl
}


function para_url($url){
  $parts = parse_url(htmlspecialchars_decode($url));
  parse_str($parts['query'], $query);
 return $query;
}



$login_username = '0990288983';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ufa24h.c-c-s.co/customers?type=all&ufabet_upline_id=all&view=all&username=&name=&account_number=&phone='.$login_username.'&system_bank_account_id=all&created_at=&first_deposit_request_success_at=',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => array('_token' => 'shkhQX2RLiuEEe9p3eaHRbOIPHpqucrTw6EMC6kw','username' => '24hsean','password' => 'vcxz4321'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: __cfduid=daa285f55b6756aa047ef13d13d91148b1616334109; laravel_session=eyJpdiI6IlNUU2lsZUR6SWZXWUtuak1wOUszd2c9PSIsInZhbHVlIjoiQVg0WlI5YjNVQkZjbzJ2RXczTGEyN3hpSTJBNVZldDFLcmVlMVhHMDhVWGZuTWVsaVwvRDhJblVSWkpYTmhQZGJ1YVJnbzJFVlhJV1dPbCs4NE5rdGlRWUluTGhqYk1UTjd4ejVxWWkrUmYwUzA0ZGF4dEJMS1ZuWWYwZm1xajNQIiwibWFjIjoiMTIyZTJhODA4NzJkMjFlODA3MDMzYzVjMmYzMjZiOGI5NTg0ZGM0NjAyMzgyZTQ1YWQyYzJjNzFiM2Q5N2NkZSJ9'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$founded = get_string_between(htmlspecialchars($response),'จากทั้งหมด ', ' รายการ');
$username = get_string_between(urlencode(($response)),'transactions%3Fusername%3D', '%26month%3D03%26');

$curl = curl_init();


$username = $username;
$password = 'abcd12345';


if(strlen((string)$login_username)<10){
  echo 'd';
}
else if($founded != '1'){
  echo 'd';
}
else{

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://ufaapp.net/ufabet/home/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('__EVENTARGUMENT' => '','__EVENTTARGET' => '','__VIEWSTATE' => '','__EVENTVALIDATION' => '','__VIEWSTATEGENERATOR' => '','username' => $username,'password' => $password),
      CURLOPT_HTTPHEADER => array(),
    ));

    $response = curl_exec($curl);

    curl_close($curl);



    $view = htmlspecialchars(htmlspecialchars($response));
    $__VIEWSTATE = get_string_between(htmlspecialchars($view), '__VIEWSTATE&amp;amp;quot; type=&amp;amp;quot;hidden&amp;amp;quot; value=&amp;amp;quot;', '&amp;');
    $__VIEWSTATEGENERATOR = 'BE6BC141';
    $__EVENTVALIDATION = get_string_between(htmlspecialchars($response), '__EVENTVALIDATION&quot; type=&quot;hidden&quot; value=&quot;', '&quot;');


    $cookiee = 'ASP.NET_SessionId=ep5eabpbutsgvjgvnaus02wg;';


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://betufa.com/Default8Smart.aspx?lang=EN-GB',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('txtUserName' => $username,'password' => $password,'__EVENTARGUMENT' => '','__EVENTTARGET' => 'btnSignin','__VIEWSTATE' => $__VIEWSTATE,'__EVENTVALIDATION' => $__EVENTVALIDATION),
      CURLOPT_HTTPHEADER => array('Cookie: '.$cookiee),
    ));

    curl_setopt($curl, CURLOPT_HEADERFUNCTION, "curlResponseHeaderCallback");
    //echo htmlspecialchars($response);

    $response = curl_exec($curl);
    //debug($cookies);
    $pp = $cookies[0][1].'; '.$cookies[1][1].'; '.$cookies[2][1].'; '.$cookies[3][1].'; '.$cookies[4][1].'; '.
    curl_close($curl);
    $id = get_string_between(htmlspecialchars($response), 'reement.aspx?r=', '\',\'_top\');');


//echo $pp;


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://betufa.com/Agreement.aspx?r='.$id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array('Cookie: '.$pp),
    ));

    $response = curl_exec($curl);

    curl_close($curl);




    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://betufa.com/Agreement8.aspx',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('__VIEWSTATE' => $__VIEWSTATE,'__VIEWSTATEGENERATOR' => $__VIEWSTATEGENERATOR,'__EVENTVALIDATION' => $__EVENTVALIDATION),
      CURLOPT_HTTPHEADER => array('Cookie: '.$pp),
    ));

    $response = curl_exec($curl);

    curl_close($curl);


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://betufa.com/Agreement8.aspx',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('__VIEWSTATE' => $__VIEWSTATE,'__VIEWSTATEGENERATOR' => $__VIEWSTATEGENERATOR,'__EVENTVALIDATION' => $__EVENTVALIDATION,'__EVENTARGUMENT' => '','__EVENTTARGET' => 'btnAgree'),
       CURLOPT_HTTPHEADER => array('Cookie: '.$pp),
    ));

    $response = curl_exec($curl);

    curl_close($curl);




    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://www.betufa.com/Header8.aspx ',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
       CURLOPT_HTTPHEADER => array('Cookie: '.$pp),
    ));

    $response = curl_exec($curl);
echo $response;
 $url_ufagame = 'https://igtx888.isme99.com/txSlotGame'.get_string_between(htmlspecialchars(($response)),'txSlotGame', '\', \'FT_GM');

  //echo 'https://igtx888.isme99.com/tx4.aspx?game=35&home=5&sid='.para_url($url_ufagame)['sid'].'&accid='.para_url($url_ufagame)['accid'].'&lang=th-TH&ct=16';

//echo 'https://igtx888.isme99.com/txgame.aspx?game=35&home=5&sid='.para_url($url_ufagame)['sid'].'&accid='.para_url($url_ufagame)['accid'].'&lang=th-TH&ct=16';

  //echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=all2.php?game=35&home=5&sid='.para_url($url_ufagame)['sid'].'&accid='.para_url($url_ufagame)['accid'].'&lang=th-TH&ct=16">';

}