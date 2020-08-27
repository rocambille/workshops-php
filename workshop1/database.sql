create database if not exists marmiwild character set utf8 collate utf8_unicode_ci;

use marmiwild;

grant all privileges on marmiwild.* to 'jdoe'@'localhost' identified by 'Secret1#';

drop table if exists recipe;
create table recipe (
  id integer not null primary key auto_increment,
  title varchar(100) not null,
  description varchar(2000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

insert into recipe (id, title, description) values
(1, 'Tarte tatin', 'Tu fais une tarte, tu la mets au four et puis tatin.'),
(2, 'Pudding à l\'arsenic', 'Dans un grand bol de strychnine, délayer de la morphine. Faites tiédir à la casserole, un bon verre de pétrole...');