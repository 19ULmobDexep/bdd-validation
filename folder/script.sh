#bin/bash 


if [admin]; then
	while [ $mp != $mp2 ] || [ -z $mp ] ;do
		read -p 'Choisir un mot de passe :' mp
		read -p 'Choisir un mot de passe :' mp2

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password mp'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password mp2' 

done
echo "ok"

else 

	echo "Accès refusé"
