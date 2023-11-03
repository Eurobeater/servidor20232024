DROP TABLE IF EXISTS gim_reservas;
DROP TABLE IF EXISTS gim_clases;
DROP TABLE IF EXISTS gim_categorias;
DROP TABLE IF EXISTS gim_usuarios;




create table gim_usuarios(
usuario_id integer primary key AUTO_INCREMENT,
usuario varchar( 100 ),
password varchar( 100 )
);

create table gim_clases(
clase_id integer primary key AUTO_INCREMENT,
categoria_id integer,
aforo integer,
hora time,
fecha date
);

create table gim_categorias(
categoria_id integer primary key AUTO_INCREMENT,
categoria varchar( 100 )
);


create table gim_reservas(
reserva_id integer primary key AUTO_INCREMENT,
clase_id integer,
usuario_id integer
);


alter table gim_clases 
add constraint fk_clases_categorias
foreign key ( categoria_id) references gim_categorias ( categoria_id );


alter table gim_reservas 
add constraint fk_reservas_clases
foreign key ( clase_id) references gim_clases ( clase_id );


alter table gim_reservas
add constraint fk_reservas_usuarios
foreign key ( usuario_id) references gim_usuarios ( usuario_id );

insert into gim_usuarios values ( 1, 'fernando', 'fernando');
insert into gim_usuarios values ( 2, 'antonio', 'antonio');

insert into gim_categorias VALUES ( 1, 'HIT' );
insert into gim_categorias VALUES ( 2, 'BODYBOXING' );
insert into gim_categorias VALUES ( 3, 'CROSSFIT' );
insert into gim_categorias VALUES ( 4, 'TABATA' );
insert into gim_categorias VALUES ( 5, 'MANTENIMIENTO' );

INSERT INTO gim_clases VALUES ( 1, 1, 20, '10:00', '2022-12-12' );
INSERT INTO gim_clases VALUES ( 2, 1, 20, '11:00', '2022-12-13' );
INSERT INTO gim_clases VALUES ( 3, 1, 20, '12:00', '2022-12-14' );
INSERT INTO gim_clases VALUES ( 4, 1, 20, '12:00', '2022-12-15' );
INSERT INTO gim_clases VALUES ( 5, 1, 20, '13:00', '2022-12-12' );
INSERT INTO gim_clases VALUES ( 6, 1, 20, '14:00', '2022-12-13' );
INSERT INTO gim_clases VALUES ( 7, 1, 20, '18:00', '2022-12-14' );
INSERT INTO gim_clases VALUES ( 8, 1, 20, '19:00', '2022-12-15' );
INSERT INTO gim_clases VALUES ( 9, 1, 20, '18:00', '2022-12-16' );
INSERT INTO gim_clases VALUES ( 10, 1, 20, '19:00', '2022-12-16' );


