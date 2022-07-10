--
-- PostgreSQL database dump
--

-- Dumped from database version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)

-- Started on 2022-07-10 17:15:45 -04

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3509 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 5 (class 2615 OID 57637)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 212 (class 1259 OID 57638)
-- Name: alicuota_iva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alicuota_iva (
    id_alicuota_iva integer NOT NULL,
    desc_alicuota_iva character varying(50) NOT NULL,
    desc_porcentaj character varying(50)
);


ALTER TABLE public.alicuota_iva OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 57641)
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alicuota_iva_id_alicuota_iva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alicuota_iva_id_alicuota_iva_seq OWNER TO postgres;

--
-- TOC entry 3510 (class 0 OID 0)
-- Dependencies: 213
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alicuota_iva_id_alicuota_iva_seq OWNED BY public.alicuota_iva.id_alicuota_iva;


--
-- TOC entry 241 (class 1259 OID 57745)
-- Name: banco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.banco (
    id_banco integer NOT NULL,
    codigo_b character varying(100),
    nombre_b character varying(100)
);


ALTER TABLE public.banco OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 57744)
-- Name: banco_id_banco_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.banco_id_banco_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.banco_id_banco_seq OWNER TO postgres;

--
-- TOC entry 3511 (class 0 OID 0)
-- Dependencies: 240
-- Name: banco_id_banco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.banco_id_banco_seq OWNED BY public.banco.id_banco;


--
-- TOC entry 214 (class 1259 OID 57642)
-- Name: buque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.buque (
    id integer NOT NULL,
    nombrebuque character varying(100),
    matricula character varying(30),
    trailer character varying(2),
    pies text,
    tipo character varying(20),
    color character varying(20),
    eslora character varying(100),
    manga character varying(100),
    puntal character varying(100),
    bruto character varying(100),
    neto character varying(100),
    canon character varying(100),
    tarifa integer,
    dia character varying(100),
    ubicacion character varying(100),
    fechaingreso timestamp without time zone,
    fecha_pago date,
    id_tarifa character varying(100)
);


ALTER TABLE public.buque OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 57647)
-- Name: buque_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.buque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.buque_id_seq OWNER TO postgres;

--
-- TOC entry 3512 (class 0 OID 0)
-- Dependencies: 215
-- Name: buque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.buque_id_seq OWNED BY public.buque.id;


--
-- TOC entry 216 (class 1259 OID 57648)
-- Name: deta_factura; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.deta_factura (
    id integer NOT NULL,
    matricula character varying(30),
    pies character varying(50),
    ob character varying(100),
    tarifa character varying(50),
    dia character varying(50),
    canon character varying(30),
    monto_estimado character varying(30),
    id_fact integer,
    id_tarifa integer
);


ALTER TABLE public.deta_factura OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 57651)
-- Name: deta_factura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.deta_factura_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.deta_factura_id_seq OWNER TO postgres;

--
-- TOC entry 3513 (class 0 OID 0)
-- Dependencies: 217
-- Name: deta_factura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.deta_factura_id_seq OWNED BY public.deta_factura.id;


--
-- TOC entry 211 (class 1259 OID 57359)
-- Name: deta_recibo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.deta_recibo (
    id integer NOT NULL,
    matricula text,
    pies character varying(50),
    ob character varying(100),
    tarifa character varying(50),
    dia character varying(50),
    canon character varying(100),
    monto_estimado character varying(100),
    totald character varying(100),
    totalb character varying(100),
    id_fact integer,
    id_tarifa integer
);


ALTER TABLE public.deta_recibo OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 57358)
-- Name: deta_recibo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.deta_recibo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.deta_recibo_id_seq OWNER TO postgres;

--
-- TOC entry 3514 (class 0 OID 0)
-- Dependencies: 210
-- Name: deta_recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.deta_recibo_id_seq OWNED BY public.deta_recibo.id;


--
-- TOC entry 218 (class 1259 OID 57652)
-- Name: dolar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dolar (
    id_dolar integer NOT NULL,
    desc_dolarc character varying(50) NOT NULL,
    desc_dolarp character varying(50) NOT NULL
);


ALTER TABLE public.dolar OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 57655)
-- Name: dolar_id_dolar_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dolar_id_dolar_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dolar_id_dolar_seq OWNER TO postgres;

--
-- TOC entry 3515 (class 0 OID 0)
-- Dependencies: 219
-- Name: dolar_id_dolar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dolar_id_dolar_seq OWNED BY public.dolar.id_dolar;


--
-- TOC entry 220 (class 1259 OID 57656)
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empresa (
    id integer NOT NULL,
    descripcion character varying(50) NOT NULL,
    rif character varying(10),
    fecha timestamp without time zone NOT NULL,
    fecha_update timestamp without time zone
);


ALTER TABLE public.empresa OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 57659)
-- Name: estatus; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estatus (
    id_status integer NOT NULL,
    descripcion character varying NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE public.estatus OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 57665)
-- Name: factura; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.factura (
    id integer NOT NULL,
    nro_factura character varying,
    nombre character varying(100),
    matricula character varying(30),
    tele_1 character varying(50),
    total_iva character varying(50),
    total_mas_iva character varying(50),
    total_bs character varying(50),
    fechaingreso date,
    id_status integer,
    fecha_update date,
    valor_iva character varying,
    cedula character varying(20),
    efectivo character varying(10),
    transferencia character varying(20),
    banco character varying(40),
    trnas character varying(20),
    fechatrnas text
);


ALTER TABLE public.factura OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 57670)
-- Name: factura_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.factura_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factura_id_seq OWNER TO postgres;

--
-- TOC entry 3516 (class 0 OID 0)
-- Dependencies: 223
-- Name: factura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.factura_id_seq OWNED BY public.factura.id;


--
-- TOC entry 224 (class 1259 OID 57671)
-- Name: mensualidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mensualidad (
    id_mensualidad integer NOT NULL,
    matricula character varying NOT NULL,
    pies character varying(100) NOT NULL,
    id_tarifa integer NOT NULL,
    tarifa character varying NOT NULL,
    dia integer NOT NULL,
    canon character varying(100) NOT NULL,
    fecha_deuda date NOT NULL,
    id_status integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL,
    id_factura integer
);


ALTER TABLE public.mensualidad OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 57677)
-- Name: mensualidad_id_mensualidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mensualidad_id_mensualidad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensualidad_id_mensualidad_seq OWNER TO postgres;

--
-- TOC entry 3517 (class 0 OID 0)
-- Dependencies: 225
-- Name: mensualidad_id_mensualidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mensualidad_id_mensualidad_seq OWNED BY public.mensualidad.id_mensualidad;


--
-- TOC entry 226 (class 1259 OID 57678)
-- Name: propiet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.propiet (
    id_propiet integer NOT NULL,
    cedula character varying(50),
    tipo_ced character varying(1),
    nombrecom character varying(250),
    tele_1 character varying(15),
    email character varying(50),
    tipo character varying(15),
    matricula character varying(50),
    id_buque integer
);


ALTER TABLE public.propiet OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 57689)
-- Name: propiet_id_propiet_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.propiet_id_propiet_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.propiet_id_propiet_seq OWNER TO postgres;

--
-- TOC entry 3518 (class 0 OID 0)
-- Dependencies: 228
-- Name: propiet_id_propiet_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.propiet_id_propiet_seq OWNED BY public.propiet.id_propiet;


--
-- TOC entry 243 (class 1259 OID 57795)
-- Name: recibo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.recibo (
    id integer NOT NULL,
    nombre character varying(100),
    matricula text,
    tele_1 character varying(15),
    fechaingreso date,
    nro_factura character varying(100),
    total_iva character varying(100),
    total_mas_iva character varying(100),
    total_bs character varying(100),
    id_status integer,
    fecha_update date,
    valor_iva character varying(100),
    cedula character varying(20),
    efectivo character varying(20),
    transferencia character varying(20),
    banco character varying(60),
    trnas character varying(15),
    fechatrnas character varying(15),
    id_fact integer
);


ALTER TABLE public.recibo OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 57794)
-- Name: recibo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.recibo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recibo_id_seq OWNER TO postgres;

--
-- TOC entry 3519 (class 0 OID 0)
-- Dependencies: 242
-- Name: recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recibo_id_seq OWNED BY public.recibo.id;


--
-- TOC entry 229 (class 1259 OID 57690)
-- Name: tarifa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tarifa (
    id_tarifa integer NOT NULL,
    desc_concepto character varying(100),
    desc_condicion character varying(100),
    desc_tarifa character varying(50),
    des_unidad character varying(10),
    fecha date
);


ALTER TABLE public.tarifa OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 57693)
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tarifa_id_tarifa_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tarifa_id_tarifa_seq OWNER TO postgres;

--
-- TOC entry 3520 (class 0 OID 0)
-- Dependencies: 230
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarifa_id_tarifa_seq OWNED BY public.tarifa.id_tarifa;


--
-- TOC entry 231 (class 1259 OID 57694)
-- Name: tipobarco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipobarco (
    id_tipobarco integer NOT NULL,
    desc_tipobarco character varying(50) NOT NULL
);


ALTER TABLE public.tipobarco OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 57697)
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipobarco_id_tipobarco_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipobarco_id_tipobarco_seq OWNER TO postgres;

--
-- TOC entry 3521 (class 0 OID 0)
-- Dependencies: 232
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipobarco_id_tipobarco_seq OWNED BY public.tipobarco.id_tipobarco;


--
-- TOC entry 233 (class 1259 OID 57698)
-- Name: tipocliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipocliente (
    id_tipocliente integer NOT NULL,
    desc_tipocliente character varying(80) NOT NULL
);


ALTER TABLE public.tipocliente OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 57701)
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipocliente_id_tipocliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipocliente_id_tipocliente_seq OWNER TO postgres;

--
-- TOC entry 3522 (class 0 OID 0)
-- Dependencies: 234
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipocliente_id_tipocliente_seq OWNED BY public.tipocliente.id_tipocliente;


--
-- TOC entry 235 (class 1259 OID 57702)
-- Name: tipoestac; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipoestac (
    id_tipoestac integer NOT NULL,
    desc_tipoestac character varying(80) NOT NULL
);


ALTER TABLE public.tipoestac OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 57705)
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipoestac_id_tipoestac_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipoestac_id_tipoestac_seq OWNER TO postgres;

--
-- TOC entry 3523 (class 0 OID 0)
-- Dependencies: 236
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipoestac_id_tipoestac_seq OWNED BY public.tipoestac.id_tipoestac;


--
-- TOC entry 227 (class 1259 OID 57681)
-- Name: tripulacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tripulacion (
    id_tripulacion integer NOT NULL,
    cedulat character varying(50),
    tipo_cedt character varying(1),
    nombrecomt character varying(150),
    tele_1t character varying(15),
    cargot character varying(50),
    matricula character varying(50),
    id_buque integer,
    autor character varying(50)
);


ALTER TABLE public.tripulacion OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 57706)
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tripulacion_id_tripulacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tripulacion_id_tripulacion_seq OWNER TO postgres;

--
-- TOC entry 3524 (class 0 OID 0)
-- Dependencies: 237
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tripulacion_id_tripulacion_seq OWNED BY public.tripulacion.id_tripulacion;


--
-- TOC entry 238 (class 1259 OID 57707)
-- Name: usuarios; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.usuarios (
    id integer NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(30),
    password text,
    perfil integer,
    foto text,
    intentos integer,
    id_estatus integer,
    rif character varying(10),
    fecha timestamp without time zone,
    fecha_update timestamp without time zone,
    cedula character varying(50),
    tele_1 character varying(20),
    nombrecom character varying(50)
);


ALTER TABLE seguridad.usuarios OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 57712)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE seguridad.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 3525 (class 0 OID 0)
-- Dependencies: 239
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.usuarios_id_seq OWNED BY seguridad.usuarios.id;


--
-- TOC entry 3297 (class 2604 OID 57713)
-- Name: alicuota_iva id_alicuota_iva; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva ALTER COLUMN id_alicuota_iva SET DEFAULT nextval('public.alicuota_iva_id_alicuota_iva_seq'::regclass);


--
-- TOC entry 3312 (class 2604 OID 57748)
-- Name: banco id_banco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banco ALTER COLUMN id_banco SET DEFAULT nextval('public.banco_id_banco_seq'::regclass);


--
-- TOC entry 3298 (class 2604 OID 57714)
-- Name: buque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.buque ALTER COLUMN id SET DEFAULT nextval('public.buque_id_seq'::regclass);


--
-- TOC entry 3299 (class 2604 OID 57715)
-- Name: deta_factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_factura ALTER COLUMN id SET DEFAULT nextval('public.deta_factura_id_seq'::regclass);


--
-- TOC entry 3296 (class 2604 OID 57362)
-- Name: deta_recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_recibo ALTER COLUMN id SET DEFAULT nextval('public.deta_recibo_id_seq'::regclass);


--
-- TOC entry 3300 (class 2604 OID 57716)
-- Name: dolar id_dolar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar ALTER COLUMN id_dolar SET DEFAULT nextval('public.dolar_id_dolar_seq'::regclass);


--
-- TOC entry 3302 (class 2604 OID 57717)
-- Name: factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factura ALTER COLUMN id SET DEFAULT nextval('public.factura_id_seq'::regclass);


--
-- TOC entry 3304 (class 2604 OID 57718)
-- Name: mensualidad id_mensualidad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensualidad ALTER COLUMN id_mensualidad SET DEFAULT nextval('public.mensualidad_id_mensualidad_seq'::regclass);


--
-- TOC entry 3305 (class 2604 OID 57719)
-- Name: propiet id_propiet; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiet ALTER COLUMN id_propiet SET DEFAULT nextval('public.propiet_id_propiet_seq'::regclass);


--
-- TOC entry 3313 (class 2604 OID 57798)
-- Name: recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recibo ALTER COLUMN id SET DEFAULT nextval('public.recibo_id_seq'::regclass);


--
-- TOC entry 3307 (class 2604 OID 57720)
-- Name: tarifa id_tarifa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifa ALTER COLUMN id_tarifa SET DEFAULT nextval('public.tarifa_id_tarifa_seq'::regclass);


--
-- TOC entry 3308 (class 2604 OID 57721)
-- Name: tipobarco id_tipobarco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco ALTER COLUMN id_tipobarco SET DEFAULT nextval('public.tipobarco_id_tipobarco_seq'::regclass);


--
-- TOC entry 3309 (class 2604 OID 57722)
-- Name: tipocliente id_tipocliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente ALTER COLUMN id_tipocliente SET DEFAULT nextval('public.tipocliente_id_tipocliente_seq'::regclass);


--
-- TOC entry 3310 (class 2604 OID 57723)
-- Name: tipoestac id_tipoestac; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac ALTER COLUMN id_tipoestac SET DEFAULT nextval('public.tipoestac_id_tipoestac_seq'::regclass);


--
-- TOC entry 3306 (class 2604 OID 57724)
-- Name: tripulacion id_tripulacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tripulacion ALTER COLUMN id_tripulacion SET DEFAULT nextval('public.tripulacion_id_tripulacion_seq'::regclass);


--
-- TOC entry 3311 (class 2604 OID 57725)
-- Name: usuarios id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios ALTER COLUMN id SET DEFAULT nextval('seguridad.usuarios_id_seq'::regclass);


--
-- TOC entry 3472 (class 0 OID 57638)
-- Dependencies: 212
-- Data for Name: alicuota_iva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alicuota_iva (id_alicuota_iva, desc_alicuota_iva, desc_porcentaj) FROM stdin;
1	0.12	12%
\.


--
-- TOC entry 3501 (class 0 OID 57745)
-- Dependencies: 241
-- Data for Name: banco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.banco (id_banco, codigo_b, nombre_b) FROM stdin;
1	0102	Banco de Venezuela
2	0134	Banesco
3	0115	Mercantil
\.


--
-- TOC entry 3474 (class 0 OID 57642)
-- Dependencies: 214
-- Data for Name: buque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.buque (id, nombrebuque, matricula, trailer, pies, tipo, color, eslora, manga, puntal, bruto, neto, canon, tarifa, dia, ubicacion, fechaingreso, fecha_pago, id_tarifa) FROM stdin;
1	TELUMEE	AGSI-RE-0886	No	46	CATAMATAN							46	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
29	CURIARA	AGSI-D-5814	No	37	VELERO							37	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
30	MARIEM 3	AQYM-D-050	No	47	YATE							47	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
31	KAYA	AGSI-2720	No	47	VELERO							47	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
32	POSEIDON	AGSI-D-11413	No	32	VELERO							33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
33	TANGAROA	AGSI-RE-1349	No	60	LANCHA							60	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
34	ROBALO FISH	AGSP-PJ-0006	No	24	YATE							33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
35	TAKARABUNE 	AGSI-PE-0288	No	24	LANCHA							33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
36	FINALLY	ARSH-D-2077	No	93	YATE							93	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
37	FREEDOM	AGSI-TU-0161	No	47	YATE	\N	\N	\N	\N	\N	\N	47	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
38	MAGIC BLUE	AGSI-RE-1072	No	47	YATE	\N	\N	\N	\N	\N	\N	47	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
39	SIMILIQUIRI	AGSI-RE-1001	No	54	YATE	\N	\N	\N	\N	\N	\N	54	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
40	MY TOY	AGSI-RE-1098	No	30	YATE	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
41	DUENDE I	AGSI-RE-109	No	45	YATE	\N	\N	\N	\N	\N	\N	45	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
42	WICHI WICHA	AGSI-D-2494	No	27	LANCHA	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
43	BREZZIN	ARSH-D-957	No	25	VELERO	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
44	TABOGA	AGSI-D-5926	No	63	YATE	\N	\N	\N	\N	\N	\N	63	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
45	JEITOSA 	AGS-PE-0879	No	29	LANCHA	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
46	VIAJERO	AGSI-D-21173	No	29	VELERO	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
47	ALMIRANTA	AGSI-2927	No	44	CASA BOTE	\N	\N	\N	\N	\N	\N	44	1	1	MUELLE 1A	2022-02-01 00:00:00	2022-02-05	1
48	SEVEN 7	ARSH-RE-0323	No	62	YATE	\N	\N	\N	\N	\N	\N	62	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
49	STRIKE	AGSI-RE-1324	No	40	YATE	\N	\N	\N	\N	\N	\N	40	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
51	SAINT MICHEL	AGSI-D-20938	No	43	YATE	\N	\N	\N	\N	\N	\N	43	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
52	TOM III	AGSI-D-15916	No	40	VELERO	\N	\N	\N	\N	\N	\N	40	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
53	LANCELOT	AGSI-D-16610	No	42	VELERO	\N	\N	\N	\N	\N	\N	42	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
54	CHICHI	AGSP-RE-1071	No	72	YATE	\N	\N	\N	\N	\N	\N	72	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
55	CISNE	AGSM-D-1776	No	43	VELERO	\N	\N	\N	\N	\N	\N	43	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
56	MALECON	ADKN-D-3015	No	36	LANCHA	\N	\N	\N	\N	\N	\N	36	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
57	TONINA	AGSI-RE-0655	No	50	LANCHA	\N	\N	\N	\N	\N	\N	50	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
58	MANGUANGUA	AGSI-RE-1339	No	47	CATAMARAN	\N	\N	\N	\N	\N	\N	47	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
59	MARUCA	AGSI-D-4396	No	62	YATE	\N	\N	\N	\N	\N	\N	62	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
60	MYSTIC	ADKN-D-3015	No	30	VELERO	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
61	MANGUA 	AGSI-PJ-0070	No	33	PEÑERO	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
62	CATACO I	AGSP 3992	No	27	LANCHA	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
63	DEL VALLE	AGSI-D-20765	No	35	LANCHA 	\N	\N	\N	\N	\N	\N	35	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
64	RAIATEA	AGSI-RE-0205	No	58	LANCHA 	\N	\N	\N	\N	\N	\N	58	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
65	BIG-E	AGSI-RE-02068	No	58	YATE	\N	\N	\N	\N	\N	\N	58	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
66	MARY ELENA	AGSI-RE-1176	No	81	YATE	\N	\N	\N	\N	\N	\N	81	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
67	IDOLIDIA	AGSI-D-10408	No	28	YATE	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
68	DEL MAR	AGSI-D-22487	No	30	YATE	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
69	GLADIUS 	AGSI-PE-0532	No	24	LANCHA 	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE B	2022-02-01 00:00:00	2022-02-05	1
70	MAGIC I	AGSI-2221	No	42	YATE	\N	\N	\N	\N	\N	\N	42	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
71	MELY	AGSP-2214	No	36	YATE	\N	\N	\N	\N	\N	\N	36	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
72	NANCYS TOY	AGSI-D-22966	No	58	LANCHA	\N	\N	\N	\N	\N	\N	58	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
73	CEST LA VIE	AGSI-D-22796	No	42	YATE	\N	\N	\N	\N	\N	\N	42	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
74	SANGRE AZUL	AGSI-PE-0829	No	34	YATE	\N	\N	\N	\N	\N	\N	34	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
75	ANAMA	AGSI-PE-0830	No	23	LANCHA	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
76	CINCO CERO	AGSI-D-11629	No	27	LANCHA	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
77	SAMADHI	AGSI-RE-0891	No	37	VELERO	\N	\N	\N	\N	\N	\N	37	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
50	KAMILA	ARSH-RE-0016	No	52	YATE	\N	\N	\N	\N	\N	\N	52	1	1	MUELLE 2A 	2022-02-01 00:00:00	2022-02-05	1
78	4 CARIBES	AGSI-D-9005	No	31	YATE	\N	\N	\N	\N	\N	\N	33	1	1	MUELLE C	2022-02-01 00:00:00	2022-02-05	1
\.


--
-- TOC entry 3476 (class 0 OID 57648)
-- Dependencies: 216
-- Data for Name: deta_factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_factura (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, id_fact, id_tarifa) FROM stdin;
\.


--
-- TOC entry 3471 (class 0 OID 57359)
-- Dependencies: 211
-- Data for Name: deta_recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_recibo (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, totald, totalb, id_fact, id_tarifa) FROM stdin;
\.


--
-- TOC entry 3478 (class 0 OID 57652)
-- Dependencies: 218
-- Data for Name: dolar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dolar (id_dolar, desc_dolarc, desc_dolarp) FROM stdin;
1	5.80	5.68
\.


--
-- TOC entry 3480 (class 0 OID 57656)
-- Dependencies: 220
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresa (id, descripcion, rif, fecha, fecha_update) FROM stdin;
1	MARINA DE CARABALLEDA	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00
\.


--
-- TOC entry 3481 (class 0 OID 57659)
-- Dependencies: 221
-- Data for Name: estatus; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estatus (id_status, descripcion, fecha_reg, fecha_update) FROM stdin;
1	Anulado	2022-06-29	2022-06-29 00:00:00
2	Pagado	2022-03-07	2022-03-07 00:00:00
0	Deuda	2022-06-29	2022-06-29 00:00:00
\.


--
-- TOC entry 3482 (class 0 OID 57665)
-- Dependencies: 222
-- Data for Name: factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.factura (id, nro_factura, nombre, matricula, tele_1, total_iva, total_mas_iva, total_bs, fechaingreso, id_status, fecha_update, valor_iva, cedula, efectivo, transferencia, banco, trnas, fechatrnas) FROM stdin;
\.


--
-- TOC entry 3484 (class 0 OID 57671)
-- Dependencies: 224
-- Data for Name: mensualidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mensualidad (id_mensualidad, matricula, pies, id_tarifa, tarifa, dia, canon, fecha_deuda, id_status, fecha_reg, fecha_update, id_factura) FROM stdin;
\.


--
-- TOC entry 3486 (class 0 OID 57678)
-- Dependencies: 226
-- Data for Name: propiet; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.propiet (id_propiet, cedula, tipo_ced, nombrecom, tele_1, email, tipo, matricula, id_buque) FROM stdin;
25	82.147.306	E	HANS POLLOSCH	0414852		principal	AGSI-RE-0886	28
26	10.332.489	V	VICTOR MEDINA	04148400858		principal	AGSI-D-5814	29
27	10825818	V	.	04148400858		principal	AQYM-D-050	30
28	9.416.398	V	SAUL CUEVA	04148400858		principal	AGSI-2720	31
29	5,423,429	V	MANUEL PARGA	04148400858		principal	AGSI-D-11413	32
30	81.056.832	E	JORGE ELLIOT 	04148400858		principal	AGSI-RE-1349	33
31	2	V	.	2		principal	AGSP-PJ-0006	34
32	2	V	2	2		principal	AGSI-PE-0288	35
33	2	V	2	2		principal	ARSH-D-2077	36
\.


--
-- TOC entry 3503 (class 0 OID 57795)
-- Dependencies: 243
-- Data for Name: recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recibo (id, nombre, matricula, tele_1, fechaingreso, nro_factura, total_iva, total_mas_iva, total_bs, id_status, fecha_update, valor_iva, cedula, efectivo, transferencia, banco, trnas, fechatrnas, id_fact) FROM stdin;
\.


--
-- TOC entry 3489 (class 0 OID 57690)
-- Dependencies: 229
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarifa (id_tarifa, desc_concepto, desc_condicion, desc_tarifa, des_unidad, fecha) FROM stdin;
3	Uso Rampa	Unico	100	DIA	2022-06-28
4	Uso Rampa Moto Agua	Unico	100	DIA	2022-06-28
5	Servicio de Atraque En Muelle o Patio Lanchas en Transito	diario	3.75	PIE	2022-06-28
6	Trabajos en Patio	Diario	15	DIA	2022-06-28
7	Embarcaciones Por Ingreso de Empergencia	Exonerado 48 horas	0	DIA	2022-06-28
8	Inscripción	Unico	3000	DIA	2022-06-28
1	Puesto Fijo en Agua	Mensual	1	PIE	2022-06-28
2	Puesto en Tierra	Mensua	1	PIE	2022-06-28
\.


--
-- TOC entry 3491 (class 0 OID 57694)
-- Dependencies: 231
-- Data for Name: tipobarco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipobarco (id_tipobarco, desc_tipobarco) FROM stdin;
1	YATE
2	CATAMATAN
3	VELERO
4	LANCHA
5	PEÑERO
6	CASA BOTE
7	DINGUI 
8	PESQUERO
\.


--
-- TOC entry 3493 (class 0 OID 57698)
-- Dependencies: 233
-- Data for Name: tipocliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipocliente (id_tipocliente, desc_tipocliente) FROM stdin;
1	Puesto Fijo
2	Puesto Transitorio
3	Exonerado
\.


--
-- TOC entry 3495 (class 0 OID 57702)
-- Dependencies: 235
-- Data for Name: tipoestac; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipoestac (id_tipoestac, desc_tipoestac) FROM stdin;
1	Patio
2	Muelle
\.


--
-- TOC entry 3487 (class 0 OID 57681)
-- Dependencies: 227
-- Data for Name: tripulacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tripulacion (id_tripulacion, cedulat, tipo_cedt, nombrecomt, tele_1t, cargot, matricula, id_buque, autor) FROM stdin;
24	82.147.306	E	HANS POLLOSCH	0415555	CAPITAN	AGSI-RE-0886	28	CON ACOMPAÑANTES
25	10.332.489	V	VICTOR MEDINA	04148400858	capitan	AGSI-D-5814	29	CON ACOMPAÑANTES
26	2	V	.	2	m	AQYM-D-050	30	CON ACOMPAÑANTES
27	9.416.398	V	SAUL CUEVA	04148400858	.	AGSI-2720	31	CON ACOMPAÑANTES
28	5,423,429	V	MANUEL PARGA	04148400858	.	AGSI-D-11413	32	CON ACOMPAÑANTES
29	81.056.832	E	JORGE ELLIOT 	4444	.	AGSI-RE-1349	33	CON ACOMPAÑANTES
30	2	V	2	2	2	AGSP-PJ-0006	34	CON ACOMPAÑANTES
31	2	V	2	2	2	AGSI-PE-0288	35	CON ACOMPAÑANTES
32	2	V	2	2	2	ARSH-D-2077	36	CON ACOMPAÑANTES
\.


--
-- TOC entry 3498 (class 0 OID 57707)
-- Dependencies: 238
-- Data for Name: usuarios; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.usuarios (id, nombre, apellido, password, perfil, foto, intentos, id_estatus, rif, fecha, fecha_update, cedula, tele_1, nombrecom) FROM stdin;
2	siledth@gmail.com	DELGADO	$2y$10$O.AoJKdE2OaRWmlQl0N.kuJwzlwVre3x7Xxg.OKq3KOci8W66Te/y	3	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	21151374	04148400858	SILED
3	carol@gmail.com	CAMPOS RAMIREZ	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	3	2	2	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	22921099	04241223912	CAROLINA
4	123456@gmail.com	ADMINISTRADOR	$2y$10$nBYm75gt54AQMl1dq7daYOgixW9Lwi6O8/0hJKIToPWdE34FiymZO	1	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	2598525	04245215	ADMINISTRADOR
1	admin@gmail.com	superior	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	1	1	2	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	14521	45555	admin
\.


--
-- TOC entry 3526 (class 0 OID 0)
-- Dependencies: 213
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alicuota_iva_id_alicuota_iva_seq', 1, true);


--
-- TOC entry 3527 (class 0 OID 0)
-- Dependencies: 240
-- Name: banco_id_banco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.banco_id_banco_seq', 3, true);


--
-- TOC entry 3528 (class 0 OID 0)
-- Dependencies: 215
-- Name: buque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.buque_id_seq', 78, true);


--
-- TOC entry 3529 (class 0 OID 0)
-- Dependencies: 217
-- Name: deta_factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_factura_id_seq', 20, true);


--
-- TOC entry 3530 (class 0 OID 0)
-- Dependencies: 210
-- Name: deta_recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_recibo_id_seq', 3, true);


--
-- TOC entry 3531 (class 0 OID 0)
-- Dependencies: 219
-- Name: dolar_id_dolar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dolar_id_dolar_seq', 1, true);


--
-- TOC entry 3532 (class 0 OID 0)
-- Dependencies: 223
-- Name: factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.factura_id_seq', 21, true);


--
-- TOC entry 3533 (class 0 OID 0)
-- Dependencies: 225
-- Name: mensualidad_id_mensualidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mensualidad_id_mensualidad_seq', 17, true);


--
-- TOC entry 3534 (class 0 OID 0)
-- Dependencies: 228
-- Name: propiet_id_propiet_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.propiet_id_propiet_seq', 33, true);


--
-- TOC entry 3535 (class 0 OID 0)
-- Dependencies: 242
-- Name: recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recibo_id_seq', 6, true);


--
-- TOC entry 3536 (class 0 OID 0)
-- Dependencies: 230
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarifa_id_tarifa_seq', 8, true);


--
-- TOC entry 3537 (class 0 OID 0)
-- Dependencies: 232
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipobarco_id_tipobarco_seq', 8, true);


--
-- TOC entry 3538 (class 0 OID 0)
-- Dependencies: 234
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipocliente_id_tipocliente_seq', 3, true);


--
-- TOC entry 3539 (class 0 OID 0)
-- Dependencies: 236
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipoestac_id_tipoestac_seq', 2, true);


--
-- TOC entry 3540 (class 0 OID 0)
-- Dependencies: 237
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tripulacion_id_tripulacion_seq', 32, true);


--
-- TOC entry 3541 (class 0 OID 0)
-- Dependencies: 239
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.usuarios_id_seq', 4, true);


--
-- TOC entry 3315 (class 2606 OID 57727)
-- Name: alicuota_iva alicuota_iva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva
    ADD CONSTRAINT alicuota_iva_pkey PRIMARY KEY (id_alicuota_iva);


--
-- TOC entry 3318 (class 2606 OID 57729)
-- Name: dolar dolar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar
    ADD CONSTRAINT dolar_pkey PRIMARY KEY (id_dolar);


--
-- TOC entry 3320 (class 2606 OID 57731)
-- Name: estatus estatus_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus
    ADD CONSTRAINT estatus_pkey PRIMARY KEY (id_status);


--
-- TOC entry 3322 (class 2606 OID 57733)
-- Name: mensualidad mensualidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensualidad
    ADD CONSTRAINT mensualidad_pkey PRIMARY KEY (id_mensualidad);


--
-- TOC entry 3324 (class 2606 OID 57735)
-- Name: tipobarco tipobarco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco
    ADD CONSTRAINT tipobarco_pkey PRIMARY KEY (id_tipobarco);


--
-- TOC entry 3326 (class 2606 OID 57737)
-- Name: tipocliente tipocliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente
    ADD CONSTRAINT tipocliente_pkey PRIMARY KEY (id_tipocliente);


--
-- TOC entry 3328 (class 2606 OID 57739)
-- Name: tipoestac tipoestac_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac
    ADD CONSTRAINT tipoestac_pkey PRIMARY KEY (id_tipoestac);


--
-- TOC entry 3330 (class 2606 OID 57741)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- TOC entry 3316 (class 1259 OID 57857)
-- Name: buque_id_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX buque_id_idx ON public.buque USING btree (id, nombrebuque, matricula, trailer, pies, tipo, color, eslora, manga, puntal, bruto, neto, canon, id_tarifa, tarifa, dia, ubicacion, fechaingreso, fecha_pago);


-- Completed on 2022-07-10 17:15:46 -04

--
-- PostgreSQL database dump complete
--

