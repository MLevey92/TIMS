CREATE TABLE employee (e_id INT NOT NULL,
                      e_name VARCHAR(20),
                      div_name VARCHAR(20),
                      shift INT CHECK (shift>0 AND shift<4),
                      PRIMARY KEY(e_id)) ENGINE=INNODB;
                      
CREATE TABLE supervisor (e_id INT NOT NULL,
                      sup_id INT NOT NULL,
                      PRIMARY KEY(e_id)) ENGINE=INNODB;
                      
CREATE TABLE division (div_name VARCHAR(20) NOT NULL,
						location VARCHAR(20),
						m_id CHAR(7),
						PRIMARY KEY(div_name)) ENGINE=INNODB;
						
CREATE TABLE checksOut (tool_id CHAR(5) NOT NULL,
						box_id VARCHAR(20) NOT NULL,
						div_name VARCHAR(20) NOT NULL,
						time_in DATETIME,
						time_out DATETIME NOT NULL,
						e_id INT NOT NULL,
						m_id CHAR(7),
						PRIMARY KEY(tool_id,box_id,div_name)) ENGINE=INNODB;
						
CREATE TABLE tool (tool_id CHAR(5) NOT NULL,
					box_id INT NOT NULL,
					div_name VARCHAR(20) NOT NULL,
					nomen VARCHAR(20) NOT NULL,
					PRIMARY KEY(tool_id, box_id, div_name)) ENGINE=INNODB;
							
CREATE TABLE maintAction (m_id CHAR(7) NOT NULL,
                      aircraft_id VARCHAR(20),
                      PRIMARY KEY(m_id)) ENGINE=INNODB;
							
					
                      
