<?php
error_reporting(0);
function http_request($url){

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);


	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);



	$output = curl_exec($ch);


	curl_close($ch);


	return $output;
}

    $data2 = http_request("https://data.covid19.go.id/public/api/prov.json");
    $data = json_decode($data2, TRUE);



$jumlah = count($data['list_data']);



$nomor = 1;
if($jumlah >  0){

for($i = 0; $i < $jumlah; $i++){
$hasil = $data['list_data'][$i];



?>
<tr>
  <td><?=$nomor++?></td>
  <td><?=$hasil['key']?></td>
  <td><?=number_format($hasil['jumlah_kasus']);?></td>
  <td><?=number_format($hasil['jumlah_sembuh']);?></td>
  <td><?=number_format($hasil['jumlah_meninggal']);?></td>
</tr>

<?php

}}elseif($jumlah <= 0){
echo "Periksa Koneksi Anda Atau Sedang Terjadi Kesalahan";
}

?>
