-- https://regex101.com/

UPDATE `products` SET `sid`='',`author`='',`bookname`='',`category_sid`='',`book_id`='',`publish_date`='',`pages`='',`price`='',`isbn`='',`on_sale`='',`introduction`='' WHERE 1

-- 用了 \[value-\d?\d\] 消除[value-N]
-- 老師的方法：\[value-\d{1,2}}\]

UPDATE `products` SET `sid`='[value-1]',`author`='[value-2]',`bookname`='[value-3]',`category_sid`='[value-4]',`book_id`='[value-5]',`publish_date`='[value-6]',`pages`='[value-7]',`price`='[value-8]',`isbn`='[value-9]',`on_sale`='[value-10]',`introduction`='[value-11]' WHERE 1