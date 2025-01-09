CREATE TABLE company (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف فريد للشركة (مفتاح أساسي)
    name VARCHAR(255) NOT NULL,         -- اسم الشركة
    country VARCHAR(255) NOT NULL,      -- الدولة
    tell VARCHAR(20),                   -- رقم الهاتف
    fax VARCHAR(20),                    -- رقم الفاكس
    email VARCHAR(255),                 -- البريد الإلكتروني
    wep VARCHAR(255),                   -- الموقع الإلكتروني
    cotegray ENUM('fram', 'lens', 'exa', 'all') NOT NULL,  -- الفئة
    ROEL ENUM('User', 'Agent', 'inseranc') NOT NULL,       -- نوع الشركة
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- تاريخ إنشاء السجل
);


CREATE TABLE brand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    code VARCHAR(50) UNIQUE NOT NULL,
    company_id INT NOT NULL,
    FOREIGN KEY (company_id) REFERENCES company(ID)
);



CREATE TABLE prodect (
    id INT AUTO_INCREMENT PRIMARY KEY, -- معرف فريد تلقائي
    PRODECT VARCHAR(50) NOT NULL, -- نوع المنتج
    brand_name VARCHAR(100) NOT NULL, -- اسم العلامة التجارية
    cotger VARCHAR(50), -- الفئة
    typelens VARCHAR(50), -- نوع العدسة
    `index` VARCHAR(50), -- الفهرس
    type JSON, -- نوع المنتج (يمكن أن يكون قائمة)
    Special VARCHAR(100), -- خاص
    model VARCHAR(100), -- الموديل
    made_year YEAR, -- سنة الصنع
    color VARCHAR(50), -- اللون
    lens VARCHAR(50), -- العدسة
    arm VARCHAR(50), -- الذراع
    bridg VARCHAR(50), -- الجسر
    cost DECIMAL(10, 2), -- التكلفة
    ratel DECIMAL(10, 2), -- السعر
    discon DECIMAL(10, 2), -- الخصم
    tax DECIMAL(10, 2), -- الضريبة
    final DECIMAL(10, 2), -- السعر النهائي
    datein DATE, -- تاريخ الإدخال
    count INT, -- الكمية
    madein VARCHAR(100), -- بلد الصنع
    descrip TEXT, -- الوصف
    UNIQUE KEY unique_product (PRODECT, brand_name, model, made_year) -- معرف فريد لمنع التكرار
);

ALTER TABLE prodect
ADD COLUMN brand_id INT,
ADD CONSTRAINT fk_brand
FOREIGN KEY (brand_id)
REFERENCES brands(id)
ON DELETE SET NULL; -- يمكن تغيير هذا الإجراء حسب الحاجة



-- CREATE TABLE prodect (
--     id INT AUTO_INCREMENT PRIMARY KEY, -- معرف فريد تلقائي
--     PRODECT VARCHAR(50) NOT NULL, -- نوع المنتج
--     brand_name VARCHAR(100) NOT NULL, -- اسم العلامة التجارية
--     cotger VARCHAR(50), -- الفئة
--     typelens VARCHAR(50), -- نوع العدسة
--     `index` VARCHAR(50), -- الفهرس
--     type TEXT, -- نوع المنتج (يمكن أن يكون قائمة)
--     Special VARCHAR(100), -- خاص
--     model VARCHAR(100), -- الموديل
--     made_year YEAR, -- سنة الصنع
--     color VARCHAR(50), -- اللون
--     lens VARCHAR(50), -- العدسة
--     arm VARCHAR(50), -- الذراع
--     bridg VARCHAR(50), -- الجسر
--     cost DECIMAL(10, 2), -- التكلفة
--     ratel DECIMAL(10, 2), -- السعر
--     discon DECIMAL(10, 2), -- الخصم
--     tax DECIMAL(10, 2), -- الضريبة
--     final DECIMAL(10, 2), -- السعر النهائي
--     datein DATE, -- تاريخ الإدخال
--     count INT, -- الكمية
--     madein VARCHAR(100), -- بلد الصنع
--     descrip TEXT, -- الوصف
--     UNIQUE KEY unique_product (PRODECT, brand_name, model, made_year) -- معرف فريد لمنع التكرار
-- );
