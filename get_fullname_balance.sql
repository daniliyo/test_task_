SELECT p.fullname, format(100 + SUM(t1.amount/2)-SUM(t2.amount/2),4) as 'Balance' FROM persons p LEFT JOIN transactions t1 on p.id = t1.to_person_id LEFT JOIN transactions t2 on t1.to_person_id = t2.from_person_id WHERE p.id = 2;