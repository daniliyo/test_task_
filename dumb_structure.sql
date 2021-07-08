CREATE TABLE `cities` (`id` INT AUTO_INCREMENT PRIMARY KEY, 
					   `name` VARCHAR(25) NOT NULL
					   );
					   
CREATE TABLE `persons` (`id` INT AUTO_INCREMENT PRIMARY KEY,
						`city_id` INT,
						`fullname` VARCHAR(50) NOT NULL,
						CONSTRAINT FK_CityPerson FOREIGN KEY (city_id) REFERENCES cities (id) 
						ON DELETE SET NULL
						ON UPDATE CASCADE
						);
						
CREATE TABLE `transactions` (`transaction_id` INT AUTO_INCREMENT PRIMARY KEY,
							`from_person_id` INT NOT NULL,
							`to_person_id` INT NOT NULL,
							`amount` DECIMAL(9,4),
							CONSTRAINT FK_PersonTransactionFrom FOREIGN KEY (from_person_id) REFERENCES persons (id) 
							ON DELETE RESTRICT
							ON UPDATE RESTRICT,
							CONSTRAINT FK_PersonTransactionTo FOREIGN KEY (to_person_id) REFERENCES persons (id) 
							ON DELETE RESTRICT
							ON UPDATE RESTRICT
);