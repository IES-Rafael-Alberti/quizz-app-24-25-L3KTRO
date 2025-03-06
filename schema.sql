CREATE TABLE Usuarios
(
    user_id  INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50)  NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Cuestionarios
(
    quiz_id     INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE Preguntas
(
    question_id    INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id        INT          NOT NULL,
    question_text  TEXT         NOT NULL,
    option_a       VARCHAR(255) NOT NULL,
    option_b       VARCHAR(255) NOT NULL,
    option_c       VARCHAR(255) NOT NULL,
    option_d       VARCHAR(255) NOT NULL,
    correct_option CHAR(1)      NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES Cuestionarios (quiz_id)
);
