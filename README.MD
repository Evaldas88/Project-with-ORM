# Project management system app with ORM:

This project was created with :
    
* PHP
* Bootstrap framework
* HTML
* MySQL Workbench 

# In this File Browser  you can:

* Create people
* Create people
* Create project's section
* Delete people and projects
* Edit people and projects
* All these changes will be updated in MySQL database.

#  Screenshot of app
<p float="left">
    <img src="src\views\images\image1.png" width="500" >     
 </p> 

# Installiation

* To run App you need to have XAMPP and MySQL Workbench.
* Create new folder  or download to your XAMPP directory (C:\xampp\htdocs). 
* With Visual Studio Code.
* Composer installation to launch this project:
    * Navigate to directory, where you want to install Composer;
    * You can install composer with your command line (copy and paste theese commands in your command line):
        * php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
       * php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
       * php composer-setup.php
       * php -r "unlink('composer-setup.php');"

* Open terminal and paste this:

            git clone  https://github.com/Evaldas88/Project-with-ORM.git  
* In the terminal post this     php ../composer.phar install  if composer was instaleted in C:\xampp\htdocs
* For database schema generation (powershell recommended, because with Git Bash it could not work) type in terminal:

   * vendor\bin\doctrine orm:schema-tool:update --force --dump-sql.

* With Visual Studio Code.
* Composer installation to launch this project:
* Import db.sql in to the MySQL Workbench.
* Run XAMPP and start Apache and MySQL server's.
* Open your browser and in the searchbar paste this:

        http://localhost/Project-with-ORM/index.php 

#  Screenshots how to import database to MySQL Workbench

<p float="left">
    <img src="src\views\images\import.jpg" width="500" >     
    <img src="src\views\images\import1.jpg" width="500" > 
</p> 



# Author

This project was developed by  - Evaldas Skackauskas 

<a href="https://www.linkedin.com/in/evaldas-skackauskas-35505516a/">linkedin</a>