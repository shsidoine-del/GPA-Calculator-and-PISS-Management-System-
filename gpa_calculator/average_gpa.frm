TYPE=VIEW
query=select `s`.`Student_Name` AS `Student_Name`,avg(`r`.`GPA`) AS `Average_GPA` from (`gpa_calculator`.`result` `r` join `gpa_calculator`.`student` `s` on(`r`.`Student_ID` = `s`.`Student_ID`)) group by `s`.`Student_Name`
md5=379a85a3bda2af7167de4c8cd4e6dfe3
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001778024048745034
create-version=2
source=SELECT \n    s.Student_Name,\n    AVG(r.GPA) AS Average_GPA\nFROM Result r\nJOIN Student s ON r.Student_ID = s.Student_ID\nGROUP BY s.Student_Name
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `s`.`Student_Name` AS `Student_Name`,avg(`r`.`GPA`) AS `Average_GPA` from (`gpa_calculator`.`result` `r` join `gpa_calculator`.`student` `s` on(`r`.`Student_ID` = `s`.`Student_ID`)) group by `s`.`Student_Name`
mariadb-version=100432
