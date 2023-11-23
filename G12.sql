CREATE TABLE Institute (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL,
  capacity INT,
  num_branches INT,
  email VARCHAR(255) NOT NULL,
  contact_no VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE Student (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  dob DATE NOT NULL,
  pessat_score INT,
  kcet_score INT,
  entrance_test VARCHAR(255),
  category VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  preference1 VARCHAR(255),
  preference2 VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE Branch (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  institute_id INT NOT NULL,
  credits INT,
  description VARCHAR(255),
  capacity INT,
  PRIMARY KEY (id),
  FOREIGN KEY (institute_id) REFERENCES Institute(id)
);

CREATE TABLE User (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) NOT NULL, -- 'admin' or 'student'
  PRIMARY KEY (id)
);

INSERT INTO User (username, password, role) VALUES
('admin_user', 'admin_password', 'admin');

INSERT INTO User (username, password, role) VALUES
('student_user', 'student_password', 'student');


INSERT INTO Student (name, last_name, dob, pessat_score, kcet_score, entrance_test, category, email, preference1, preference2)
VALUES ('Prabhas', 'reddy', '2003-08-28', 1062, 10010, 'PESSAT', 'general', 'prabhas@gmail.com', 'rr', 'ec');

INSERT INTO Institute (name, location, capacity, num_branches, email, contact_no)
VALUES ('PES University', 'RR', 100, 4, 'pesu@example.com', '+1234567890');

INSERT INTO Institute (name, location, capacity, num_branches, email, contact_no)
VALUES ('PES University', 'EC', 120, 4, 'pesuec@example.com', '+1290456890');

-- Inserting branches into the Branch table
INSERT INTO Branch (name, institute_id, credits, description, capacity) VALUES
('CSE', 1, NULL, 'Computer Science and Engineering', NULL),
('EC', 2, NULL, 'Electronics and Communication', NULL),
('EE', 1, NULL, 'Electrical Engineering', NULL),
('AI & ML', 2, NULL, 'Artificial Intelligence and Machine Learning', NULL);

SELECT Student.id, Student.name, Student.last_name, Student.dob, Student.pessat_score, Student.kcet_score, Student.entrance_test, Student.category, Student.email, Student.preference1, Student.preference2
FROM Student
JOIN Branch ON Student.preference1 = Branch.id
WHERE Branch.institute_id IN (1, 2); 

UPDATE Student
SET name = Prachi, last_name = Anure, dob = 2003-08-28, pessat_score = 1062, kcet_score = 200, entrance_test = KCET, category = general, email = prachi2anure@gmail.com, preference1 = rr, preference2 = ec
WHERE id = 1;

DELETE FROM Student
WHERE id = 1;

SELECT Branch.id, Branch.name, Branch.institute_id, Branch.credits, Branch.description, Branch.capacity
FROM Branch
WHERE Branch.institute_id IN (1, 2);

SELECT Branch.id, Branch.name, Branch.institute_id, Branch.credits, Branch.description, Branch.capacity, Institute.name AS institute_name
FROM Branch
JOIN Institute ON Branch.institute_id = Institute.id
WHERE Branch.institute_id IN (1, 2); 

SELECT Student.name, Institute.name
FROM Student
INNER JOIN Institute ON Student.preference1 = Institute.name;

SELECT Student.name, Institute.name
FROM Student
LEFT JOIN Institute ON Student.preference1 = Institute.name;

SELECT name, pessat_score
FROM Student
WHERE pessat_score > 1000;

SELECT name, location, email, contact_no
FROM Institute;

SELECT category, COUNT(*) as count
FROM Student
GROUP BY category;

SELECT name, email, location_preference
FROM Student
WHERE location_preference = 'EC';



