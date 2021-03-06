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
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE admin (
    id integer NOT NULL,
    username character varying(100),
    password character varying(100)
);


--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE admin_id_seq OWNED BY admin.id;


--
-- Name: escritor; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE escritor (
    id integer NOT NULL,
    nombre character varying(100),
    apellidos character varying(100),
    email character varying(100),
    edad integer,
    nacionalidad character varying(100),
    CONSTRAINT check_positive CHECK ((edad > 15))
);


--
-- Name: escritor_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE escritor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: escritor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE escritor_id_seq OWNED BY escritor.id;


--
-- Name: escritor_libro; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE escritor_libro (
    id_escritor integer,
    ref_libro character varying(100)
);


--
-- Name: lector; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE lector (
    id integer NOT NULL,
    nombrelec character varying(100),
    apellidos character varying(100),
    email character varying(100),
    edad integer,
    nacionalidad character varying(100),
    CONSTRAINT check_positive CHECK ((edad > 0))
);


--
-- Name: lector_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE lector_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: lector_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE lector_id_seq OWNED BY lector.id;


--
-- Name: lector_libro; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE lector_libro (
    id_lector integer,
    ref_libro character varying(100)
);


--
-- Name: reg_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE reg_admin (
    id_admin integer,
    accion character varying(100),
    fecha date
);


--
-- Name: admin id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY admin ALTER COLUMN id SET DEFAULT nextval('admin_id_seq'::regclass);


--
-- Name: escritor id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY escritor ALTER COLUMN id SET DEFAULT nextval('escritor_id_seq'::regclass);


--
-- Name: lector id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY lector ALTER COLUMN id SET DEFAULT nextval('lector_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

COPY admin (id, username, password) FROM stdin;
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('admin_id_seq', 1, false);


--
-- Data for Name: escritor; Type: TABLE DATA; Schema: public; Owner: -
--

COPY escritor (id, nombre, apellidos, email, edad, nacionalidad) FROM stdin;
\.


--
-- Name: escritor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('escritor_id_seq', 1, false);


--
-- Data for Name: escritor_libro; Type: TABLE DATA; Schema: public; Owner: -
--

COPY escritor_libro (id_escritor, ref_libro) FROM stdin;
\.


--
-- Data for Name: lector; Type: TABLE DATA; Schema: public; Owner: -
--

COPY lector (id, nombrelec, apellidos, email, edad, nacionalidad) FROM stdin;
\.


--
-- Name: lector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('lector_id_seq', 1, false);


--
-- Data for Name: lector_libro; Type: TABLE DATA; Schema: public; Owner: -
--

COPY lector_libro (id_lector, ref_libro) FROM stdin;
\.


--
-- Data for Name: reg_admin; Type: TABLE DATA; Schema: public; Owner: -
--

COPY reg_admin (id_admin, accion, fecha) FROM stdin;
\.


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: escritor escritor_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY escritor
    ADD CONSTRAINT escritor_pkey PRIMARY KEY (id);


--
-- Name: lector lector_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY lector
    ADD CONSTRAINT lector_pkey PRIMARY KEY (id);


--
-- Name: escritor_libro escritor_libro_id_escritor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY escritor_libro
    ADD CONSTRAINT escritor_libro_id_escritor_fkey FOREIGN KEY (id_escritor) REFERENCES escritor(id);


--
-- Name: lector_libro lector_libro_id_lector_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY lector_libro
    ADD CONSTRAINT lector_libro_id_lector_fkey FOREIGN KEY (id_lector) REFERENCES lector(id);


--
-- Name: reg_admin reg_admin_id_admin_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY reg_admin
    ADD CONSTRAINT reg_admin_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES admin(id);


--
-- PostgreSQL database dump complete
--

