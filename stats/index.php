<?php
if(!isset($_GET["now"])){
    $now=time();
}else{
    $d=date_parse_from_format('Y-m-d',$_GET["now"]);
    $now=mktime(0,0,0,$d['month'],$d['day'],$d['year']);
}
include_once(dirname(__FILE__).'/../data/db_class.php');


if(date('l',$now) == 'Monday'){
    $monday_ts=$now;
    $monday=date('Y-m-d',$monday_ts);
}else{
    $monday_ts = strtotime('previous monday',$now);
    $monday = date('Y-m-d', $monday_ts);
}


if(date('l',$now) == 'Sunday'){
    $friday_ts=$now;
    $friday=date('Y-m-d',$now);
}else{
    $friday_ts=strtotime('next sunday',$now);
    $friday = date('Y-m-d', $friday_ts);
}

$nextweek=date('Y-m-d',strtotime('next monday',$friday_ts));
$lastweek=date('Y-m-d',strtotime('last monday',$monday_ts));


$db = new DBConnection();
$db->getConnection();

$sql="SELECT type, count(id) as cpt FROM jqcalendar WHERE type in ('bo','red','bb','pvpp') AND start between '$monday' AND '$friday' AND gen=0 GROUP BY type";

$result = $db->query($sql);
$nb=array('bo'=>0,'red'=>0,'bb'=>0,'pvpp'=>0);
while($row = mysql_fetch_object($result)){
    $nb[$row->type]=$row->cpt;
}

$nbBo=$nb['bo'];
$nbRed=$nb['red'];
$nbBbv=$nb['bb'];
$nbPvpp=$nb['bb'];
$nbRdv=2*($nbBo+$nbBbv)+$nbRed;
$amount=$nbRdv*14;
$amountPerDay=$amount/5;
$rdvPerDay=$nbRdv/5;
?>
<html>
<body>
<H1>Statisitiques du cabinet</H1>

<H2><a href="?now=<?php echo $lastweek;?>">&lt;</a>Semaine du <?php echo $monday;?> au <?php echo $friday;?><a href="?now=<?php echo $nextweek;?>">&gt;</a></H2>
<table>
<tr>
<td>Nombre de r&eacute;&eacute;ducations</td>
<td><?php echo $nbRed;?></td>
</tr>

<tr>
<td>Nombre de BO</td>
<td><?php echo $nbBo;?></td>
</tr>

<tr>
<td>Nombre de BBV</td>
<td><?php echo $nbBbv;?></td>
</tr>

<tr>
<td>Nombre de RDV</td>
<td><?php echo $nbRdv;?></td>
</tr>

<tr>
<td>Nombre de PVPP</td>
<td><?php echo $nbPvpp;?></td>
</tr>

<tr>
<td>Nombre de RDV moyen par jour</td>
<td><?php echo $rdvPerDay;?></td>
</tr>

<tr>
<td>Revenus moyens</td>
<td><?php echo $amount;?>&#x20AC;</td>
</tr>

<tr>
<td>Revenus moyens par jour</td>
<td><?php echo $amountPerDay;?>&#x20AC;</td>
</tr>

</table>

<?php

$firstDay=date('Y-m-d',strtotime('first day of this month',$now));
$lastDay=date('Y-m-d',strtotime('last day of this month',$now));

$sql="SELECT type, count(id) as cpt FROM jqcalendar WHERE type in ('bo','red','bb','pvpp') AND start between '$firstDay' AND '$lastDay' AND gen=0 GROUP BY type";
$result = $db->query($sql);
$nb=array('bo'=>0,'red'=>0, 'bb' => 0, 'pvpp' => 0);
while($row = mysql_fetch_object($result)){
    $nb[$row->type]=$row->cpt;
}

$nbBoMonth=$nb['bo'];
$nbRedMonth=$nb['red'];
$nbBbvMonth=$nb['bb'];
$nbPvppMonth=$nb['pvpp'];
$nbRdvMonth=2*($nbBoMonth+$nbBbvMonth)+$nbRedMonth;
$amountMonth=$nbRdvMonth*14;
$amountPerDayMonth=$amountMonth/20;
$rdvPerDayMonth=$nbRdvMonth/20;
?>


<H2>Sur le mois de <?php echo date('M', strtotime('first day of this month',$now));?></H2>
<table>
<tr>
<td>Nombre de r&eacute;&eacute;ducations</td>
<td><?php echo $nbRedMonth;?></td>
</tr>

<tr>
<td>Nombre de BO</td>
<td><?php echo $nbBoMonth;?></td>
</tr>

<tr>
<td>Nombre de BBV</td>
<td><?php echo $nbBbvMonth;?></td>
</tr>

<tr>
<td>Nombre de RDV</td>
<td><?php echo $nbRdvMonth;?></td>
</tr>

<tr>
<td>Nombre de PVPP</td>
<td><?php echo $nbPvppMonth;?></td>
</tr>

<tr>
<td>Nombre de RDV moyen par jour</td>
<td><?php echo $rdvPerDayMonth;?></td>
</tr>

<tr>
<td>Revenus moyens</td>
<td><?php echo $amountMonth;?>&#x20AC;</td>
</tr>

<tr>
<td>Revenus moyens par jour</td>
<td><?php echo $amountPerDayMonth;?>&#x20AC;</td>
</tr>

</table>
</body>
</html>
