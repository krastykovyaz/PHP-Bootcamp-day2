#!/usr/bin/env php
<?php
$fd = fopen("/var/run/utmpx", "rb");
date_default_timezone_set("Europe/Moscow");
while (!feof($fd))
{
	if ($data = fread($fd, 628))
	{
		$d_arr = unpack("a256user/a4id/a32line/ipid/itype/itime", $data);
		if ($d_arr['type'] == 7)
		{
			$str = trim($d_arr['user'])."\t ".trim($d_arr['line'])." ".date("M ", $d_arr['time']);
			$t = date("d", $d_arr['time']);
			if ($t[0] == '0') $t[0] = " ";
				echo $str.$t.date(" H:i", $d_arr['time'])." \n";
		}
	}
}
?>