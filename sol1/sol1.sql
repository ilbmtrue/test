SELECT u.name, COUNT(p.id) FROM users u
  JOIN phone_numbers p ON p.user_id = u.id
WHERE  u.gender = 2 AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.birth_date), NOW()) BETWEEN 18 AND 22
GROUP BY p.user_id;


ALTER TABLE phone_numbers ADD INDEX user_id_idx (user_id);

ALTER TABLE phone_numbers
ADD CONSTRAINT user_id
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;


