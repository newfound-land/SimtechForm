# Инструкция для проекта "Форма обратной связи"
## Содержание
+ Особенности проекта
+ Настройка окружения
+ Руководство по установке проекта
+ Дополнительная информация



## Особенности проекта

Проект : "Форма обратной связи" состоит из двух разделов:

  1. Карточка заказа консультации.
  2. Отображение всех заказов в таблице.

## Настройка окружения
 
 Данный пример показан для ОС :
   
   ```
   Debian 10+/Ubunta 20+/Linux Mint 20+
   ```
 ### 1. Настраиваем компоненты веб-сервера.

  + *В качестве веб-сервера можно использовать **Apache2** или **Nginx** :* 
  Вначале, обновляем репозитории ОС :
   ```  
   sudo apt update
   ```  

  Для установки веб-сервера **Apache2** вводим команду в терминале:
 
  ```
  sudo apt install apache2
  ```
 Для установки веб-сервера **Nginx** вводим команду в терминале:

 ```
  sudo apt install nginx
  ```

  

+ *В качестве СУБД используем **MariaDB***

Для установки вводим команду в терминале:
 ```
 sudo apt install mariadb-server mariadb-client
 ```
  

 + *Установка интерпретатора php и компонентов. Используем PHP 7.1 и выше.*
  
  ```
 sudo apt install php php-curl php-xdebug php-soap php-zip php-gd php-mysqli
 ```

Если у вас apache, то нужно установить модуль php для apache для нужной версии PHP(которую можно посмотреть командой в терминале **php -v**):
```
sudo apt install libapache2-mod-php
```
Для Nginx установить модуль php:
```
sudo apt install php-fpm
```


### 2. Настройки веб-сервера.


Чтобы браузер сразу обращался в нужную директорию, нужно настроить веб-сервер :
Если apache, то файл 
```/etc/apache2/sites-enabled/000-default.conf``` приведите к виду:

```
VirtualHost *:80
    ServerAdmin webmaster@localhost
    ServerName your_domain
    ServerAlias www.your_domain
    DocumentRoot /var/www/html/your_domain
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
VirtualHost
```
Для доступа у файлу используйте в терминале команду:
```
nano /etc/apache2/sites-enabled/000-default.conf
```

**your_domain** - это ваше доменное имя.

Для Nginx файл
```etc/nginx/sites-enabled/default```
приведите к виду:

```
server {
        listen 80;
        listen [::]:80;
        server_name your_domain;
        root /var/www/html/your_domain;
        index index.html index.php;
    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```
### 3. Настройка СУБД.
  
Создание нового пользователя БД (База данных).
Зайдите в консоль Mariadb
```
mysql -u root -p
```
```
CREATE USER 'some_user'@'localhost' IDENTIFIED BY 'some_password';
```
Создание новой БД.
```
CREATE DATABASE database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
Предоставление новому пользователю прав на БД.

```
GRANT ALL PRIVILEGES ON database_name.* TO 'some_user'@'localhost';
```
```
FLUSH PRIVILEGES;
```
где **some_user** -ваше имя,
**some_password**- пароль, **database_name**-название базы данных.

## Руководство по установке проекта

1. Скачать и распаковать содержимое zip файла в директорию **root** из пункта 2.
  + Или, можете клонировать репозиторий с Гитхаба по ссылке ниже.
2. Залить dump БД.
  
  В терминале запустить команду:
 ```
mysql database_name < /var/www/html/your_domain/dump.sql
```
3. Поправить файл ```connect.php``` для доступа в БД и для отправки писем на почту(указаны данные smtp почты Яндекса).
```
$mail_login="Ваша почта";
$mail_password="пароль";
$mail_recipient="Почта получателя";
$database="database_name";
$username="some_user";
$password="some_password";
```
## Дополнительная информация  
Проект сожно скачать по ссылке:

[Github_Simtech](https://github.com/newfound-land/Simtech)


  ```
  git clone https://github.com/newfound-land/Simtech.git
  ```