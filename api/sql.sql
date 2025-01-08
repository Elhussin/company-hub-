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