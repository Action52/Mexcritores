--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: c_autor(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION c_autor() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('creacion de autor', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.c_autor() OWNER TO leonvillapun;

--
-- Name: c_lect(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION c_lect() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('creacion nuevo lector', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.c_lect() OWNER TO leonvillapun;

--
-- Name: del_autor(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION del_autor() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('eliminacion de un autor', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.del_autor() OWNER TO leonvillapun;

--
-- Name: del_lect(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION del_lect() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('eliminacion de lector', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.del_lect() OWNER TO leonvillapun;

--
-- Name: up_autor(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION up_autor() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('actualizacion de autor', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.up_autor() OWNER TO leonvillapun;

--
-- Name: up_lect(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION up_lect() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('actualizacion de lector', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.up_lect() OWNER TO leonvillapun;

--
-- Name: writer_reg(); Type: FUNCTION; Schema: public; Owner: leonvillapun
--

CREATE FUNCTION writer_reg() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
 INSERT INTO reg_admin(accion,fecha) VALUES('creacion de un nuevo libro', now());
 RETURN NEW;
END;
$$;


ALTER FUNCTION public.writer_reg() OWNER TO leonvillapun;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE admin (
    id integer NOT NULL,
    username character varying(100)
);


ALTER TABLE admin OWNER TO leonvillapun;

--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE admin_id_seq OWNER TO leonvillapun;

--
-- Name: admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE admin_id_seq OWNED BY admin.id;


--
-- Name: escritor; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE escritor (
    id integer NOT NULL,
    nombre character varying(100),
    apellidos character varying(100),
    email character varying(100),
    username character varying(100)
);


ALTER TABLE escritor OWNER TO leonvillapun;

--
-- Name: escritor_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE escritor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE escritor_id_seq OWNER TO leonvillapun;

--
-- Name: escritor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE escritor_id_seq OWNED BY escritor.id;


--
-- Name: escritor_libro; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE escritor_libro (
    id integer NOT NULL,
    id_escritor integer,
    ref_libro integer
);


ALTER TABLE escritor_libro OWNER TO leonvillapun;

--
-- Name: escritor_libro_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE escritor_libro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE escritor_libro_id_seq OWNER TO leonvillapun;

--
-- Name: escritor_libro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE escritor_libro_id_seq OWNED BY escritor_libro.id;


--
-- Name: lector; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE lector (
    id integer NOT NULL,
    nombrelec character varying(100),
    apellidos character varying(100),
    email character varying(100),
    username character varying(100)
);


ALTER TABLE lector OWNER TO leonvillapun;

--
-- Name: lector_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE lector_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lector_id_seq OWNER TO leonvillapun;

--
-- Name: lector_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE lector_id_seq OWNED BY lector.id;


--
-- Name: lector_libro; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE lector_libro (
    id integer NOT NULL,
    id_lector integer,
    ref_libro integer
);


ALTER TABLE lector_libro OWNER TO leonvillapun;

--
-- Name: lector_libro_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE lector_libro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE lector_libro_id_seq OWNER TO leonvillapun;

--
-- Name: lector_libro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE lector_libro_id_seq OWNED BY lector_libro.id;


--
-- Name: libro; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE libro (
    id integer NOT NULL,
    titulo character varying(100),
    descripcion character varying(200),
    paginas integer,
    genero character varying(50),
    url character varying(100),
    CONSTRAINT check_positive CHECK ((paginas > 1))
);


ALTER TABLE libro OWNER TO leonvillapun;

--
-- Name: libro_id_seq; Type: SEQUENCE; Schema: public; Owner: leonvillapun
--

CREATE SEQUENCE libro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libro_id_seq OWNER TO leonvillapun;

--
-- Name: libro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: leonvillapun
--

ALTER SEQUENCE libro_id_seq OWNED BY libro.id;


--
-- Name: muestranumlibros; Type: VIEW; Schema: public; Owner: leonvillapun
--

CREATE VIEW muestranumlibros AS
 SELECT count(*) AS count
   FROM libro;


ALTER TABLE muestranumlibros OWNER TO leonvillapun;

--
-- Name: reg_admin; Type: TABLE; Schema: public; Owner: leonvillapun
--

CREATE TABLE reg_admin (
    accion character varying(100),
    fecha date
);


ALTER TABLE reg_admin OWNER TO leonvillapun;

--
-- Name: admin id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY admin ALTER COLUMN id SET DEFAULT nextval('admin_id_seq'::regclass);


--
-- Name: escritor id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor ALTER COLUMN id SET DEFAULT nextval('escritor_id_seq'::regclass);


--
-- Name: escritor_libro id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor_libro ALTER COLUMN id SET DEFAULT nextval('escritor_libro_id_seq'::regclass);


--
-- Name: lector id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector ALTER COLUMN id SET DEFAULT nextval('lector_id_seq'::regclass);


--
-- Name: lector_libro id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector_libro ALTER COLUMN id SET DEFAULT nextval('lector_libro_id_seq'::regclass);


--
-- Name: libro id; Type: DEFAULT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY libro ALTER COLUMN id SET DEFAULT nextval('libro_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY admin (id, username) FROM stdin;
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('admin_id_seq', 1, false);


--
-- Data for Name: escritor; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY escritor (id, nombre, apellidos, email, username) FROM stdin;
1	Svetlana	Alexievich	rednation@itesm.mx	\N
2	Corey	Taylor	slipknot@hotmail.com	\N
3	Prem	Dayal	pancholopez@gmail.com	\N
4	Juan	Villoro	lasjv@gmail.com	\N
\.


--
-- Name: escritor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('escritor_id_seq', 20, true);


--
-- Data for Name: escritor_libro; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY escritor_libro (id, id_escritor, ref_libro) FROM stdin;
\.


--
-- Name: escritor_libro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('escritor_libro_id_seq', 2, true);


--
-- Data for Name: lector; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY lector (id, nombrelec, apellidos, email, username) FROM stdin;
1	Armando	Canto	A01322361@itesm.mx	\N
2	Luis	Villas	A01322275@itesm.mx	\N
3	Alejandro	Tovar	microsoftxd@itesm.mx	\N
4	Adrian	Dargelos	babasonicos1@itesm.mx	\N
6	Jorge Alberto	Beauregard	\N	JorgeBure
7	Julián	Huerta	\N	julian95
8	Fahrid	Tinoco	leonvillapun@gmail.com	fahridAllah
\.


--
-- Name: lector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('lector_id_seq', 12, true);


--
-- Data for Name: lector_libro; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY lector_libro (id, id_lector, ref_libro) FROM stdin;
\.


--
-- Name: lector_libro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('lector_libro_id_seq', 1, false);


--
-- Data for Name: libro; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY libro (id, titulo, descripcion, paginas, genero, url) FROM stdin;
1	test	t	33	test	asdfasdf
\.


--
-- Name: libro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: leonvillapun
--

SELECT pg_catalog.setval('libro_id_seq', 61, true);


--
-- Data for Name: reg_admin; Type: TABLE DATA; Schema: public; Owner: leonvillapun
--

COPY reg_admin (accion, fecha) FROM stdin;
creacion de autor	2017-04-25
creacion nuevo lector	2017-04-26
actualizacion de lector	2017-04-26
eliminacion de lector	2017-04-26
actualizacion datos	2017-04-26
actualizacion de autor	2017-04-26
eliminacion de un autor	2017-04-26
creacion de autor	2017-04-26
actualizacion de autor	2017-04-28
eliminacion de un autor	2017-04-28
creacion de un nuevo libro	2017-05-03
creacion nuevo lector	2017-05-10
creacion nuevo lector	2017-05-10
creacion nuevo lector	2017-05-10
creacion nuevo lector	2017-05-10
actualizacion de lector	2017-05-10
creacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
creacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
eliminacion de un autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
actualizacion de autor	2017-05-10
eliminacion de un autor	2017-05-10
creacion de autor	2017-05-11
actualizacion de autor	2017-05-11
eliminacion de un autor	2017-05-11
creacion nuevo lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
actualizacion de lector	2017-05-11
creacion de autor	2017-05-11
actualizacion de autor	2017-05-11
eliminacion de lector	2017-05-11
eliminacion de lector	2017-05-11
creacion nuevo lector	2017-05-11
actualizacion de lector	2017-05-11
eliminacion de lector	2017-05-11
creacion nuevo lector	2017-05-11
actualizacion de lector	2017-05-11
eliminacion de lector	2017-05-11
eliminacion de un autor	2017-05-12
\.


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: escritor_libro escritor_libro_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor_libro
    ADD CONSTRAINT escritor_libro_pkey PRIMARY KEY (id);


--
-- Name: escritor escritor_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor
    ADD CONSTRAINT escritor_pkey PRIMARY KEY (id);


--
-- Name: lector_libro lector_libro_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector_libro
    ADD CONSTRAINT lector_libro_pkey PRIMARY KEY (id);


--
-- Name: lector lector_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector
    ADD CONSTRAINT lector_pkey PRIMARY KEY (id);


--
-- Name: libro libro_pkey; Type: CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY libro
    ADD CONSTRAINT libro_pkey PRIMARY KEY (id);


--
-- Name: escritor admin_autor; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER admin_autor AFTER INSERT ON escritor FOR EACH ROW EXECUTE PROCEDURE c_autor();


--
-- Name: escritor admindel_autor; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER admindel_autor AFTER DELETE ON escritor FOR EACH ROW EXECUTE PROCEDURE del_autor();


--
-- Name: escritor adminup_autor; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER adminup_autor AFTER UPDATE ON escritor FOR EACH ROW EXECUTE PROCEDURE up_autor();


--
-- Name: lector create_lect; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER create_lect AFTER INSERT ON lector FOR EACH ROW EXECUTE PROCEDURE c_lect();


--
-- Name: lector delete_lect; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER delete_lect AFTER DELETE ON lector FOR EACH ROW EXECUTE PROCEDURE del_lect();


--
-- Name: lector update_lect; Type: TRIGGER; Schema: public; Owner: leonvillapun
--

CREATE TRIGGER update_lect AFTER UPDATE ON lector FOR EACH ROW EXECUTE PROCEDURE up_lect();


--
-- Name: escritor_libro escritor_libro_id_escritor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor_libro
    ADD CONSTRAINT escritor_libro_id_escritor_fkey FOREIGN KEY (id_escritor) REFERENCES escritor(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: escritor_libro escritor_libro_ref_libro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY escritor_libro
    ADD CONSTRAINT escritor_libro_ref_libro_fkey FOREIGN KEY (ref_libro) REFERENCES libro(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: lector_libro lector_libro_id_lector_fkey; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector_libro
    ADD CONSTRAINT lector_libro_id_lector_fkey FOREIGN KEY (id_lector) REFERENCES lector(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: lector_libro lector_libro_ref_libro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: leonvillapun
--

ALTER TABLE ONLY lector_libro
    ADD CONSTRAINT lector_libro_ref_libro_fkey FOREIGN KEY (ref_libro) REFERENCES libro(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

