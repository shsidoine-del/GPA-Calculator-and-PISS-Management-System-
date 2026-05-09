TYPE=VIEW
query=select `gpa_calculator`.`student`.`Student_ID` AS `Student_ID`,`gpa_calculator`.`student`.`Student_Name` AS `Student_Name`,`gpa_calculator`.`student`.`Programme` AS `Programme` from `gpa_calculator`.`student` where `gpa_calculator`.`student`.`Programme` = \'CIT\'
md5=3f6fa6c7b0985c64a828846b1feba34a
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001778023260833057
create-version=2
source=SELECT *\nFROM Student\nWHERE Programme = \'CIT\'
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `gpa_calculator`.`student`.`Student_ID` AS `Student_ID`,`gpa_calculator`.`student`.`Student_Name` AS `Student_Name`,`gpa_calculator`.`student`.`Programme` AS `Programme` from `gpa_calculator`.`student` where `gpa_calculator`.`student`.`Programme` = \'CIT\'
mariadb-version=100432
