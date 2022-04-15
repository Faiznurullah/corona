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

   $data = http_request("https://coronavirus-19-api.herokuapp.com/countries");

    $data = json_decode($data, TRUE);



$jumlah = count($data) - 1;

$nomor = 1;


if ($jumlah == 0 or $jumlah == null){

	?>


	<p>Tidak Bisa Di Akses</p>


<?php
}else{
 ?>

	<?php

for($i = 0; $i < $jumlah; $i++){

	$hasil = $data[$i+1];

?>
<tr>
  <td><?=$nomor++?></td>
  <td><?=$hasil['country']?></td>
  <td><?=number_format($hasil['cases']);?></td>
  <td><?=number_format($hasil['recovered']);?></td>
  <td><?=number_format($hasil['deaths']);?></td>
</tr>

<?php

}}

?>
