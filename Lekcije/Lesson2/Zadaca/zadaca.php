<?php
header('Content-Type: text/plain');
/**
 * a) Parse csv file 08-tasks/postanski-uredi.csv to array as shown below
 * b) Group postal offices by region (second array)
 * c) Create function getRegionName($area) that resolves region name for 
 * specific area
 * d) Sort region, city and areas alphabetically
 */
 /*
$postalOfficesByRegion = [
    'Osječko-baranjska' => [
        [
            'name' => 'Osijek', 
            'zip' => '31000', 
            'area' => [
                'Brijest',
                'Briješće',
                //..
            ]
        ],
        //..
    ],
    //..
];
*/

$row=0;
if (($handle = fopen("postanskiuredi.csv", "r")) !== FALSE) {
    while ((($data = fgetcsv($handle, ",")) !== FALSE)) {
       if(($row++)!=0){
			$postanskiuredi[]= 
			 array
			(
			"id"=> $data[0],
            "brojPu" => $data[1],
            "redBroj" => $data[2],
            "nazivPu" => $data[3],
            "naselje"=> $data[4],
			"zupanija" => $data[5]
			);	
	   }
	}
    }
	/* PROVJERA POD a) */ /*
	foreach($postanskiuredi as $pu){
		foreach($pu as $key => $value){
			echo "'".$key."'=>".$value.", ";
	}
	echo "\n";
	}
	*/

foreach($postanskiuredi as $key => $item)
{
   $postalOfficesByRegion[$item['zupanija']][$item['brojPu']][]=array("name"=>$item['nazivPu'],"zip"=>$item['brojPu'],"area"=>$item['naselje']);
}
ksort($postalOfficesByRegion);
$namebroj=0;
$zipbroj=0;

/*ISPIS POD b) */  /*
foreach($postalOfficesByRegion as $key1=>$item1){
	echo "'".$key1."' => [\n";
	foreach($item1 as $key2=>$item2){
		foreach($item2 as $key3=>$item3){
			foreach($item3 as $key4=>$item4){
				if (($key4=="name")&&($namebroj++)==0)
						echo "\t\t\t[\n\t\t\t'name' => '".$item4."',\n";
				if (($key4=="zip")&&($zipbroj++)==0)
						echo "\t\t\t'zip' => '".$item4."',\n\t\t\t'area' => [\n";
					if($key4=="area")
						echo "\t\t\t\t'".$item4."'\n";
			}	
		}
		$namebroj=0;
		$zipbroj=0;
		echo "\t\t\t\t]\n";
		echo "\t\t\t],\n";
	}
	echo "\t],\n";
}
echo "];"; 
*/

fclose($handle);

function  getRegionName($area,$niz){
	foreach($niz as $key1=>$item1){
		foreach($item1 as $key2=>$item2){
			foreach($item2 as $key3=>$item3){
				foreach($item3 as $key4=>$item4){
					 if (($key4=="area")&&($item4==$area)) echo $key1;
				}
			}
		}
	}
}
/*PROVJERA ZA C) */ /*
	getRegionName('Našice',$postalOfficesByRegion); */
?>
