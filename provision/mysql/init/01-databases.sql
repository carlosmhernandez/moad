# create databases
CREATE DATABASE IF NOT EXISTS `ad`;
CREATE DATABASE IF NOT EXISTS `cmdb`;

# create root user and grant rights
CREATE USER 'moad'@'localhost' IDENTIFIED BY '';
#GRANT ALL ON *.* TO 'root'@'%';