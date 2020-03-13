# Image de base à utiliser
# Attention ! version :latest jamais en environnement de production
From node:latest

# Dossier de travail dans le container  (-w /usr/src/app)
WORKDIR /usr/src/app

# Env Var (-e "PORT=3000")
ENV PORT 3000

# Utilisateur du container (-u node)
USER node 

# Port à utiliser dans le container 
EXPOSE 3000 

# Commande à executer 
ENTRYPOINT /bin/bash