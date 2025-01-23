
-- cake php convention

-- contractors

-- organisations

-- projects

-- skills

-- projects_skills

-- contractors_skills

-- contacts

-- users

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password CHAR(64) NOT NULL
);

CREATE TABLE contractors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NULL
);

CREATE TABLE industries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    industry_name VARCHAR(255) NOT NULL
);

CREATE TABLE organisations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_name VARCHAR(255) NOT NULL,
    contact_first_name VARCHAR(255) NOT NULL,
    contact_last_name VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    current_website VARCHAR(255) NOT NULL,
    industry_id INT NOT NULL,
    FOREIGN KEY (industry_id) REFERENCES industries(id)
);



CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    management_tool_link VARCHAR(255) NOT NULL,
    project_due_date DATE NOT NULL,
    last_checked DATE NULL,
    complete BOOLEAN NOT NULL,
    organisation_id INT NOT NULL,
    contractor_id INT NULL
);

CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(255) NOT NULL
);

CREATE TABLE projects_skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    skill_id INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE contractors_skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contractor_id INT NOT NULL,
    skill_id INT NOT NULL,
    FOREIGN KEY (contractor_id) REFERENCES contractors(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    replied BOOLEAN NOT NULL,
    organisation_id INT,
    contractor_id INT,
    FOREIGN KEY (contractor_id) REFERENCES contractors(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (organisation_id) REFERENCES organisations(id) ON DELETE CASCADE ON UPDATE CASCADE
);





