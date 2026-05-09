TYPE=VIEW
query=select `s`.`Student_Name` AS `Student_Name`,round(avg(`r`.`GPA`),2) AS `Average_GPA`,case when avg(`r`.`GPA`) >= 3.5 then \'Target Achieved\' else \'Below Target\' end AS `STATUS` from (`gpa_calculator`.`result` `r` join `gpa_calculator`.`student` `s` on(`r`.`Student_ID` = `s`.`Student_ID`)) group by `s`.`Student_Name`
md5=52546ae95e4f072ea51d882d3470a084
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001778024242917046
create-version=2
source=SELECT\n    s.Student_Name,\n    ROUND(AVG(r.GPA),\n    2) AS Average_GPA,\n    CASE WHEN AVG(r.GPA) >= 3.5 THEN \'Target Achieved\' ELSE \'Below Target\'\nEND AS\nSTATUS\nFROM\n    Result r\nJOIN Student s ON\n    r.Student_ID = s.Student_ID\nGROUP BY\n    s.Student_Name
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `s`.`Student_Name` AS `Student_Name`,round(avg(`r`.`GPA`),2) AS `Average_GPA`,case when avg(`r`.`GPA`) >= 3.5 then \'Target Achieved\' else \'Below Target\' end AS `STATUS` from (`gpa_calculator`.`result` `r` join `gpa_calculator`.`student` `s` on(`r`.`Student_ID` = `s`.`Student_ID`)) group by `s`.`Student_Name`
mariadb-version=100432
