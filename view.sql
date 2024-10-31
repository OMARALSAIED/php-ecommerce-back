CREATE VIEW itemview1 As 
SELECT items.*,categories.* ,FROM items
INNER JOIN categories on items.items_cat = categories.categories_id






CREATE OR REPLACE VIEW myFavorite AS
SELECT favorite.favorite_id,favorite.user_id ,favorite.item_id
,items.item_ID AS FavitemID,items.item_name_en,
items.item_name_ar,items.item_desc_en,items.item_desc_ar,items.item_image,items.item_count,items.item_activ,items.item_price,items.item_discount,items.CreationDate,items.item_cat

,users.userID FROM favorite
INNER JOIN  users ON users.userID=favorite.user_id
INNER JOIN items ON items.item_ID=favorite.item_id;