
CREATE SEQUENCE public.professores_id_professores_seq_1;

CREATE TABLE public.professores (
                id_professores INTEGER NOT NULL DEFAULT nextval('public.professores_id_professores_seq_1'),
                nome_professores VARCHAR NOT NULL,
                data_nascimento_professores DATE NOT NULL,
                created_at TIMESTAMP NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                CONSTRAINT professores_pk PRIMARY KEY (id_professores)
);


ALTER SEQUENCE public.professores_id_professores_seq_1 OWNED BY public.professores.id_professores;

CREATE SEQUENCE public.cursos_id_cursos_seq_1;

CREATE TABLE public.cursos (
                id_cursos INTEGER NOT NULL DEFAULT nextval('public.cursos_id_cursos_seq_1'),
                nome_cursos VARCHAR NOT NULL,
                created_at TIMESTAMP NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                id_professores INTEGER NOT NULL,
                CONSTRAINT cursos_pk PRIMARY KEY (id_cursos)
);


ALTER SEQUENCE public.cursos_id_cursos_seq_1 OWNED BY public.cursos.id_cursos;

CREATE SEQUENCE public.alunos_id_alunos_seq;

CREATE TABLE public.alunos (
                id_alunos INTEGER NOT NULL DEFAULT nextval('public.alunos_id_alunos_seq'),
                nome_alunos VARCHAR NOT NULL,
                data_nascimento DATE NOT NULL,
                logradouro VARCHAR NOT NULL,
                numero INTEGER NOT NULL,
                complemento VARCHAR NOT NULL,
                bairro VARCHAR NOT NULL,
                cidade VARCHAR NOT NULL,
                estado VARCHAR NOT NULL,
                cep VARCHAR NOT NULL,
                created_at TIMESTAMP NOT NULL,
                updated_at TIMESTAMP NOT NULL,
                id_cursos INTEGER NOT NULL,
                CONSTRAINT id_alunos PRIMARY KEY (id_alunos)
);


ALTER SEQUENCE public.alunos_id_alunos_seq OWNED BY public.alunos.id_alunos;

ALTER TABLE public.cursos ADD CONSTRAINT professores_cursos_fk
FOREIGN KEY (id_professores)
REFERENCES public.professores (id_professores)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.alunos ADD CONSTRAINT cursos_alunos_fk
FOREIGN KEY (id_cursos)
REFERENCES public.cursos (id_cursos)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
