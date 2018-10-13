drop table if exists list;
create table list
(
    id int unsigned not null auto_increment comment 'ID',
    title varchar(255) not null comment '标题',
    audit_status enum unsigned not null default '0' comment '审核状态',
    click varchar(255) not null default '0' comment '点赞',
    publisher varchar(255) not null comment '发布人',
    update_at datatime not null default current_timestamp comment '更新时间',
    comment longtext comment '评论',
    primary key (id)
)engine=InnoDB comment='展示列表';

INSERT INTO 