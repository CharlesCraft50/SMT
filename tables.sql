CREATE TABLE Programs (
    ProgramID INT PRIMARY KEY,
    ProgramName VARCHAR(50) NOT NULL,
    ProgramCode VARCHAR(10) NOT NULL
);

CREATE TABLE Students (
    StudentID BIGINT PRIMARY KEY,
    StudentName VARCHAR(50) NOT NULL,
    Year VARCHAR(10) NOT NULL,
    ProgramID INT NOT NULL,
    FOREIGN KEY (ProgramID) REFERENCES Programs(ProgramID)
);

CREATE TABLE ViolationRecord (
    ViolationID INT PRIMARY KEY AUTO_INCREMENT,
    ViolationDate DATETIME NOT NULL,
    ViolationType VARCHAR(50) NOT NULL,
    StudentID BIGINT NOT NULL,
    Notes VARCHAR(225),
    ViolationPicture VARCHAR(255),
    ViolationStatus VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID)
);

CREATE TABLE YearlyRecords (
    YearlyRecordID INT PRIMARY KEY,
    Year VARCHAR(4) NOT NULL
);

CREATE TABLE MonthlyRecords (
    MonthlyRecordID INT PRIMARY KEY,
    Month DATE NOT NULL
);

CREATE TABLE StudentRecords (
    StudentRecordID INT PRIMARY KEY,
    StudentID BIGINT NOT NULL,
    YearlyRecordID INT NOT NULL,
    MonthlyRecordID INT NOT NULL,
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (YearlyRecordID) REFERENCES YearlyRecords(YearlyRecordID),
    FOREIGN KEY (MonthlyRecordID) REFERENCES MonthlyRecords(MonthlyRecordID)
);

CREATE TABLE YearlyAttendanceRecord (
    YearlyAttendanceID INT PRIMARY KEY,
    TotalAttendance INT NOT NULL,
    YearlyRecordID INT NOT NULL,
    FOREIGN KEY (YearlyRecordID) REFERENCES YearlyRecords(YearlyRecordID)
);

CREATE TABLE YearlyViolationRecord (
    YearlyViolationID INT PRIMARY KEY,
    TotalViolations INT NOT NULL,
    PendingViolations INT NOT NULL,
    ReviewedViolations INT NOT NULL,
    YearlyRecordID INT NOT NULL,
    FOREIGN KEY (YearlyRecordID) REFERENCES YearlyRecords(YearlyRecordID)
);

CREATE TABLE MonthAttendanceRecord (
    RecordID INT PRIMARY KEY,
    NumberOfAttendance INT NOT NULL,
    MonthlyRecordID INT NOT NULL,
    FOREIGN KEY (MonthlyRecordID) REFERENCES MonthlyRecords(MonthlyRecordID)
);

CREATE TABLE MonthlyViolationRecord (
    MonthlyViolationID INT PRIMARY KEY,
    NumberOfViolations INT NOT NULL,
    PendingViolations INT NOT NULL,
    ReviewedViolations INT NOT NULL,
    MonthlyRecordID INT NOT NULL,
    FOREIGN KEY (MonthlyRecordID) REFERENCES MonthlyRecords(MonthlyRecordID)
);

CREATE TABLE StudentAttendanceRecord (
    StudentAttendanceID INT PRIMARY KEY,
    TotalAttendance INT NOT NULL,
    StudentRecordID INT NOT NULL,
    FOREIGN KEY (StudentRecordID) REFERENCES StudentRecords(StudentRecordID)
);

CREATE TABLE StudentViolationRecord (
    StudentViolationID INT PRIMARY KEY,
    TotalViolations INT NOT NULL,
    PendingViolations INT NOT NULL,
    ReviewedViolations INT NOT NULL,
    StudentRecordID INT NOT NULL,
    FOREIGN KEY (StudentRecordID) REFERENCES StudentRecords(StudentRecordID)
);

INSERT INTO Programs (ProgramID, ProgramName, ProgramCode)
VALUES
(1, 'Bachelor of Science in Computer Science', 'BSCS'),
(2, 'Bachelor of Multimedia Arts', 'BMMA');


INSERT INTO Students (StudentID, StudentName, Year, ProgramID)
VALUES
(123456, 'Marcelo, Jordan Limwell C.', '4th', 1), -- BSCS program
(123457, 'Marcelo, Jordan Limwell C.', '1st', 2); -- BMMA program

INSERT INTO Programs (ProgramID, ProgramName, ProgramCode, ProgramCategory)
VALUES
    (1, 'Bachelor of Science in Business Administration', 'BSBA', 'Business Programs'),
    (2, 'Bachelor of Science in Accountancy', 'BSA', 'Business Programs'),
    (3, 'Bachelor of Science in Hospitality Management', 'BSHM', 'Business Programs'),
    (4, 'Bachelor of Science in Information Technology', 'BSIT', 'Engineering and Technology'),
    (5, 'Bachelor of Science in Computer Science', 'BSCS', 'Engineering and Technology'),
    (6, 'Bachelor of Science in Computer Engineering', 'BSCpE', 'Engineering and Technology'),
    (7, 'Bachelor of Science in Electronics Engineering', 'BSECE', 'Engineering and Technology'),
    (8, 'Bachelor of Arts in Multimedia Arts', 'BAMA', 'Arts and Sciences'),
    (9, 'Bachelor of Arts in Communication', 'BAC', 'Arts and Sciences'),
    (10, 'Bachelor of Science in Nursing', 'BSN', 'Health Sciences'),
    (11, 'Diploma in Pharmacy', 'DPharma', 'Health Sciences'),
    (12, 'Certificate in Graphic Design', 'CGD', 'Short Courses and Certifications'),
    (13, 'Certificate in Culinary Arts', 'CCA', 'Short Courses and Certifications'),
    (14, 'Certificate in Digital Marketing', 'CDM', 'Short Courses and Certifications'),
    (15, 'Senior High School Academic Track (STEM, ABM)', 'SHS-A', 'Senior High School Programs'),
    (16, 'Senior High School Technical-Vocational Track', 'SHS-TV', 'Senior High School Programs');


-- Insert violation for WithoutID
INSERT INTO ViolationRecord 
    (ViolationDate, ViolationType, StudentID, Notes, ViolationPicture) 
VALUES 
    (NOW(), 'WithoutID', 20001824382, 'Student did not present an ID.', 'path/to/image1.jpg');

-- Insert violation for WithoutUniform
INSERT INTO ViolationRecord 
    (ViolationDate, ViolationType, StudentID, Notes, ViolationPicture) 
VALUES 
    (NOW(), 'WithoutUniform', 20001824382, 'Student was not in proper uniform.', 'path/to/image2.jpg');

