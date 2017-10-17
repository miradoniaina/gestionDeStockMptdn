--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: gestion_stock_flux_materiel; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE gestion_stock_flux_materiel WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';


ALTER DATABASE gestion_stock_flux_materiel OWNER TO postgres;

\connect gestion_stock_flux_materiel

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: code_barre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE code_barre (
    id_code_barre integer NOT NULL,
    id_materiel integer,
    id_sous_mvt_stock integer NOT NULL,
    ref_code_barre character varying(100)
);


ALTER TABLE code_barre OWNER TO postgres;

--
-- Name: code_barre_id_code_barre_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE code_barre_id_code_barre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE code_barre_id_code_barre_seq OWNER TO postgres;

--
-- Name: code_barre_id_code_barre_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE code_barre_id_code_barre_seq OWNED BY code_barre.id_code_barre;


--
-- Name: departement; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departement (
    id_departement integer NOT NULL,
    departement character varying(50)
);


ALTER TABLE departement OWNER TO postgres;

--
-- Name: departement_id_departement_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE departement_id_departement_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE departement_id_departement_seq OWNER TO postgres;

--
-- Name: departement_id_departement_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE departement_id_departement_seq OWNED BY departement.id_departement;


--
-- Name: detail_transfert; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE detail_transfert (
    id_detail_transfert integer NOT NULL,
    id_transfert integer NOT NULL,
    id_materiel integer NOT NULL,
    quantite double precision
);


ALTER TABLE detail_transfert OWNER TO postgres;

--
-- Name: detail_transfert_id_detail_transfert_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detail_transfert_id_detail_transfert_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detail_transfert_id_detail_transfert_seq OWNER TO postgres;

--
-- Name: detail_transfert_id_detail_transfert_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE detail_transfert_id_detail_transfert_seq OWNED BY detail_transfert.id_detail_transfert;


--
-- Name: direction; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE direction (
    id_direction integer NOT NULL,
    id_departement integer,
    nom_direction character varying(75)
);


ALTER TABLE direction OWNER TO postgres;

--
-- Name: direction_id_direction_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE direction_id_direction_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE direction_id_direction_seq OWNER TO postgres;

--
-- Name: direction_id_direction_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE direction_id_direction_seq OWNED BY direction.id_direction;


--
-- Name: famille; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE famille (
    id_famille integer NOT NULL,
    famille character varying(25)
);


ALTER TABLE famille OWNER TO postgres;

--
-- Name: famille_id_famille_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE famille_id_famille_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE famille_id_famille_seq OWNER TO postgres;

--
-- Name: famille_id_famille_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE famille_id_famille_seq OWNED BY famille.id_famille;


--
-- Name: fournisseur; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE fournisseur (
    id_fournisseur integer NOT NULL,
    societe character varying(75),
    sigle character varying(50),
    web character varying(50),
    adresse character varying(50),
    code character varying(25),
    nom character varying(50),
    prenom character varying(50),
    poste character varying(75),
    contact character varying(50),
    mail character varying(50)
);


ALTER TABLE fournisseur OWNER TO postgres;

--
-- Name: fournisseur_id_fournisseur_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE fournisseur_id_fournisseur_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE fournisseur_id_fournisseur_seq OWNER TO postgres;

--
-- Name: fournisseur_id_fournisseur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE fournisseur_id_fournisseur_seq OWNED BY fournisseur.id_fournisseur;


--
-- Name: listes_references; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE listes_references (
    id_reference integer NOT NULL,
    id_detail_transfert integer,
    reference character varying(50)
);


ALTER TABLE listes_references OWNER TO postgres;

--
-- Name: listes_references_id_reference_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE listes_references_id_reference_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE listes_references_id_reference_seq OWNER TO postgres;

--
-- Name: listes_references_id_reference_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE listes_references_id_reference_seq OWNED BY listes_references.id_reference;


--
-- Name: listes_references_retour; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE listes_references_retour (
    id_reference_retour integer NOT NULL,
    id_sous_retour integer NOT NULL,
    reference character varying(50)
);


ALTER TABLE listes_references_retour OWNER TO postgres;

--
-- Name: listes_references_retour_id_reference_retour_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE listes_references_retour_id_reference_retour_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE listes_references_retour_id_reference_retour_seq OWNER TO postgres;

--
-- Name: listes_references_retour_id_reference_retour_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE listes_references_retour_id_reference_retour_seq OWNED BY listes_references_retour.id_reference_retour;


--
-- Name: materiel; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materiel (
    id_materiel integer NOT NULL,
    id_unite integer NOT NULL,
    id_famille integer NOT NULL,
    reference_materiel character varying(50),
    designation character varying(150),
    details_materiel text,
    image character varying(50)
);


ALTER TABLE materiel OWNER TO postgres;

--
-- Name: materiel_id_materiel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE materiel_id_materiel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE materiel_id_materiel_seq OWNER TO postgres;

--
-- Name: materiel_id_materiel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE materiel_id_materiel_seq OWNED BY materiel.id_materiel;


--
-- Name: unite; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE unite (
    id_unite integer NOT NULL,
    unite character varying(100)
);


ALTER TABLE unite OWNER TO postgres;

--
-- Name: materiel_unite_view; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW materiel_unite_view AS
 SELECT m.id_materiel,
    m.id_unite,
    m.id_famille,
    m.reference_materiel,
    m.designation,
    m.details_materiel,
    m.image,
    u.unite
   FROM (materiel m
     JOIN unite u ON ((m.id_unite = u.id_unite)));


ALTER TABLE materiel_unite_view OWNER TO postgres;

--
-- Name: mvt_stock; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mvt_stock (
    id_mvt_stock integer NOT NULL,
    id_sortie_interne integer,
    id_personnel integer NOT NULL,
    type character varying(10),
    date_mvt timestamp without time zone,
    commentaire text
);


ALTER TABLE mvt_stock OWNER TO postgres;

--
-- Name: mvt_stock_id_mvt_stock_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mvt_stock_id_mvt_stock_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mvt_stock_id_mvt_stock_seq OWNER TO postgres;

--
-- Name: mvt_stock_id_mvt_stock_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE mvt_stock_id_mvt_stock_seq OWNED BY mvt_stock.id_mvt_stock;


--
-- Name: sous_mvt_de_stock; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sous_mvt_de_stock (
    id_sous_mvt_stock integer NOT NULL,
    id_materiel integer NOT NULL,
    id_fournisseur integer,
    id_mvt_stock integer NOT NULL,
    quantite double precision
);


ALTER TABLE sous_mvt_de_stock OWNER TO postgres;

--
-- Name: mvt_stock_materiel_view; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW mvt_stock_materiel_view AS
 SELECT mvt_stock.id_sous_mvt_stock,
    mvt_stock.id_materiel,
    mvt_stock.id_fournisseur,
    mvt_stock.id_mvt_stock,
    mvt_stock.quantite,
    m.designation
   FROM (sous_mvt_de_stock mvt_stock
     JOIN materiel m ON ((m.id_materiel = mvt_stock.id_materiel)));


ALTER TABLE mvt_stock_materiel_view OWNER TO postgres;

--
-- Name: personnel; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personnel (
    id_personnel integer NOT NULL,
    id_service integer NOT NULL,
    id_role_personnel integer NOT NULL,
    id_porte integer NOT NULL,
    matricule character varying(25),
    nom character varying(50),
    prenom character varying(50),
    contact character varying(50),
    email character varying(50),
    mdp character varying(255),
    detenteur character varying(25),
    poste character varying(75),
    salt character(22),
    profil character varying(75)
);


ALTER TABLE personnel OWNER TO postgres;

--
-- Name: personnel_id_personnel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE personnel_id_personnel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE personnel_id_personnel_seq OWNER TO postgres;

--
-- Name: personnel_id_personnel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE personnel_id_personnel_seq OWNED BY personnel.id_personnel;


--
-- Name: porte; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE porte (
    id_porte integer NOT NULL,
    id_direction integer,
    numero character varying(20)
);


ALTER TABLE porte OWNER TO postgres;

--
-- Name: porte_id_porte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE porte_id_porte_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE porte_id_porte_seq OWNER TO postgres;

--
-- Name: porte_id_porte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE porte_id_porte_seq OWNED BY porte.id_porte;


--
-- Name: references_sorties; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE references_sorties (
    id_references_sorties integer NOT NULL,
    id_sortie_interne integer NOT NULL,
    reference_sortie character varying(100)
);


ALTER TABLE references_sorties OWNER TO postgres;

--
-- Name: references_sorties_id_references_sorties_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE references_sorties_id_references_sorties_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE references_sorties_id_references_sorties_seq OWNER TO postgres;

--
-- Name: references_sorties_id_references_sorties_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE references_sorties_id_references_sorties_seq OWNED BY references_sorties.id_references_sorties;


--
-- Name: retour_materiel; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE retour_materiel (
    id_retour_materiel integer NOT NULL,
    id_personnel integer NOT NULL,
    date_retour timestamp without time zone,
    commentaire text
);


ALTER TABLE retour_materiel OWNER TO postgres;

--
-- Name: retour_materiel_id_retour_materiel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE retour_materiel_id_retour_materiel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE retour_materiel_id_retour_materiel_seq OWNER TO postgres;

--
-- Name: retour_materiel_id_retour_materiel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE retour_materiel_id_retour_materiel_seq OWNED BY retour_materiel.id_retour_materiel;


--
-- Name: role; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE role (
    id_role_personnel integer NOT NULL,
    role character varying(25)
);


ALTER TABLE role OWNER TO postgres;

--
-- Name: role_id_role_personnel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE role_id_role_personnel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE role_id_role_personnel_seq OWNER TO postgres;

--
-- Name: role_id_role_personnel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE role_id_role_personnel_seq OWNED BY role.id_role_personnel;


--
-- Name: services; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE services (
    id_service integer NOT NULL,
    id_departement integer,
    id_direction integer,
    service character varying(100)
);


ALTER TABLE services OWNER TO postgres;

--
-- Name: services_id_service_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE services_id_service_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE services_id_service_seq OWNER TO postgres;

--
-- Name: services_id_service_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE services_id_service_seq OWNED BY services.id_service;


--
-- Name: sortie_detenteurs; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sortie_detenteurs (
    id_sortie_interne integer NOT NULL,
    id_personnel integer NOT NULL
);


ALTER TABLE sortie_detenteurs OWNER TO postgres;

--
-- Name: sortie_usage_interne; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sortie_usage_interne (
    id_sortie_interne integer NOT NULL,
    id_mvt_stock integer NOT NULL,
    id_porte integer NOT NULL
);


ALTER TABLE sortie_usage_interne OWNER TO postgres;

--
-- Name: sortie_usage_interne_id_sortie_interne_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sortie_usage_interne_id_sortie_interne_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sortie_usage_interne_id_sortie_interne_seq OWNER TO postgres;

--
-- Name: sortie_usage_interne_id_sortie_interne_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE sortie_usage_interne_id_sortie_interne_seq OWNED BY sortie_usage_interne.id_sortie_interne;


--
-- Name: sous_mvt_de_stock_id_sous_mvt_stock_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sous_mvt_de_stock_id_sous_mvt_stock_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sous_mvt_de_stock_id_sous_mvt_stock_seq OWNER TO postgres;

--
-- Name: sous_mvt_de_stock_id_sous_mvt_stock_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE sous_mvt_de_stock_id_sous_mvt_stock_seq OWNED BY sous_mvt_de_stock.id_sous_mvt_stock;


--
-- Name: sous_retour; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sous_retour (
    id_sous_retour integer NOT NULL,
    id_retour_materiel integer NOT NULL,
    id_detail_transfert integer NOT NULL,
    quantite double precision
);


ALTER TABLE sous_retour OWNER TO postgres;

--
-- Name: sous_retour_id_sous_retour_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sous_retour_id_sous_retour_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sous_retour_id_sous_retour_seq OWNER TO postgres;

--
-- Name: sous_retour_id_sous_retour_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE sous_retour_id_sous_retour_seq OWNED BY sous_retour.id_sous_retour;


--
-- Name: transfert; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE transfert (
    id_transfert integer NOT NULL,
    id_personnel integer NOT NULL,
    transfert character varying(25),
    type character varying(10),
    date_transfert timestamp without time zone,
    date_recuperation timestamp without time zone,
    porte_source integer,
    porte_dest integer,
    commentaire text
);


ALTER TABLE transfert OWNER TO postgres;

--
-- Name: transfert_id_transfert_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE transfert_id_transfert_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE transfert_id_transfert_seq OWNER TO postgres;

--
-- Name: transfert_id_transfert_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE transfert_id_transfert_seq OWNED BY transfert.id_transfert;


--
-- Name: unite_id_unite_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE unite_id_unite_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE unite_id_unite_seq OWNER TO postgres;

--
-- Name: unite_id_unite_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE unite_id_unite_seq OWNED BY unite.id_unite;


--
-- Name: id_code_barre; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY code_barre ALTER COLUMN id_code_barre SET DEFAULT nextval('code_barre_id_code_barre_seq'::regclass);


--
-- Name: id_departement; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departement ALTER COLUMN id_departement SET DEFAULT nextval('departement_id_departement_seq'::regclass);


--
-- Name: id_detail_transfert; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detail_transfert ALTER COLUMN id_detail_transfert SET DEFAULT nextval('detail_transfert_id_detail_transfert_seq'::regclass);


--
-- Name: id_direction; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY direction ALTER COLUMN id_direction SET DEFAULT nextval('direction_id_direction_seq'::regclass);


--
-- Name: id_famille; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY famille ALTER COLUMN id_famille SET DEFAULT nextval('famille_id_famille_seq'::regclass);


--
-- Name: id_fournisseur; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY fournisseur ALTER COLUMN id_fournisseur SET DEFAULT nextval('fournisseur_id_fournisseur_seq'::regclass);


--
-- Name: id_reference; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY listes_references ALTER COLUMN id_reference SET DEFAULT nextval('listes_references_id_reference_seq'::regclass);


--
-- Name: id_reference_retour; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY listes_references_retour ALTER COLUMN id_reference_retour SET DEFAULT nextval('listes_references_retour_id_reference_retour_seq'::regclass);


--
-- Name: id_materiel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiel ALTER COLUMN id_materiel SET DEFAULT nextval('materiel_id_materiel_seq'::regclass);


--
-- Name: id_mvt_stock; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mvt_stock ALTER COLUMN id_mvt_stock SET DEFAULT nextval('mvt_stock_id_mvt_stock_seq'::regclass);


--
-- Name: id_personnel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personnel ALTER COLUMN id_personnel SET DEFAULT nextval('personnel_id_personnel_seq'::regclass);


--
-- Name: id_porte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY porte ALTER COLUMN id_porte SET DEFAULT nextval('porte_id_porte_seq'::regclass);


--
-- Name: id_references_sorties; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY references_sorties ALTER COLUMN id_references_sorties SET DEFAULT nextval('references_sorties_id_references_sorties_seq'::regclass);


--
-- Name: id_retour_materiel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY retour_materiel ALTER COLUMN id_retour_materiel SET DEFAULT nextval('retour_materiel_id_retour_materiel_seq'::regclass);


--
-- Name: id_role_personnel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role ALTER COLUMN id_role_personnel SET DEFAULT nextval('role_id_role_personnel_seq'::regclass);


--
-- Name: id_service; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY services ALTER COLUMN id_service SET DEFAULT nextval('services_id_service_seq'::regclass);


--
-- Name: id_sortie_interne; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sortie_usage_interne ALTER COLUMN id_sortie_interne SET DEFAULT nextval('sortie_usage_interne_id_sortie_interne_seq'::regclass);


--
-- Name: id_sous_mvt_stock; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_mvt_de_stock ALTER COLUMN id_sous_mvt_stock SET DEFAULT nextval('sous_mvt_de_stock_id_sous_mvt_stock_seq'::regclass);


--
-- Name: id_sous_retour; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_retour ALTER COLUMN id_sous_retour SET DEFAULT nextval('sous_retour_id_sous_retour_seq'::regclass);


--
-- Name: id_transfert; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY transfert ALTER COLUMN id_transfert SET DEFAULT nextval('transfert_id_transfert_seq'::regclass);


--
-- Name: id_unite; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY unite ALTER COLUMN id_unite SET DEFAULT nextval('unite_id_unite_seq'::regclass);


--
-- Data for Name: code_barre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY code_barre (id_code_barre, id_materiel, id_sous_mvt_stock, ref_code_barre) FROM stdin;
17	14	25	refmarqueur-17
18	14	25	refmarqueur-18
19	14	25	refmarqueur-19
20	14	25	refmarqueur-20
21	14	25	refmarqueur-21
22	14	25	refmarqueur-22
23	14	25	refmarqueur-23
24	14	25	refmarqueur-24
25	14	25	refmarqueur-25
26	14	25	refmarqueur-26
27	9	26	refcartoucheimprimantecanon-27
28	9	26	refcartoucheimprimantecanon-28
29	9	26	refcartoucheimprimantecanon-29
30	9	26	refcartoucheimprimantecanon-30
31	6	27	refarmoire2p1-31
32	6	27	refarmoire2p1-32
33	6	27	refarmoire2p1-33
34	6	27	refarmoire2p1-34
35	10	28	reftonersbrohtertn2320-35
36	10	28	reftonersbrohtertn2320-36
37	10	28	reftonersbrohtertn2320-37
38	10	28	reftonersbrohtertn2320-38
39	10	28	reftonersbrohtertn2320-39
40	10	28	reftonersbrohtertn2320-40
41	9	29	refcartoucheimprimantecanon-41
42	9	29	refcartoucheimprimantecanon-42
43	9	29	refcartoucheimprimantecanon-43
44	9	29	refcartoucheimprimantecanon-44
45	9	29	refcartoucheimprimantecanon-45
46	9	29	refcartoucheimprimantecanon-46
47	9	29	refcartoucheimprimantecanon-47
\.


--
-- Name: code_barre_id_code_barre_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('code_barre_id_code_barre_seq', 47, true);


--
-- Data for Name: departement; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY departement (id_departement, departement) FROM stdin;
1	DGDN
2	DGO
3	Cabinet
4	SG
\.


--
-- Name: departement_id_departement_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('departement_id_departement_seq', 5, false);


--
-- Data for Name: detail_transfert; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY detail_transfert (id_detail_transfert, id_transfert, id_materiel, quantite) FROM stdin;
\.


--
-- Name: detail_transfert_id_detail_transfert_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detail_transfert_id_detail_transfert_seq', 13, true);


--
-- Data for Name: direction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY direction (id_direction, id_departement, nom_direction) FROM stdin;
1	\N	Logistique et Patrimoine
2	1	Juridique
3	1	Gouvernance du numérique
4	1	Projets et du Partenariat
5	1	Ecosystème et de l'intégration du numérique
6	2	Vulgarisation des TIC
7	2	Suivi Technique
8	2	Systèmes d'information
9	2	Communication
10	\N	Direction Administrative et Financière
11	4	Affaire Générales
\.


--
-- Name: direction_id_direction_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('direction_id_direction_seq', 12, false);


--
-- Data for Name: famille; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY famille (id_famille, famille) FROM stdin;
1	Consommable de bureau
2	Produit Informatique
3	Consommable informatique
4	Meubles
\.


--
-- Name: famille_id_famille_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('famille_id_famille_seq', 5, false);


--
-- Data for Name: fournisseur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY fournisseur (id_fournisseur, societe, sigle, web, adresse, code, nom, prenom, poste, contact, mail) FROM stdin;
1	Mass'in			Lot IV andravoahangy		RAKOTOMASS	masy	Vendeur	034 46 566 65	massin@gmail.com
2	Optimus			Lot V Behoririka		RAKOTOPTIM	mus	Directeur	033 47 566 55	optimus@gmail.com
3	It-tech			Lot VIII Behoririka		RAKOTOTECH	Hasina	Agent commerciaux	033 44 566 55	hasina@gmail.com
4	Elech-tech			Lot X Behoririka		RABETEKA	Tovo	Vendeur	033 44 800 55	tovo@gmail.com
\.


--
-- Name: fournisseur_id_fournisseur_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('fournisseur_id_fournisseur_seq', 5, false);


--
-- Data for Name: listes_references; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY listes_references (id_reference, id_detail_transfert, reference) FROM stdin;
\.


--
-- Name: listes_references_id_reference_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('listes_references_id_reference_seq', 16, true);


--
-- Data for Name: listes_references_retour; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY listes_references_retour (id_reference_retour, id_sous_retour, reference) FROM stdin;
\.


--
-- Name: listes_references_retour_id_reference_retour_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('listes_references_retour_id_reference_retour_seq', 21, true);


--
-- Data for Name: materiel; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materiel (id_materiel, id_unite, id_famille, reference_materiel, designation, details_materiel, image) FROM stdin;
9	1	3	refcartoucheimprimantecanon	Canon PG-545 + CL-546-Multipack (Couleur et Noir)	La cartouche Canon PG-545 est le gage d'une qualité d'impression optimale quelle que soit l'utilisation de votre imprimante : texte, photo ou document. La cartouche Canon CL-546 contient des encres de couleur cyan, magenta et jaune pour vous permettre d'imprimer des documents et photos couleurs.\n\nPrincipales caractéristiques :\nType d'imprimante : Jet d'encre\nCanon PG-545 : Cartouche d'encre noire, contenance ; 8 mL (jusqu'à 180 pages en A4)\nCanon CL-546 : Trois couleurs (cyan, magenta, jaune), contenance de 8 mL (jusqu'à 180 pages en A4)	encre_canon.jpg
10	1	3	reftonersbrohtertn2320	Multipack toners compatibles Brother TN-2320 (noir)	Caractéristiques principales : \nNombre de pages : 2600 x 3\nColoris : Noir\nToner compatible avec les imprimantes suivantes (liste non-exhaustive) : DCP-L2500D, DCP-L2520D, DCP-L2520DW, DCP-L2540DN, DCP-L2540DW, DCP-L2541DW, DCP-L2560DW, HL-L2300D, HL-L2305DW, HL-L2320D, HL-L2321D, HL-L2340DW, HL-L2360DN, HL-L2360DW, HL-L2361DN, HL-L2365DW, HL-L2366DW, HL-L2380DW, MFC-L2700D, MFC-L2700DW, MFC-L2701D, MFC-L2701DW, MFC-L2703DW, MFC-L2720DW, MFC-L2740DW	tonertn-2320.jpg
11	4	3	refpapierA4	Papier extra-blanc Clairalfa - 80 g - A4 - ramette de 500 feuilles	Papier extra-blanc Clairalfa A4 80 g.\nRamette de 500 feuilles de papier Clairalfa de Clairefontaine.\nFormat 21 x 29,7 cm (A4), grammage 80 g.\nPapier au toucher satin idéal pour vos impressions couleurs de textes et de graphiques. Son velouté et sa planeité donnent à vos présentations un caractère net et soigné.\nImpressions laser couleur et jet d'encre couleur.\nExtra-blancheur 170 CIE.\nPapier labellisé PEFC (gestion durable des forêts)\nCaractéristiques éco-responsable :\nPEFC	papierA4.jpg
12	1	1	refstylos4couleurs	BIC 4 Couleurs Shine Stylos-Bille - Corps Métalliques Assortis, Blister de 2+1		bic4couleurs.jpg
13	1	1	refscotchrubanadhesif	SCOTCH Ruban adhésif transparent 550 19 mm x 33 m, Sous film	3M Scotch Ruban adhésif transparent 550, 19 mm x 33 m, filmdiamètre du mandrin: 25 mm, grande puissance d'adhésionemballé individuellement dans un film vide(5501933FL)	scotch-ruban-adhesif.jpg
14	1	1	refmarqueur	BIC Marking Fine ECOlutions Marqueur Permanent - Noir, Blister de 1	Les marqueurs indélébiles BIC Marking s'utilisent sur tout type de surface : verre, métal, papier enduit, photos, plastique, CD\nLongue vie au marqueur indélébile à encre noire : il écrit 1km et peut rester décapuchonné un mois sans sécher.\nSa pointe fine en ogive permet un tracé précis et maîtrisé. Elle est bloquée pour résister à la pression lors de son utilisation\nSon encre est optimale : elle possède une faible odeur, sèche rapidement, et offre une bonne résistance à la lumière\nÉco-conçu, ce feutre indélébile est fabriqué en France avec 51% de matière recyclée (à l'exclusion de son système d'encre). Bravo BIC	marqueur-bic.jpg
1	1	4	refbureaumalgapan	bureau malgapan trois tiroirs couleur marron foncé		bureau-malgapan-3-marron-fonce.jpg
2	1	4	refbureaumalgapan2	table malgapan PM 3 tiroirs couleur marron		bureau-malgapan-pm-3-tiroirs.JPG
3	1	4	reftableordinateur1	table ordinateur couleur Jaune		table-ordi-jaune.jpg
4	1	4	reftableordinateur2	table ordinateur couleur Beige PM		table-ordi-beige.jpg
5	1	4	refarmoire2p	armoire 2 portes couleur  marron claire		armoire-2-porte.jpg
6	1	4	refarmoire2p1	classeur de rangement 3 étage couleur gris		classeur-3-etage-gris.jpg
7	1	4	reffautteuil	fauteuil avec accoudoir cuir noir		fauteuil-accoudoir-noir.jpg
8	1	4	refchaise	chaise en cuir noir  avec accoudoir		chaise-accoudoir-noir.jpg
\.


--
-- Name: materiel_id_materiel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('materiel_id_materiel_seq', 9, false);


--
-- Data for Name: mvt_stock; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY mvt_stock (id_mvt_stock, id_sortie_interne, id_personnel, type, date_mvt, commentaire) FROM stdin;
27	\N	2	entrée	2017-01-03 05:07:00	enregistrement bureautique 03-1-2017
28	\N	2	entrée	2017-02-08 05:47:00	insertion 2017
29	\N	3	entrée	2017-02-14 05:49:00	entrée mulitipack
30	\N	3	entrée	2017-04-04 05:51:00	Consommable informatique
33	\N	2	sortie	2017-09-29 06:35:00	sortie usage interne
34	\N	2	sortie	2017-09-29 06:39:00	projet 153
35	\N	2	sortie	2017-09-29 06:41:00	Projet l'ALPHA
36	\N	2	sortie	2017-09-29 06:42:00	Projet Encre imprimante
70	\N	3	sortie	0300-02-16 00:00:00	commentaire
92	\N	3	sortie	2017-10-03 00:00:00	commentairesdfsf
93	\N	3	sortie	2017-10-04 00:00:00	projet omega
96	\N	3	sortie	2017-02-03 00:00:00	commentairessdfee
\.


--
-- Name: mvt_stock_id_mvt_stock_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mvt_stock_id_mvt_stock_seq', 96, true);


--
-- Data for Name: personnel; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY personnel (id_personnel, id_service, id_role_personnel, id_porte, matricule, nom, prenom, contact, email, mdp, detenteur, poste, salt, profil) FROM stdin;
3	26	1	3	375 309	RANDRIAMAHEFA	Ainarijaona Rado	033 01 694 68	rado@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq		Assitant DSI	s1s2s3s5s4s8s6s5s3s2s6	picture2.jpg
2	18	3	3	293 875	SAHOLINIRINA	Felicité	034 02 191 22	felicite@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq		Secretaire DVTIC	s1s2s3s5s4s8s6s5s3s2s6	picture.jpg
1	29	3	3	339 708	ANDRIAMANANJARA	Noronirina Lalaina	034 02 792 17	noronirina@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq		Assistante DGO	s1s2s3s5s4s8s6s5s3s2s6	img.jpg
4	32	3	5	293 806	RAVELOARISOA	Juliette		juliette@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq		Assitant	s1s2s3s5s4s8s6s5s3s2s6	picture3.jpg
5	31	3	5	376 639	Linah Harizo	Nantenaina		harizo@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq		Gestionnaire	s1s2s3s5s4s8s6s5s3s2s6	picture5.png
6	31	3	5	375 757	RAVAKA	Julie		ravaka@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq			s1s2s3s5s4s8s6s5s3s2s6	picture6.png
7	32	3	6	3 923	RANDRIAMISAINA	Hanitriniala Tantelinjatovo		tantely@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq			s1s2s3s5s4s8s6s5s3s2s6	picture6.png
8	32	3	6	3 065	RAKOTOZAFY	Bodonavalona		bodo@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq			s1s2s3s5s4s8s6s5s3s2s6	picture7.png
9	32	3	6	3 045	RANDRIANAVALONA	Jean Claude		claude@gmail.com	$2y$10$s1s2s3s5s4s8s6s5s3s2supIrU1OdPZJ/jpgLnUeIGbTzC8oUgINq			s1s2s3s5s4s8s6s5s3s2s6	picture8.png
\.


--
-- Name: personnel_id_personnel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('personnel_id_personnel_seq', 10, false);


--
-- Data for Name: porte; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY porte (id_porte, id_direction, numero) FROM stdin;
1	8	116
2	8	116 bis
3	\N	117
4	9	204
5	10	107
6	10	106
7	11	112
\.


--
-- Name: porte_id_porte_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('porte_id_porte_seq', 8, false);


--
-- Data for Name: references_sorties; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY references_sorties (id_references_sorties, id_sortie_interne, reference_sortie) FROM stdin;
38	13	refcartoucheimprimantecanon-11
\.


--
-- Name: references_sorties_id_references_sorties_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('references_sorties_id_references_sorties_seq', 38, true);


--
-- Data for Name: retour_materiel; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY retour_materiel (id_retour_materiel, id_personnel, date_retour, commentaire) FROM stdin;
\.


--
-- Name: retour_materiel_id_retour_materiel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('retour_materiel_id_retour_materiel_seq', 11, true);


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY role (id_role_personnel, role) FROM stdin;
1	super-admin
2	admin
3	chef de département
4	simple employé
\.


--
-- Name: role_id_role_personnel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('role_id_role_personnel_seq', 5, false);


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY services (id_service, id_departement, id_direction, service) FROM stdin;
1	\N	1	Service Patrimoine
2	\N	1	Service Logistique
3	\N	1	Service Comptabilité Matières
6	\N	2	Service législation
7	\N	2	Service Contentieux
8	\N	2	Service Environnement
9	\N	3	Service Planification et Coordination
10	\N	3	Service Orientation Technique
11	\N	3	Service des Usages et des contenus numériques
12	\N	4	Service Etude et conception
13	\N	4	Service Partenariat Public Privé
14	\N	4	Service Relation Extérieure
15	\N	5	Service appropriation
16	\N	5	Service Base des données
17	\N	5	Service Statistique
18	\N	6	Service Production des contenues
19	\N	6	Service Suivi des projets
20	\N	6	Service d'appui interne
21	\N	7	Service Développement des Infrastructures
22	\N	7	Service Suivi des Travaux
23	\N	7	Service Traitement et Analyse
24	\N	8	Service Veille Technologique
25	\N	8	Service Coordination E-gouvernance
26	\N	8	Service Développement des Applicatifs
27	\N	9	Service Communication Interne
28	\N	9	Service Information Education et Communication
29	\N	9	Service Relation Publique
30	\N	10	Service Programmation,Suivi, Evaluation
31	\N	10	Service Comptabilité
32	\N	10	Service Appui à l'Exécution budgétaire
\.


--
-- Name: services_id_service_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('services_id_service_seq', 33, false);


--
-- Data for Name: sortie_detenteurs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sortie_detenteurs (id_sortie_interne, id_personnel) FROM stdin;
12	3
12	2
13	2
13	1
\.


--
-- Data for Name: sortie_usage_interne; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sortie_usage_interne (id_sortie_interne, id_mvt_stock, id_porte) FROM stdin;
12	33	1
13	96	1
\.


--
-- Name: sortie_usage_interne_id_sortie_interne_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sortie_usage_interne_id_sortie_interne_seq', 13, true);


--
-- Data for Name: sous_mvt_de_stock; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sous_mvt_de_stock (id_sous_mvt_stock, id_materiel, id_fournisseur, id_mvt_stock, quantite) FROM stdin;
25	14	\N	27	10
26	9	\N	27	4
27	6	\N	28	4
28	10	\N	29	6
29	9	\N	30	7
30	6	\N	33	2
64	9	\N	92	1
65	9	\N	93	1
66	9	\N	96	1
\.


--
-- Name: sous_mvt_de_stock_id_sous_mvt_stock_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sous_mvt_de_stock_id_sous_mvt_stock_seq', 66, true);


--
-- Data for Name: sous_retour; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sous_retour (id_sous_retour, id_retour_materiel, id_detail_transfert, quantite) FROM stdin;
\.


--
-- Name: sous_retour_id_sous_retour_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sous_retour_id_sous_retour_seq', 8, true);


--
-- Data for Name: transfert; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY transfert (id_transfert, id_personnel, transfert, type, date_transfert, date_recuperation, porte_source, porte_dest, commentaire) FROM stdin;
\.


--
-- Name: transfert_id_transfert_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('transfert_id_transfert_seq', 15, true);


--
-- Data for Name: unite; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY unite (id_unite, unite) FROM stdin;
1	nombre(s)
2	pièce(s)
3	litre(s)
4	packet(s)
5	carton(s)
6	unité(s)
\.


--
-- Name: unite_id_unite_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('unite_id_unite_seq', 7, false);


--
-- Name: pk_code_barre; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY code_barre
    ADD CONSTRAINT pk_code_barre PRIMARY KEY (id_code_barre);


--
-- Name: pk_departement; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departement
    ADD CONSTRAINT pk_departement PRIMARY KEY (id_departement);


--
-- Name: pk_detail_transfert; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY detail_transfert
    ADD CONSTRAINT pk_detail_transfert PRIMARY KEY (id_detail_transfert);


--
-- Name: pk_direction; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY direction
    ADD CONSTRAINT pk_direction PRIMARY KEY (id_direction);


--
-- Name: pk_famille; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY famille
    ADD CONSTRAINT pk_famille PRIMARY KEY (id_famille);


--
-- Name: pk_fournisseur; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY fournisseur
    ADD CONSTRAINT pk_fournisseur PRIMARY KEY (id_fournisseur);


--
-- Name: pk_listes_references; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY listes_references
    ADD CONSTRAINT pk_listes_references PRIMARY KEY (id_reference);


--
-- Name: pk_listes_references_retour; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY listes_references_retour
    ADD CONSTRAINT pk_listes_references_retour PRIMARY KEY (id_reference_retour);


--
-- Name: pk_materiel; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materiel
    ADD CONSTRAINT pk_materiel PRIMARY KEY (id_materiel);


--
-- Name: pk_mvt_stock; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mvt_stock
    ADD CONSTRAINT pk_mvt_stock PRIMARY KEY (id_mvt_stock);


--
-- Name: pk_personnel; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personnel
    ADD CONSTRAINT pk_personnel PRIMARY KEY (id_personnel);


--
-- Name: pk_porte; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY porte
    ADD CONSTRAINT pk_porte PRIMARY KEY (id_porte);


--
-- Name: pk_references_sorties; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY references_sorties
    ADD CONSTRAINT pk_references_sorties PRIMARY KEY (id_references_sorties);


--
-- Name: pk_retour_materiel; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY retour_materiel
    ADD CONSTRAINT pk_retour_materiel PRIMARY KEY (id_retour_materiel);


--
-- Name: pk_role; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY role
    ADD CONSTRAINT pk_role PRIMARY KEY (id_role_personnel);


--
-- Name: pk_services; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY services
    ADD CONSTRAINT pk_services PRIMARY KEY (id_service);


--
-- Name: pk_sortie_detenteurs; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sortie_detenteurs
    ADD CONSTRAINT pk_sortie_detenteurs PRIMARY KEY (id_sortie_interne, id_personnel);


--
-- Name: pk_sortie_usage_interne; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sortie_usage_interne
    ADD CONSTRAINT pk_sortie_usage_interne PRIMARY KEY (id_sortie_interne);


--
-- Name: pk_sous_mvt_de_stock; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sous_mvt_de_stock
    ADD CONSTRAINT pk_sous_mvt_de_stock PRIMARY KEY (id_sous_mvt_stock);


--
-- Name: pk_sous_retour; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sous_retour
    ADD CONSTRAINT pk_sous_retour PRIMARY KEY (id_sous_retour);


--
-- Name: pk_transfert; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY transfert
    ADD CONSTRAINT pk_transfert PRIMARY KEY (id_transfert);


--
-- Name: pk_unite; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY unite
    ADD CONSTRAINT pk_unite PRIMARY KEY (id_unite);


--
-- Name: code_barre_materiel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX code_barre_materiel_fk ON code_barre USING btree (id_materiel);


--
-- Name: code_barre_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX code_barre_pk ON code_barre USING btree (id_code_barre);


--
-- Name: departement_direction_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX departement_direction_fk ON direction USING btree (id_departement);


--
-- Name: departement_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX departement_pk ON departement USING btree (id_departement);


--
-- Name: detail_sous_retour_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX detail_sous_retour_fk ON sous_retour USING btree (id_detail_transfert);


--
-- Name: detail_transfert_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX detail_transfert_pk ON detail_transfert USING btree (id_detail_transfert);


--
-- Name: direction_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX direction_pk ON direction USING btree (id_direction);


--
-- Name: entree_fournisseur_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX entree_fournisseur_fk ON sous_mvt_de_stock USING btree (id_fournisseur);


--
-- Name: famille_materiel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX famille_materiel_fk ON materiel USING btree (id_famille);


--
-- Name: famille_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX famille_pk ON famille USING btree (id_famille);


--
-- Name: flux_materiel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX flux_materiel_fk ON detail_transfert USING btree (id_materiel);


--
-- Name: fournisseur_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX fournisseur_pk ON fournisseur USING btree (id_fournisseur);


--
-- Name: listes_references_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX listes_references_fk ON listes_references USING btree (id_detail_transfert);


--
-- Name: listes_references_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX listes_references_pk ON listes_references USING btree (id_reference);


--
-- Name: listes_references_retour_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX listes_references_retour_pk ON listes_references_retour USING btree (id_reference_retour);


--
-- Name: materiel_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX materiel_pk ON materiel USING btree (id_materiel);


--
-- Name: materiel_unite_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX materiel_unite_fk ON materiel USING btree (id_unite);


--
-- Name: mvt_code_barre_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX mvt_code_barre_fk ON code_barre USING btree (id_sous_mvt_stock);


--
-- Name: mvt_materiel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX mvt_materiel_fk ON sous_mvt_de_stock USING btree (id_materiel);


--
-- Name: mvt_stock_personnel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX mvt_stock_personnel_fk ON mvt_stock USING btree (id_personnel);


--
-- Name: mvt_stock_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX mvt_stock_pk ON mvt_stock USING btree (id_mvt_stock);


--
-- Name: mvt_stock_sous_mvt_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX mvt_stock_sous_mvt_fk ON sous_mvt_de_stock USING btree (id_mvt_stock);


--
-- Name: personnel_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX personnel_pk ON personnel USING btree (id_personnel);


--
-- Name: personnel_porte_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX personnel_porte_fk ON personnel USING btree (id_porte);


--
-- Name: personnel_retour_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX personnel_retour_fk ON retour_materiel USING btree (id_personnel);


--
-- Name: personnel_service_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX personnel_service_fk ON personnel USING btree (id_service);


--
-- Name: porte_direction_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX porte_direction_fk ON porte USING btree (id_direction);


--
-- Name: porte_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX porte_pk ON porte USING btree (id_porte);


--
-- Name: references_sorties_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX references_sorties_pk ON references_sorties USING btree (id_references_sorties);


--
-- Name: retour_materiel_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX retour_materiel_pk ON retour_materiel USING btree (id_retour_materiel);


--
-- Name: retour_sous_retour_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX retour_sous_retour_fk ON sous_retour USING btree (id_retour_materiel);


--
-- Name: role_personnel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX role_personnel_fk ON personnel USING btree (id_role_personnel);


--
-- Name: role_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX role_pk ON role USING btree (id_role_personnel);


--
-- Name: service_departement_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX service_departement_fk ON services USING btree (id_departement);


--
-- Name: service_direction_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX service_direction_fk ON services USING btree (id_direction);


--
-- Name: services_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX services_pk ON services USING btree (id_service);


--
-- Name: sorte_porte_interne_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sorte_porte_interne_fk ON sortie_usage_interne USING btree (id_porte);


--
-- Name: sortie_detenteurs2_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sortie_detenteurs2_fk ON sortie_detenteurs USING btree (id_personnel);


--
-- Name: sortie_detenteurs_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sortie_detenteurs_fk ON sortie_detenteurs USING btree (id_sortie_interne);


--
-- Name: sortie_detenteurs_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX sortie_detenteurs_pk ON sortie_detenteurs USING btree (id_sortie_interne, id_personnel);


--
-- Name: sortie_interne2_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sortie_interne2_fk ON mvt_stock USING btree (id_sortie_interne);


--
-- Name: sortie_interne_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sortie_interne_fk ON sortie_usage_interne USING btree (id_mvt_stock);


--
-- Name: sortie_usage_interne_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX sortie_usage_interne_pk ON sortie_usage_interne USING btree (id_sortie_interne);


--
-- Name: sorties_references_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sorties_references_fk ON references_sorties USING btree (id_sortie_interne);


--
-- Name: sous_mvt_de_stock_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX sous_mvt_de_stock_pk ON sous_mvt_de_stock USING btree (id_sous_mvt_stock);


--
-- Name: sous_retour_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX sous_retour_pk ON sous_retour USING btree (id_sous_retour);


--
-- Name: sous_retour_references_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX sous_retour_references_fk ON listes_references_retour USING btree (id_sous_retour);


--
-- Name: transfert_detail_transfert_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX transfert_detail_transfert_fk ON detail_transfert USING btree (id_transfert);


--
-- Name: transfert_personnel_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX transfert_personnel_fk ON transfert USING btree (id_personnel);


--
-- Name: transfert_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX transfert_pk ON transfert USING btree (id_transfert);


--
-- Name: unite_pk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE UNIQUE INDEX unite_pk ON unite USING btree (id_unite);


--
-- Name: fk_code_bar_code_barr_materiel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY code_barre
    ADD CONSTRAINT fk_code_bar_code_barr_materiel FOREIGN KEY (id_materiel) REFERENCES materiel(id_materiel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_code_bar_mvt_code__sous_mvt; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY code_barre
    ADD CONSTRAINT fk_code_bar_mvt_code__sous_mvt FOREIGN KEY (id_sous_mvt_stock) REFERENCES sous_mvt_de_stock(id_sous_mvt_stock) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_detail_t_flux_mate_materiel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detail_transfert
    ADD CONSTRAINT fk_detail_t_flux_mate_materiel FOREIGN KEY (id_materiel) REFERENCES materiel(id_materiel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_detail_t_transfert_transfer; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detail_transfert
    ADD CONSTRAINT fk_detail_t_transfert_transfer FOREIGN KEY (id_transfert) REFERENCES transfert(id_transfert) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_directio_departeme_departem; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY direction
    ADD CONSTRAINT fk_directio_departeme_departem FOREIGN KEY (id_departement) REFERENCES departement(id_departement) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_listes_r_listes_re_detail_t; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY listes_references
    ADD CONSTRAINT fk_listes_r_listes_re_detail_t FOREIGN KEY (id_detail_transfert) REFERENCES detail_transfert(id_detail_transfert) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_listes_r_sous_reto_sous_ret; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY listes_references_retour
    ADD CONSTRAINT fk_listes_r_sous_reto_sous_ret FOREIGN KEY (id_sous_retour) REFERENCES sous_retour(id_sous_retour) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_materiel_famille_m_famille; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiel
    ADD CONSTRAINT fk_materiel_famille_m_famille FOREIGN KEY (id_famille) REFERENCES famille(id_famille) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_materiel_materiel__unite; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiel
    ADD CONSTRAINT fk_materiel_materiel__unite FOREIGN KEY (id_unite) REFERENCES unite(id_unite) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_mvt_stoc_mvt_stock_personne; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mvt_stock
    ADD CONSTRAINT fk_mvt_stoc_mvt_stock_personne FOREIGN KEY (id_personnel) REFERENCES personnel(id_personnel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_mvt_stoc_sortie_in_sortie_u; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mvt_stock
    ADD CONSTRAINT fk_mvt_stoc_sortie_in_sortie_u FOREIGN KEY (id_sortie_interne) REFERENCES sortie_usage_interne(id_sortie_interne) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_personne_personnel_porte; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personnel
    ADD CONSTRAINT fk_personne_personnel_porte FOREIGN KEY (id_porte) REFERENCES porte(id_porte) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_personne_personnel_services; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personnel
    ADD CONSTRAINT fk_personne_personnel_services FOREIGN KEY (id_service) REFERENCES services(id_service) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_personne_role_pers_role; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personnel
    ADD CONSTRAINT fk_personne_role_pers_role FOREIGN KEY (id_role_personnel) REFERENCES role(id_role_personnel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_porte_porte_dir_directio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY porte
    ADD CONSTRAINT fk_porte_porte_dir_directio FOREIGN KEY (id_direction) REFERENCES direction(id_direction) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_referenc_sorties_r_sortie_u; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY references_sorties
    ADD CONSTRAINT fk_referenc_sorties_r_sortie_u FOREIGN KEY (id_sortie_interne) REFERENCES sortie_usage_interne(id_sortie_interne) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_retour_m_personnel_personne; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY retour_materiel
    ADD CONSTRAINT fk_retour_m_personnel_personne FOREIGN KEY (id_personnel) REFERENCES personnel(id_personnel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_services_service_d_departem; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY services
    ADD CONSTRAINT fk_services_service_d_departem FOREIGN KEY (id_departement) REFERENCES departement(id_departement) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_services_service_d_directio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY services
    ADD CONSTRAINT fk_services_service_d_directio FOREIGN KEY (id_direction) REFERENCES direction(id_direction) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sortie_d_sortie_de_personne; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sortie_detenteurs
    ADD CONSTRAINT fk_sortie_d_sortie_de_personne FOREIGN KEY (id_personnel) REFERENCES personnel(id_personnel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sortie_d_sortie_de_sortie_u; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sortie_detenteurs
    ADD CONSTRAINT fk_sortie_d_sortie_de_sortie_u FOREIGN KEY (id_sortie_interne) REFERENCES sortie_usage_interne(id_sortie_interne) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sortie_u_sorte_por_porte; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sortie_usage_interne
    ADD CONSTRAINT fk_sortie_u_sorte_por_porte FOREIGN KEY (id_porte) REFERENCES porte(id_porte) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sortie_u_sortie_in_mvt_stoc; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sortie_usage_interne
    ADD CONSTRAINT fk_sortie_u_sortie_in_mvt_stoc FOREIGN KEY (id_mvt_stock) REFERENCES mvt_stock(id_mvt_stock) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sous_mvt_entree_fo_fourniss; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_mvt_de_stock
    ADD CONSTRAINT fk_sous_mvt_entree_fo_fourniss FOREIGN KEY (id_fournisseur) REFERENCES fournisseur(id_fournisseur) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sous_mvt_mvt_mater_materiel; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_mvt_de_stock
    ADD CONSTRAINT fk_sous_mvt_mvt_mater_materiel FOREIGN KEY (id_materiel) REFERENCES materiel(id_materiel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sous_mvt_mvt_stock_mvt_stoc; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_mvt_de_stock
    ADD CONSTRAINT fk_sous_mvt_mvt_stock_mvt_stoc FOREIGN KEY (id_mvt_stock) REFERENCES mvt_stock(id_mvt_stock) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sous_ret_detail_so_detail_t; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_retour
    ADD CONSTRAINT fk_sous_ret_detail_so_detail_t FOREIGN KEY (id_detail_transfert) REFERENCES detail_transfert(id_detail_transfert) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_sous_ret_retour_so_retour_m; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_retour
    ADD CONSTRAINT fk_sous_ret_retour_so_retour_m FOREIGN KEY (id_retour_materiel) REFERENCES retour_materiel(id_retour_materiel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: fk_transfer_transfert_personne; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY transfert
    ADD CONSTRAINT fk_transfer_transfert_personne FOREIGN KEY (id_personnel) REFERENCES personnel(id_personnel) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: smvt_stock_constraint; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY sous_mvt_de_stock
    ADD CONSTRAINT smvt_stock_constraint FOREIGN KEY (id_mvt_stock) REFERENCES mvt_stock(id_mvt_stock) ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

