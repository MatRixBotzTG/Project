CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    country VARCHAR(50),
    state VARCHAR(50),
    location VARCHAR(255),
    sectors TEXT,
    qualifications TEXT,
    type ENUM('worker','company') NOT NULL,
    approved BOOLEAN DEFAULT 0
);

CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    location VARCHAR(255),
    sector VARCHAR(100),
    company_id INT,
    FOREIGN KEY (company_id) REFERENCES users(id)
);

CREATE TABLE job_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT,
    worker_id INT,
    status VARCHAR(50) DEFAULT 'pending',
    FOREIGN KEY (job_id) REFERENCES jobs(id),
    FOREIGN KEY (worker_id) REFERENCES users(id)
);
