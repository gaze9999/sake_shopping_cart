<?php
//建立種類列表
function buildTree($pdo, $parentId = 1){
    $sql = "SELECT `rId`, `regionName`
            FROM `sake_regions` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        echo "<dl>";
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
            echo "<dt>";
            echo "<a href='./itemList.php?categoryId={$arr[$i]['rId']}'>{$arr[$i]['regionName']}</a>";
            TreePref($pdo, $arr[$i]['rId']);
            echo "</dt>";
        }
        echo "</dl>";
    }
}

function TreePref($pdo, $prefId = 1){
    $sql = "SELECT p.`pId` ,p.`prefName`,p.`rId` as prId , r.`rId` as rrId 
            FROM `sake_prefectures` as p LEFT JOIN `sake_regions` as r 
            ON p.`rId` = r.`rId` 
            WHERE p.`rId` = ? ";

    $stmt = $pdo->prepare($sql);
    $arrParam = [$prefId];
    $stmt->execute($arrParam);

    if($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {            
            echo "<dd>";
            echo "<a href='./itemList.php?categoryId={$arr[$i]['pId']}'>{$arr[$i]['prefName']}</a>";
            echo "</dd>";
        }
    }
}