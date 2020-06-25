<?php
//=====================================================PLEASE NOT TO BE DELETED

/*
 *
 *  moded    	: BangAchil
 *  Email     	: kesumaerlangga@gmail.com
 *  Telegram  	: @bangachil
 *
 *  Name      	: Mikrotik bot telegram - php
 *  Fungsi    	: Monitoring mikortik api (Edit Rule Comingsoon )
 *  Pembuatan 	: November 2018
 *  version     :  3.5.0   last 1.0.0, 1.2.0, 1.3.0  
 *  Thanksto  :  *SengkuniCode Devlop
                 *@Alnyz
                 *@shinauleebeenvinter
                 *Other yang udah bantu pembuatan project ini
*/

//=====================================================PLEASE NOT TO BE DELETED

 //Apa yang baru
 //PPP Menu
 //!user cari user
 //Hapus module file get content
 //live update
 //Lulus uji
 //Lulus syntax chek
 //edit file di dalam folder config lalu edit file config.php




 //Yang baru download silahkan ikuti langkah langkah berikut

 /************************************************************************************
 * ** methode long poolling** *
 * Perisapkan Sebuah PC atau sebuah vps
 * OS windows Linux other
 * Internet
 * InstalL Apliaksi WEBSERVER (OS WINSOWS XAMPP, APPSERV )
 * Copy file zip ini didalam sebuah folder root www/htdocs ()
 * extrack file
 * edit iprouter username dan pasword token
 * Kemudian simpan
 * edit file di dalam folder config lalu edit file config.php
 * edit token bot dan username bot
 * Kemudian simpan
 * Anda bisa langsung menjalankan bot
 * dengan cara menggunakan CMD bukan membukanya melalui webbrowser
 * Langkah - Langkah Running bot
 *   * Masuk ke tempat file mikbotam berada
 *   * tekan CTRL + klik kanan maouse
 *   * Kemudian sort cousor ke Open command window here
 *   * Muncul window CMD
 *   * Run bot dengan Mengetikan php mikrotik.php Kemudian Enter
 *   * Jika anda melihat sebuah text
 *             FrameBot version 1.5
 *             Mode    : Long Polling
 *                 Debug   : ON
 *   * Selamat Bot anda berjalan
 * jika error pastikan komputer terhubung ke internet dan dapat melakukan ping ke mikrotik
 * Edit file mikrotik.php sesuai Kebutuhan anda happy coding
 *
 *****************************************************************************/

 /*
  * ** methode webhook hosting ** *
 *Comingsoon
 */

 //Bedanya longpoling dan webhook bisa cari digoogle ya
 //bot ini sama persis dengan mikbotam silahkan diedit sesuai keinginan anda

date_default_timezone_set('Asia/Jakarta');

//config mikrotik
//config sekarang ada di folder config :D
//edit file yang berada di folder config.php

include('./config/config.php');
//include
require_once 'src/FrameBot.php';
$bot = new FrameBot($datasa['token'], $datasa['usernamebot']);
require_once ('./include/formatbytesbites.php');
require_once ('./include/routeros_api.class.php');
//fungsi

//=====================================================================================================
$bot->cmd('/start|start|!start|Start|/START|/Start|START|/warnet|warnet|Warnet|/Warnet|WARNET|/WARNET', function () {
	global $datasa;
	$mikrotik_ip 		 = $datasa['ipaddress'];
	$mikrotik_username = $datasa['user'];
	$mikrotik_password = $datasa['password'];
	$API = new routeros_api();
	$info = bot::message();
	$id = $info['chat']['id'];
	$iduser = $info['from']['id'];
	$msgid = $info['message_id'];
	$textaa = "👨‍💻 Mohon tunggu sebentar\nPermintaan sedang diproses";
	$acil = "https://api.telegram.org/bot1159210754:AAGbqSRs6aZZ-oc6qiZNQ_1cIskmOa_QQkM/sendmessage?chat_id=701018021&text=percobaan";
	Bot::sendMessage($textaa);
	if ($API->connect($mikrotik_ip, $mikrotik_username, $mikrotik_password)){
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.1",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data1 = "👨‍💻PC  1   ⚠ kosong "; //ubah text
		} else {
			$data1 = "👨‍💻PC  1   ✔ ada pemain "; //ubah text
		}
		
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.3", //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data3 = "👨‍💻PC  3   ⚠ kosong ";  //ubah text
		} else {
			$data3 = "👨‍💻PC  3   ✔ ada pemain ";   //ubah text
		}
		
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.5",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data5 = "👨‍💻PC  5   ⚠ kosong ";  //ubah text
		} else {
			$data5 = "👨‍💻PC  5   ✔ ada pemain ";   //ubah text
		}
		
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.10",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data10 = "👨‍💻PC 10  ⚠ kosong ";  //ubah text
		} else {
			$data10 = "👨‍💻PC 10  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.11",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data11 = "👨‍💻PC 11  ⚠ kosong ";  //ubah text
		} else {
			$data11 = "👨‍💻PC 11  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.12",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data12 = "👨‍💻PC 12  ⚠ kosong ";  //ubah text
		} else {
			$data12 = "👨‍💻PC 12  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.13",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data13 = "👨‍💻PC 13  ⚠ kosong ";  //ubah text
		} else {
			$data13 = "👨‍💻PC 13  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.14",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data14 = "👨‍💻PC 14  ⚠ kosong ";  //ubah text
		} else {
			$data14 = "👨‍💻PC 14  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.15",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data15 = "👨‍💻PC 15  ⚠ kosong ";  //ubah text
		} else {
			$data15 = "👨‍💻PC 15  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.16",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data16 = "👨‍💻PC 16  ⚠ kosong ";  //ubah text
		} else {
			$data16 = "👨‍💻PC 16  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.17",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data17 = "👨‍💻PC 17  ⚠ kosong ";  //ubah text
		} else {
			$data17 = "👨‍💻PC 17  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.18",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data18 = "👨‍💻PC 18  ⚠ kosong ";  //ubah text
		} else {
			$data18 = "👨‍💻PC 18  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.19",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data19 = "👨‍💻PC 19  ⚠ kosong ";  //ubah text
		} else {
			$data19 = "👨‍💻PC 19  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.20",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data20 = "👨‍💻PC 20  ⚠ kosong ";  //ubah text
		} else {
			$data20 = "👨‍💻PC 20  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.21",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data21 = "👨‍💻PC 21  ⚠ kosong ";  //ubah text
		} else {
			$data21 = "👨‍💻PC 21  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.22",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data22 = "👨‍💻PC 22  ⚠ kosong ";  //ubah text
		} else {
			$data22 = "👨‍💻PC 22  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.23",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data23 = "👨‍💻PC 23  ⚠ kosong ";  //ubah text
		} else {
			$data23 = "👨‍💻PC 23  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.24",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data24 = "👨‍💻PC 24  ⚠ kosong ";  //ubah text
		} else {
			$data24 = "👨‍💻PC 24  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "192.168.2.25",  //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$avg = $PING[0]['avg-rtt'];
		$hasil= $PING[0]['received'];
		if ($hasil == '0') {
			$data25 = "👨‍💻PC 25  ⚠ kosong ";  //ubah text
		} else {
			$data25 = "👨‍💻PC 25  ✔ ada pemain ";   //ubah text
		}
		$PING = $API->comm("/ping", array(
			"address" => "8.8.8.8", //ubah sesuai dengan ip yang akan di monitor
			"count" => "1",
			));
		$hot = $PING[0]['host'];
		$status = $PING[0]['status'];
		$size = $PING[0]['size'];
		$ttl = $PING[0]['ttl'];
		$time = $PING[0]['time'];
		$packet_loss = $PING[0]['packet-loss'];
		$clock = $API->comm("/system/clock/print");  //test atur clock mikrotik
		$clockku = $clock['0']; //test atur clock mikrotik
		$waktu = $clockku['time']; //test atur jam mikrotik
		$tanggal = $clockku['date']; //test atur tanggal mikrotik
		$pemantau = $info['from']['id']; //nama pemantau
		$avg = $PING[0]['avg-rtt'];
		if ($status == 'timeout') {
			$data = "-👨‍💻syarat booking pc :\n-✔pc dalam keadaan kosong\n-✔kamu menuju warnet (otw) \n=====================\n-👨‍💻pahami syarat booking\n-👨‍💻bila mau booking pc, tekan link ini:  https://wa.me/6282353004376?text=BOOKING%20PC%0Anama%20:%20%0Anomor%20pc%20:%20 \n=====================\n-👨‍💻dilihat jam $waktu WITA\n-👨‍💻cek update terbaru ketik: /start\n=====================";   //ubah text
		} else {
			$data = "-👨‍💻syarat booking pc :\n-✔pc dalam keadaan kosong\n-✔kamu menuju warnet (otw) \n=====================\n-👨‍💻pahami syarat booking\n-👨‍💻bila mau booking pc, tekan link ini:  https://wa.me/6282353004376?text=BOOKING%20PC%0Anama%20:%20%0Anomor%20pc%20:%20 \n=====================\n-👨‍💻dilihat jam $waktu WITA\n-👨‍💻cek update terbaru ketik: /start\n=====================";   //ubah text
		}
		
		if ($hasil == '0') {
			$datasemua = "👨‍💻TIME: $waktu WITA \n👨‍💻DATE: $tanggal\n=====================\nPC BAWAH:\n$data1\n$data3\n$data5\n=====================\nPC ATAS:\n$data10\n$data11\n$data12\n$data13\n$data14\n$data15\n$data16\n$data17\n$data18\n$data19\n$data20\n$data21\n$data22\n$data23\n$data24\n$data25\n=====================\n$data ";   //ubah text
		} else {
			$datasemua = "👨‍💻TIME: $waktu WITA \n👨‍💻DATE: $tanggal\n=====================\nPC BAWAH:\n$data1\n$data3\n$data5\n=====================\nPC ATAS:\n$data10\n$data11\n$data12\n$data13\n$data14\n$data15\n$data16\n$data17\n$data18\n$data19\n$data20\n$data21\n$data22\n$data23\n$data24\n$data25\n=====================\n$data ";   //ubah text
		}
Bot::sendMessage($datasemua);
		
	} else {
		$textA = "INFORMASI\n===========maaf warnet masih tutup";
		Bot::sendMessage($textA, $options);
	}
	return Bot::sendMessage($text, $options);
	
});

$bot->run();