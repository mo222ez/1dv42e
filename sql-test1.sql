SELECT p.id, p.name, p.description, p.articlenr, c.name AS category_name, pd.value, pdt.name AS detailtype, pd.detailtype_id, p.created_at, p.updated_at FROM products as p
INNER JOIN categories as c
ON p.category_id = c.id
INNER JOIN productdetails AS pd
ON p.id = pd.product_id
INNER JOIN productdetailtypes as pdt
ON pd.detailtype_id = pdt.id
ORDER BY detailtype_id

SELECT pd.id, pd.value, pd.product_id, pd.detailtype_id, pdt.name FROM productdetails AS pd
INNER JOIN productdetailtypes AS pdt
ON pd.detailtype_id = pdt.id
INNER JOIN products AS p
ON pd.product_id = p.id
ORDER BY p.id


SELECT * FROM `productdetails` ORDER BY product_id ASC

SELECT * FROM products AS p
INNER JOIN productdetails AS pd
ON p.id = pd.product_id
WHERE pd.detailtype_id = 3
AND pd.value <= 10

SELECT * FROM `productdetails` WHERE `detailtype_id` = '3' AND `value` <= 10

SELECT * FROM `products` INNER JOIN `productdetails` ON `products`.`id` = `productdetails`.`product_id` WHERE (`productdetails`.`detailtype_id` = '3')

SELECT * FROM `products` INNER JOIN `productdetails` ON `products`.`id` = `productdetails`.`product_id` WHERE (`productdetails`.`detailtype_id` = '3' AND `productdetails`.`value` <= 10)

SELECT * FROM products

SELECT * FROM productdetailtypes
WHERE product_id = 3