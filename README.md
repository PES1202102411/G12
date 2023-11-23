				DBMS MINIPROJECT

Members : PES1UG21CS414 	PRACHI SHIVANAND ANURE
	       PES1UG21CS401	PALLE PRABHAS REDDY

PROJECT TITLE : COLLEGE COUNSELLING MANAGEMENT SYSTEM(PESSAT)

SRS :   
1.  Introduction 
The College Counselling Management System (CCDBMS) is a software system that will be used to manage the college counselling process for students. The system will allow students to create profiles, search for colleges and courses, and track their progress through the application process. Counsellors will be able to use the system to manage student cases, track student progress, and generate reports. 
2.  General Description 
The CCDBMS is a web-based application with a front end that will be accessible to students, counsellors, and administrators. The front end will be developed using a modern web framework, such as React or Angular. The back end will be developed using a modern programming language, such as Python or Java, and a relational database, such as MySQL. 
3.  Specific Requirements 
The CCDBMS must meet the following specific requirements: 
•        Student profile: Students must be able to create profiles that include their personal information, academic history, and standardized test scores. 
•        College and course search: Students must be able to search for colleges and courses based on various criteria, such as location, major, and cost. 
•        Application tracking: Students must be able to track their progress through the application process, including which colleges they have applied to, their application status, and deadlines. 
•        Case management: Counsellors must be able to manage student cases, including tracking student progress, documenting interactions, and generating reports. 
 

4.  Use Cases 
The following use cases describe how the CCDBMS will be used by students, counsellors, and administrators: 
•        Student creates a profile: A student creates a profile in the CCDBMS by providing their personal information, academic history, and standardized test scores. 
•        Student searches for colleges and courses: A student searches for colleges and courses in the CCDBMS based on various criteria, such as location, major. 
•        Student submits a college application: A student submits a college application through the CCDBMS by providing their contact information, academic transcripts. 
•        Counsellor tracks student progress: A counsellor tracks a student's progress through the application process by viewing the student's profile, application status, and deadlines. 
•        Administrator generates a report: An administrator generates a report on student trends and needs by specifying the desired criteria. 

5.  Non-Functional Requirements 
The CCDBMS must meet the following non-functional requirements: 
•        Performance: The CCDBMS must be able to handle a large number of concurrent users and transactions. 
•        Reliability: The CCDBMS must be reliable and available 24/7. 
•        Security: The CCDBMS must be secure and protect student data from unauthorized access. 
•        Maintainability: The CCDBMS must be easy to maintain and update. 
•        Portability: The CCDBMS must be portable and deployable on different platforms. 
6.  Inverse Requirements 
The CCDBMS must not: 
•        Disclose sensitive student data to unauthorized users. 
•        Allow students to apply to colleges that they are not qualified for. 
•        Allow counsellors to modify student data without authorization. 
•        Generate reports that are inaccurate or incomplete. 
7.  Design Constraints 
The CCDBMS must be designed to meet the following constraints: 
•        The system must be scalable to handle a large number of users and transactions. 
•        The system must be secure and protect student data from unauthorized access. 
•        The system must be easy to use for students, counsellors, and administrators.
 
8.  Logical Database Requirements 
The CCDBMS will use a relational database to store data. The database will consist of the following tables: 
•        Student: This table will store student information, such as name, contact information, academic history, and standardized test scores. 
•        College: This table will store college information, such as name, location, website, and tuition. 
•        Course: This table will store course information, such as name, description, prerequisites, and instructors. 
•        Application: This table will store application information, such as the student, college, and course applied to. 
In addition to the above tables, the CCDBMS may also include additional tables to store data about other entities, such as counsellors, administrators, and financial aid information. 
9.  Other Requirements : The CCDBMS must be deployed on a web server that is accessible to students and administrators. The system must also be backed up regularly to protect data loss 




Entity Relationship Diagram


Relational Schema : 


Trigger definition (any one): 
1.This trigger ensures that before a new row is inserted into the Branch table, the corresponding institute_id must exist in the Institute table; otherwise, it raises an error.
DELIMITER //
CREATE TRIGGER before_insert_branch
BEFORE INSERT ON Branch
FOR EACH ROW
BEGIN
    DECLARE institute_count INT;
    
    -- Check if the institute_id exists in the Institute table
    SELECT COUNT(*) INTO institute_count FROM Institute WHERE id = NEW.institute_id;
    
    -- If the institute_id does not exist, raise an error
    IF institute_count = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No institute found with the specified ID.';
    END IF;
END;
//
DELIMITER ;



-- Inserting a branch with a valid institute_id
INSERT INTO Branch (name, institute_id, credits, description, capacity) VALUES
('New Branch', 1, 100, 'New Branch Description', 50);

-- Inserting a branch with an invalid institute_id that does not exist in the Institute table
INSERT INTO Branch (name, institute_id, credits, description, capacity) VALUES
('Invalid Branch', 999, 120, 'Invalid Branch Description', 60);


2.This trigger ensures that before a new row is inserted into the Student table, the email format is validated, and it must end with '@gmail.com'; otherwise, it raises an error.
DELIMITER //
CREATE TRIGGER validate_email_format
BEFORE INSERT ON Student
FOR EACH ROW
BEGIN
  IF NEW.email NOT LIKE '%@gmail.com' THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Invalid email format. Email should end with @gmail.com';
  END IF;
END;
//
DELIMITER ;


-- This SQL statement attempts to insert a student with an invalid email format
INSERT INTO Student (name, last_name, dob, pessat_score, kcet_score, entrance_test, category, email, preference1, preference2)
VALUES ('John', 'Doe', '2000-01-01', 1200, 10000, 'PESSAT', 'general', 'john.doe@example.com', 'CSE', 'EC');

Function definition (any one)
1.DELIMITER //

CREATE FUNCTION CountStudentsWithPreference(IN campus VARCHAR(255))
RETURNS INT
BEGIN
    DECLARE preference_count INT;
    
    IF campus = 'rr' OR campus = 'ec' THEN
        SELECT COUNT(*) INTO preference_count FROM Student WHERE preference1 = campus OR preference2 = campus;
    ELSE
        SET preference_count = -1; 
    END IF;

    RETURN preference_count;
END;
//
DELIMITER ;




CRUD operations : 
Student





2. Institute



3. Branch




Queries –

1.SELECT Branch.id, Branch.name, Branch.institute_id, Branch.credits, Branch.description, Branch.capacity, Institute.name AS institute_name
FROM Branch
JOIN Institute ON Branch.institute_id = Institute.id
WHERE Branch.institute_id IN (1, 2); 


2.SELECT
  student_category,COUNT(*) AS num_students FROM students GROUP BY
  student_category ORDER BY num_students DESC;


3.SELECT Branch.id, Branch.name, Branch.institute_id, Branch.credits, Branch.description, Branch.capacity
FROM Branch
WHERE Branch.institute_id IN (1, 2);

4.ELECT Branch.id, Branch.name, Branch.institute_id, Branch.credits, Branch.description, Branch.capacity, Institute.name AS institute_name
FROM Branch
JOIN Institute ON Branch.institute_id = Institute.id
WHERE Branch.institute_id IN (1, 2); 

5.SELECT name, pessat_score
FROM Student
WHERE pessat_score > 1000;


