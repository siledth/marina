--
-- PostgreSQL database dump
--

-- Dumped from database version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)

-- Started on 2022-06-30 01:59:30 -04

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
-- TOC entry 3494 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 6 (class 2615 OID 57517)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 212 (class 1259 OID 57518)
-- Name: alicuota_iva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alicuota_iva (
    id_alicuota_iva integer NOT NULL,
    desc_alicuota_iva character varying(50) NOT NULL,
    desc_porcentaj character varying(50)
);


ALTER TABLE public.alicuota_iva OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 57521)
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
-- TOC entry 3495 (class 0 OID 0)
-- Dependencies: 213
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alicuota_iva_id_alicuota_iva_seq OWNED BY public.alicuota_iva.id_alicuota_iva;


--
-- TOC entry 214 (class 1259 OID 57522)
-- Name: buque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.buque (
    id integer NOT NULL,
    nombrebuque character varying(100),
    matricula character varying(30),
    trailer character varying(2),
    pies integer,
    tipo character varying(20),
    color character varying(20),
    eslora character varying(100),
    manga character varying(100),
    puntal character varying(100),
    bruto character varying(100),
    neto character varying(100),
    canon character varying(100),
    tarifa character varying(100),
    dia character varying(100),
    ubicacion character varying(100),
    fechaingreso timestamp without time zone
);


ALTER TABLE public.buque OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 57527)
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
-- TOC entry 3496 (class 0 OID 0)
-- Dependencies: 215
-- Name: buque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.buque_id_seq OWNED BY public.buque.id;


--
-- TOC entry 216 (class 1259 OID 57528)
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
    id_fact integer
);


ALTER TABLE public.deta_factura OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 57531)
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
-- TOC entry 3497 (class 0 OID 0)
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
    canon integer,
    monto_estimado integer,
    totald integer,
    totalb integer,
    id_fact integer
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
-- TOC entry 3498 (class 0 OID 0)
-- Dependencies: 210
-- Name: deta_recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.deta_recibo_id_seq OWNED BY public.deta_recibo.id;


--
-- TOC entry 218 (class 1259 OID 57532)
-- Name: dolar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dolar (
    id_dolar integer NOT NULL,
    desc_dolarc character varying(50) NOT NULL,
    desc_dolarp character varying(50) NOT NULL
);


ALTER TABLE public.dolar OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 57535)
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
-- TOC entry 3499 (class 0 OID 0)
-- Dependencies: 219
-- Name: dolar_id_dolar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dolar_id_dolar_seq OWNED BY public.dolar.id_dolar;


--
-- TOC entry 220 (class 1259 OID 57536)
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
-- TOC entry 221 (class 1259 OID 57539)
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
-- TOC entry 222 (class 1259 OID 57545)
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
    valor_iva character varying
);


ALTER TABLE public.factura OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 57550)
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
-- TOC entry 3500 (class 0 OID 0)
-- Dependencies: 223
-- Name: factura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.factura_id_seq OWNED BY public.factura.id;


--
-- TOC entry 224 (class 1259 OID 57551)
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
-- TOC entry 225 (class 1259 OID 57554)
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
    id_buque integer
);


ALTER TABLE public.tripulacion OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 57557)
-- Name: planilla; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.planilla AS
 SELECT buque.id,
    buque.nombrebuque,
    buque.matricula,
    buque.trailer,
    buque.pies,
    buque.tipo AS tipobuque,
    buque.color,
    buque.eslora,
    buque.manga,
    buque.puntal,
    buque.bruto,
    buque.neto,
    buque.canon,
    buque.tarifa,
    buque.dia,
    buque.ubicacion,
    buque.fechaingreso,
    propiet.id_propiet,
    propiet.cedula,
    propiet.tipo_ced,
    propiet.nombrecom,
    propiet.tele_1,
    propiet.email,
    propiet.tipo AS tipropietario,
    propiet.matricula AS matriculapropiet,
    propiet.id_buque AS id_buquepropiet,
    tripulacion.id_tripulacion,
    tripulacion.cedulat,
    tripulacion.tipo_cedt,
    tripulacion.nombrecomt,
    tripulacion.tele_1t,
    tripulacion.cargot,
    tripulacion.matricula AS matriculatripulacion,
    tripulacion.id_buque AS id_buquetripulacion
   FROM public.propiet,
    public.tripulacion,
    public.buque
  WHERE ((buque.id = propiet.id_buque) AND (buque.id = tripulacion.id_buque));


ALTER TABLE public.planilla OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 57562)
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
-- TOC entry 3501 (class 0 OID 0)
-- Dependencies: 227
-- Name: propiet_id_propiet_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.propiet_id_propiet_seq OWNED BY public.propiet.id_propiet;


--
-- TOC entry 240 (class 1259 OID 57631)
-- Name: recibo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.recibo (
    id integer NOT NULL,
    nro_factura character varying(10),
    nombre character varying(50),
    matricula character varying(50),
    tele_1 character varying(20),
    total_iva character varying(50),
    total_mas_iva character varying(50),
    total_bs character varying(50),
    fechaingreso date,
    id_status integer,
    fecha_update date,
    valor_iva character varying(12)
);


ALTER TABLE public.recibo OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 57630)
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
-- TOC entry 3502 (class 0 OID 0)
-- Dependencies: 239
-- Name: recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recibo_id_seq OWNED BY public.recibo.id;


--
-- TOC entry 228 (class 1259 OID 57563)
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
-- TOC entry 229 (class 1259 OID 57566)
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
-- TOC entry 3503 (class 0 OID 0)
-- Dependencies: 229
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarifa_id_tarifa_seq OWNED BY public.tarifa.id_tarifa;


--
-- TOC entry 230 (class 1259 OID 57567)
-- Name: tipobarco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipobarco (
    id_tipobarco integer NOT NULL,
    desc_tipobarco character varying(50) NOT NULL
);


ALTER TABLE public.tipobarco OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 57570)
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
-- TOC entry 3504 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipobarco_id_tipobarco_seq OWNED BY public.tipobarco.id_tipobarco;


--
-- TOC entry 232 (class 1259 OID 57571)
-- Name: tipocliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipocliente (
    id_tipocliente integer NOT NULL,
    desc_tipocliente character varying(80) NOT NULL
);


ALTER TABLE public.tipocliente OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 57574)
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
-- TOC entry 3505 (class 0 OID 0)
-- Dependencies: 233
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipocliente_id_tipocliente_seq OWNED BY public.tipocliente.id_tipocliente;


--
-- TOC entry 234 (class 1259 OID 57575)
-- Name: tipoestac; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipoestac (
    id_tipoestac integer NOT NULL,
    desc_tipoestac character varying(80) NOT NULL
);


ALTER TABLE public.tipoestac OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 57578)
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
-- TOC entry 3506 (class 0 OID 0)
-- Dependencies: 235
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipoestac_id_tipoestac_seq OWNED BY public.tipoestac.id_tipoestac;


--
-- TOC entry 236 (class 1259 OID 57579)
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
-- TOC entry 3507 (class 0 OID 0)
-- Dependencies: 236
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tripulacion_id_tripulacion_seq OWNED BY public.tripulacion.id_tripulacion;


--
-- TOC entry 237 (class 1259 OID 57580)
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
-- TOC entry 238 (class 1259 OID 57585)
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
-- TOC entry 3508 (class 0 OID 0)
-- Dependencies: 238
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.usuarios_id_seq OWNED BY seguridad.usuarios.id;


--
-- TOC entry 3291 (class 2604 OID 57613)
-- Name: alicuota_iva id_alicuota_iva; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva ALTER COLUMN id_alicuota_iva SET DEFAULT nextval('public.alicuota_iva_id_alicuota_iva_seq'::regclass);


--
-- TOC entry 3292 (class 2604 OID 57614)
-- Name: buque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.buque ALTER COLUMN id SET DEFAULT nextval('public.buque_id_seq'::regclass);


--
-- TOC entry 3293 (class 2604 OID 57615)
-- Name: deta_factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_factura ALTER COLUMN id SET DEFAULT nextval('public.deta_factura_id_seq'::regclass);


--
-- TOC entry 3290 (class 2604 OID 57362)
-- Name: deta_recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_recibo ALTER COLUMN id SET DEFAULT nextval('public.deta_recibo_id_seq'::regclass);


--
-- TOC entry 3294 (class 2604 OID 57616)
-- Name: dolar id_dolar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar ALTER COLUMN id_dolar SET DEFAULT nextval('public.dolar_id_dolar_seq'::regclass);


--
-- TOC entry 3296 (class 2604 OID 57617)
-- Name: factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factura ALTER COLUMN id SET DEFAULT nextval('public.factura_id_seq'::regclass);


--
-- TOC entry 3297 (class 2604 OID 57618)
-- Name: propiet id_propiet; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiet ALTER COLUMN id_propiet SET DEFAULT nextval('public.propiet_id_propiet_seq'::regclass);


--
-- TOC entry 3304 (class 2604 OID 57634)
-- Name: recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recibo ALTER COLUMN id SET DEFAULT nextval('public.recibo_id_seq'::regclass);


--
-- TOC entry 3299 (class 2604 OID 57619)
-- Name: tarifa id_tarifa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifa ALTER COLUMN id_tarifa SET DEFAULT nextval('public.tarifa_id_tarifa_seq'::regclass);


--
-- TOC entry 3300 (class 2604 OID 57620)
-- Name: tipobarco id_tipobarco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco ALTER COLUMN id_tipobarco SET DEFAULT nextval('public.tipobarco_id_tipobarco_seq'::regclass);


--
-- TOC entry 3301 (class 2604 OID 57621)
-- Name: tipocliente id_tipocliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente ALTER COLUMN id_tipocliente SET DEFAULT nextval('public.tipocliente_id_tipocliente_seq'::regclass);


--
-- TOC entry 3302 (class 2604 OID 57622)
-- Name: tipoestac id_tipoestac; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac ALTER COLUMN id_tipoestac SET DEFAULT nextval('public.tipoestac_id_tipoestac_seq'::regclass);


--
-- TOC entry 3298 (class 2604 OID 57623)
-- Name: tripulacion id_tripulacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tripulacion ALTER COLUMN id_tripulacion SET DEFAULT nextval('public.tripulacion_id_tripulacion_seq'::regclass);


--
-- TOC entry 3303 (class 2604 OID 57624)
-- Name: usuarios id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios ALTER COLUMN id SET DEFAULT nextval('seguridad.usuarios_id_seq'::regclass);


--
-- TOC entry 3461 (class 0 OID 57518)
-- Dependencies: 212
-- Data for Name: alicuota_iva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alicuota_iva (id_alicuota_iva, desc_alicuota_iva, desc_porcentaj) FROM stdin;
1	0.12	12%
\.


--
-- TOC entry 3463 (class 0 OID 57522)
-- Dependencies: 214
-- Data for Name: buque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.buque (id, nombrebuque, matricula, trailer, pies, tipo, color, eslora, manga, puntal, bruto, neto, canon, tarifa, dia, ubicacion, fechaingreso) FROM stdin;
12	ALEJA	 AGSI-D-5535	No	42	YATE	BLANCO	12.85	3.90	2.25	33.27	8.32	210	5	30	MUELLE  D	2022-06-30 00:00:00
13	BLACK FISH	TEO976	No	24	YATE	verde	12.85	3.90	2.25	33.27	8.32	120	5	30	MUELLE  D	2022-06-30 00:00:00
\.


--
-- TOC entry 3465 (class 0 OID 57528)
-- Dependencies: 216
-- Data for Name: deta_factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_factura (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, id_fact) FROM stdin;
1	ALEJA	1	CVBNJK	15	2	30	33,6	1
2	ALEJA	30	CVBNJK	5	30	150	168	1
1	ALEJA	1	CVBNJK	15	2	30	33,6	1
2	ALEJA	30	CVBNJK	5	30	150	168	1
3	BLACK FISH	80	PAGO MENSUALIDAD JUNIO	5	30	400	448	2
4	BLACK FISH	50	PAGO  USO DE RAMPA	100	1	100	112	2
5	ALEJA	40	PAGO MENSUALIDAD	5	30	200	200	3
6	ALEJA	40	PAGO MENSUALIDAD	5	30	200	200	4
\.


--
-- TOC entry 3460 (class 0 OID 57359)
-- Dependencies: 211
-- Data for Name: deta_recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_recibo (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, totald, totalb, id_fact) FROM stdin;
1	BLACK FISH	50	PAGO MENSUALIDAD	5	30	250	250	\N	\N	1
\.


--
-- TOC entry 3467 (class 0 OID 57532)
-- Dependencies: 218
-- Data for Name: dolar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dolar (id_dolar, desc_dolarc, desc_dolarp) FROM stdin;
1	5.80	5.68
\.


--
-- TOC entry 3469 (class 0 OID 57536)
-- Dependencies: 220
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresa (id, descripcion, rif, fecha, fecha_update) FROM stdin;
1	MARINA DE CARABALLEDA	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00
1	MARINA DE CARABALLEDA	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00
\.


--
-- TOC entry 3470 (class 0 OID 57539)
-- Dependencies: 221
-- Data for Name: estatus; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estatus (id_status, descripcion, fecha_reg, fecha_update) FROM stdin;
0	Registrado	2022-06-29	2022-06-29 00:00:00
1	Anulado	2022-06-29	2022-06-29 00:00:00
\.


--
-- TOC entry 3471 (class 0 OID 57545)
-- Dependencies: 222
-- Data for Name: factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.factura (id, nro_factura, nombre, matricula, tele_1, total_iva, total_mas_iva, total_bs, fechaingreso, id_status, fecha_update, valor_iva) FROM stdin;
1	00001	NIKODEMO SYSTEMS, C.A.	ALEJA	1234567	21,6	201,6	1.169,28	2022-06-30	0	2022-06-30	5.80
1	00001	NIKODEMO SYSTEMS, C.A.	ALEJA	1234567	21,6	201,6	1.169,28	2022-06-30	0	2022-06-30	5.80
2	00002	SILED DELGADO	BLACK FISH	04148400858	60	560	3.248	2022-06-30	0	2022-06-30	6
3	00001	SILED DELGADO	ALEJA	04148400858	0	200	1.160	2022-06-30	0	2022-06-30	5.80
4	00001	SILED DELGADO	ALEJA	04148400858	0	200	1.160	2022-06-30	0	2022-06-30	5.80
5	\N	\N	\N	\N	\N	\N	\N	2022-06-30	0	2022-06-30	\N
\.


--
-- TOC entry 3473 (class 0 OID 57551)
-- Dependencies: 224
-- Data for Name: propiet; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.propiet (id_propiet, cedula, tipo_ced, nombrecom, tele_1, email, tipo, matricula, id_buque) FROM stdin;
13	10825818	V	CRISTIAN	04242706413	sincopa2@gmail.com	principal	 AGSI-D-5535	12
14	10825818	V	CRISTIAN	04148400858	siledth@gmail.com	principal	TEO976	13
\.


--
-- TOC entry 3488 (class 0 OID 57631)
-- Dependencies: 240
-- Data for Name: recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recibo (id, nro_factura, nombre, matricula, tele_1, total_iva, total_mas_iva, total_bs, fechaingreso, id_status, fecha_update, valor_iva) FROM stdin;
1	00001	DELGADO	BLACK FISH	04148400858	0	250	1.450	2022-06-30	0	2022-06-30	5.80
\.


--
-- TOC entry 3476 (class 0 OID 57563)
-- Dependencies: 228
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarifa (id_tarifa, desc_concepto, desc_condicion, desc_tarifa, des_unidad, fecha) FROM stdin;
8	Puesto Fijo en Agua\tMensual	Mensual	5	PIE	2022-06-28
9	Puesto Fijo en Tierra	Mensual	5	PIE	2022-06-28
10	Servicio de Atraque En Muelle o Patio Lanchas en Transito	Diario	3.75	PIE	2022-06-28
11	Uso Rampa	Unico	100	DIA	2022-06-28
12	Uso Rampa Moto Agua	Unico	100	DIA	2022-06-28
13	Trabajos en Patio	Diario	15	DIA	2022-06-28
14	Exonerado por Emergencia	"2 dias 	0	DIA	2022-06-28
\.


--
-- TOC entry 3478 (class 0 OID 57567)
-- Dependencies: 230
-- Data for Name: tipobarco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipobarco (id_tipobarco, desc_tipobarco) FROM stdin;
1	YATE
\.


--
-- TOC entry 3480 (class 0 OID 57571)
-- Dependencies: 232
-- Data for Name: tipocliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipocliente (id_tipocliente, desc_tipocliente) FROM stdin;
1	Puesto Fijo
2	Puesto Transitorio
3	Exonerado
\.


--
-- TOC entry 3482 (class 0 OID 57575)
-- Dependencies: 234
-- Data for Name: tipoestac; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipoestac (id_tipoestac, desc_tipoestac) FROM stdin;
1	Patio
2	Muelle
\.


--
-- TOC entry 3474 (class 0 OID 57554)
-- Dependencies: 225
-- Data for Name: tripulacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tripulacion (id_tripulacion, cedulat, tipo_cedt, nombrecomt, tele_1t, cargot, matricula, id_buque) FROM stdin;
12	21151374	V	siled delgado	04148400858	Marinero	 AGSI-D-5535	12
13	3233232	V	leo	0415852222	Capitan	TEO976	13
\.


--
-- TOC entry 3485 (class 0 OID 57580)
-- Dependencies: 237
-- Data for Name: usuarios; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.usuarios (id, nombre, apellido, password, perfil, foto, intentos, id_estatus, rif, fecha, fecha_update, cedula, tele_1, nombrecom) FROM stdin;
2	siledth@gmail.com	DELGADO	$2y$10$O.AoJKdE2OaRWmlQl0N.kuJwzlwVre3x7Xxg.OKq3KOci8W66Te/y	3	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	21151374	04148400858	SILED
3	carol@gmail.com	CAMPOS RAMIREZ	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	3	2	2	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	22921099	04241223912	CAROLINA
4	123456@gmail.com	ADMINISTRADOR	$2y$10$nBYm75gt54AQMl1dq7daYOgixW9Lwi6O8/0hJKIToPWdE34FiymZO	1	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	2598525	04245215	ADMINISTRADOR
1	admin@gmail.com	superior	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	1	1	2	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	14521	45555	admin
\.


--
-- TOC entry 3509 (class 0 OID 0)
-- Dependencies: 213
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alicuota_iva_id_alicuota_iva_seq', 1, true);


--
-- TOC entry 3510 (class 0 OID 0)
-- Dependencies: 215
-- Name: buque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.buque_id_seq', 13, true);


--
-- TOC entry 3511 (class 0 OID 0)
-- Dependencies: 217
-- Name: deta_factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_factura_id_seq', 6, true);


--
-- TOC entry 3512 (class 0 OID 0)
-- Dependencies: 210
-- Name: deta_recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_recibo_id_seq', 1, true);


--
-- TOC entry 3513 (class 0 OID 0)
-- Dependencies: 219
-- Name: dolar_id_dolar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dolar_id_dolar_seq', 1, true);


--
-- TOC entry 3514 (class 0 OID 0)
-- Dependencies: 223
-- Name: factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.factura_id_seq', 5, true);


--
-- TOC entry 3515 (class 0 OID 0)
-- Dependencies: 227
-- Name: propiet_id_propiet_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.propiet_id_propiet_seq', 14, true);


--
-- TOC entry 3516 (class 0 OID 0)
-- Dependencies: 239
-- Name: recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recibo_id_seq', 1, true);


--
-- TOC entry 3517 (class 0 OID 0)
-- Dependencies: 229
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarifa_id_tarifa_seq', 14, true);


--
-- TOC entry 3518 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipobarco_id_tipobarco_seq', 1, true);


--
-- TOC entry 3519 (class 0 OID 0)
-- Dependencies: 233
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipocliente_id_tipocliente_seq', 3, true);


--
-- TOC entry 3520 (class 0 OID 0)
-- Dependencies: 235
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipoestac_id_tipoestac_seq', 2, true);


--
-- TOC entry 3521 (class 0 OID 0)
-- Dependencies: 236
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tripulacion_id_tripulacion_seq', 13, true);


--
-- TOC entry 3522 (class 0 OID 0)
-- Dependencies: 238
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.usuarios_id_seq', 4, true);


--
-- TOC entry 3306 (class 2606 OID 57599)
-- Name: alicuota_iva alicuota_iva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva
    ADD CONSTRAINT alicuota_iva_pkey PRIMARY KEY (id_alicuota_iva);


--
-- TOC entry 3308 (class 2606 OID 57601)
-- Name: dolar dolar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar
    ADD CONSTRAINT dolar_pkey PRIMARY KEY (id_dolar);


--
-- TOC entry 3310 (class 2606 OID 57603)
-- Name: estatus estatus_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus
    ADD CONSTRAINT estatus_pkey PRIMARY KEY (id_status);


--
-- TOC entry 3312 (class 2606 OID 57605)
-- Name: tipobarco tipobarco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco
    ADD CONSTRAINT tipobarco_pkey PRIMARY KEY (id_tipobarco);


--
-- TOC entry 3314 (class 2606 OID 57607)
-- Name: tipocliente tipocliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente
    ADD CONSTRAINT tipocliente_pkey PRIMARY KEY (id_tipocliente);


--
-- TOC entry 3316 (class 2606 OID 57609)
-- Name: tipoestac tipoestac_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac
    ADD CONSTRAINT tipoestac_pkey PRIMARY KEY (id_tipoestac);


--
-- TOC entry 3318 (class 2606 OID 57611)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


-- Completed on 2022-06-30 01:59:30 -04

--
-- PostgreSQL database dump complete
--

