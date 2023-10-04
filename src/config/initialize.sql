-- Create the User table
CREATE TABLE User (
                        user_id SERIAL PRIMARY KEY,
                        email VARCHAR(255) UNIQUE NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        name VARCHAR(255) NOT NULL
);

-- Create the Workspace table
CREATE TABLE Workspace (
                           workspace_id SERIAL PRIMARY KEY,
                           name VARCHAR(255) NOT NULL,
                           user_id INT NOT NULL,
                           FOREIGN KEY (user_id) REFERENCES "User"(user_id)
);

-- Create the Note table
CREATE TABLE Note (
                      note_id SERIAL PRIMARY KEY,
                      content TEXT,
                      name VARCHAR(255) NOT NULL,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      workspace_id INT NOT NULL,
                      FOREIGN KEY (workspace_id) REFERENCES Workspace(workspace_id)
);

-- Create the Tag table
CREATE TABLE Tag (
                     tag_id SERIAL PRIMARY KEY,
                     name VARCHAR(255) NOT NULL
);

-- Create the Note_Tag table (Many-to-Many Relationship)
CREATE TABLE Note_Tag (
                          note_tag_id SERIAL PRIMARY KEY,
                          note_id INT NOT NULL,
                          tag_id INT NOT NULL,
                          FOREIGN KEY (note_id) REFERENCES Note(note_id),
                          FOREIGN KEY (tag_id) REFERENCES Tag(tag_id)
);
