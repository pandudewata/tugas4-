<?php
	
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('datamhs.json');
    $all = json_decode($all, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"] = array_values($all["records"]);
        file_put_contents("datamhs.json", json_encode($all));
    }
    header("Location: index.php");
}