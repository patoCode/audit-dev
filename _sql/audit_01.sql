/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/09/2021 10:53:39                          */
/*==============================================================*/


drop table if exists AUD_ACTIVIDAD;

drop table if exists AUD_ARCHIVO;

drop table if exists AUD_CERTIFICADOS;

drop table if exists AUD_CIUDAD;

drop table if exists AUD_CLIENTE;

drop table if exists AUD_CLIENTE_ACTIVIDAD;

drop table if exists AUD_CLIENTE_ARCHIVO;

drop table if exists AUD_CLIENTE_CERTIFICADO;

drop table if exists AUD_CLIENTE_EMPRESA;

drop table if exists AUD_CLIENTE_OBLIGACION;

drop table if exists AUD_CLIENTE_REGIMEN;

drop table if exists AUD_DIRECCION;

drop table if exists AUD_EMPRESA;

drop table if exists AUD_OBLIGACION_TRIBUTARIA;

drop table if exists AUD_PAIS;

drop table if exists AUD_PERIODO;

drop table if exists AUD_REGIMEN;

drop table if exists AUD_REG_ACTIVIDAD;

drop table if exists AUD_SOCIEDAD;

drop table if exists AUD_TELEFONO;

/*==============================================================*/
/* Table: AUD_ACTIVIDAD                                         */
/*==============================================================*/
create table AUD_ACTIVIDAD
(
   ID_ACTIVIDAD         int not null auto_increment,
   ID_CLI_ACT           int,
   ACTIVIDAD            varchar(250),
   CODIGO_CIUDAD        varchar(50),
   MES_CIERRE           timestamp,
   ACTIVIDAD_ECONOMICA  varchar(500),
   CODIGO_SIN           varchar(50),
   CODIGO_SISTEMA       varchar(50),
   USER_REG             varchar(350),
   FECHA_REG            timestamp,
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_ACTIVIDAD)
);

/*==============================================================*/
/* Table: AUD_ARCHIVO                                           */
/*==============================================================*/
create table AUD_ARCHIVO
(
   ID_ARCHIVO           int not null auto_increment,
   PATH                 varchar(500),
   NOMBRE               varchar(500),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO_REG           varchar(50),
   ESTADO               varchar(50),
   primary key (ID_ARCHIVO)
);

/*==============================================================*/
/* Table: AUD_CERTIFICADOS                                      */
/*==============================================================*/
create table AUD_CERTIFICADOS
(
   ID_CERTIFICADO       int not null auto_increment,
   CERTIFICADO          varchar(500),
   USER_REG             varchar(350),
   FECHA_REG            timestamp,
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_CERTIFICADO)
);

/*==============================================================*/
/* Table: AUD_CIUDAD                                            */
/*==============================================================*/
create table AUD_CIUDAD
(
   ID_PAIS              int not null,
   ID_CIUDAD            int not null auto_increment,
   CIUDAD               varchar(250),
   BANDERA              varchar(500),
   CODIGO_CIUDAD        varchar(50),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_PAIS, ID_CIUDAD),
   key AK_KID_CIUDAD (ID_CIUDAD)
);

/*==============================================================*/
/* Table: AUD_CLIENTE                                           */
/*==============================================================*/
create table AUD_CLIENTE
(
   ID_CLIENTE           int not null auto_increment,
   ID_SOCIEDAD          int not null,
   ID_PAIS              int not null,
   ID_CIUDAD            int not null,
   NIT                  varchar(50),
   RAZON_SOCIAL         varchar(500),
   PROPIETARIO_REP_LEGAL varchar(500),
   CONTACTO             varchar(500),
   EMAIL                varchar(350),
   CODIGO_CLIENTE       varchar(50),
   FOTO                 varchar(500),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_CLIENTE)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_ACTIVIDAD                                 */
/*==============================================================*/
create table AUD_CLIENTE_ACTIVIDAD
(
   ID_CLI_ACT           int not null auto_increment,
   ID_CLIENTE           int not null,
   ID_ACTIVIDAD         int not null,
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO_REG           varchar(50),
   ESTADO               varchar(50),
   primary key (ID_CLI_ACT)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_ARCHIVO                                   */
/*==============================================================*/
create table AUD_CLIENTE_ARCHIVO
(
   ID_CLIENTE           int not null,
   ID_ARCHIVO           int not null,
   ID_CLI_ARCHIVO       int not null auto_increment,
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   primary key (ID_CLIENTE, ID_ARCHIVO, ID_CLI_ARCHIVO),
   key AK_KID_CLI_ARCHIVO (ID_CLI_ARCHIVO)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_CERTIFICADO                               */
/*==============================================================*/
create table AUD_CLIENTE_CERTIFICADO
(
   ID_CLIENTE           int not null,
   ID_CERTIFICADO       int not null,
   ID_CLI_CERT          int not null auto_increment,
   primary key (ID_CLIENTE, ID_CERTIFICADO, ID_CLI_CERT),
   key AK_KID_CLI_CERT (ID_CLI_CERT)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_EMPRESA                                   */
/*==============================================================*/
create table AUD_CLIENTE_EMPRESA
(
   ID_EMPRESA           int not null,
   ID_CLIENTE           int not null,
   ID_CLI_EMP           int not null auto_increment,
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_EMPRESA, ID_CLIENTE, ID_CLI_EMP),
   key AK_KID_CLI_EMP (ID_CLI_EMP)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_OBLIGACION                                */
/*==============================================================*/
create table AUD_CLIENTE_OBLIGACION
(
   ID_CLIENTE           int not null,
   ID_PERIODO           int not null,
   ID_OBLIGACION        int not null,
   ID_CLI_OBL           int not null auto_increment,
   primary key (ID_PERIODO, ID_CLIENTE, ID_OBLIGACION, ID_CLI_OBL),
   key AK_KID_CLI_OBL (ID_CLI_OBL)
);

/*==============================================================*/
/* Table: AUD_CLIENTE_REGIMEN                                   */
/*==============================================================*/
create table AUD_CLIENTE_REGIMEN
(
   ID_CLIENTE           int not null,
   ID_REGIMEN           int not null,
   ID_CLI_REG           int not null auto_increment,
   ESTADO_REG           varchar(50),
   ESTADO               varchar(50),
   USER_REG             varchar(350),
   FECHA_REG            timestamp,
   FECHA_MOD            timestamp,
   USER_MOD             varchar(350),
   primary key (ID_CLIENTE, ID_REGIMEN, ID_CLI_REG),
   key AK_KID_CLI_REG (ID_CLI_REG)
);

/*==============================================================*/
/* Table: AUD_DIRECCION                                         */
/*==============================================================*/
create table AUD_DIRECCION
(
   ID_CLIENTE           int not null,
   ID_DIRECCION         int not null auto_increment,
   DIRECCION            varchar(500),
   ZONA                 varchar(500),
   BARRIO               varchar(500),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   _DEFAULT            char(1),
   primary key (ID_CLIENTE, ID_DIRECCION),
   key AK_KID_DIRECCION (ID_DIRECCION)
);

/*==============================================================*/
/* Table: AUD_EMPRESA                                           */
/*==============================================================*/
create table AUD_EMPRESA
(
   ID_EMPRESA           int not null auto_increment,
   NOMBRE               varchar(500),
   SIGLA                varchar(50),
   TELEFONO_FIJO        varchar(250),
   TELEFONO_CEL         varchar(250),
   PAGINA_WEB           varchar(350),
   EMAIL                varchar(350),
   RESPONSABLE          varchar(500),
   CI                   varchar(50),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   FECHA_MOD            timestamp,
   USER_MOD             varchar(350),
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   NIT                  varchar(50),
   LOGO                 varchar(500),
   primary key (ID_EMPRESA)
);

/*==============================================================*/
/* Table: AUD_OBLIGACION_TRIBUTARIA                             */
/*==============================================================*/
create table AUD_OBLIGACION_TRIBUTARIA
(
   ID_PERIODO           int not null,
   ID_OBLIGACION        int not null auto_increment,
   NOMBRE_SIN           varchar(500),
   DESCRIPCION          varchar(500),
   PERIODO              int,
   USER_REG             varchar(350),
   FECHA_REG            timestamp,
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_PERIODO, ID_OBLIGACION),
   key AK_KID_OBLIGACION (ID_OBLIGACION)
);

/*==============================================================*/
/* Table: AUD_PAIS                                              */
/*==============================================================*/
create table AUD_PAIS
(
   ID_PAIS              int not null auto_increment,
   PAIS                 varchar(250),
   BANDERA              varchar(500),
   CODIGO_PAIS          varchar(50),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_PAIS)
);

/*==============================================================*/
/* Table: AUD_PERIODO                                           */
/*==============================================================*/
create table AUD_PERIODO
(
   ID_PERIODO           int not null auto_increment,
   PERIODO              int,
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   CODIGO_PERIODO       varchar(50),
   primary key (ID_PERIODO)
);

/*==============================================================*/
/* Table: AUD_REGIMEN                                           */
/*==============================================================*/
create table AUD_REGIMEN
(
   ID_REGIMEN           int not null auto_increment,
   REGIMEN              varchar(500),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_REGIMEN)
);

/*==============================================================*/
/* Table: AUD_REG_ACTIVIDAD                                     */
/*==============================================================*/
create table AUD_REG_ACTIVIDAD
(
   ID                   int not null auto_increment,
   CODIGO_ACTIVIDAD     varchar(50),
   FECHA_REGISTRO       date,
   PERIODO_VENCIMIENTO_DIAS int,
   NIT                  varchar(50),
   ESTADO               varchar(50),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO_REG           varchar(50),
   primary key (ID)
);

/*==============================================================*/
/* Table: AUD_SOCIEDAD                                          */
/*==============================================================*/
create table AUD_SOCIEDAD
(
   ID_SOCIEDAD          int not null auto_increment,
   ID_CLIENTE           int,
   SOCIEDAD             varchar(550),
   ESTADO_REG           varchar(50),
   ESTADO               varchar(50),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   CODIGO_SOCIEDAD      varchar(50),
   primary key (ID_SOCIEDAD)
);

/*==============================================================*/
/* Table: AUD_TELEFONO                                          */
/*==============================================================*/
create table AUD_TELEFONO
(
   ID_CLIENTE           int not null,
   ID_TELEFONO          int not null auto_increment,
   TELEFONO             varchar(50),
   TIPO                 varchar(50),
   _DEFAULT            char(1),
   FECHA_REG            timestamp,
   USER_REG             varchar(350),
   USER_MOD             varchar(350),
   FECHA_MOD            timestamp,
   ESTADO               varchar(50),
   ESTADO_REG           varchar(50),
   primary key (ID_CLIENTE, ID_TELEFONO),
   key AK_KID_TELEFONO (ID_TELEFONO)
);

alter table AUD_ACTIVIDAD add constraint FK_R1 foreign key (ID_CLI_ACT)
      references AUD_CLIENTE_ACTIVIDAD (ID_CLI_ACT) on delete restrict on update restrict;

alter table AUD_CIUDAD add constraint FK_R10 foreign key (ID_PAIS)
      references AUD_PAIS (ID_PAIS) on delete restrict on update restrict;

alter table AUD_CLIENTE add constraint FK_R4 foreign key (ID_SOCIEDAD)
      references AUD_SOCIEDAD (ID_SOCIEDAD) on delete restrict on update restrict;

alter table AUD_CLIENTE add constraint FK_R9 foreign key (ID_PAIS, ID_CIUDAD)
      references AUD_CIUDAD (ID_PAIS, ID_CIUDAD) on delete restrict on update restrict;

alter table AUD_CLIENTE_ACTIVIDAD add constraint FK_R2 foreign key (ID_ACTIVIDAD)
      references AUD_ACTIVIDAD (ID_ACTIVIDAD) on delete restrict on update restrict;

alter table AUD_CLIENTE_ACTIVIDAD add constraint FK_R8 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_ARCHIVO add constraint FK_R17 foreign key (ID_ARCHIVO)
      references AUD_ARCHIVO (ID_ARCHIVO) on delete restrict on update restrict;

alter table AUD_CLIENTE_ARCHIVO add constraint FK_R18 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_CERTIFICADO add constraint FK_R14 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_CERTIFICADO add constraint FK_R19 foreign key (ID_CERTIFICADO)
      references AUD_CERTIFICADOS (ID_CERTIFICADO) on delete restrict on update restrict;

alter table AUD_CLIENTE_EMPRESA add constraint FK_R11 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_EMPRESA add constraint FK_R12 foreign key (ID_EMPRESA)
      references AUD_EMPRESA (ID_EMPRESA) on delete restrict on update restrict;

alter table AUD_CLIENTE_OBLIGACION add constraint FK_R13 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_OBLIGACION add constraint FK_R20 foreign key (ID_PERIODO, ID_OBLIGACION)
      references AUD_OBLIGACION_TRIBUTARIA (ID_PERIODO, ID_OBLIGACION) on delete restrict on update restrict;

alter table AUD_CLIENTE_REGIMEN add constraint FK_R15 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_CLIENTE_REGIMEN add constraint FK_R16 foreign key (ID_REGIMEN)
      references AUD_REGIMEN (ID_REGIMEN) on delete restrict on update restrict;

alter table AUD_DIRECCION add constraint FK_R3 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_OBLIGACION_TRIBUTARIA add constraint FK_R6 foreign key (ID_PERIODO)
      references AUD_PERIODO (ID_PERIODO) on delete restrict on update restrict;

alter table AUD_SOCIEDAD add constraint FK_R7 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table AUD_TELEFONO add constraint FK_R5 foreign key (ID_CLIENTE)
      references AUD_CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

