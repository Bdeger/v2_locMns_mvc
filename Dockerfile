# il faut un dockerfile car PDO MySQL n'est pas installé dans le container php
# il faut un dockerfile pour installer l'extension

FROM php:8.2-apache
# installer l'extension PDO MySQL 
RUN docker-php-ext-install pdo pdo_mysql
# activer mod_rewrite
RUN a2enmod rewrite

# Sans Docker :

# Tu installes PHP sur ton ordi
# Tu installes les extensions manuellement
# C'est long et compliqué ⚠️

# Avec Docker :

# Le Dockerfile décrit ce qu'on veut installer dans le container
# Docker crée un container avec tout ce qu'il faut dedans
# Ton ordi reste propre — tout est isolé dans le container ! ✅