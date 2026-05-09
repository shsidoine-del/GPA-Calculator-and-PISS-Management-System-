TYPE=VIEW
query=select `gpa_calculator`.`enrollment`.`Student_ID` AS `Student_ID`,`gpa_calculator`.`enrollment`.`Course_ID` AS `Course_ID`,`gpa_calculator`.`enrollment`.`Semester` AS `Semester`,`gpa_calculator`.`enrollment`.`Year` AS `Year` from `gpa_calculator`.`enrollment` where `gpa_calculator`.`enrollment`.`Student_ID` = 2890
md5=8773077b865e90bdba6576ca55b82d24
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001778023842317954
create-version=2
source=SELECT * \nFROM Enrollment\nWHERE Student_ID = 2890
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `gpa_calculator`.`enrollment`.`Student_ID` AS `Student_ID`,`gpa_calculator`.`enrollment`.`Course_ID` AS `Course_ID`,`gpa_calculator`.`enrollment`.`Semester` AS `Semester`,`gpa_calculator`.`enrollment`.`Year` AS `Year` from `gpa_calculator`.`enrollment` where `gpa_calculator`.`enrollment`.`Student_ID` = 2890
mariadb-version=100432
