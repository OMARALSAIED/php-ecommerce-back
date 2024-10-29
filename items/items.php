<?php
include "../connect.php";
include "../function.php";

$categoriesid = filterRequest("id");
$userid = filterRequest("userid");

$stmt = $con->prepare("
    SELECT itemsviews1.*, 1 AS favorite 
    FROM itemsviews1
    INNER JOIN favorite 
    ON favorite.favorite_id = itemsviews1.item_ID 
    AND favorite.user_id = :userid
    WHERE categoies_ID = :categoriesid
    
    UNION ALL
    
    SELECT *, 0 AS favorite 
    FROM itemsviews1
    WHERE categoies_ID = :categoriesid 
    AND item_ID NOT IN (
        SELECT itemsviews1.item_ID 
        FROM itemsviews1
        INNER JOIN favorite 
        ON favorite.favorite_id = itemsviews1.item_ID 
        AND favorite.user_id = :userid
    )
"
);

$stmt->bindParam(":categoriesid", $categoriesid, PDO::PARAM_INT);
$stmt->bindParam(":userid", $userid, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
