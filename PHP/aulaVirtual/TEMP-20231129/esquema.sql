DROP TABLE IF EXIsTs poll_resultados;
DROP TABLE IF EXIsTs poll_polls;
DROP TABLE IF EXIsTs poll_respuestas;
DROP TABLE IF EXIsTs poll_preguntas;
DROP TABLE IF EXIsTs poll_encuestas;

CREATE TABLE poll_encuestas (
  encuesta_id INTEGER NOT NULL AUTO_INCREMENT ,
  encuesta VARCHAR( 100 )NOT NULL,
  PRIMARY KEY(encuesta_id));

CREATE TABLE poll_preguntas (
  pregunta_id INTEGER NOT NULL AUTO_INCREMENT ,
  encuesta_id INTEGER NOT NULL  ,
  orden INTEGER NOT NULL  ,
  pregunta VARCHAR( 100 ),
  PRIMARY KEY(pregunta_id),
  FOREIGN KEY(encuesta_id) REFERENCEs poll_encuestas(encuesta_id));

CREATE TABLE poll_respuestas (
  respuesta_id INTEGER NOT NULL AUTO_INCREMENT ,
  pregunta_id INTEGER NOT NULL  ,
  orden INTEGER NOT NULL  ,
  respuesta VARCHAR( 100 ),
  PRIMARY KEY(respuesta_id),
  FOREIGN KEY(pregunta_id) REFERENCEs poll_preguntas(pregunta_id));


CREATE TABLE poll_polls (
  poll_id INTEGER NOT NULL AUTO_INCREMENT ,
  ip VARCHAR( 20 ),
  fecha DATE,
  hora TIME,
  PRIMARY KEY(poll_id));

CREATE TABLE poll_resultados (
  resultado_id INTEGER NOT NULL AUTO_INCREMENT ,
  poll_id INTEGER NOT NULL,
  respuesta_id INTEGER NOT NULL,
  PRIMARY KEY(resultado_id),
  FOREIGN KEY(poll_id) REFERENCEs poll_polls( poll_id ),
  FOREIGN KEY(respuesta_id) REFERENCEs poll_respuestas(respuesta_id));


INsERT INTO `test`.`poll_encuestas` (`encuesta`) VALUEs ( 'INTENCION DE VOTACION');
INsERT INTO `test`.`poll_encuestas` (`encuesta`) VALUEs ( 'VALORACION DE MEDIOs');

INsERT INTO `test`.`poll_preguntas` ( `encuesta_id`, `orden`, `pregunta` ) VALUEs ( 1 , 1, 'PARTidO PREFERidO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 1 , 1, 'PP'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 1 , 2, 'PsOE'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 1 , 3, 'IU'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 1 , 4, 'NO CONTEsTA'); 

INsERT INTO `test`.`poll_preguntas` ( `encuesta_id`, `orden`, `pregunta` ) VALUEs ( 1 , 2, 'LidER PREFERidO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 2 , 5, 'RAJOY'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 2 , 6, 'sANCHEZ'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 2 , 7, 'GARZON'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 2 , 8, 'NO CONTEsTA'); 


INsERT INTO `test`.`poll_preguntas` ( `encuesta_id`, `orden`, `pregunta` ) VALUEs ( 2 , 3, 'PERIODICO PREFERidO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 3 , 9, 'PAIs'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 3 , 10, 'MUNDO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 3 , 11, 'ABC'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 3 , 12, 'LA RAZON'); 

INsERT INTO `test`.`poll_preguntas` ( `encuesta_id`, `orden`, `pregunta` ) VALUEs ( 2 , 4, 'RADIO PREFERidA'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 4 , 13, 'EsRADIO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 4 , 14, 'sER'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 4 , 15, 'ONDACERO'); 
INsERT INTO `test`.`poll_respuestas` ( `pregunta_id`, `orden`, `respuesta` )VALUEs ( 4 , 16, 'COPE'); 

