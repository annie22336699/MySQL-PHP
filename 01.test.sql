INSERT INTO address_book
(`sid`, `name`, `email`, `mobile`, `address`, `birthday`)
VALUES ( NULL,'lalaland', '123525@gmail.com', '0901-255597', '新北市', '1920-08-31');


-- 


UPDATE `address_book` SET `email` = '123@gmail6.com' WHERE `address_book`.`sid` = 4;



-- 資料別名

SELECT p.*, c.`name`
FROM `products` AS p
 JOIN `categories` AS c
 ON p.`category_sid` = c.`sid`;


-- 資料集欄位別名
SELECT p.*, c.`name` AS `可變的欄位名稱`
FROM `products` AS p
JOIN `categories` AS c
ON p.`category_sid`=c.`sid`;


-- 找空值
-- 因為把第一本書的category_sid改成列表內沒有的編碼，所以對不到就出現空值了
SELECT p.*, c.`name` cate_name   
FROM `products` p
 LEFT JOIN `categories` c
 ON p.`category_sid` = c.`sid`
WHERE c.`sid` IS NULL;


-- 萬能搜尋(?)

SELECT * FROM `products` WHERE `author`= '吳睿紘';
--相當於
SELECT * FROM `products` WHERE `author` LIKE '吳睿紘';

--萬能搜尋(?)
SELECT * FROM `products` WHERE `author` LIKE '吳%';

--簡單加減
--第二筆價錢-23
UPDATE `products` SET `price`=`price`-23 WHERE `sid`=2;
--所有金額-23
UPDATE `products` SET `price`=`price`-23;

--相同數值的筆數會合併顯示
SELECT DISTINCT `category_sid` FROM `products`;

--群組
--都是算筆數
SELECT COUNT(*) FROM `products`;
SELECT COUNT(sid) FROM `products`;
SELECT COUNT(1) FROM `products`;
--數category_sid的類別，第一個開始抓，一樣的只會顯示1，然後再算
SELECT `category_sid`, COUNT(1) num FROM `products` GROUP BY 
`category_sid`;

-- 以分類那張表 找上一層那個分類的名稱
SELECT c1.*,c2.`name` '分類名稱'
FROM `categories` c1
JOIN `categories` c2
    ON c2.`sid` = c1.`parent_sid`;
-- 不用代稱的話會跳錯誤因為以為都同樣的東西

-- 子查詢
-- ↓在order_details表內找訂單編號10的值並秀出product_sid
SELECT `product_sid` FROM `order_details` WHERE `order_sid`=10;
-- ↓以上值抓到products內
SELECT * FROM `products` WHERE `sid` IN (
SELECT `product_sid` FROM `order_details` WHERE `order_sid`=10
);
-- 另種寫法
SELECT * FROM `products`
 JOIN 
 (SELECT product_sid, price od_price 
 FROM `order_details` WHERE `order_sid`=10) od
 ON `products`.sid = od.product_sid;