# Pull image centos 7
FROM centos:7

# Install Apache
RUN yum update -y
RUN yum install -y httpd

# Install EPEL Repo
RUN yum -y install epel-release
RUN rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm

# Install PHP and extension
RUN yum -y --enablerepo=remi-php74 install php
RUN yum install -y --enablerepo=remi-php74 php-pdo
RUN yum install -y --enablerepo=remi-php74 php-pdo_mysql
RUN yum install -y --enablerepo=remi-php74 php-mysqli
RUN yum install -y --enablerepo=remi-php74 php-pdo_pgsql
RUN yum install -y --enablerepo=remi-php74 php-pgsql
RUN yum install -y --enablerepo=remi-php74 php-mbstring
RUN yum install -y --enablerepo=remi-php74 php-curl
RUN yum install -y --enablerepo=remi-php74 php-ctype
RUN yum install -y --enablerepo=remi-php74 php-xml
RUN yum install -y --enablerepo=remi-php74 php-json
RUN yum install -y --enablerepo=remi-php74 php-tokenizer
RUN yum install -y --enablerepo=remi-php74 php-openssl
RUN yum install -y --enablerepo=remi-php74 php-gd
RUN yum install -y --enablerepo=remi-php74 php-zip
RUN yum install -y --enablerepo=remi-php74 php-gmp
RUN yum install -y --enablerepo=remi-php74 php-bcmath
RUN yum install -y --enablerepo=remi-php74 php-intl

# Install ZIP UNZIP
RUN yum install -y php-cli php-zip wget unzipcom
RUN yum install -y zip unzip php7.4-zip

# Install GIT
RUN yum -y install git

# Install COMPOSER
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY php.ini etc/

EXPOSE 80

# Start Apache
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]
