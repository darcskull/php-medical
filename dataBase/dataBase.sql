-- Създаване на DataBase за проекта
CREATE DATABASE infm114;
-- Създаване на таблици в новия DataBase
CREATE SEQUENCE user_sequence START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE disease_sequence START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE medicine_sequence START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE diagnosis_sequence START WITH 1 INCREMENT BY 1;
CREATE SEQUENCE order_sequence START WITH 1 INCREMENT BY 1;

CREATE TABLE User_Data (
                           id INT PRIMARY KEY NOT NULL DEFAULT NEXT VALUE FOR user_sequence,
                           firstName VARCHAR(255),
                           lastName VARCHAR(255),
                           password VARCHAR(255),
                           email VARCHAR(255),
                           phoneNumber VARCHAR(20),
                           personalNumber VARCHAR(20),
                           isDoctor BOOLEAN
);

CREATE TABLE Disease (
                         id INT PRIMARY KEY NOT NULL DEFAULT NEXT VALUE FOR disease_sequence,
                         name VARCHAR(255),
                         type VARCHAR(255),
                         description VARCHAR(1000)
);

CREATE TABLE Medicine (
                          id INT PRIMARY KEY NOT NULL DEFAULT NEXT VALUE FOR medicine_sequence,
                          name VARCHAR(255),
                          description VARCHAR(1000),
                          diseaseId INT NOT NULL,
                          price DECIMAL(10,2),
                          FOREIGN KEY (diseaseId) REFERENCES Disease(id) ON DELETE CASCADE
);

CREATE TABLE Diagnosis (
                           id INT PRIMARY KEY NOT NULL DEFAULT NEXT VALUE FOR diagnosis_sequence,
                           userId INT NOT NULL,
                           diseaseId INT NOT NULL,
                           FOREIGN KEY (userId) REFERENCES User_Data(id) ON DELETE CASCADE,
                           FOREIGN KEY (diseaseId) REFERENCES Disease(id) ON DELETE CASCADE
);

CREATE TABLE Order_Data (
                            id INT PRIMARY KEY NOT NULL DEFAULT NEXT VALUE FOR order_sequence,
                            medicineId INT NOT NULL,
                            number INT,
                            price DECIMAL(10,2),
                            address VARCHAR(255),
                            userId INT NOT NULL,
                            phoneNumber VARCHAR(20),
                            FOREIGN KEY (medicineId) REFERENCES Medicine(id) ON DELETE CASCADE,
                            FOREIGN KEY (userId) REFERENCES User_Data(id) ON DELETE CASCADE
);

-- Въвеждане на примерни данни
INSERT INTO User_Data (firstName, lastName, password, email, phoneNumber, personalNumber, isDoctor)
VALUES ('Primal', 'Patient', '1234', 'patient@example.com', '0888161650', '9154d3ac', false);

INSERT INTO User_Data (firstName, lastName, password, email, phoneNumber, personalNumber, isDoctor)
VALUES ('Test', 'Doctor', '1234', 'doctor@example.com', '0888161651', '69dab16e', true);

INSERT INTO User_Data (firstName, lastName, password, email, phoneNumber, personalNumber, isDoctor)
VALUES ('Test', 'Patient', '1234', 'test@abv.bg', '0888161656', 'c97997e4', false);

INSERT INTO Disease (name, type, description)
VALUES ('Cold', 'Viral', 'Common viral infection');

INSERT INTO Disease (name, type, description)
VALUES ('Flu', 'Viral', 'Influenza viral infection');

INSERT INTO Disease (name, type, description)
VALUES ('Headache', 'General', 'Pain in the head or upper neck');

INSERT INTO Disease (name, type, description)
VALUES ('Diabetes', 'Metabolic', 'A group of diseases that result in too much sugar in the blood (high blood glucose)');

INSERT INTO Disease (name, type, description)
VALUES ('Hypertension', 'Cardiovascular', 'High blood pressure');

INSERT INTO Disease (name, type, description)
VALUES ('Arthritis', 'Musculoskeletal', 'Inflammation of one or more joints');

INSERT INTO Disease (name, type, description)
VALUES ('Asthma', 'Respiratory', 'Chronic respiratory disease characterized by variable airflow obstruction and inflammation');

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Aspirin', 'Pain reliever', 1, 10.99);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Tylenol', 'Fever reducer', 2, 8.99);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Paracetamol', 'Pain reliever and fever reducer', 3, 5.99);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Ibuprofen', 'Nonsteroidal anti-inflammatory drug (NSAID)', 3, 7.49);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Insulin', 'Hormone used to treat diabetes', 4, 15.99);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Metformin', 'Medication used to treat type 2 diabetes', 4, 12.49);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Lisinopril', 'Medication used to treat high blood pressure', 5, 9.99);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Naproxen', 'Nonsteroidal anti-inflammatory drug (NSAID)', 6, 6.79);

INSERT INTO Medicine (name, description, diseaseId, price)
VALUES ('Albuterol', 'Bronchodilator used to treat asthma', 7, 10.99);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (1, 1);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (1, 7);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (1, 6);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (1, 5);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (1, 4);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (3, 3);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (3, 2);

INSERT INTO Diagnosis (userId, diseaseId)
VALUES (3, 1);

INSERT INTO Order_Data (medicineId, number, price, address, userId, phoneNumber)
VALUES (1, 2, 21.98, '123 Main St, City', 1, '0888161650');

INSERT INTO Order_Data (medicineId, number, price, address, userId, phoneNumber)
VALUES (7, 1, 10.99, '123 Main St, City', 1, '0888161650');

INSERT INTO Order_Data (medicineId, number, price, address, userId, phoneNumber)
VALUES (5, 10, 99.90, '145 City', 1, '0888161650');

INSERT INTO Order_Data (medicineId, number, price, address, userId, phoneNumber)
VALUES (2, 1, 8.99, '345 Main Street', 3, '0888161656');
