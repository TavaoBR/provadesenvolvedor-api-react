<?php 
error_reporting(0);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri)
{
  case '/api':

    date_default_timezone_set('America/Sao_Paulo');

    $data = [
    [    
        "punchDateTime" => "2023-01-18 06:00:00",
        "punchType" => 1, 
        "employeeName" => "Josevaldo Peixoto"
        
    ],
    [
        "punchDateTime" => "2023-01-18 18:00:00",
        "punchType" => 2, 
        "employeeName" => "Josevaldo Peixoto"
    ],
    [
        "punchDateTime" => "2023-01-20 08:00:00",
        "punchType" => 1, 
        "employeeName" => "Josevaldo Peixoto"
    ],
    [
        "punchDateTime" => "2023-01-20 12:00:00",
        "punchType" => 2, 
        "employeeName" => "Josevaldo Peixoto"
    ],
    [
        "punchDateTime" => "2023-01-20 14:00:00",
        "punchType" => 1, 
        "employeeName" => "Josevaldo Peixoto"
    ],
    [
        "punchDateTime" => "2023-01-20 18:00:00",
        "punchType" => 2, 
        "employeeName" => "Josevaldo Peixoto"
    ]
];

    function groupByDate($data) {
$result = [];
foreach ($data as $item) {
$employeeName = $item["employeeName"];
$punchDate = date("d/m/Y", strtotime($item["punchDateTime"]));
$punchDateTime = $item["punchDateTime"];
$punchType = $item["punchType"];
$found = false;
foreach ($result as &$resultItem) {
if ($resultItem["employeeName"] === $employeeName && $resultItem["punchDate"] === $punchDate) {
$found = true;
$resultItem["entries"][] = ["punchDateTime" => $punchDateTime, "punchType" => $punchType];
break;
};
};
if (!$found) {
$result[] = [
"employeeName" => $employeeName,
"punchDate" =>  $punchDate,
"entries" => [["punchDateTime" => $punchDateTime, "punchType" => $punchType]]
];
};
};

foreach ($result as &$resultItem) {
$entries = $resultItem["entries"];
$totalHours = 0;
for ($i = 0; $i < count($entries) - 1; $i += 2) {
$start = strtotime($entries[$i]["punchDateTime"]);
$end = strtotime($entries[$i + 1]["punchDateTime"]);
$totalHours += ($end - $start) / 3600;
};
$resultItem["amountOfHoursWorked"] = $totalHours;
};
return $result;
};

echo json_encode(groupByDate($data));
break;

default:
header("Location: /api");
break;
}


     
    


   




