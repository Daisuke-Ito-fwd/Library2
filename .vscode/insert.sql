-- ***********user_typ insert*********

INSERT INTO user_typ values(
    0,
    "AD",
    NOW(),
    "AD000001"
);

-- *************users insert********************

INSERT INTO users VALUES(
    0,  
    "佐藤",
    "太郎",
    "サトウ",
    "タロウ",
    "M",
    "xxxxx@yyyyy.net",
    2,     
    -- 1111 
    "$2y$10$6pPnTvJTVHOFXyvns0izg.061Gyqgmu9dTE7AvPPHxD/kTfS5IXhu",
    true,
    NOW(),
    NULL,
    null
);

-- *********books_genre insert******************

INSERT INTO books_genre VALUES
(0,"文学", NOW(), NOW()),
(0,"教育", NOW(), NOW()),
(0,"語学", NOW(), NOW()),
(0,"科学・サイエンス", NOW(), NOW()),
(0,"趣味・娯楽", NOW(), NOW()),
(0,"雑誌", NOW(), NOW()),
(0,"児童文学", NOW(), NOW()),
(0,"絵本", NOW(), NOW()),
(0,"歴史", NOW(), NOW()),
(0,"その他", NOW(), NOW());


-- **********books_publ insert**********************

INSERT INTO books_publ 
VALUES
(0,"不明", NOW(), NOW()),
(0,"日本出版", NOW(), NOW()),
(0,"学研", NOW(), NOW()),
(0,"AmazonBooks", NOW(), NOW()),
(0,"SBクリエイティブ", NOW(), NOW()),
(0,"impress", NOW(), NOW()),
(0,"講談社", NOW(), NOW()),
(0,"集英社", NOW(), NOW()),
(0,"春秋出版", NOW(), NOW()),
(0,"東京教育出版", NOW(), NOW());

-- **********library insert***********************

INSERT INTO library VALUES(
    "日本語の基礎",
    "佐藤太郎",
    "2010-11-11",
    1,
    0123456789013,
    5,
    0,
    now(),
    NULL,
    NULL,
    true
);


-- *********************primary, foreign動作ok$2y$10$6pPnTvJTVHOFXyvns0izg.061Gyqgmu9dTE7AvPPHxD/kTfS5IXhu


INSERT INTO users
 VALUES(
    0,  
    "佐藤",
    "太郎",
    "サトウ",
    "タロウ",
    "M",
    "xxxxx@yyyyy.net",
    1,     
    -- 1111 
    "$2y$10$6pPnTvJTVHOFXyvns0izg.061Gyqgmu9dTE7AvPPHxD/kTfS5IXhu",
    true,
    NOW(),
    NULL,
    null
);



insert into library 
                    (books_id, title, auth, publisher, s_date, isbn, 
                     genre, r_date, up_user, disp_frag)
                values(0,'test','test',3, now(),1234567890123,
                       3,now(),00001, 1);