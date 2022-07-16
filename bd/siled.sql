--
-- PostgreSQL database dump
--

-- Dumped from database version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.3 (Ubuntu 14.3-1.pgdg20.04+1)

-- Started on 2022-07-15 21:25:09 -04

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
-- TOC entry 3539 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 6 (class 2615 OID 58143)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 210 (class 1259 OID 58144)
-- Name: alicuota_iva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alicuota_iva (
    id_alicuota_iva integer NOT NULL,
    desc_alicuota_iva character varying(50) NOT NULL,
    desc_porcentaj character varying(50)
);


ALTER TABLE public.alicuota_iva OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 58147)
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
-- TOC entry 3540 (class 0 OID 0)
-- Dependencies: 211
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alicuota_iva_id_alicuota_iva_seq OWNED BY public.alicuota_iva.id_alicuota_iva;


--
-- TOC entry 212 (class 1259 OID 58148)
-- Name: banco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.banco (
    id_banco integer NOT NULL,
    codigo_b character varying(100),
    nombre_b character varying(100)
);


ALTER TABLE public.banco OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 58151)
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
-- TOC entry 3541 (class 0 OID 0)
-- Dependencies: 213
-- Name: banco_id_banco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.banco_id_banco_seq OWNED BY public.banco.id_banco;


--
-- TOC entry 247 (class 1259 OID 58390)
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
    eslora character varying(10),
    manga character varying(10),
    puntal character varying(10),
    bruto character varying(10),
    neto character varying(10),
    canon numeric,
    tarifa character varying(100),
    dia character varying(10),
    ubicacion character varying(100),
    fechaingreso timestamp without time zone,
    fecha_pago date,
    id_tarifa integer
);


ALTER TABLE public.buque OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 58389)
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
-- TOC entry 3542 (class 0 OID 0)
-- Dependencies: 246
-- Name: buque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.buque_id_seq OWNED BY public.buque.id;


--
-- TOC entry 237 (class 1259 OID 58350)
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
-- TOC entry 236 (class 1259 OID 58349)
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
-- TOC entry 3543 (class 0 OID 0)
-- Dependencies: 236
-- Name: deta_factura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.deta_factura_id_seq OWNED BY public.deta_factura.id;


--
-- TOC entry 214 (class 1259 OID 58162)
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
-- TOC entry 215 (class 1259 OID 58167)
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
-- TOC entry 3544 (class 0 OID 0)
-- Dependencies: 215
-- Name: deta_recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.deta_recibo_id_seq OWNED BY public.deta_recibo.id;


--
-- TOC entry 216 (class 1259 OID 58168)
-- Name: dolar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dolar (
    id_dolar integer NOT NULL,
    desc_dolarc character varying(50) NOT NULL,
    desc_dolarp character varying(50) NOT NULL
);


ALTER TABLE public.dolar OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 58171)
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
-- TOC entry 3545 (class 0 OID 0)
-- Dependencies: 217
-- Name: dolar_id_dolar_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dolar_id_dolar_seq OWNED BY public.dolar.id_dolar;


--
-- TOC entry 218 (class 1259 OID 58172)
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
-- TOC entry 219 (class 1259 OID 58175)
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
-- TOC entry 241 (class 1259 OID 58372)
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
    id_tipo_pago integer,
    id_banco integer,
    nro_referencia character varying(40),
    fechatrnas date
);


ALTER TABLE public.factura OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 58371)
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
-- TOC entry 3546 (class 0 OID 0)
-- Dependencies: 240
-- Name: factura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.factura_id_seq OWNED BY public.factura.id;


--
-- TOC entry 239 (class 1259 OID 58362)
-- Name: mensualidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mensualidad (
    id_mensualidad integer NOT NULL,
    matricula character varying NOT NULL,
    pies character varying(100) NOT NULL,
    id_tarifa integer NOT NULL,
    tarifa character varying NOT NULL,
    dia integer NOT NULL,
    canon numeric NOT NULL,
    fecha_deuda date NOT NULL,
    id_status integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL,
    id_factura integer
);


ALTER TABLE public.mensualidad OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 58361)
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
-- TOC entry 3547 (class 0 OID 0)
-- Dependencies: 238
-- Name: mensualidad_id_mensualidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mensualidad_id_mensualidad_seq OWNED BY public.mensualidad.id_mensualidad;


--
-- TOC entry 235 (class 1259 OID 58339)
-- Name: mov_consig; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mov_consig (
    id_mov_consig integer NOT NULL,
    id_mensualidad integer NOT NULL,
    id_tipo_pago integer NOT NULL,
    nro_referencia character varying,
    total_ant_d character varying NOT NULL,
    id_dolar integer NOT NULL,
    valor character varying NOT NULL,
    total_ant_bs character varying NOT NULL,
    total_abonado_bs character varying,
    total_abonado_om character varying,
    restante_bs character varying,
    restante_om character varying,
    id_user integer NOT NULL,
    id_estatus integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    id_banco integer,
    fechatrnas date
);


ALTER TABLE public.mov_consig OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 58338)
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mov_consig_id_mov_consig_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mov_consig_id_mov_consig_seq OWNER TO postgres;

--
-- TOC entry 3548 (class 0 OID 0)
-- Dependencies: 234
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mov_consig_id_mov_consig_seq OWNED BY public.mov_consig.id_mov_consig;


--
-- TOC entry 249 (class 1259 OID 58421)
-- Name: por_pagar_barco; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.por_pagar_barco AS
 SELECT sum(mensualidad.canon) AS deuda,
    count(DISTINCT mensualidad.matricula) AS barcos
   FROM public.mensualidad
  WHERE (mensualidad.id_status = 0);


ALTER TABLE public.por_pagar_barco OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 58385)
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
-- TOC entry 244 (class 1259 OID 58384)
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
-- TOC entry 3549 (class 0 OID 0)
-- Dependencies: 244
-- Name: propiet_id_propiet_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.propiet_id_propiet_seq OWNED BY public.propiet.id_propiet;


--
-- TOC entry 220 (class 1259 OID 58205)
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
-- TOC entry 221 (class 1259 OID 58210)
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
-- TOC entry 3550 (class 0 OID 0)
-- Dependencies: 221
-- Name: recibo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recibo_id_seq OWNED BY public.recibo.id;


--
-- TOC entry 222 (class 1259 OID 58211)
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
-- TOC entry 223 (class 1259 OID 58214)
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
-- TOC entry 3551 (class 0 OID 0)
-- Dependencies: 223
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarifa_id_tarifa_seq OWNED BY public.tarifa.id_tarifa;


--
-- TOC entry 224 (class 1259 OID 58215)
-- Name: tipobarco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipobarco (
    id_tipobarco integer NOT NULL,
    desc_tipobarco character varying(50) NOT NULL
);


ALTER TABLE public.tipobarco OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 58218)
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
-- TOC entry 3552 (class 0 OID 0)
-- Dependencies: 225
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipobarco_id_tipobarco_seq OWNED BY public.tipobarco.id_tipobarco;


--
-- TOC entry 226 (class 1259 OID 58219)
-- Name: tipocliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipocliente (
    id_tipocliente integer NOT NULL,
    desc_tipocliente character varying(80) NOT NULL
);


ALTER TABLE public.tipocliente OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 58222)
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
-- TOC entry 3553 (class 0 OID 0)
-- Dependencies: 227
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipocliente_id_tipocliente_seq OWNED BY public.tipocliente.id_tipocliente;


--
-- TOC entry 228 (class 1259 OID 58223)
-- Name: tipoestac; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipoestac (
    id_tipoestac integer NOT NULL,
    desc_tipoestac character varying(80) NOT NULL
);


ALTER TABLE public.tipoestac OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 58226)
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
-- TOC entry 3554 (class 0 OID 0)
-- Dependencies: 229
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipoestac_id_tipoestac_seq OWNED BY public.tipoestac.id_tipoestac;


--
-- TOC entry 230 (class 1259 OID 58227)
-- Name: tipopago; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipopago (
    id_tipo_pago integer NOT NULL,
    descripcion character varying(50) NOT NULL
);


ALTER TABLE public.tipopago OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 58230)
-- Name: tipopago_id_tipo_pago_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipopago_id_tipo_pago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipopago_id_tipo_pago_seq OWNER TO postgres;

--
-- TOC entry 3555 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipopago_id_tipo_pago_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipopago_id_tipo_pago_seq OWNED BY public.tipopago.id_tipo_pago;


--
-- TOC entry 248 (class 1259 OID 58411)
-- Name: total_barco; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.total_barco AS
 SELECT count(DISTINCT buque.nombrebuque) AS totalbarco,
    sum(buque.canon) AS totalcanon
   FROM public.buque;


ALTER TABLE public.total_barco OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 58380)
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
-- TOC entry 242 (class 1259 OID 58379)
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
-- TOC entry 3556 (class 0 OID 0)
-- Dependencies: 242
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tripulacion_id_tripulacion_seq OWNED BY public.tripulacion.id_tripulacion;


--
-- TOC entry 232 (class 1259 OID 58235)
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
-- TOC entry 233 (class 1259 OID 58240)
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
-- TOC entry 3557 (class 0 OID 0)
-- Dependencies: 233
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.usuarios_id_seq OWNED BY seguridad.usuarios.id;


--
-- TOC entry 3314 (class 2604 OID 58241)
-- Name: alicuota_iva id_alicuota_iva; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva ALTER COLUMN id_alicuota_iva SET DEFAULT nextval('public.alicuota_iva_id_alicuota_iva_seq'::regclass);


--
-- TOC entry 3315 (class 2604 OID 58242)
-- Name: banco id_banco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.banco ALTER COLUMN id_banco SET DEFAULT nextval('public.banco_id_banco_seq'::regclass);


--
-- TOC entry 3334 (class 2604 OID 58393)
-- Name: buque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.buque ALTER COLUMN id SET DEFAULT nextval('public.buque_id_seq'::regclass);


--
-- TOC entry 3328 (class 2604 OID 58353)
-- Name: deta_factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_factura ALTER COLUMN id SET DEFAULT nextval('public.deta_factura_id_seq'::regclass);


--
-- TOC entry 3316 (class 2604 OID 58245)
-- Name: deta_recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.deta_recibo ALTER COLUMN id SET DEFAULT nextval('public.deta_recibo_id_seq'::regclass);


--
-- TOC entry 3317 (class 2604 OID 58246)
-- Name: dolar id_dolar; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar ALTER COLUMN id_dolar SET DEFAULT nextval('public.dolar_id_dolar_seq'::regclass);


--
-- TOC entry 3331 (class 2604 OID 58375)
-- Name: factura id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factura ALTER COLUMN id SET DEFAULT nextval('public.factura_id_seq'::regclass);


--
-- TOC entry 3329 (class 2604 OID 58365)
-- Name: mensualidad id_mensualidad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensualidad ALTER COLUMN id_mensualidad SET DEFAULT nextval('public.mensualidad_id_mensualidad_seq'::regclass);


--
-- TOC entry 3326 (class 2604 OID 58342)
-- Name: mov_consig id_mov_consig; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mov_consig ALTER COLUMN id_mov_consig SET DEFAULT nextval('public.mov_consig_id_mov_consig_seq'::regclass);


--
-- TOC entry 3333 (class 2604 OID 58388)
-- Name: propiet id_propiet; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiet ALTER COLUMN id_propiet SET DEFAULT nextval('public.propiet_id_propiet_seq'::regclass);


--
-- TOC entry 3319 (class 2604 OID 58251)
-- Name: recibo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recibo ALTER COLUMN id SET DEFAULT nextval('public.recibo_id_seq'::regclass);


--
-- TOC entry 3320 (class 2604 OID 58252)
-- Name: tarifa id_tarifa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarifa ALTER COLUMN id_tarifa SET DEFAULT nextval('public.tarifa_id_tarifa_seq'::regclass);


--
-- TOC entry 3321 (class 2604 OID 58253)
-- Name: tipobarco id_tipobarco; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco ALTER COLUMN id_tipobarco SET DEFAULT nextval('public.tipobarco_id_tipobarco_seq'::regclass);


--
-- TOC entry 3322 (class 2604 OID 58254)
-- Name: tipocliente id_tipocliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente ALTER COLUMN id_tipocliente SET DEFAULT nextval('public.tipocliente_id_tipocliente_seq'::regclass);


--
-- TOC entry 3323 (class 2604 OID 58255)
-- Name: tipoestac id_tipoestac; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac ALTER COLUMN id_tipoestac SET DEFAULT nextval('public.tipoestac_id_tipoestac_seq'::regclass);


--
-- TOC entry 3324 (class 2604 OID 58256)
-- Name: tipopago id_tipo_pago; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipopago ALTER COLUMN id_tipo_pago SET DEFAULT nextval('public.tipopago_id_tipo_pago_seq'::regclass);


--
-- TOC entry 3332 (class 2604 OID 58383)
-- Name: tripulacion id_tripulacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tripulacion ALTER COLUMN id_tripulacion SET DEFAULT nextval('public.tripulacion_id_tripulacion_seq'::regclass);


--
-- TOC entry 3325 (class 2604 OID 58258)
-- Name: usuarios id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios ALTER COLUMN id SET DEFAULT nextval('seguridad.usuarios_id_seq'::regclass);


--
-- TOC entry 3496 (class 0 OID 58144)
-- Dependencies: 210
-- Data for Name: alicuota_iva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alicuota_iva (id_alicuota_iva, desc_alicuota_iva, desc_porcentaj) FROM stdin;
1	0.16	16%
\.


--
-- TOC entry 3498 (class 0 OID 58148)
-- Dependencies: 212
-- Data for Name: banco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.banco (id_banco, codigo_b, nombre_b) FROM stdin;
1	0102	Banco de Venezuela
2	0134	Banesco
3	0115	Mercantil
\.


--
-- TOC entry 3533 (class 0 OID 58390)
-- Dependencies: 247
-- Data for Name: buque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.buque (id, nombrebuque, matricula, trailer, pies, tipo, color, eslora, manga, puntal, bruto, neto, canon, tarifa, dia, ubicacion, fechaingreso, fecha_pago, id_tarifa) FROM stdin;
1	SANS SOUCI	AGSI-D-23005	No	63	YATE							315	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
2	TELUMEE	AGSI-RE-0886	No	46	CATAMATAN							230	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
3	CURIARA	AGSI-D-5814	No	37	VELERO							185	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
4	KAYA	AGSI-2720	No	47	VELERO							235	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
5	POSEIDON	AGSI-D-11413	No	32	VELERO							165	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
6	TANGAROA	AGSI-RE-1349	No	60	LANCHA							300	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
7	MAGIC BLUE	AGSI-RE-1072	No	47	YATE							235	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
8	SIMILIQUIRI	AGSI-RE-1001	No	54	YATE							270	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
9	MY TOY	AGSI-RE-1098	No	30	YATE							165	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
10	DUENDE I	AGSI-RE-0661	No	45	YATE							225	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
11	TABOGA	AGSI-D-5926	No	63	YATE							315	5	1	MUELLE 1A 	2022-02-04 00:00:00	2022-02-05	1
12	ALMIRANTA	AGSI-2927	No	44	CASA BOTE							220	5	1	MUELLE 1A	2022-02-04 00:00:00	2022-02-05	1
13	KAMILA	ARSH-RE-0016	No	52	YATE							260	5	1	MUELLE 2A 	2022-02-04 00:00:00	2022-02-05	1
14	MARTA MERCEDES	ARSH-D-1850	No	85	YATE							425	5	1	MUELLE 2A 	2022-02-04 00:00:00	2022-02-05	1
15	MALECON	ADKN-D-3015	No	36	LANCHA							180	5	1	MUELLE 2A 	2022-02-04 00:00:00	2022-02-05	1
16	TONINA  	AGSI-RE-0655	No	50	LANCHA							250	5	1	MUELLE 2A	2022-02-04 00:00:00	2022-02-05	1
17	MARY ELENA	AGSI-RE-1176	No	81	YATE							405	5	1	MUELLE B	2022-02-04 00:00:00	2022-02-05	1
18	IDOLIDIA	AGSI-D-10408	No	28	YATE							165	5	1	MUELLE B	2022-02-04 00:00:00	2022-02-05	1
19	DEL MAR	AGSI-D-22487	No	30	YATE							165	5	1	MUELLE B	2022-02-04 00:00:00	2022-02-05	1
20	GLADIUS 	AGSI-PE-0532	No	24	LANCHA							165	5	1	MUELLE B	2022-02-04 00:00:00	2022-02-05	1
22	SANGRE AZUL	AGSI-PE-0829	No	34	YATE							170	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
23	ANAMA	AGSI-PE-0830	No	23	LANCHA							165	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
24	CINCO CERO	AGSI-D-11629	No	27	LANCHA							165	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
25	4 CARIBES	AGSI-D-9005	No	31	YATE							165	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
26	GRACE I	AGSI-PE-0887	No	25	LANCHA							165	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
27	VIKINGO	AGSI-RE-0606	No	32	YATE							165	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
28	INTIMA	AGSI-D-5124	No	36	YATE							180	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
29	MARE NOUTRIOM 	AGSI-D-6150	No	35	YATE							175	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
21	NANCYS TOY	AGSI-D-22966	No	58	LANCHA							290	5	1	MUELLE C	2022-02-04 00:00:00	2022-02-05	1
34	BROADWAY	AGSI-RE-22326	No	33	LANCHA							165	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
39	CAVAC	AGSI-RE-0437	No	30	VELERO							165	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
30	DIVING BLUE 	AGSI-TU-0182	No	35	YATE							175	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
42	SAKAIKA	APNN-D-675	No	35	LANCHA							175	5	1	PATIO 1	2022-02-04 00:00:00	2022-02-05	2
44	GALENA	AGSI-D-5426	No	35	LANCHA							175	5	1	PATIO 2	2022-02-04 00:00:00	2022-02-05	2
31	FAMILY TIME	AGSI-RE-0575	No	40	YATE							200	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
32	ALEJA	AGSI-D-5535	No	42	LANCHA							210	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
33	4 FANTASTICOS	AGSI-RE-1011	No	45	YATE							225	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
35	ONE MORE TOY	AGSI-RE-0202	No	88	YATE							440	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
36	INVICTUS 	AGSP-RE-0514	No	63	YATE							325	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
38	TIGHT LINE	AGSI-RE-1243	No	53	YATE							265	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
40	TITANIA	AGSI-TU-0072	No	14	LANCHA							70	5	1	PATIO 1	2022-02-04 00:00:00	2022-02-05	2
37	TACHIAO	AGSI-TU-0058	No	48	VELERO							240	5	1	MUELLE D	2022-02-04 00:00:00	2022-02-05	1
41	MI DUSHI	AGSI-RE-1472	No	20	LANCHA							100	5	1	PATIO 1	2022-02-04 00:00:00	2022-02-05	2
43	CAMIMAR	AGSI-RE-0601	No	22	LANCHA							110	5	1	PATIO 2	2022-02-04 00:00:00	2022-02-05	2
\.


--
-- TOC entry 3523 (class 0 OID 58350)
-- Dependencies: 237
-- Data for Name: deta_factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_factura (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, id_fact, id_tarifa) FROM stdin;
\.


--
-- TOC entry 3500 (class 0 OID 58162)
-- Dependencies: 214
-- Data for Name: deta_recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.deta_recibo (id, matricula, pies, ob, tarifa, dia, canon, monto_estimado, totald, totalb, id_fact, id_tarifa) FROM stdin;
\.


--
-- TOC entry 3502 (class 0 OID 58168)
-- Dependencies: 216
-- Data for Name: dolar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dolar (id_dolar, desc_dolarc, desc_dolarp) FROM stdin;
1	5.22	5.68
\.


--
-- TOC entry 3504 (class 0 OID 58172)
-- Dependencies: 218
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empresa (id, descripcion, rif, fecha, fecha_update) FROM stdin;
1	MARINA CARABALLEDA	G160000	2022-02-04 00:00:00	2022-02-04 00:00:00
\.


--
-- TOC entry 3505 (class 0 OID 58175)
-- Dependencies: 219
-- Data for Name: estatus; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estatus (id_status, descripcion, fecha_reg, fecha_update) FROM stdin;
1	Anulado	2022-06-29	2022-06-29 00:00:00
2	Pagado	2022-03-07	2022-03-07 00:00:00
0	Deuda	2022-06-29	2022-06-29 00:00:00
3	Abonado	2022-07-02	2022-07-02 00:00:00
\.


--
-- TOC entry 3527 (class 0 OID 58372)
-- Dependencies: 241
-- Data for Name: factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.factura (id, nro_factura, nombre, matricula, tele_1, total_iva, total_mas_iva, total_bs, fechaingreso, id_status, fecha_update, valor_iva, cedula, id_tipo_pago, id_banco, nro_referencia, fechatrnas) FROM stdin;
\.


--
-- TOC entry 3525 (class 0 OID 58362)
-- Dependencies: 239
-- Data for Name: mensualidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mensualidad (id_mensualidad, matricula, pies, id_tarifa, tarifa, dia, canon, fecha_deuda, id_status, fecha_reg, fecha_update, id_factura) FROM stdin;
27	AGSI-RE-1176	81	1	1	1	81	2022-02-05	0	2022-02-05	2022-02-05 00:00:00	0
42	AGSI-TU-0072	14	2	1	1	14	2022-02-05	0	2022-02-05	2022-02-05 00:00:00	0
1	AGSI-D-9005	31	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:03:07	0
2	AGSI-RE-1011	45	1	1	1	45	2022-02-05	2	2022-02-05	2022-02-05 02:07:21	0
3	AGSI-D-5535	42	1	1	1	42	2022-02-05	2	2022-02-05	2022-02-05 02:08:05	0
4	AGSI-2927	44	1	1	1	44	2022-02-05	2	2022-02-05	2022-02-05 02:08:36	0
5	AGSI-PE-0830	23	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:09:12	0
6	AGSI-RE-22326	33	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:09:46	0
7	AGSI-RE-0601	22	2	1	1	22	2022-02-05	3	2022-02-05	2022-02-05 02:11:07	0
8	AGSI-RE-0437	30	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:12:08	0
9	AGSI-D-11629	27	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:12:35	0
10	AGSI-D-5814	37	1	1	1	37	2022-02-05	2	2022-02-05	2022-02-05 02:13:38	0
11	AGSI-D-22487	30	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:14:10	0
12	AGSI-TU-0182	35	1	1	1	35	2022-02-05	2	2022-02-05	2022-02-05 02:14:37	0
13	AGSI-RE-0661	45	1	1	1	45	2022-02-05	2	2022-02-05	2022-02-05 02:15:10	0
14	AGSI-RE-0575	40	1	1	1	40	2022-02-05	2	2022-02-05	2022-02-05 02:15:40	0
15	AGSI-D-5426	35	2	1	1	35	2022-02-05	2	2022-02-05	2022-02-05 02:16:25	0
16	AGSI-PE-0532	24	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:17:25	0
17	AGSI-PE-0887	25	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:17:53	0
18	AGSI-D-10408	28	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:18:18	0
19	AGSI-D-5124	36	1	1	1	36	2022-02-05	2	2022-02-05	2022-02-05 02:18:45	0
20	AGSP-RE-0514	63	1	1	1	63	2022-02-05	2	2022-02-05	2022-02-05 02:19:14	0
21	ARSH-RE-0016	52	1	1	1	52	2022-02-05	2	2022-02-05	2022-02-05 02:19:55	0
22	AGSI-2720	47	1	1	1	47	2022-02-05	2	2022-02-05	2022-02-05 02:20:26	0
23	AGSI-RE-1072	47	1	1	1	47	2022-02-05	2	2022-02-05	2022-02-05 02:21:00	0
24	ADKN-D-3015	36	1	1	1	36	2022-02-05	2	2022-02-05	2022-02-05 02:21:30	0
25	AGSI-D-6150	35	1	1	1	35	2022-02-05	2	2022-02-05	2022-02-05 02:22:29	0
26	ARSH-D-1850	85	1	1	1	85	2022-02-05	3	2022-02-05	2022-02-05 02:23:31	0
28	AGSI-RE-1472	20	2	1	1	20	2022-02-05	3	2022-02-05	2022-02-05 02:24:29	0
29	AGSI-RE-1098	30	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:25:07	0
30	AGSI-D-22966	58	1	1	1	58	2022-02-05	2	2022-02-05	2022-02-05 02:25:35	0
31	AGSI-RE-0202	88	1	1	1	88	2022-02-05	3	2022-02-05	2022-02-05 02:27:00	0
32	AGSI-D-11413	32	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:27:48	0
33	APNN-D-675	35	2	1	1	35	2022-02-05	2	2022-02-05	2022-02-05 02:28:16	0
34	AGSI-PE-0829	34	1	1	1	34	2022-02-05	2	2022-02-05	2022-02-05 02:28:44	0
35	AGSI-D-23005	63	1	1	1	63	2022-02-05	2	2022-02-05	2022-02-05 02:29:11	0
36	AGSI-RE-1001	54	1	1	1	54	2022-02-05	2	2022-02-05	2022-02-05 02:29:41	0
37	AGSI-D-5926	63	1	1	1	63	2022-02-05	2	2022-02-05	2022-02-05 02:30:06	0
38	AGSI-TU-0058	48	1	1	1	48	2022-02-05	2	2022-02-05	2022-02-05 02:30:39	0
39	AGSI-RE-1349	60	1	1	1	60	2022-02-05	2	2022-02-05	2022-02-05 02:31:05	0
40	AGSI-RE-0886	46	1	1	1	46	2022-02-05	2	2022-02-05	2022-02-05 02:31:32	0
41	AGSI-RE-1243	53	1	1	1	53	2022-02-05	2	2022-02-05	2022-02-05 02:32:07	0
44	AGSI-RE-0606	32	1	1	1	33	2022-02-05	2	2022-02-05	2022-02-05 02:33:48	0
43	AGSI-RE-0655	50	1	1	1	50	2022-02-05	2	2022-02-05	2022-02-05 02:34:18	0
50	AGSI-RE-22326	33	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
51	AGSI-RE-0601	22	2	1	1	22	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
52	AGSI-RE-0437	30	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
53	AGSI-D-11629	27	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
54	AGSI-D-5814	37	1	1	1	37	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
55	AGSI-D-22487	30	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
56	AGSI-TU-0182	35	1	1	1	35	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
57	AGSI-RE-0661	45	1	1	1	45	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
58	AGSI-RE-0575	40	1	1	1	40	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
59	AGSI-D-5426	35	2	1	1	35	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
60	AGSI-PE-0532	24	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
61	AGSI-PE-0887	25	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
62	AGSI-D-10408	28	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
63	AGSI-D-5124	36	1	1	1	36	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
64	AGSP-RE-0514	63	1	1	1	63	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
65	ARSH-RE-0016	52	1	1	1	52	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
66	AGSI-2720	47	1	1	1	47	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
67	AGSI-RE-1072	47	1	1	1	47	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
68	ADKN-D-3015	36	1	1	1	36	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
69	AGSI-D-6150	35	1	1	1	35	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
70	ARSH-D-1850	85	1	1	1	85	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
71	AGSI-RE-1176	81	1	1	1	81	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
72	AGSI-RE-1472	20	2	1	1	20	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
73	AGSI-RE-1098	30	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
74	AGSI-D-22966	58	1	1	1	58	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
75	AGSI-RE-0202	88	1	1	1	88	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
76	AGSI-D-11413	32	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
77	APNN-D-675	35	2	1	1	35	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
78	AGSI-PE-0829	34	1	1	1	34	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
79	AGSI-D-23005	63	1	1	1	63	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
80	AGSI-RE-1001	54	1	1	1	54	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
81	AGSI-D-5926	63	1	1	1	63	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
82	AGSI-TU-0058	48	1	1	1	48	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
83	AGSI-RE-1349	60	1	1	1	60	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
48	AGSI-2927	44	1	1	1	44	2022-03-05	2	2022-03-05	2022-07-15 07:26:55	0
49	AGSI-PE-0830	23	1	1	1	33	2022-03-05	2	2022-03-05	2022-07-15 07:33:52	0
84	AGSI-RE-0886	46	1	1	1	46	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
85	AGSI-RE-1243	53	1	1	1	53	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
86	AGSI-TU-0072	14	2	1	1	14	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
46	AGSI-RE-1011	45	1	1	1	45	2022-03-05	2	2022-03-05	2022-03-05 02:53:39	0
87	AGSI-RE-0655	50	1	1	1	50	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
88	AGSI-RE-0606	32	1	1	1	33	2022-03-05	0	2022-03-05	2022-03-05 00:00:00	0
45	AGSI-D-9005	31	1	1	1	33	2022-03-05	2	2022-03-05	2022-03-05 02:35:48	0
94	AGSI-RE-22326	33	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
95	AGSI-RE-0601	22	2	5	1	110	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
96	AGSI-RE-0437	30	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
97	AGSI-D-11629	27	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
98	AGSI-D-5814	37	1	5	1	185	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
99	AGSI-D-22487	30	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
100	AGSI-TU-0182	35	1	5	1	175	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
101	AGSI-RE-0661	45	1	5	1	225	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
102	AGSI-RE-0575	40	1	5	1	200	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
103	AGSI-D-5426	35	2	5	1	175	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
104	AGSI-PE-0532	24	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
105	AGSI-PE-0887	25	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
106	AGSI-D-10408	28	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
107	AGSI-D-5124	36	1	5	1	180	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
108	AGSP-RE-0514	63	1	5	1	325	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
109	ARSH-RE-0016	52	1	5	1	260	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
110	AGSI-2720	47	1	5	1	235	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
111	AGSI-RE-1072	47	1	5	1	235	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
112	ADKN-D-3015	36	1	5	1	180	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
113	AGSI-D-6150	35	1	5	1	175	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
114	ARSH-D-1850	85	1	5	1	425	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
115	AGSI-RE-1176	81	1	5	1	405	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
116	AGSI-RE-1472	20	2	5	1	100	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
117	AGSI-RE-1098	30	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
118	AGSI-D-22966	58	1	5	1	290	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
119	AGSI-RE-0202	88	1	5	1	440	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
120	AGSI-D-11413	32	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
121	APNN-D-675	35	2	5	1	175	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
122	AGSI-PE-0829	34	1	5	1	170	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
123	AGSI-D-23005	63	1	5	1	315	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
124	AGSI-RE-1001	54	1	5	1	270	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
125	AGSI-D-5926	63	1	5	1	315	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
126	AGSI-TU-0058	48	1	5	1	240	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
127	AGSI-RE-1349	60	1	5	1	300	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
128	AGSI-RE-0886	46	1	5	1	230	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
129	AGSI-RE-1243	53	1	5	1	265	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
130	AGSI-TU-0072	14	2	5	1	70	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
131	AGSI-RE-0655	50	1	5	1	250	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
132	AGSI-RE-0606	32	1	5	1	165	2022-04-05	0	2022-04-05	2022-04-05 00:00:00	0
90	AGSI-RE-1011	45	1	5	1	225	2022-04-05	2	2022-04-05	2022-04-05 03:57:43	0
133	AGSI-D-9005	31	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
136	AGSI-2927	44	1	5	1	220	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
138	AGSI-RE-22326	33	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
139	AGSI-RE-0601	22	2	5	1	110	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
140	AGSI-RE-0437	30	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
141	AGSI-D-11629	27	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
142	AGSI-D-5814	37	1	5	1	185	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
143	AGSI-D-22487	30	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
144	AGSI-TU-0182	35	1	5	1	175	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
145	AGSI-RE-0661	45	1	5	1	225	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
146	AGSI-RE-0575	40	1	5	1	200	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
147	AGSI-D-5426	35	2	5	1	175	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
148	AGSI-PE-0532	24	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
149	AGSI-PE-0887	25	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
150	AGSI-D-10408	28	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
151	AGSI-D-5124	36	1	5	1	180	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
152	AGSP-RE-0514	63	1	5	1	325	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
153	ARSH-RE-0016	52	1	5	1	260	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
154	AGSI-2720	47	1	5	1	235	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
155	AGSI-RE-1072	47	1	5	1	235	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
156	ADKN-D-3015	36	1	5	1	180	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
157	AGSI-D-6150	35	1	5	1	175	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
158	ARSH-D-1850	85	1	5	1	425	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
159	AGSI-RE-1176	81	1	5	1	405	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
160	AGSI-RE-1472	20	2	5	1	100	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
161	AGSI-RE-1098	30	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
162	AGSI-D-22966	58	1	5	1	290	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
163	AGSI-RE-0202	88	1	5	1	440	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
164	AGSI-D-11413	32	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
91	AGSI-D-5535	42	1	5	1	210	2022-04-05	2	2022-04-05	2022-07-15 07:24:14	0
92	AGSI-2927	44	1	5	1	220	2022-04-05	2	2022-04-05	2022-07-15 07:32:11	0
93	AGSI-PE-0830	23	1	5	1	165	2022-04-05	2	2022-04-05	2022-07-15 07:35:25	0
137	AGSI-PE-0830	23	1	5	1	165	2022-05-05	2	2022-05-05	2022-07-15 07:38:30	0
165	APNN-D-675	35	2	5	1	175	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
166	AGSI-PE-0829	34	1	5	1	170	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
167	AGSI-D-23005	63	1	5	1	315	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
168	AGSI-RE-1001	54	1	5	1	270	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
169	AGSI-D-5926	63	1	5	1	315	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
170	AGSI-TU-0058	48	1	5	1	240	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
171	AGSI-RE-1349	60	1	5	1	300	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
172	AGSI-RE-0886	46	1	5	1	230	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
173	AGSI-RE-1243	53	1	5	1	265	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
89	AGSI-D-9005	31	1	5	1	165	2022-04-05	2	2022-04-05	2022-07-14 03:44:12	0
174	AGSI-TU-0072	14	2	5	1	70	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
175	AGSI-RE-0655	50	1	5	1	250	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
176	AGSI-RE-0606	32	1	5	1	165	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
134	AGSI-RE-1011	45	1	5	1	225	2022-05-05	2	2022-05-05	2022-05-05 03:59:38	0
177	AGSI-D-9005	31	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
179	AGSI-D-5535	42	1	5	1	210	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
180	AGSI-2927	44	1	5	1	220	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
181	AGSI-PE-0830	23	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
182	AGSI-RE-22326	33	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
183	AGSI-RE-0601	22	2	5	1	110	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
184	AGSI-RE-0437	30	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
185	AGSI-D-11629	27	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
186	AGSI-D-5814	37	1	5	1	185	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
187	AGSI-D-22487	30	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
188	AGSI-TU-0182	35	1	5	1	175	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
189	AGSI-RE-0661	45	1	5	1	225	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
190	AGSI-RE-0575	40	1	5	1	200	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
191	AGSI-D-5426	35	2	5	1	175	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
192	AGSI-PE-0532	24	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
193	AGSI-PE-0887	25	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
194	AGSI-D-10408	28	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
195	AGSI-D-5124	36	1	5	1	180	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
196	AGSP-RE-0514	63	1	5	1	325	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
197	ARSH-RE-0016	52	1	5	1	260	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
198	AGSI-2720	47	1	5	1	235	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
199	AGSI-RE-1072	47	1	5	1	235	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
200	ADKN-D-3015	36	1	5	1	180	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
201	AGSI-D-6150	35	1	5	1	175	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
202	ARSH-D-1850	85	1	5	1	425	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
203	AGSI-RE-1176	81	1	5	1	405	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
204	AGSI-RE-1472	20	2	5	1	100	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
205	AGSI-RE-1098	30	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
206	AGSI-D-22966	58	1	5	1	290	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
207	AGSI-RE-0202	88	1	5	1	440	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
208	AGSI-D-11413	32	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
209	APNN-D-675	35	2	5	1	175	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
210	AGSI-PE-0829	34	1	5	1	170	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
211	AGSI-D-23005	63	1	5	1	315	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
212	AGSI-RE-1001	54	1	5	1	270	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
213	AGSI-D-5926	63	1	5	1	315	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
214	AGSI-TU-0058	48	1	5	1	240	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
215	AGSI-RE-1349	60	1	5	1	300	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
216	AGSI-RE-0886	46	1	5	1	230	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
217	AGSI-RE-1243	53	1	5	1	265	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
218	AGSI-TU-0072	14	2	5	1	70	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
219	AGSI-RE-0655	50	1	5	1	250	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
220	AGSI-RE-0606	32	1	5	1	165	2022-06-05	0	2022-06-05	2022-06-05 00:00:00	0
221	AGSI-D-9005	31	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
222	AGSI-RE-1011	45	1	5	1	225	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
223	AGSI-D-5535	42	1	5	1	210	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
224	AGSI-2927	44	1	5	1	220	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
225	AGSI-PE-0830	23	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
226	AGSI-RE-22326	33	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
227	AGSI-RE-0601	22	2	5	1	110	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
228	AGSI-RE-0437	30	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
229	AGSI-D-11629	27	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
230	AGSI-D-5814	37	1	5	1	185	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
231	AGSI-D-22487	30	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
232	AGSI-TU-0182	35	1	5	1	175	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
233	AGSI-RE-0661	45	1	5	1	225	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
234	AGSI-RE-0575	40	1	5	1	200	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
235	AGSI-D-5426	35	2	5	1	175	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
236	AGSI-PE-0532	24	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
237	AGSI-PE-0887	25	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
238	AGSI-D-10408	28	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
239	AGSI-D-5124	36	1	5	1	180	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
240	AGSP-RE-0514	63	1	5	1	325	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
241	ARSH-RE-0016	52	1	5	1	260	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
242	AGSI-2720	47	1	5	1	235	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
243	AGSI-RE-1072	47	1	5	1	235	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
244	ADKN-D-3015	36	1	5	1	180	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
245	AGSI-D-6150	35	1	5	1	175	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
246	ARSH-D-1850	85	1	5	1	425	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
247	AGSI-RE-1176	81	1	5	1	405	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
248	AGSI-RE-1472	20	2	5	1	100	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
249	AGSI-RE-1098	30	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
250	AGSI-D-22966	58	1	5	1	290	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
251	AGSI-RE-0202	88	1	5	1	440	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
252	AGSI-D-11413	32	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
253	APNN-D-675	35	2	5	1	175	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
254	AGSI-PE-0829	34	1	5	1	170	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
255	AGSI-D-23005	63	1	5	1	315	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
256	AGSI-RE-1001	54	1	5	1	270	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
257	AGSI-D-5926	63	1	5	1	315	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
258	AGSI-TU-0058	48	1	5	1	240	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
259	AGSI-RE-1349	60	1	5	1	300	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
260	AGSI-RE-0886	46	1	5	1	230	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
261	AGSI-RE-1243	53	1	5	1	265	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
262	AGSI-TU-0072	14	2	5	1	70	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
263	AGSI-RE-0655	50	1	5	1	250	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
264	AGSI-RE-0606	32	1	5	1	165	2022-07-05	0	2022-07-05	2022-07-05 00:00:00	0
178	AGSI-RE-1011	45	1	5	1	225	2022-06-05	2	2022-06-05	2022-07-05 04:02:57	0
47	AGSI-D-5535	42	1	1	1	42	2022-03-05	2	2022-03-05	2022-07-15 07:16:04	0
135	AGSI-D-5535	42	1	5	1	210	2022-05-05	0	2022-05-05	2022-05-05 00:00:00	0
\.


--
-- TOC entry 3521 (class 0 OID 58339)
-- Dependencies: 235
-- Data for Name: mov_consig; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mov_consig (id_mov_consig, id_mensualidad, id_tipo_pago, nro_referencia, total_ant_d, id_dolar, valor, total_ant_bs, total_abonado_bs, total_abonado_om, restante_bs, restante_om, id_user, id_estatus, fecha_reg, id_banco, fechatrnas) FROM stdin;
1	1	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
2	2	0		0	1	5.80	0	0	0	7.76	45	1	0	2022-02-05	\N	\N
3	3	0		0	1	5.80	0	0	0	7.24	42	1	0	2022-02-05	\N	\N
4	4	0		0	1	5.80	0	0	0	7.59	44	1	0	2022-02-05	\N	\N
5	5	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
6	6	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
7	7	0		0	1	5.80	0	0	0	3.79	22	1	0	2022-02-05	\N	\N
8	8	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
9	9	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
10	10	0		0	1	5.80	0	0	0	6.38	37	1	0	2022-02-05	\N	\N
11	11	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
12	12	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-02-05	\N	\N
13	13	0		0	1	5.80	0	0	0	7.76	45	1	0	2022-02-05	\N	\N
14	14	0		0	1	5.80	0	0	0	6.9	40	1	0	2022-02-05	\N	\N
15	15	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-02-05	\N	\N
16	16	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
17	17	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
18	18	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
19	19	0		0	1	5.80	0	0	0	6.21	36	1	0	2022-02-05	\N	\N
20	20	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-02-05	\N	\N
21	21	0		0	1	5.80	0	0	0	8.97	52	1	0	2022-02-05	\N	\N
22	22	0		0	1	5.80	0	0	0	8.1	47	1	0	2022-02-05	\N	\N
23	23	0		0	1	5.80	0	0	0	8.1	47	1	0	2022-02-05	\N	\N
24	24	0		0	1	5.80	0	0	0	6.21	36	1	0	2022-02-05	\N	\N
25	25	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-02-05	\N	\N
26	26	0		0	1	5.80	0	0	0	14.66	85	1	0	2022-02-05	\N	\N
27	27	0		0	1	5.80	0	0	0	13.97	81	1	0	2022-02-05	\N	\N
28	28	0		0	1	5.80	0	0	0	3.45	20	1	0	2022-02-05	\N	\N
29	29	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
30	30	0		0	1	5.80	0	0	0	10	58	1	0	2022-02-05	\N	\N
31	31	0		0	1	5.80	0	0	0	15.17	88	1	0	2022-02-05	\N	\N
32	32	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
33	33	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-02-05	\N	\N
34	34	0		0	1	5.80	0	0	0	5.86	34	1	0	2022-02-05	\N	\N
35	35	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-02-05	\N	\N
36	36	0		0	1	5.80	0	0	0	9.31	54	1	0	2022-02-05	\N	\N
37	37	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-02-05	\N	\N
38	38	0		0	1	5.80	0	0	0	8.28	48	1	0	2022-02-05	\N	\N
39	39	0		0	1	5.80	0	0	0	10.34	60	1	0	2022-02-05	\N	\N
40	40	0		0	1	5.80	0	0	0	7.93	46	1	0	2022-02-05	\N	\N
41	41	0		0	1	5.80	0	0	0	9.14	53	1	0	2022-02-05	\N	\N
42	42	0		0	1	5.80	0	0	0	2.41	14	1	0	2022-02-05	\N	\N
43	43	0		0	1	5.80	0	0	0	8.62	50	1	0	2022-02-05	\N	\N
44	44	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-02-05	\N	\N
45	1	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
46	2	1	12519841244	45	1	5.80	7,76	7,76	45	0	0	1	2	2022-02-05	1	2022-02-03
47	3	3		42	1	5.80	7,24	7,24	42	-0	0	1	2	2022-02-05	0	2022-02-05
48	4	3		44	1	5.80	7,59	7,59	44	0	0	1	2	2022-02-05	0	2022-02-05
49	5	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
50	6	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
51	7	3		22	1	5.80	3,79	5,69	33	-1,9	-11	1	3	2022-02-05	0	2022-02-05
52	8	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
53	9	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
54	10	3	52300693113	37	1	5.80	6,38	6,38	37	0	0	1	2	2022-02-05	1	2022-02-05
55	11	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
56	12	0		35	1	5.80	6,03	6,03	35	-0	0	1	2	2022-02-05	0	2022-02-05
57	13	3		45	1	5.80	7,76	7,76	45	0	0	1	2	2022-02-05	0	2022-02-05
58	14	3		40	1	5.80	6,9	6,9	40	0	0	1	2	2022-02-05	0	2022-02-05
59	15	3		35	1	5.80	6,03	6,03	35	-0	0	1	2	2022-02-05	0	2022-02-05
60	16	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
61	17	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
62	18	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
63	19	3		36	1	5.80	6,21	6,21	36	0	0	1	2	2022-02-05	0	2022-02-05
64	20	3		63	1	5.80	10,86	10,86	63	-0	0	1	2	2022-02-05	0	2022-02-05
65	21	3		52	1	5.80	8,97	8,97	52	0	0	1	2	2022-02-05	0	2022-02-05
66	22	3		47	1	5.80	8,1	8,1	47	-0	0	1	2	2022-02-05	0	2022-02-05
67	23	0		47	1	5.80	8,1	8,1	47	-0	0	1	2	2022-02-05	0	2022-02-05
68	24	3		36	1	5.80	6,21	6,21	36	0	0	1	2	2022-02-05	0	2022-02-05
69	25	3		35	1	5.80	6,03	6,03	35	-0	0	1	2	2022-02-05	0	2022-02-05
70	26	3		85	1	5.80	14,66	14,31	83	0,35	2	1	3	2022-02-05	0	2022-02-05
71	28	3		20	1	5.80	3,45	3,28	19	0,17	1	1	3	2022-02-05	0	2022-02-05
72	29	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
73	30	3		58	1	5.80	10	10	58	0	0	1	2	2022-02-05	0	2022-02-05
74	31	3		88	1	5.80	15,17	30,34	176,00	-15,17	-88	1	3	2022-02-05	0	2022-02-05
75	32	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
76	33	3		35	1	5.80	6,03	6,03	35	-0	0	1	2	2022-02-05	0	2022-02-05
77	34	3		34	1	5.80	5,86	5,86	34	-0	0	1	2	2022-02-05	0	2022-02-05
78	35	3		63	1	5.80	10,86	10,86	63	-0	0	1	2	2022-02-05	0	2022-02-05
79	36	3		54	1	5.80	9,31	9,31	54	-0	0	1	2	2022-02-05	0	2022-02-05
80	37	3		63	1	5.80	10,86	10,86	63	-0	0	1	2	2022-02-05	0	2022-02-05
81	38	3		48	1	5.80	8,28	8,28	48	0	0	1	2	2022-02-05	0	2022-02-05
82	39	3		60	1	5.80	10,34	10,34	60	-0	0	1	2	2022-02-05	0	2022-02-05
83	40	3		46	1	5.80	7,93	7,93	46	-0	0	1	2	2022-02-05	0	2022-02-05
84	41	3		53	1	5.80	9,14	9,14	53	0	0	1	2	2022-02-05	0	2022-02-05
85	44	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-02-05	0	2022-02-05
86	43	3		50	1	5.80	8,62	8,62	50	-0	0	1	2	2022-02-05	0	2022-02-05
87	45	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
88	46	0		0	1	5.80	0	0	0	7.76	45	1	0	2022-03-05	\N	\N
89	47	0		0	1	5.80	0	0	0	7.24	42	1	0	2022-03-05	\N	\N
90	48	0		0	1	5.80	0	0	0	7.59	44	1	0	2022-03-05	\N	\N
91	49	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
92	50	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
93	51	0		0	1	5.80	0	0	0	3.79	22	1	0	2022-03-05	\N	\N
94	52	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
95	53	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
96	54	0		0	1	5.80	0	0	0	6.38	37	1	0	2022-03-05	\N	\N
97	55	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
98	56	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-03-05	\N	\N
99	57	0		0	1	5.80	0	0	0	7.76	45	1	0	2022-03-05	\N	\N
100	58	0		0	1	5.80	0	0	0	6.9	40	1	0	2022-03-05	\N	\N
101	59	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-03-05	\N	\N
102	60	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
103	61	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
104	62	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
105	63	0		0	1	5.80	0	0	0	6.21	36	1	0	2022-03-05	\N	\N
106	64	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-03-05	\N	\N
107	65	0		0	1	5.80	0	0	0	8.97	52	1	0	2022-03-05	\N	\N
108	66	0		0	1	5.80	0	0	0	8.1	47	1	0	2022-03-05	\N	\N
109	67	0		0	1	5.80	0	0	0	8.1	47	1	0	2022-03-05	\N	\N
110	68	0		0	1	5.80	0	0	0	6.21	36	1	0	2022-03-05	\N	\N
111	69	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-03-05	\N	\N
112	70	0		0	1	5.80	0	0	0	14.66	85	1	0	2022-03-05	\N	\N
113	71	0		0	1	5.80	0	0	0	13.97	81	1	0	2022-03-05	\N	\N
114	72	0		0	1	5.80	0	0	0	3.45	20	1	0	2022-03-05	\N	\N
115	73	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
116	74	0		0	1	5.80	0	0	0	10	58	1	0	2022-03-05	\N	\N
117	75	0		0	1	5.80	0	0	0	15.17	88	1	0	2022-03-05	\N	\N
118	76	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
119	77	0		0	1	5.80	0	0	0	6.03	35	1	0	2022-03-05	\N	\N
120	78	0		0	1	5.80	0	0	0	5.86	34	1	0	2022-03-05	\N	\N
121	79	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-03-05	\N	\N
122	80	0		0	1	5.80	0	0	0	9.31	54	1	0	2022-03-05	\N	\N
123	81	0		0	1	5.80	0	0	0	10.86	63	1	0	2022-03-05	\N	\N
124	82	0		0	1	5.80	0	0	0	8.28	48	1	0	2022-03-05	\N	\N
125	83	0		0	1	5.80	0	0	0	10.34	60	1	0	2022-03-05	\N	\N
126	84	0		0	1	5.80	0	0	0	7.93	46	1	0	2022-03-05	\N	\N
127	85	0		0	1	5.80	0	0	0	9.14	53	1	0	2022-03-05	\N	\N
128	86	0		0	1	5.80	0	0	0	2.41	14	1	0	2022-03-05	\N	\N
129	87	0		0	1	5.80	0	0	0	8.62	50	1	0	2022-03-05	\N	\N
130	88	0		0	1	5.80	0	0	0	5.69	33	1	0	2022-03-05	\N	\N
131	45	3		33	1	5.80	5,69	5,69	33	0	0	1	2	2022-03-05	0	2022-03-05
132	46	3		45	1	5.80	7,76	7,76	45	0	0	1	2	2022-03-05	0	2022-03-05
133	89	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
134	90	0		0	1	5.80	0	0	0	38.79	225	1	0	2022-04-05	\N	\N
135	91	0		0	1	5.80	0	0	0	36.21	210	1	0	2022-04-05	\N	\N
137	93	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
138	94	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
139	95	0		0	1	5.80	0	0	0	18.97	110	1	0	2022-04-05	\N	\N
140	96	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
141	97	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
142	98	0		0	1	5.80	0	0	0	31.9	185	1	0	2022-04-05	\N	\N
143	99	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
144	100	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-04-05	\N	\N
145	101	0		0	1	5.80	0	0	0	38.79	225	1	0	2022-04-05	\N	\N
146	102	0		0	1	5.80	0	0	0	34.48	200	1	0	2022-04-05	\N	\N
147	103	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-04-05	\N	\N
148	104	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
149	105	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
150	106	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
151	107	0		0	1	5.80	0	0	0	31.03	180	1	0	2022-04-05	\N	\N
152	108	0		0	1	5.80	0	0	0	56.03	325	1	0	2022-04-05	\N	\N
153	109	0		0	1	5.80	0	0	0	44.83	260	1	0	2022-04-05	\N	\N
154	110	0		0	1	5.80	0	0	0	40.52	235	1	0	2022-04-05	\N	\N
155	111	0		0	1	5.80	0	0	0	40.52	235	1	0	2022-04-05	\N	\N
156	112	0		0	1	5.80	0	0	0	31.03	180	1	0	2022-04-05	\N	\N
157	113	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-04-05	\N	\N
158	114	0		0	1	5.80	0	0	0	73.28	425	1	0	2022-04-05	\N	\N
159	115	0		0	1	5.80	0	0	0	69.83	405	1	0	2022-04-05	\N	\N
160	116	0		0	1	5.80	0	0	0	17.24	100	1	0	2022-04-05	\N	\N
161	117	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
162	118	0		0	1	5.80	0	0	0	50	290	1	0	2022-04-05	\N	\N
163	119	0		0	1	5.80	0	0	0	75.86	440	1	0	2022-04-05	\N	\N
164	120	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
165	121	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-04-05	\N	\N
166	122	0		0	1	5.80	0	0	0	29.31	170	1	0	2022-04-05	\N	\N
167	123	0		0	1	5.80	0	0	0	54.31	315	1	0	2022-04-05	\N	\N
168	124	0		0	1	5.80	0	0	0	46.55	270	1	0	2022-04-05	\N	\N
169	125	0		0	1	5.80	0	0	0	54.31	315	1	0	2022-04-05	\N	\N
170	126	0		0	1	5.80	0	0	0	41.38	240	1	0	2022-04-05	\N	\N
171	127	0		0	1	5.80	0	0	0	51.72	300	1	0	2022-04-05	\N	\N
172	128	0		0	1	5.80	0	0	0	39.66	230	1	0	2022-04-05	\N	\N
173	129	0		0	1	5.80	0	0	0	45.69	265	1	0	2022-04-05	\N	\N
174	130	0		0	1	5.80	0	0	0	12.07	70	1	0	2022-04-05	\N	\N
175	131	0		0	1	5.80	0	0	0	43.1	250	1	0	2022-04-05	\N	\N
176	132	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-04-05	\N	\N
177	90	3		225	1	5.80	38,79	38,79	225,00	-0	0	1	2	2022-04-05	0	2022-04-05
178	133	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
179	134	0		0	1	5,80	0	0	0	45	225	1	0	2022-05-05	\N	\N
180	135	0		0	1	5,80	0	0	0	42	210	1	0	2022-05-05	\N	\N
181	136	0		0	1	5,80	0	0	0	44	220	1	0	2022-05-05	\N	\N
183	138	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
184	139	0		0	1	5,80	0	0	0	22	110	1	0	2022-05-05	\N	\N
185	140	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
186	141	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
187	142	0		0	1	5,80	0	0	0	37	185	1	0	2022-05-05	\N	\N
188	143	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
189	144	0		0	1	5,80	0	0	0	35	175	1	0	2022-05-05	\N	\N
190	145	0		0	1	5,80	0	0	0	45	225	1	0	2022-05-05	\N	\N
191	146	0		0	1	5,80	0	0	0	40	200	1	0	2022-05-05	\N	\N
192	147	0		0	1	5,80	0	0	0	35	175	1	0	2022-05-05	\N	\N
193	148	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
194	149	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
195	150	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
196	151	0		0	1	5,80	0	0	0	36	180	1	0	2022-05-05	\N	\N
197	152	0		0	1	5,80	0	0	0	65	325	1	0	2022-05-05	\N	\N
198	153	0		0	1	5,80	0	0	0	52	260	1	0	2022-05-05	\N	\N
199	154	0		0	1	5,80	0	0	0	47	235	1	0	2022-05-05	\N	\N
200	155	0		0	1	5,80	0	0	0	47	235	1	0	2022-05-05	\N	\N
201	156	0		0	1	5,80	0	0	0	36	180	1	0	2022-05-05	\N	\N
202	157	0		0	1	5,80	0	0	0	35	175	1	0	2022-05-05	\N	\N
203	158	0		0	1	5,80	0	0	0	85	425	1	0	2022-05-05	\N	\N
204	159	0		0	1	5,80	0	0	0	81	405	1	0	2022-05-05	\N	\N
205	160	0		0	1	5,80	0	0	0	20	100	1	0	2022-05-05	\N	\N
206	161	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
207	162	0		0	1	5,80	0	0	0	58	290	1	0	2022-05-05	\N	\N
208	163	0		0	1	5,80	0	0	0	88	440	1	0	2022-05-05	\N	\N
209	164	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
210	165	0		0	1	5,80	0	0	0	35	175	1	0	2022-05-05	\N	\N
211	166	0		0	1	5,80	0	0	0	34	170	1	0	2022-05-05	\N	\N
212	167	0		0	1	5,80	0	0	0	63	315	1	0	2022-05-05	\N	\N
213	168	0		0	1	5,80	0	0	0	54	270	1	0	2022-05-05	\N	\N
214	169	0		0	1	5,80	0	0	0	63	315	1	0	2022-05-05	\N	\N
215	170	0		0	1	5,80	0	0	0	48	240	1	0	2022-05-05	\N	\N
216	171	0		0	1	5,80	0	0	0	60	300	1	0	2022-05-05	\N	\N
217	172	0		0	1	5,80	0	0	0	46	230	1	0	2022-05-05	\N	\N
218	173	0		0	1	5,80	0	0	0	53	265	1	0	2022-05-05	\N	\N
219	174	0		0	1	5,80	0	0	0	14	70	1	0	2022-05-05	\N	\N
220	175	0		0	1	5,80	0	0	0	50	250	1	0	2022-05-05	\N	\N
221	176	0		0	1	5,80	0	0	0	33	165	1	0	2022-05-05	\N	\N
222	134	3		225	1	5,80	38,79	38,79	225,00	-0	0	1	2	2022-05-05	0	2022-05-05
223	177	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
224	178	0		0	1	5,80	0	0	0	45	225	1	0	2022-06-05	\N	\N
225	179	0		0	1	5,80	0	0	0	42	210	1	0	2022-06-05	\N	\N
226	180	0		0	1	5,80	0	0	0	44	220	1	0	2022-06-05	\N	\N
227	181	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
228	182	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
229	183	0		0	1	5,80	0	0	0	22	110	1	0	2022-06-05	\N	\N
230	184	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
231	185	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
232	186	0		0	1	5,80	0	0	0	37	185	1	0	2022-06-05	\N	\N
233	187	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
234	188	0		0	1	5,80	0	0	0	35	175	1	0	2022-06-05	\N	\N
235	189	0		0	1	5,80	0	0	0	45	225	1	0	2022-06-05	\N	\N
236	190	0		0	1	5,80	0	0	0	40	200	1	0	2022-06-05	\N	\N
237	191	0		0	1	5,80	0	0	0	35	175	1	0	2022-06-05	\N	\N
238	192	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
239	193	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
240	194	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
241	195	0		0	1	5,80	0	0	0	36	180	1	0	2022-06-05	\N	\N
242	196	0		0	1	5,80	0	0	0	65	325	1	0	2022-06-05	\N	\N
243	197	0		0	1	5,80	0	0	0	52	260	1	0	2022-06-05	\N	\N
244	198	0		0	1	5,80	0	0	0	47	235	1	0	2022-06-05	\N	\N
245	199	0		0	1	5,80	0	0	0	47	235	1	0	2022-06-05	\N	\N
246	200	0		0	1	5,80	0	0	0	36	180	1	0	2022-06-05	\N	\N
247	201	0		0	1	5,80	0	0	0	35	175	1	0	2022-06-05	\N	\N
248	202	0		0	1	5,80	0	0	0	85	425	1	0	2022-06-05	\N	\N
249	203	0		0	1	5,80	0	0	0	81	405	1	0	2022-06-05	\N	\N
250	204	0		0	1	5,80	0	0	0	20	100	1	0	2022-06-05	\N	\N
251	205	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
252	206	0		0	1	5,80	0	0	0	58	290	1	0	2022-06-05	\N	\N
253	207	0		0	1	5,80	0	0	0	88	440	1	0	2022-06-05	\N	\N
254	208	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
255	209	0		0	1	5,80	0	0	0	35	175	1	0	2022-06-05	\N	\N
256	210	0		0	1	5,80	0	0	0	34	170	1	0	2022-06-05	\N	\N
257	211	0		0	1	5,80	0	0	0	63	315	1	0	2022-06-05	\N	\N
258	212	0		0	1	5,80	0	0	0	54	270	1	0	2022-06-05	\N	\N
259	213	0		0	1	5,80	0	0	0	63	315	1	0	2022-06-05	\N	\N
260	214	0		0	1	5,80	0	0	0	48	240	1	0	2022-06-05	\N	\N
261	215	0		0	1	5,80	0	0	0	60	300	1	0	2022-06-05	\N	\N
262	216	0		0	1	5,80	0	0	0	46	230	1	0	2022-06-05	\N	\N
263	217	0		0	1	5,80	0	0	0	53	265	1	0	2022-06-05	\N	\N
264	218	0		0	1	5,80	0	0	0	14	70	1	0	2022-06-05	\N	\N
265	219	0		0	1	5,80	0	0	0	50	250	1	0	2022-06-05	\N	\N
266	220	0		0	1	5,80	0	0	0	33	165	1	0	2022-06-05	\N	\N
267	221	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
268	222	0		0	1	5.80	0	0	0	38.79	225	1	0	2022-07-05	\N	\N
269	223	0		0	1	5.80	0	0	0	36.21	210	1	0	2022-07-05	\N	\N
270	224	0		0	1	5.80	0	0	0	37.93	220	1	0	2022-07-05	\N	\N
271	225	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
272	226	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
273	227	0		0	1	5.80	0	0	0	18.97	110	1	0	2022-07-05	\N	\N
274	228	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
275	229	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
276	230	0		0	1	5.80	0	0	0	31.9	185	1	0	2022-07-05	\N	\N
277	231	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
278	232	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-07-05	\N	\N
279	233	0		0	1	5.80	0	0	0	38.79	225	1	0	2022-07-05	\N	\N
280	234	0		0	1	5.80	0	0	0	34.48	200	1	0	2022-07-05	\N	\N
281	235	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-07-05	\N	\N
282	236	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
283	237	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
284	238	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
285	239	0		0	1	5.80	0	0	0	31.03	180	1	0	2022-07-05	\N	\N
286	240	0		0	1	5.80	0	0	0	56.03	325	1	0	2022-07-05	\N	\N
287	241	0		0	1	5.80	0	0	0	44.83	260	1	0	2022-07-05	\N	\N
288	242	0		0	1	5.80	0	0	0	40.52	235	1	0	2022-07-05	\N	\N
289	243	0		0	1	5.80	0	0	0	40.52	235	1	0	2022-07-05	\N	\N
290	244	0		0	1	5.80	0	0	0	31.03	180	1	0	2022-07-05	\N	\N
291	245	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-07-05	\N	\N
292	246	0		0	1	5.80	0	0	0	73.28	425	1	0	2022-07-05	\N	\N
293	247	0		0	1	5.80	0	0	0	69.83	405	1	0	2022-07-05	\N	\N
294	248	0		0	1	5.80	0	0	0	17.24	100	1	0	2022-07-05	\N	\N
295	249	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
296	250	0		0	1	5.80	0	0	0	50	290	1	0	2022-07-05	\N	\N
297	251	0		0	1	5.80	0	0	0	75.86	440	1	0	2022-07-05	\N	\N
298	252	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
299	253	0		0	1	5.80	0	0	0	30.17	175	1	0	2022-07-05	\N	\N
300	254	0		0	1	5.80	0	0	0	29.31	170	1	0	2022-07-05	\N	\N
301	255	0		0	1	5.80	0	0	0	54.31	315	1	0	2022-07-05	\N	\N
302	256	0		0	1	5.80	0	0	0	46.55	270	1	0	2022-07-05	\N	\N
303	257	0		0	1	5.80	0	0	0	54.31	315	1	0	2022-07-05	\N	\N
304	258	0		0	1	5.80	0	0	0	41.38	240	1	0	2022-07-05	\N	\N
305	259	0		0	1	5.80	0	0	0	51.72	300	1	0	2022-07-05	\N	\N
306	260	0		0	1	5.80	0	0	0	39.66	230	1	0	2022-07-05	\N	\N
307	261	0		0	1	5.80	0	0	0	45.69	265	1	0	2022-07-05	\N	\N
308	262	0		0	1	5.80	0	0	0	12.07	70	1	0	2022-07-05	\N	\N
309	263	0		0	1	5.80	0	0	0	43.1	250	1	0	2022-07-05	\N	\N
310	264	0		0	1	5.80	0	0	0	28.45	165	1	0	2022-07-05	\N	\N
311	178	3		225	1	5,80	38,79	38,79	225,00	-0	0	1	2	2022-07-05	0	2022-07-05
312	89	3		165	1	5.80	28,45	28,45	165,00	0	0	1	2	2022-07-14	0	2022-07-14
313	47	3		42	1	5.80	243,6	243,6	42	0	0	1	2	2022-07-15	0	2022-07-15
315	91	3		210	1	5.80	1.218	1.218	210,00	0	0	1	2	2022-07-15	0	2022-07-15
316	48	3		44	1	5.80	255,2	255,2	44	0	0	1	2	2022-07-15	0	2022-07-15
136	92	0		0	1	5.09	0	0	0	37.93	220	1	0	2022-04-05	\N	\N
317	92	1	BAN12558389662	220	1	5.09	1.119,8	1.119,8	220,00	0	0	1	2	2022-07-15	1	2022-06-02
318	49	3		33	1	5.80	191,4	191,4	33	0	0	1	2	2022-07-15	0	2022-07-15
319	93	1	87966589	165	1	5.80	957	957	165,00	0	0	1	2	2022-07-15	0	2022-04-14
182	137	0		0	1	5,35	0	0	0	33	165	1	0	2022-05-05	\N	\N
320	137	1	88759081	165	1	5,35	882,75	882,75	165,00	0	0	1	2	2022-07-15	1	2022-06-16
\.


--
-- TOC entry 3531 (class 0 OID 58385)
-- Dependencies: 245
-- Data for Name: propiet; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.propiet (id_propiet, cedula, tipo_ced, nombrecom, tele_1, email, tipo, matricula, id_buque) FROM stdin;
1	10825818	V	NO	04148400858	sincopa2@gmail.com	principal	AGSI-D-23005	1
2	82.147.306	E	HANS POLLOSCH	04241223912		principal	AGSI-RE-0886	2
3	10.332.489	V	VICTOR MEDINA 	444		principal	AGSI-D-5814	3
4	9.416.398	V	SAUL CUEVA	04148400858	sincopa2@gmail.com	principal	AGSI-2720	4
5	5,423,429	V	MANUEL PARGA	04148400858	sincopa2@gmail.com	principal	AGSI-D-11413	5
6	81.056.832	E	JORGE ELLIOT 	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1349	6
7	3.485.429	V	CARMELO ABREU	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1072	7
8	18.088.484	V	JUAN MANZO	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1001	8
9	7.324.961	V	YOVANNY BELLIO	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1098	9
10	17.492.298	V	BERUSKA BARRIETOS	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0661	10
11	4.765.494	V	FRANCISCO ZULUAGA	04148400858	sincopa2@gmail.com	principal	AGSI-D-5926	11
12	9.416.398	V	SAUL CUEVA	04148400858	sincopa2@gmail.com	principal	AGSI-2927	12
13	14.951.124	V	JESUS ARIAS	04148400858	sincopa2@gmail.com	principal	ARSH-RE-0016	13
14	21.016.044	V	DIEGO GARCIA	04148400858	sincopa2@gmail.com	principal	ARSH-D-1850	14
15	16.309.668	V	DONNYS TOVAR 	04148400858	sincopa2@gmail.com	principal	ADKN-D-3015	15
16	18.088.509	V	LUIS PEPE	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0655	16
17	11.742.563	V	LUIS SANCHEZ	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1176	17
18	4,565,637	V	ELY PLAZA	04148400858	sincopa2@gmail.com	principal	AGSI-D-10408	18
19	81.139.161	E	MARCIAL TORRES	04148400858	sincopa2@gmail.com	principal	AGSI-D-22487	19
20	10.338.987	V	JONAS LOPEZ	04148400858	sincopa2@gmail.com	principal	AGSI-PE-0532	20
21	4.765.494	V	CESAR ALFRADO	04148400858	sincopa2@gmail.com	principal	AGSI-D-22966	21
22	16.724.478	V	ARGENIS MORENO	04242706413	sincopa2@gmail.com	principal	AGSI-PE-0829	22
23	13.042.532	V	JAIME BERTOLO	04148400858	sincopa2@gmail.com	principal	AGSI-PE-0830	23
24	16.724.478	V	ARGENIS MORENO	04148400858	sincopa2@gmail.com	principal	AGSI-D-11629	24
25	3.243.976	V	FREDDY ARABIA	04148400858	sincopa2@gmail.com	principal	AGSI-D-9005	25
26	13.865.221	V	ARTURO SALAS	04148400858	sincopa2@gmail.com	principal	AGSI-PE-0887	26
27	5.094.808	V	HERNAN VASQUEZ	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0606	27
28	11,234,237	V	ANTONIO GUZZO	04148400858	sincopa2@gmail.com	principal	AGSI-D-5124	28
29	10,335,859	V	MICHELANGELO TEPEDINO	04148400858	sincopa2@gmail.com	principal	AGSI-D-6150	29
30	12,161,760	V	ALFREDO VIVAS	04148400858	sincopa2@gmail.com	principal	AGSI-TU-0182	30
31	5.568.073	V	ANTONIO FERNANDEZ	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0575	31
32	10.825.818	V	CRISTIAN MARTIN	04148400858	sincopa2@gmail.com	principal	AGSI-D-5535	32
33	7.996.274	V	ALEXADER SANTOS	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1011	33
34	12.459.231	V	FELIX MENESEZ	04148400858	sincopa2@gmail.com	principal	AGSI-RE-22326	34
35	14.970.528	V	DANIEL RODRIGUEZ	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0202	35
36	18.941.701	V	PEDRO ELIAS 	04148400858	sincopa2@gmail.com	principal	AGSP-RE-0514	36
37	19.583.074	V	ALEJANDRO SANTAROMITA	04148400858	sincopa2@gmail.com	principal	AGSI-TU-0058	37
38	81.990.822	E	JUAN RAMIRO	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1243	38
39	81.990.822	E	JUAN RAMIRO	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0437	39
40	13.298.988	V	ANGEL PERALTA 	04148400858	sincopa2@gmail.com	principal	AGSI-TU-0072	40
41	25.175.373	V	GREGORY DE SOUSA	04148400858	sincopa2@gmail.com	principal	AGSI-RE-1472	41
42	18.941.701	V	PEDRO ELIAS 	04148400858	sincopa2@gmail.com	principal	APNN-D-675	42
43	2.942.118	V	ANTONIO RASPA 	04148400858	sincopa2@gmail.com	principal	AGSI-RE-0601	43
44	15.182.206	V	MARLONG SANCHEZ	04148400858	sincopa2@gmail.com	principal	AGSI-D-5426	44
\.


--
-- TOC entry 3506 (class 0 OID 58205)
-- Dependencies: 220
-- Data for Name: recibo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recibo (id, nombre, matricula, tele_1, fechaingreso, nro_factura, total_iva, total_mas_iva, total_bs, id_status, fecha_update, valor_iva, cedula, efectivo, transferencia, banco, trnas, fechatrnas, id_fact) FROM stdin;
\.


--
-- TOC entry 3508 (class 0 OID 58211)
-- Dependencies: 222
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarifa (id_tarifa, desc_concepto, desc_condicion, desc_tarifa, des_unidad, fecha) FROM stdin;
3	Uso Rampa	Unico	100	DIA	2022-06-28
4	Uso Rampa Moto Agua	Unico	100	DIA	2022-06-28
5	Servicio de Atraque En Muelle o Patio Lanchas en Transito	diario	3.75	PIE	2022-06-28
6	Trabajos en Patio	Diario	15	DIA	2022-06-28
7	Embarcaciones Por Ingreso de Empergencia	Exonerado 48 horas	0	DIA	2022-06-28
8	Inscripción	Unico	3000	DIA	2022-06-28
1	Puesto Fijo en Agua	Mensual	5	PIE	2022-07-14
2	Puesto en Tierra	Mensua	5	PIE	2022-07-14
\.


--
-- TOC entry 3510 (class 0 OID 58215)
-- Dependencies: 224
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
-- TOC entry 3512 (class 0 OID 58219)
-- Dependencies: 226
-- Data for Name: tipocliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipocliente (id_tipocliente, desc_tipocliente) FROM stdin;
1	Puesto Fijo
2	Puesto Transitorio
3	Exonerado
\.


--
-- TOC entry 3514 (class 0 OID 58223)
-- Dependencies: 228
-- Data for Name: tipoestac; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipoestac (id_tipoestac, desc_tipoestac) FROM stdin;
1	Patio
2	Muelle
\.


--
-- TOC entry 3516 (class 0 OID 58227)
-- Dependencies: 230
-- Data for Name: tipopago; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipopago (id_tipo_pago, descripcion) FROM stdin;
1	Transferencia
2	Pago Móvil
3	Efectivo $
4	Efectivo
\.


--
-- TOC entry 3529 (class 0 OID 58380)
-- Dependencies: 243
-- Data for Name: tripulacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tripulacion (id_tripulacion, cedulat, tipo_cedt, nombrecomt, tele_1t, cargot, matricula, id_buque, autor) FROM stdin;
1	55555	V	no	555	CAPITAN	AGSI-D-23005	1	CON ACOMPAÑANTES
2	\t82.147.306	E	HANS POLLOSCH	4444	MARINO	AGSI-RE-0886	2	CON ACOMPAÑANTES
3	10.332.489	V	VICTOR MEDINA 	4444	MARINO	AGSI-D-5814	3	CON ACOMPAÑANTES
4	9.416.398	0	SAUL CUEVA	3444	MA	AGSI-2720	4	CON ACOMPAÑANTES
5	5,423,429	V	MANUEL PARGA	444	M	AGSI-D-11413	5	CON ACOMPAÑANTES
6	81.056.832	E	JORGE ELLIOT 	4444	M	AGSI-RE-1349	6	CON ACOMPAÑANTES
7	3.485.429	V	CARMELO ABREU	4	M	AGSI-RE-1072	7	CON ACOMPAÑANTES
8	18.088.484	V	JUAN MANZO	3	M	AGSI-RE-1001	8	CON ACOMPAÑANTES
9	7.324.961	V	YOVANNY BELLIO	33	M	AGSI-RE-1098	9	CON ACOMPAÑANTES
10	17.492.298	V	BERUSKA BARRIETOS		M	AGSI-RE-0661	10	CON ACOMPAÑANTES
11	4.765.494	V	FRANCISCO ZULUAGA		M	AGSI-D-5926	11	CON ACOMPAÑANTES
12	9.416.398	V	SAUL CUEVA	444	M	AGSI-2927	12	CON ACOMPAÑANTES
13	14.951.124	V	JESUS ARIAS	4444	M	ARSH-RE-0016	13	CON ACOMPAÑANTES
14	21.016.044	0	DIEGO GARCIA		M	ARSH-D-1850	14	CON ACOMPAÑANTES
15	16.309.668	0	DONNYS TOVAR 	444	M	ADKN-D-3015	15	CON ACOMPAÑANTES
16	18.088.509	V	LUIS PEPE		M	AGSI-RE-0655	16	CON ACOMPAÑANTES
17	11.742.563	V	LUIS SANCHEZ		M	AGSI-RE-1176	17	CON ACOMPAÑANTES
18	4,565,637	V	ELY PLAZA		M	AGSI-D-10408	18	CON ACOMPAÑANTES
19	81.139.161	E	MARCIAL TORRES		M	AGSI-D-22487	19	CON ACOMPAÑANTES
20	10.338.987	V	JONAS LOPEZ		M	AGSI-PE-0532	20	CON ACOMPAÑANTES
21	4.765.494	V	CESAR ALFRADO		M	AGSI-D-22966	21	CON ACOMPAÑANTES
22	16.724.478	V	ARGENIS MORENO		M	AGSI-PE-0829	22	CON ACOMPAÑANTES
23	13.042.532	V	JAIME BERTOLO		M	AGSI-PE-0830	23	CON ACOMPAÑANTES
24	16.724.478	V	ARGENIS MORENO		M	AGSI-D-11629	24	CON ACOMPAÑANTES
25	3.243.976	V	FREDDY ARABIA		M	AGSI-D-9005	25	CON ACOMPAÑANTES
26	13.865.221	V	ARTURO SALAS		M	AGSI-PE-0887	26	CON ACOMPAÑANTES
27	5.094.808	0	HERNAN VASQUEZ		M	AGSI-RE-0606	27	CON ACOMPAÑANTES
28	11,234,237	V	ANTONIO GUZZO		M	AGSI-D-5124	28	CON ACOMPAÑANTES
29	10,335,859	V	MICHELANGELO TEPEDINO		M	AGSI-D-6150	29	CON ACOMPAÑANTES
30	12,161,760	V	ALFREDO VIVAS		M	AGSI-TU-0182	30	CON ACOMPAÑANTES
31	5.568.073	V	ANTONIO FERNANDEZ		M	AGSI-RE-0575	31	CON ACOMPAÑANTES
32	10.825.818	V	CRISTIAN MARTIN		M	AGSI-D-5535	32	CON ACOMPAÑANTES
33	7.996.274	V	ALEXADER SANTOS		M	AGSI-RE-1011	33	0
34	12.459.231	V	FELIX MENESEZ		M	AGSI-RE-22326	34	CON ACOMPAÑANTES
35	14.970.528	V	DANIEL RODRIGUEZ		M	AGSI-RE-0202	35	CON ACOMPAÑANTES
36	18.941.701	V	PEDRO ELIAS 		M	AGSP-RE-0514	36	CON ACOMPAÑANTES
37	19.583.074	V	ALEJANDRO SANTAROMITA		M	AGSI-TU-0058	37	CON ACOMPAÑANTES
38	81.990.822	E	JUAN RAMIRO		M	AGSI-RE-1243	38	CON ACOMPAÑANTES
39	81.990.822	E	JUAN RAMIRO		M	AGSI-RE-0437	39	CON ACOMPAÑANTES
40	13.298.988	V	ANGEL PERALTA 		M	AGSI-TU-0072	40	CON ACOMPAÑANTES
41	25.175.373	0	GREGORY DE SOUSA		M	AGSI-RE-1472	41	CON ACOMPAÑANTES
42	18.941.701	V	PEDRO ELIAS 		M	APNN-D-675	42	CON ACOMPAÑANTES
43	2.942.118	V	ANTONIO RASPA 		M	AGSI-RE-0601	43	CON ACOMPAÑANTES
44	15.182.206	V	MARLONG SANCHEZ		M	AGSI-D-5426	44	CON ACOMPAÑANTES
\.


--
-- TOC entry 3518 (class 0 OID 58235)
-- Dependencies: 232
-- Data for Name: usuarios; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.usuarios (id, nombre, apellido, password, perfil, foto, intentos, id_estatus, rif, fecha, fecha_update, cedula, tele_1, nombrecom) FROM stdin;
2	siledth@gmail.com	DELGADO	$2y$10$O.AoJKdE2OaRWmlQl0N.kuJwzlwVre3x7Xxg.OKq3KOci8W66Te/y	3	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	21151374	04148400858	SILED
3	carol@gmail.com	CAMPOS RAMIREZ	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	3	2	2	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	22921099	04241223912	CAROLINA
4	123456@gmail.com	ADMINISTRADOR	$2y$10$nBYm75gt54AQMl1dq7daYOgixW9Lwi6O8/0hJKIToPWdE34FiymZO	1	2	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	2598525	04245215	ADMINISTRADOR
1	admin@gmail.com	superior	$2y$10$HvFKI0m6jBZ9By41W0O4A.peZrP1DJffhIg4O0hvFtJiuJAfqk3Yu	1	1	1	1	G160000	2022-06-28 00:00:00	2022-06-28 00:00:00	14521	45555	admin
\.


--
-- TOC entry 3558 (class 0 OID 0)
-- Dependencies: 211
-- Name: alicuota_iva_id_alicuota_iva_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alicuota_iva_id_alicuota_iva_seq', 9, true);


--
-- TOC entry 3559 (class 0 OID 0)
-- Dependencies: 213
-- Name: banco_id_banco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.banco_id_banco_seq', 3, true);


--
-- TOC entry 3560 (class 0 OID 0)
-- Dependencies: 246
-- Name: buque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.buque_id_seq', 44, true);


--
-- TOC entry 3561 (class 0 OID 0)
-- Dependencies: 236
-- Name: deta_factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_factura_id_seq', 1, false);


--
-- TOC entry 3562 (class 0 OID 0)
-- Dependencies: 215
-- Name: deta_recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.deta_recibo_id_seq', 3, true);


--
-- TOC entry 3563 (class 0 OID 0)
-- Dependencies: 217
-- Name: dolar_id_dolar_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dolar_id_dolar_seq', 1, true);


--
-- TOC entry 3564 (class 0 OID 0)
-- Dependencies: 240
-- Name: factura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.factura_id_seq', 1, false);


--
-- TOC entry 3565 (class 0 OID 0)
-- Dependencies: 238
-- Name: mensualidad_id_mensualidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mensualidad_id_mensualidad_seq', 264, true);


--
-- TOC entry 3566 (class 0 OID 0)
-- Dependencies: 234
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mov_consig_id_mov_consig_seq', 320, true);


--
-- TOC entry 3567 (class 0 OID 0)
-- Dependencies: 244
-- Name: propiet_id_propiet_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.propiet_id_propiet_seq', 44, true);


--
-- TOC entry 3568 (class 0 OID 0)
-- Dependencies: 221
-- Name: recibo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recibo_id_seq', 6, true);


--
-- TOC entry 3569 (class 0 OID 0)
-- Dependencies: 223
-- Name: tarifa_id_tarifa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarifa_id_tarifa_seq', 1, false);


--
-- TOC entry 3570 (class 0 OID 0)
-- Dependencies: 225
-- Name: tipobarco_id_tipobarco_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipobarco_id_tipobarco_seq', 8, true);


--
-- TOC entry 3571 (class 0 OID 0)
-- Dependencies: 227
-- Name: tipocliente_id_tipocliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipocliente_id_tipocliente_seq', 3, true);


--
-- TOC entry 3572 (class 0 OID 0)
-- Dependencies: 229
-- Name: tipoestac_id_tipoestac_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipoestac_id_tipoestac_seq', 2, true);


--
-- TOC entry 3573 (class 0 OID 0)
-- Dependencies: 231
-- Name: tipopago_id_tipo_pago_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipopago_id_tipo_pago_seq', 1, false);


--
-- TOC entry 3574 (class 0 OID 0)
-- Dependencies: 242
-- Name: tripulacion_id_tripulacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tripulacion_id_tripulacion_seq', 44, true);


--
-- TOC entry 3575 (class 0 OID 0)
-- Dependencies: 233
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.usuarios_id_seq', 1, false);


--
-- TOC entry 3336 (class 2606 OID 58260)
-- Name: alicuota_iva alicuota_iva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alicuota_iva
    ADD CONSTRAINT alicuota_iva_pkey PRIMARY KEY (id_alicuota_iva);


--
-- TOC entry 3338 (class 2606 OID 58262)
-- Name: dolar dolar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dolar
    ADD CONSTRAINT dolar_pkey PRIMARY KEY (id_dolar);


--
-- TOC entry 3340 (class 2606 OID 58264)
-- Name: estatus estatus_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus
    ADD CONSTRAINT estatus_pkey PRIMARY KEY (id_status);


--
-- TOC entry 3352 (class 2606 OID 58347)
-- Name: mov_consig id_mov_consig_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mov_consig
    ADD CONSTRAINT id_mov_consig_pkey PRIMARY KEY (id_mov_consig);


--
-- TOC entry 3354 (class 2606 OID 58370)
-- Name: mensualidad mensualidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mensualidad
    ADD CONSTRAINT mensualidad_pkey PRIMARY KEY (id_mensualidad);


--
-- TOC entry 3348 (class 2606 OID 58270)
-- Name: tipopago tipo_pago_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipopago
    ADD CONSTRAINT tipo_pago_pkey PRIMARY KEY (id_tipo_pago);


--
-- TOC entry 3342 (class 2606 OID 58272)
-- Name: tipobarco tipobarco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipobarco
    ADD CONSTRAINT tipobarco_pkey PRIMARY KEY (id_tipobarco);


--
-- TOC entry 3344 (class 2606 OID 58274)
-- Name: tipocliente tipocliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipocliente
    ADD CONSTRAINT tipocliente_pkey PRIMARY KEY (id_tipocliente);


--
-- TOC entry 3346 (class 2606 OID 58276)
-- Name: tipoestac tipoestac_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipoestac
    ADD CONSTRAINT tipoestac_pkey PRIMARY KEY (id_tipoestac);


--
-- TOC entry 3350 (class 2606 OID 58278)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


-- Completed on 2022-07-15 21:25:09 -04

--
-- PostgreSQL database dump complete
--

