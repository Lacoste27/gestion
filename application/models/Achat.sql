Drop database achat;

create database achat; 

use achat;


CREATE TABLE departement (
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(255) ,
	login varchar(255) ,
	mdp varchar(255) ,
	PRIMARY KEY (id)
);

CREATE TABLE produit (
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(255) ,
	photo varchar(255) ,
	PRIMARY KEY (id)
);

CREATE TABLE unite (
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(255) ,
	PRIMARY KEY (id)
);

CREATE TABLE besoin (
	id int NOT NULL AUTO_INCREMENT,
	idDepartement int ,
	idProduit int ,
	idUnite int ,
	dateDemande DATE ,
	quantite double,
	status varchar(255) ,
	PRIMARY KEY (id)
);

CREATE TABLE fournisseur (
	id int NOT NULL AUTO_INCREMENT,
	nom varchar(255) ,
	adresse varchar(255) ,
	PRIMARY KEY (id)
);


CREATE TABLE devis (
	id int NOT NULL AUTO_INCREMENT, ,
	idFournisseur int ,
	dateDevis DATE ,
	dateValidite DATE ,
	PRIMARY KEY (id)
);

CREATE TABLE detailsDevis (
	id int ,
	idDevis int ,
	idProduit int ,
	quantite double,
	PRIMARY KEY (id)
);


CREATE TABLE proforma (
	id int NOT NULL AUTO_INCREMENT,
	reference varchar(255) ,
	idDevis int ,
	validationOffre int ,
	dateProforma DATE,
	autres TEXT ,
	PRIMARY KEY (id)
);

CREATE TABLE marchandises (
	id int NOT NULL AUTO_INCREMENT,
	idDetailsDevis int ,
	idProforma int ,
	prixUnitaire double ,
	PRIMARY KEY (id)
);

CREATE TABLE commande (
	id int NOT NULL AUTO_INCREMENT,
	reference varchar(255) ,
	dateCommande DATE,
	idFournisseur int,
	limitePaiement DATE,
	limiteLivraison DATE,
	adresse varchar(255),
	status varchar(255),
	PRIMARY KEY (id)
);

CREATE TABLE detailsCommande (
	id int NOT NULL AUTO_INCREMENT,
	idCommande bigint ,
	idProduit bigint ,
	quantite double ,
	prixUnitaire int ,
	observations TEXT ,
	PRIMARY KEY (id)
);

CREATE TABLE livraison (
	id int NOT NULL AUTO_INCREMENT,
	reference varchar(255) ,
	idCommande int ,
	dateLivraison DATE ,
	PRIMARY KEY (id)
);

CREATE TABLE detailsLivraison (
	id int NOT NULL AUTO_INCREMENT,
	idLivraison int ,
	idProduit int ,
	quantite double ,
	observations TEXT ,
	PRIMARY KEY (id)
);

CREATE TABLE reception (
	id int NOT NULL AUTO_INCREMENT,
	reference varchar(255) ,
	idLivraison int ,
	dateReception DATE ,
	PRIMARY KEY (id)
);

CREATE TABLE detailsReception (
	id  int NOT NULL AUTO_INCREMENT,
	idReception int ,
	idProduit int ,
	quantite double ,
	qualite int,
	prixAchat double,
	observations TEXT ,
	PRIMARY KEY (id)
);

CREATE TABLE dispatch (
	id int NOT NULL AUTO_INCREMENT,
	idBesoin int ,
	DateReception date,
	quantite double ,
	PRIMARY KEY (id)
);

create table stock (
	id  int NOT NULL AUTO_INCREMENT,
	idProduit int,
	dateStock date,
	prixAchat double,
	quantiteInitial double,
	quantiteActuel double,
	PRIMARY KEY (id)
	
);




create table mouvementStock (
	id int NOT NULL AUTO_INCREMENT,
	dateMOuvementStock date,. 
	idStock int,
	quantiteUtilise double,
	quantiteAjouter double,
	quantiteReste double,
	PRIMARY KEY (id)
	
);




ALTER TABLE besoin ADD  FOREIGN KEY (idDepartement) REFERENCES departement(id);

ALTER TABLE besoin ADD FOREIGN KEY (idProduit) REFERENCES produit(id);

ALTER TABLE besoin ADD  FOREIGN KEY (idUnite) REFERENCES unite(id);

ALTER TABLE proforma ADD FOREIGN KEY (idDevis) REFERENCES devis(id);

ALTER TABLE marchandises ADD  FOREIGN KEY (idDetailsDevis) REFERENCES detailsDevis(id);

ALTER TABLE marchandises ADD FOREIGN KEY (idProforma) REFERENCES proforma(id);

ALTER TABLE commande ADD  FOREIGN KEY (idFournisseur) REFERENCES fournisseur(id);

ALTER TABLE detailsCommande ADD  FOREIGN KEY (idCommande) REFERENCES commande(id);

ALTER TABLE detailsCommande ADD CONSTRAINT detailsCommande_fk1 FOREIGN KEY (idProduit) REFERENCES produit(id);

ALTER TABLE livraison ADD CONSTRAINT livraison_fk0 FOREIGN KEY (idCommande) REFERENCES commande(id);

ALTER TABLE detailsLivraison ADD CONSTRAINT detailsLivraison_fk0 FOREIGN KEY (idLivraison) REFERENCES livraison(id);

ALTER TABLE detailsLivraison ADD CONSTRAINT detailsLivraison_fk1 FOREIGN KEY (idProduit) REFERENCES produit(id);

ALTER TABLE reception ADD CONSTRAINT reception_fk0 FOREIGN KEY (idLivraison) REFERENCES livraison(id);

ALTER TABLE detailsReception ADD CONSTRAINT detailsReception_fk0 FOREIGN KEY (idReception) REFERENCES reception(id);

ALTER TABLE detailsReception ADD CONSTRAINT detailsReception_fk1 FOREIGN KEY (idProduit) REFERENCES produit(id);


insert into produit (nom,photo) values ('produit1','photo1');
insert into produit (nom,photo) values ('produit2','photo2');
insert into produit (nom,photo) values ('produit3','photo3');
insert into produit (nom,photo) values ('produit4','photo4');


