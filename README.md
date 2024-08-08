# TEST DISKOMINFO 2024

**Nama:** Pranto Suwarno  
**Posisi:** Backend Developer

## SOAL A. Database

### 1. Query untuk Membuat Tabel `users`

CREATE DATABASE sekolahku;
USE sekolahku;

```sql
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


2. query create courses table


CREATE TABLE courses (
    id INT(11) NOT NULL AUTO_INCREMENT,
    course VARCHAR(50) NOT NULL,
    mentor VARCHAR(50) NOT NULL,
    title VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);


INSERT INTO courses (course, mentor, title) VALUES
('C++', 'ari', 'Dr.'),
('C#', 'ari', 'Dr.'),
('C#', 'ari', 'Dr.'),
('CSS', 'cania', 'S.Kom'),
('HTML', 'cania', 'S.Kom'),
('javascript', 'cania', 'S.kom'),
('python', 'bary', 'S.T.'),
('micropyhon', 'bary', 'S.T.'),
('java', 'darren', 'M.T.'),
('ruby', 'darren', 'M.T.');



3. query create table useCourse relation with table users and courses

CREATE TABLE userCourse (
    user_id INT(11) NOT NULL,
    course_id INT(11) NOT NULL,
    PRIMARY KEY (user_id, course_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO userCourse (user_id, course_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 1),
(4, 2),
(4, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 7),
(6, 8),
(6,9);


	4. query
SELECT 
    u.username AS peserta_didik,
    c.course AS mata_kuliah,
    c.mentor AS nama_mentor,
    c.title AS gelar_mentor
FROM 
    userCourse uc
JOIN 
    users u ON uc.user_id = u.id
JOIN 
    courses c ON uc.course_id = c.id;


	5. query

SELECT 
    u.username AS peserta_didik,
    c.course AS mata_kuliah,
    c.mentor AS nama_mentor,
    c.title AS gelar_mentor
FROM 
    userCourse uc
JOIN 
    users u ON uc.user_id = u.id
JOIN 
    courses c ON uc.course_id = c.id
WHERE 
    c.title IN ('S.Kom', 'S.T.');


6. query
	
SELECT 
    u.username AS peserta_didik,
    c.course AS mata_kuliah,
    c.mentor AS nama_mentor,
    c.title AS gelar_mentor
FROM 
    userCourse uc
JOIN 
    users u ON uc.user_id = u.id
JOIN 
    courses c ON uc.course_id = c.id
WHERE 
    c.title NOT IN ('S.Kom', 'S.T.');


7. query 

SELECT 
    c.course AS mata_kuliah,
    c.mentor AS nama_mentor,
    c.title AS gelar_mentor,
    COUNT(uc.user_id) AS jumlah_peserta_didik
FROM 
    userCourse uc
JOIN 
    courses c ON uc.course_id = c.id
GROUP BY 
    c.course, c.mentor, c.title;


8. query  

SELECT 
    c.mentor AS mentor,
    COUNT(uc.user_id) AS jumlah_peserta,
    COUNT(uc.user_id) * 2000000 AS total_fee
FROM 
    userCourse uc
JOIN 
    courses c ON uc.course_id = c.id
GROUP BY 
    c.mentor;
	
