/* Nota: Adicionei o financeiro e
 alterei um campo em fornecedor,
 nele adicionei o gasto com ele.
 Também coloquei os alter com compra,
 funcionario e fornecedor !! Conferir tudo !!*/
 
 
create database petshop;
use petshop;

create table cliente (
    cod_clt int auto_increment primary key not null,
	cpf_clt int not null,
    nome_clt varchar(100) not null,
    end_clt varchar(255) not null,
    tel_clt int not null,
    email_clt varchar(255) null

);

create table pet (
	cod_pet int auto_increment primary key not null,
    nome_pet varchar(100) null,
    espc_pet varchar(150) not null, 
    rc_pet varchar(200) not null, 
    prt_pet varchar(20) not null,
    idade_pet int null,
    temp_pet varchar(30) null,
    obs_pet tinytext null,
    dnc_pet varchar(255) null,
    fk_pet_clt integer
    /* Falta cpf */
);

create table agendamento (
	id_agd int auto_increment primary key not null,
    svp_agd varchar(255) not null,
    data_agd date not null,
    hora_agd time not null,
    obs_agd tinytext,
    idc_agd tinytext,
    fk_agd_clt integer,
    fk_agd_pet integer,
    fk_agd_fcn integer
    /* vai precisaar de valor? e falta cpf, cod_pet e o registro do medico */
);

create table funcionario (
    id_fcn int auto_increment primary key not null, 
	cpf_fcn int not null, 
    nome_fcn varchar(255) not null,
    crg_fcn varchar(35) not null,
    end_fcn varchar(255) null,
    tel_fcn int null,
    slr_fcn int not null,
    fk_fcn_cnt integer
    /* Falta contrato e tirei idade */
);

create table contrato (
	cod_cnt int auto_increment primary key not null,
    inc_cnt date not null,
    fim_cnt date not null
    /* Falta cpf do funcionario */
);

create table fornecedores (
    id_for int auto_increment primary key not null,
	cnpj_for int not null,
    nome_for varchar(255) not null,
    end_for varchar(255) not null,
    tel_for int not null,
    email_for varchar(255) null,
    dcp_for tinytext,
    gst_for int not null
    /* Falta cod produto */
);

create table produto (
	cod_pdt int auto_increment primary key not null,
    nome_pdt varchar(100),
    vld_pdt date not null,
    val_pdt int not null,
    dcr_pdt tinytext not null,
    fk_pdt_for integer,
    fk_pdt_est integer
    /* Falta cnpj */
);

create table compra (
	cod_cmp int auto_increment primary key not null,
    tap_cmp int not null,
    data_cmp date not null,
    hora_cmp time not null,
    fk_cmp_clt integer,
    fk_cmp_pdt integer
    /* Falta cpf_clt, cod_fcn e cod_pdt */
);

create table estoque(
    id_est int primary key not null,
    qtd_pdt int not null
    
);

create table financeiro(
	cod_fin int auto_increment primary key not null,
    data_fin date not null,
    arc_fin int not null,
    fat_fin int not null,
    dsp_fin int not null,
	fk_fin_fcn integer,
	fk_fin_for integer,
	fk_fin_cmp integer
);


/*alter_tables*/


/*pet*/
alter table pet
add constraint fk_pet_clt
foreign key (fk_pet_clt)
references cliente (cod_clt);

/*agendamento*/
alter table agendamento
add constraint fk_agd_clt
foreign key (fk_agd_clt)
references cliente (cod_clt);

alter table agendamento
add constraint fk_agd_pet
foreign key (fk_agd_pet)
references pet (cod_pet);

alter table agendamento
add constraint fk_agd_fcn
foreign key (fk_agd_fcn)
references funcionario (id_fcn);


/*funcionario*/
alter table funcionario
add constraint fk_fcn_cnt
foreign key (fk_fcn_cnt)
references contrato (cod_cnt);


/*produto*/
alter table produto
add constraint fk_pdt_for
foreign key (fk_pdt_for)
references fornecedores (id_for);


alter table produto
add constraint fk_pdt_est
foreign key (fk_pdt_est)
references estoque (id_est);


/*compra*/
alter table compra
add constraint fk_cmp_clt
foreign key (fk_cmp_clt)
references cliente (cod_clt);

alter table compra
add constraint fk_cmp_pdt
foreign key (fk_cmp_pdt)
references produto (cod_pdt);


/*financeiro*/
alter table financeiro
add constraint fk_fin_fcn
foreign key (fk_fin_fcn)
references funcionario (id_fcn);

alter table financeiro
add constraint fk_fin_for
foreign key (fk_fin_for)
references fornecedores (id_for);

alter table financeiro
add constraint fk_fin_cmp
foreign key (fk_fin_cmp)
references compra (cod_cmp);


drop database petshop;


/*siglas*/
/*
--clt= cliente--

--pet= pet--
espc= espécie
rc= raça
prt= porte
temp= temperamento
dnc= doenças

--agd= agendamento--
svp= serviço prestado
idc= indicação

--fcn= funcionario--
crg= cargo
slr= salário

cnt= contrato
inc= inicio

--for= fornecedores--
dcp= descrição de produto
gst_for= gastos com fornecedores

--pdt= produto--

--cmp= compra--
tap= total a pagar

--est= estoque--

--finaceiro--
arc_fin= arrecadação
fat_fin= faturamento
dsp_fin= 
*/