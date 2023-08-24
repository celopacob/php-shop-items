drop table if exists `shop_items`;
create table `shop_items` (
    id int not null auto_increment,
    description text not null,
    checked BOOLEAN,
    primary key (id)
);