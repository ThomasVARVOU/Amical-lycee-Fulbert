create database fulbert;
use fulbert;

create table utilisateur
(
		idutilisateur int primary key not null auto_increment,
        identifiant varchar(45),
        password varchar(200),
        pseudo varchar(45),
        nom varchar(45),
        prenom varchar(45),
        email varchar(45),
        commentaire varchar(100) );
        
create table bannissement 
(
			idBannissement int primary key not null auto_increment,
            idUtilisateur int(45),
            bannis boolean,
            foreign key (idUtilisateur) references utilisateur(idutilisateur) );
            
create table droit
(
				idDroit int primary key not null auto_increment,
                idUtilisateur int(45),
                administrateur boolean,
                moderateur boolean,
                foreign key (idUtilisateur) references utilisateur(idutilisateur) );
                
create table recettes
(
					idrecette int primary key not null auto_increment,
                    idUtilisateur int(45),
                    nom varchar(45),
                    ingredients varchar(45),
                    instruction varchar(150),
                    temp int(45),
                    photo varchar(45),
                    foreign key(idUtilisateur) references utilisateur(idutilisateur) );

create table commentaire
(
						idcommentaire int primary key not null auto_increment,
                        idrecette int(45),
                        idUtilisateur int(45),
                        commentaire varchar(150),
                        afficher boolean,
                        foreign key(idrecette) references recettes(idrecette) );
                        
create table notation
(
							idnotation int primary key not null auto_increment,
                            idUtilisateur int(45),
                            idrecette int(45),
                            note int(2),
                            foreign key(idrecette) references recettes(idrecette) );
                            
                            
                
            
        
        
	