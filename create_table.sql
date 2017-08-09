/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     09/08/2017 10:15:03                          */
/*==============================================================*/


drop index MVT_CODE_BARRE_FK;

drop index CODE_BARRE_MATERIEL_FK;

drop index CODE_BARRE_PK;

drop table CODE_BARRE;

drop index DEPARTEMENT_PK;

drop table DEPARTEMENT;

drop index TRANSFERT_DETAIL_TRANSFERT_FK;

drop index FLUX_MATERIEL_FK;

drop index DETAIL_TRANSFERT_PK;

drop table DETAIL_TRANSFERT;

drop index DEPARTEMENT_DIRECTION_FK;

drop index DIRECTION_PK;

drop table DIRECTION;

drop index FAMILLE_PK;

drop table FAMILLE;

drop index FOURNISSEUR_PK;

drop table FOURNISSEUR;

drop index LISTES_REFERENCES_FK;

drop index LISTES_REFERENCES_PK;

drop table LISTES_REFERENCES;

drop index SOUS_RETOUR_REFERENCES_FK;

drop index LISTES_REFERENCES_RETOUR_PK;

drop table LISTES_REFERENCES_RETOUR;

drop index FAMILLE_MATERIEL_FK;

drop index MATERIEL_UNITE_FK;

drop index MATERIEL_PK;

drop table MATERIEL;

drop index SORTIE_INTERNE2_FK;

drop index ENTREE_FOURNISSEUR_FK;

drop index MVT_MATERIEL_FK;

drop index MVT_DE_STOCK_PK;

drop table MVT_DE_STOCK;

drop index PERSONNEL_SERVICE_FK;

drop index PERSONNEL_PORTE_FK;

drop index ROLE_PERSONNEL_FK;

drop index PERSONNEL_PK;

drop table PERSONNEL;

drop index PORTE_DIRECTION_FK;

drop index PORTE_PK;

drop table PORTE;

drop index SORTIES_REFERENCES_FK;

drop index REFERENCES_SORTIES_PK;

drop table REFERENCES_SORTIES;

drop index PERSONNEL_RETOUR_FK;

drop index RETOUR_MATERIEL_PK;

drop table RETOUR_MATERIEL;

drop index ROLE_PK;

drop table ROLE;

drop index SERVICE_DEPARTEMENT_FK;

drop index SERVICE_DIRECTION_FK;

drop index SERVICES_PK;

drop table SERVICES;

drop index SORTIE_DETENTEURS2_FK;

drop index SORTIE_DETENTEURS_FK;

drop index SORTIE_DETENTEURS_PK;

drop table SORTIE_DETENTEURS;

drop index SORTE_PORTE_INTERNE_FK;

drop index SORTIE_INTERNE_FK;

drop index SORTIE_MATERIEL_INTERNE_FK;

drop index SORTIE_USAGE_INTERNE_PK;

drop table SORTIE_USAGE_INTERNE;

drop index RETOUR_SOUS_RETOUR_FK;

drop index DETAIL_SOUS_RETOUR_FK;

drop index SOUS_RETOUR_PK;

drop table SOUS_RETOUR;

drop index TRANSFERT_PERSONNEL_FK;

drop index TRANSFERT_PK;

drop table TRANSFERT;

drop index UNITE_PK;

drop table UNITE;

/*==============================================================*/
/* Table: CODE_BARRE                                            */
/*==============================================================*/
create table CODE_BARRE (
   ID_CODE_BARRE        SERIAL               not null,
   ID_MATERIEL          INT4                 null,
   ID_MVT_STOCK         INT4                 not null,
   REF_CODE_BARRE       VARCHAR(100)         null,
   constraint PK_CODE_BARRE primary key (ID_CODE_BARRE)
);

/*==============================================================*/
/* Index: CODE_BARRE_PK                                         */
/*==============================================================*/
create unique index CODE_BARRE_PK on CODE_BARRE (
ID_CODE_BARRE
);

/*==============================================================*/
/* Index: CODE_BARRE_MATERIEL_FK                                */
/*==============================================================*/
create  index CODE_BARRE_MATERIEL_FK on CODE_BARRE (
ID_MATERIEL
);

/*==============================================================*/
/* Index: MVT_CODE_BARRE_FK                                     */
/*==============================================================*/
create  index MVT_CODE_BARRE_FK on CODE_BARRE (
ID_MVT_STOCK
);

/*==============================================================*/
/* Table: DEPARTEMENT                                           */
/*==============================================================*/
create table DEPARTEMENT (
   ID_DEPARTEMENT       SERIAL               not null,
   DEPARTEMENT          VARCHAR(50)          null,
   constraint PK_DEPARTEMENT primary key (ID_DEPARTEMENT)
);

/*==============================================================*/
/* Index: DEPARTEMENT_PK                                        */
/*==============================================================*/
create unique index DEPARTEMENT_PK on DEPARTEMENT (
ID_DEPARTEMENT
);

/*==============================================================*/
/* Table: DETAIL_TRANSFERT                                      */
/*==============================================================*/
create table DETAIL_TRANSFERT (
   ID_DETAIL_TRANSFERT  SERIAL               not null,
   ID_TRANSFERT         INT4                 not null,
   ID_MATERIEL          INT4                 not null,
   TRANSFERT            VARCHAR(25)          null,
   TYPE                 VARCHAR(10)          null,
   DATE_RECUPERATION    DATE                 null,
   PORTE_SOURCE         INT4                 null,
   PORTE_DEST           INT4                 null,
   QUANTITE             FLOAT8               null,
   constraint PK_DETAIL_TRANSFERT primary key (ID_DETAIL_TRANSFERT)
);

/*==============================================================*/
/* Index: DETAIL_TRANSFERT_PK                                   */
/*==============================================================*/
create unique index DETAIL_TRANSFERT_PK on DETAIL_TRANSFERT (
ID_DETAIL_TRANSFERT
);

/*==============================================================*/
/* Index: FLUX_MATERIEL_FK                                      */
/*==============================================================*/
create  index FLUX_MATERIEL_FK on DETAIL_TRANSFERT (
ID_MATERIEL
);

/*==============================================================*/
/* Index: TRANSFERT_DETAIL_TRANSFERT_FK                         */
/*==============================================================*/
create  index TRANSFERT_DETAIL_TRANSFERT_FK on DETAIL_TRANSFERT (
ID_TRANSFERT
);

/*==============================================================*/
/* Table: DIRECTION                                             */
/*==============================================================*/
create table DIRECTION (
   ID_DIRECTION         SERIAL               not null,
   ID_DEPARTEMENT       INT4                 null,
   NOM_DIRECTION        VARCHAR(75)          null,
   constraint PK_DIRECTION primary key (ID_DIRECTION)
);

/*==============================================================*/
/* Index: DIRECTION_PK                                          */
/*==============================================================*/
create unique index DIRECTION_PK on DIRECTION (
ID_DIRECTION
);

/*==============================================================*/
/* Index: DEPARTEMENT_DIRECTION_FK                              */
/*==============================================================*/
create  index DEPARTEMENT_DIRECTION_FK on DIRECTION (
ID_DEPARTEMENT
);

/*==============================================================*/
/* Table: FAMILLE                                               */
/*==============================================================*/
create table FAMILLE (
   ID_FAMILLE           SERIAL               not null,
   FAMILLE              VARCHAR(25)          null,
   constraint PK_FAMILLE primary key (ID_FAMILLE)
);

/*==============================================================*/
/* Index: FAMILLE_PK                                            */
/*==============================================================*/
create unique index FAMILLE_PK on FAMILLE (
ID_FAMILLE
);

/*==============================================================*/
/* Table: FOURNISSEUR                                           */
/*==============================================================*/
create table FOURNISSEUR (
   ID_FOURNISSEUR       SERIAL               not null,
   SOCIETE              VARCHAR(75)          null,
   SIGLE                VARCHAR(50)          null,
   WEB                  VARCHAR(50)          null,
   ADRESSE              VARCHAR(50)          null,
   CODE                 VARCHAR(25)          null,
   NOM                  VARCHAR(50)          null,
   PRENOM               VARCHAR(50)          null,
   POSTE                VARCHAR(75)          null,
   CONTACT              VARCHAR(50)          null,
   MAIL                 VARCHAR(50)          null,
   constraint PK_FOURNISSEUR primary key (ID_FOURNISSEUR)
);

/*==============================================================*/
/* Index: FOURNISSEUR_PK                                        */
/*==============================================================*/
create unique index FOURNISSEUR_PK on FOURNISSEUR (
ID_FOURNISSEUR
);

/*==============================================================*/
/* Table: LISTES_REFERENCES                                     */
/*==============================================================*/
create table LISTES_REFERENCES (
   ID_REFERENCE         SERIAL               not null,
   ID_DETAIL_TRANSFERT  INT4                 null,
   REFERENCE            VARCHAR(50)          null,
   constraint PK_LISTES_REFERENCES primary key (ID_REFERENCE)
);

/*==============================================================*/
/* Index: LISTES_REFERENCES_PK                                  */
/*==============================================================*/
create unique index LISTES_REFERENCES_PK on LISTES_REFERENCES (
ID_REFERENCE
);

/*==============================================================*/
/* Index: LISTES_REFERENCES_FK                                  */
/*==============================================================*/
create  index LISTES_REFERENCES_FK on LISTES_REFERENCES (
ID_DETAIL_TRANSFERT
);

/*==============================================================*/
/* Table: LISTES_REFERENCES_RETOUR                              */
/*==============================================================*/
create table LISTES_REFERENCES_RETOUR (
   ID_REFERENCE_RETOUR  SERIAL               not null,
   ID_SOUS_RETOUR       INT4                 not null,
   REFERENCE            VARCHAR(50)          null,
   constraint PK_LISTES_REFERENCES_RETOUR primary key (ID_REFERENCE_RETOUR)
);

/*==============================================================*/
/* Index: LISTES_REFERENCES_RETOUR_PK                           */
/*==============================================================*/
create unique index LISTES_REFERENCES_RETOUR_PK on LISTES_REFERENCES_RETOUR (
ID_REFERENCE_RETOUR
);

/*==============================================================*/
/* Index: SOUS_RETOUR_REFERENCES_FK                             */
/*==============================================================*/
create  index SOUS_RETOUR_REFERENCES_FK on LISTES_REFERENCES_RETOUR (
ID_SOUS_RETOUR
);

/*==============================================================*/
/* Table: MATERIEL                                              */
/*==============================================================*/
create table MATERIEL (
   ID_MATERIEL          SERIAL               not null,
   ID_UNITE             INT4                 not null,
   ID_FAMILLE           INT4                 not null,
   REFERENCE_MATERIEL   VARCHAR(50)          null,
   DESIGNATION          VARCHAR(150)         null,
   DETAILS_MATERIEL     TEXT                 null,
   IMAGE                VARCHAR(50)          null,
   constraint PK_MATERIEL primary key (ID_MATERIEL)
);

/*==============================================================*/
/* Index: MATERIEL_PK                                           */
/*==============================================================*/
create unique index MATERIEL_PK on MATERIEL (
ID_MATERIEL
);

/*==============================================================*/
/* Index: MATERIEL_UNITE_FK                                     */
/*==============================================================*/
create  index MATERIEL_UNITE_FK on MATERIEL (
ID_UNITE
);

/*==============================================================*/
/* Index: FAMILLE_MATERIEL_FK                                   */
/*==============================================================*/
create  index FAMILLE_MATERIEL_FK on MATERIEL (
ID_FAMILLE
);

/*==============================================================*/
/* Table: MVT_DE_STOCK                                          */
/*==============================================================*/
create table MVT_DE_STOCK (
   ID_MVT_STOCK         SERIAL               not null,
   ID_MATERIEL          INT4                 not null,
   ID_SORTIE_INTERNE    INT4                 null,
   ID_FOURNISSEUR       INT4                 null,
   QUANTITE             FLOAT8               null,
   TYPE                 VARCHAR(10)          null,
   DATE_MVT             DATE                 null,
   COMMENTAIRE          TEXT                 null,
   constraint PK_MVT_DE_STOCK primary key (ID_MVT_STOCK)
);

/*==============================================================*/
/* Index: MVT_DE_STOCK_PK                                       */
/*==============================================================*/
create unique index MVT_DE_STOCK_PK on MVT_DE_STOCK (
ID_MVT_STOCK
);

/*==============================================================*/
/* Index: MVT_MATERIEL_FK                                       */
/*==============================================================*/
create  index MVT_MATERIEL_FK on MVT_DE_STOCK (
ID_MATERIEL
);

/*==============================================================*/
/* Index: ENTREE_FOURNISSEUR_FK                                 */
/*==============================================================*/
create  index ENTREE_FOURNISSEUR_FK on MVT_DE_STOCK (
ID_FOURNISSEUR
);

/*==============================================================*/
/* Index: SORTIE_INTERNE2_FK                                    */
/*==============================================================*/
create  index SORTIE_INTERNE2_FK on MVT_DE_STOCK (
ID_SORTIE_INTERNE
);

/*==============================================================*/
/* Table: PERSONNEL                                             */
/*==============================================================*/
create table PERSONNEL (
   ID_PERSONNEL         SERIAL               not null,
   ID_SERVICE           INT4                 not null,
   ID_ROLE_PERSONNEL    INT4                 not null,
   ID_PORTE             INT4                 not null,
   MATRICULE            VARCHAR(25)          null,
   NOM                  VARCHAR(50)          null,
   PRENOM               VARCHAR(50)          null,
   CONTACT              VARCHAR(50)          null,
   EMAIL                VARCHAR(50)          null,
   MDP                  VARCHAR(255)         null,
   DETENTEUR            VARCHAR(25)          null,
   POSTE                VARCHAR(75)          null,
   SALT                 CHAR(22)             null,
   constraint PK_PERSONNEL primary key (ID_PERSONNEL)
);

/*==============================================================*/
/* Index: PERSONNEL_PK                                          */
/*==============================================================*/
create unique index PERSONNEL_PK on PERSONNEL (
ID_PERSONNEL
);

/*==============================================================*/
/* Index: ROLE_PERSONNEL_FK                                     */
/*==============================================================*/
create  index ROLE_PERSONNEL_FK on PERSONNEL (
ID_ROLE_PERSONNEL
);

/*==============================================================*/
/* Index: PERSONNEL_PORTE_FK                                    */
/*==============================================================*/
create  index PERSONNEL_PORTE_FK on PERSONNEL (
ID_PORTE
);

/*==============================================================*/
/* Index: PERSONNEL_SERVICE_FK                                  */
/*==============================================================*/
create  index PERSONNEL_SERVICE_FK on PERSONNEL (
ID_SERVICE
);

/*==============================================================*/
/* Table: PORTE                                                 */
/*==============================================================*/
create table PORTE (
   ID_PORTE             SERIAL               not null,
   ID_DIRECTION         INT4                 null,
   NUMERO               VARCHAR(20)          null,
   constraint PK_PORTE primary key (ID_PORTE)
);

/*==============================================================*/
/* Index: PORTE_PK                                              */
/*==============================================================*/
create unique index PORTE_PK on PORTE (
ID_PORTE
);

/*==============================================================*/
/* Index: PORTE_DIRECTION_FK                                    */
/*==============================================================*/
create  index PORTE_DIRECTION_FK on PORTE (
ID_DIRECTION
);

/*==============================================================*/
/* Table: REFERENCES_SORTIES                                    */
/*==============================================================*/
create table REFERENCES_SORTIES (
   ID_REFERENCES_SORTIES SERIAL               not null,
   ID_SORTIE_INTERNE    INT4                 not null,
   REFERENCE_SORTIE     VARCHAR(100)         null,
   constraint PK_REFERENCES_SORTIES primary key (ID_REFERENCES_SORTIES)
);

/*==============================================================*/
/* Index: REFERENCES_SORTIES_PK                                 */
/*==============================================================*/
create unique index REFERENCES_SORTIES_PK on REFERENCES_SORTIES (
ID_REFERENCES_SORTIES
);

/*==============================================================*/
/* Index: SORTIES_REFERENCES_FK                                 */
/*==============================================================*/
create  index SORTIES_REFERENCES_FK on REFERENCES_SORTIES (
ID_SORTIE_INTERNE
);

/*==============================================================*/
/* Table: RETOUR_MATERIEL                                       */
/*==============================================================*/
create table RETOUR_MATERIEL (
   ID_RETOUR_MATERIEL   SERIAL               not null,
   ID_PERSONNEL         INT4                 not null,
   DATE_RETOUR          DATE                 null,
   COMMENTAIRE          TEXT                 null,
   constraint PK_RETOUR_MATERIEL primary key (ID_RETOUR_MATERIEL)
);

/*==============================================================*/
/* Index: RETOUR_MATERIEL_PK                                    */
/*==============================================================*/
create unique index RETOUR_MATERIEL_PK on RETOUR_MATERIEL (
ID_RETOUR_MATERIEL
);

/*==============================================================*/
/* Index: PERSONNEL_RETOUR_FK                                   */
/*==============================================================*/
create  index PERSONNEL_RETOUR_FK on RETOUR_MATERIEL (
ID_PERSONNEL
);

/*==============================================================*/
/* Table: ROLE                                                  */
/*==============================================================*/
create table ROLE (
   ID_ROLE_PERSONNEL    SERIAL               not null,
   ROLE                 VARCHAR(25)          null,
   constraint PK_ROLE primary key (ID_ROLE_PERSONNEL)
);

/*==============================================================*/
/* Index: ROLE_PK                                               */
/*==============================================================*/
create unique index ROLE_PK on ROLE (
ID_ROLE_PERSONNEL
);

/*==============================================================*/
/* Table: SERVICES                                              */
/*==============================================================*/
create table SERVICES (
   ID_SERVICE           SERIAL               not null,
   ID_DEPARTEMENT       INT4                 null,
   ID_DIRECTION         INT4                 null,
   SERVICE              VARCHAR(100)         null,
   constraint PK_SERVICES primary key (ID_SERVICE)
);

/*==============================================================*/
/* Index: SERVICES_PK                                           */
/*==============================================================*/
create unique index SERVICES_PK on SERVICES (
ID_SERVICE
);

/*==============================================================*/
/* Index: SERVICE_DIRECTION_FK                                  */
/*==============================================================*/
create  index SERVICE_DIRECTION_FK on SERVICES (
ID_DIRECTION
);

/*==============================================================*/
/* Index: SERVICE_DEPARTEMENT_FK                                */
/*==============================================================*/
create  index SERVICE_DEPARTEMENT_FK on SERVICES (
ID_DEPARTEMENT
);

/*==============================================================*/
/* Table: SORTIE_DETENTEURS                                     */
/*==============================================================*/
create table SORTIE_DETENTEURS (
   ID_SORTIE_INTERNE    INT4                 not null,
   ID_PERSONNEL         INT4                 not null,
   constraint PK_SORTIE_DETENTEURS primary key (ID_SORTIE_INTERNE, ID_PERSONNEL)
);

/*==============================================================*/
/* Index: SORTIE_DETENTEURS_PK                                  */
/*==============================================================*/
create unique index SORTIE_DETENTEURS_PK on SORTIE_DETENTEURS (
ID_SORTIE_INTERNE,
ID_PERSONNEL
);

/*==============================================================*/
/* Index: SORTIE_DETENTEURS_FK                                  */
/*==============================================================*/
create  index SORTIE_DETENTEURS_FK on SORTIE_DETENTEURS (
ID_SORTIE_INTERNE
);

/*==============================================================*/
/* Index: SORTIE_DETENTEURS2_FK                                 */
/*==============================================================*/
create  index SORTIE_DETENTEURS2_FK on SORTIE_DETENTEURS (
ID_PERSONNEL
);

/*==============================================================*/
/* Table: SORTIE_USAGE_INTERNE                                  */
/*==============================================================*/
create table SORTIE_USAGE_INTERNE (
   ID_SORTIE_INTERNE    SERIAL               not null,
   ID_MATERIEL          INT4                 not null,
   ID_MVT_STOCK         INT4                 not null,
   ID_PORTE             INT4                 not null,
   constraint PK_SORTIE_USAGE_INTERNE primary key (ID_SORTIE_INTERNE)
);

/*==============================================================*/
/* Index: SORTIE_USAGE_INTERNE_PK                               */
/*==============================================================*/
create unique index SORTIE_USAGE_INTERNE_PK on SORTIE_USAGE_INTERNE (
ID_SORTIE_INTERNE
);

/*==============================================================*/
/* Index: SORTIE_MATERIEL_INTERNE_FK                            */
/*==============================================================*/
create  index SORTIE_MATERIEL_INTERNE_FK on SORTIE_USAGE_INTERNE (
ID_MATERIEL
);

/*==============================================================*/
/* Index: SORTIE_INTERNE_FK                                     */
/*==============================================================*/
create  index SORTIE_INTERNE_FK on SORTIE_USAGE_INTERNE (
ID_MVT_STOCK
);

/*==============================================================*/
/* Index: SORTE_PORTE_INTERNE_FK                                */
/*==============================================================*/
create  index SORTE_PORTE_INTERNE_FK on SORTIE_USAGE_INTERNE (
ID_PORTE
);

/*==============================================================*/
/* Table: SOUS_RETOUR                                           */
/*==============================================================*/
create table SOUS_RETOUR (
   ID_SOUS_RETOUR       SERIAL               not null,
   ID_RETOUR_MATERIEL   INT4                 not null,
   ID_DETAIL_TRANSFERT  INT4                 not null,
   QUANTITE             FLOAT8               null,
   constraint PK_SOUS_RETOUR primary key (ID_SOUS_RETOUR)
);

/*==============================================================*/
/* Index: SOUS_RETOUR_PK                                        */
/*==============================================================*/
create unique index SOUS_RETOUR_PK on SOUS_RETOUR (
ID_SOUS_RETOUR
);

/*==============================================================*/
/* Index: DETAIL_SOUS_RETOUR_FK                                 */
/*==============================================================*/
create  index DETAIL_SOUS_RETOUR_FK on SOUS_RETOUR (
ID_DETAIL_TRANSFERT
);

/*==============================================================*/
/* Index: RETOUR_SOUS_RETOUR_FK                                 */
/*==============================================================*/
create  index RETOUR_SOUS_RETOUR_FK on SOUS_RETOUR (
ID_RETOUR_MATERIEL
);

/*==============================================================*/
/* Table: TRANSFERT                                             */
/*==============================================================*/
create table TRANSFERT (
   ID_TRANSFERT         SERIAL               not null,
   ID_PERSONNEL         INT4                 not null,
   DATE_TRANSFERT       DATE                 null,
   COMMENTAIRE          TEXT                 null,
   constraint PK_TRANSFERT primary key (ID_TRANSFERT)
);

/*==============================================================*/
/* Index: TRANSFERT_PK                                          */
/*==============================================================*/
create unique index TRANSFERT_PK on TRANSFERT (
ID_TRANSFERT
);

/*==============================================================*/
/* Index: TRANSFERT_PERSONNEL_FK                                */
/*==============================================================*/
create  index TRANSFERT_PERSONNEL_FK on TRANSFERT (
ID_PERSONNEL
);

/*==============================================================*/
/* Table: UNITE                                                 */
/*==============================================================*/
create table UNITE (
   ID_UNITE             SERIAL               not null,
   UNITE                VARCHAR(100)         null,
   constraint PK_UNITE primary key (ID_UNITE)
);

/*==============================================================*/
/* Index: UNITE_PK                                              */
/*==============================================================*/
create unique index UNITE_PK on UNITE (
ID_UNITE
);

alter table CODE_BARRE
   add constraint FK_CODE_BAR_CODE_BARR_MATERIEL foreign key (ID_MATERIEL)
      references MATERIEL (ID_MATERIEL)
      on delete restrict on update restrict;

alter table CODE_BARRE
   add constraint FK_CODE_BAR_MVT_CODE__MVT_DE_S foreign key (ID_MVT_STOCK)
      references MVT_DE_STOCK (ID_MVT_STOCK)
      on delete restrict on update restrict;

alter table DETAIL_TRANSFERT
   add constraint FK_DETAIL_T_FLUX_MATE_MATERIEL foreign key (ID_MATERIEL)
      references MATERIEL (ID_MATERIEL)
      on delete restrict on update restrict;

alter table DETAIL_TRANSFERT
   add constraint FK_DETAIL_T_TRANSFERT_TRANSFER foreign key (ID_TRANSFERT)
      references TRANSFERT (ID_TRANSFERT)
      on delete restrict on update restrict;

alter table DIRECTION
   add constraint FK_DIRECTIO_DEPARTEME_DEPARTEM foreign key (ID_DEPARTEMENT)
      references DEPARTEMENT (ID_DEPARTEMENT)
      on delete restrict on update restrict;

alter table LISTES_REFERENCES
   add constraint FK_LISTES_R_LISTES_RE_DETAIL_T foreign key (ID_DETAIL_TRANSFERT)
      references DETAIL_TRANSFERT (ID_DETAIL_TRANSFERT)
      on delete restrict on update restrict;

alter table LISTES_REFERENCES_RETOUR
   add constraint FK_LISTES_R_SOUS_RETO_SOUS_RET foreign key (ID_SOUS_RETOUR)
      references SOUS_RETOUR (ID_SOUS_RETOUR)
      on delete restrict on update restrict;

alter table MATERIEL
   add constraint FK_MATERIEL_FAMILLE_M_FAMILLE foreign key (ID_FAMILLE)
      references FAMILLE (ID_FAMILLE)
      on delete restrict on update restrict;

alter table MATERIEL
   add constraint FK_MATERIEL_MATERIEL__UNITE foreign key (ID_UNITE)
      references UNITE (ID_UNITE)
      on delete restrict on update restrict;

alter table MVT_DE_STOCK
   add constraint FK_MVT_DE_S_ENTREE_FO_FOURNISS foreign key (ID_FOURNISSEUR)
      references FOURNISSEUR (ID_FOURNISSEUR)
      on delete restrict on update restrict;

alter table MVT_DE_STOCK
   add constraint FK_MVT_DE_S_MVT_MATER_MATERIEL foreign key (ID_MATERIEL)
      references MATERIEL (ID_MATERIEL)
      on delete restrict on update restrict;

alter table MVT_DE_STOCK
   add constraint FK_MVT_DE_S_SORTIE_IN_SORTIE_U foreign key (ID_SORTIE_INTERNE)
      references SORTIE_USAGE_INTERNE (ID_SORTIE_INTERNE)
      on delete restrict on update restrict;

alter table PERSONNEL
   add constraint FK_PERSONNE_PERSONNEL_PORTE foreign key (ID_PORTE)
      references PORTE (ID_PORTE)
      on delete restrict on update restrict;

alter table PERSONNEL
   add constraint FK_PERSONNE_PERSONNEL_SERVICES foreign key (ID_SERVICE)
      references SERVICES (ID_SERVICE)
      on delete restrict on update restrict;

alter table PERSONNEL
   add constraint FK_PERSONNE_ROLE_PERS_ROLE foreign key (ID_ROLE_PERSONNEL)
      references ROLE (ID_ROLE_PERSONNEL)
      on delete restrict on update restrict;

alter table PORTE
   add constraint FK_PORTE_PORTE_DIR_DIRECTIO foreign key (ID_DIRECTION)
      references DIRECTION (ID_DIRECTION)
      on delete restrict on update restrict;

alter table REFERENCES_SORTIES
   add constraint FK_REFERENC_SORTIES_R_SORTIE_U foreign key (ID_SORTIE_INTERNE)
      references SORTIE_USAGE_INTERNE (ID_SORTIE_INTERNE)
      on delete restrict on update restrict;

alter table RETOUR_MATERIEL
   add constraint FK_RETOUR_M_PERSONNEL_PERSONNE foreign key (ID_PERSONNEL)
      references PERSONNEL (ID_PERSONNEL)
      on delete restrict on update restrict;

alter table SERVICES
   add constraint FK_SERVICES_SERVICE_D_DEPARTEM foreign key (ID_DEPARTEMENT)
      references DEPARTEMENT (ID_DEPARTEMENT)
      on delete restrict on update restrict;

alter table SERVICES
   add constraint FK_SERVICES_SERVICE_D_DIRECTIO foreign key (ID_DIRECTION)
      references DIRECTION (ID_DIRECTION)
      on delete restrict on update restrict;

alter table SORTIE_DETENTEURS
   add constraint FK_SORTIE_D_SORTIE_DE_SORTIE_U foreign key (ID_SORTIE_INTERNE)
      references SORTIE_USAGE_INTERNE (ID_SORTIE_INTERNE)
      on delete restrict on update restrict;

alter table SORTIE_DETENTEURS
   add constraint FK_SORTIE_D_SORTIE_DE_PERSONNE foreign key (ID_PERSONNEL)
      references PERSONNEL (ID_PERSONNEL)
      on delete restrict on update restrict;

alter table SORTIE_USAGE_INTERNE
   add constraint FK_SORTIE_U_SORTE_POR_PORTE foreign key (ID_PORTE)
      references PORTE (ID_PORTE)
      on delete restrict on update restrict;

alter table SORTIE_USAGE_INTERNE
   add constraint FK_SORTIE_U_SORTIE_IN_MVT_DE_S foreign key (ID_MVT_STOCK)
      references MVT_DE_STOCK (ID_MVT_STOCK)
      on delete restrict on update restrict;

alter table SORTIE_USAGE_INTERNE
   add constraint FK_SORTIE_U_SORTIE_MA_MATERIEL foreign key (ID_MATERIEL)
      references MATERIEL (ID_MATERIEL)
      on delete restrict on update restrict;

alter table SOUS_RETOUR
   add constraint FK_SOUS_RET_DETAIL_SO_DETAIL_T foreign key (ID_DETAIL_TRANSFERT)
      references DETAIL_TRANSFERT (ID_DETAIL_TRANSFERT)
      on delete restrict on update restrict;

alter table SOUS_RETOUR
   add constraint FK_SOUS_RET_RETOUR_SO_RETOUR_M foreign key (ID_RETOUR_MATERIEL)
      references RETOUR_MATERIEL (ID_RETOUR_MATERIEL)
      on delete restrict on update restrict;

alter table TRANSFERT
   add constraint FK_TRANSFER_TRANSFERT_PERSONNE foreign key (ID_PERSONNEL)
      references PERSONNEL (ID_PERSONNEL)
      on delete restrict on update restrict;

