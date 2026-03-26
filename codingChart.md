

# Charte de codage


### 1) Minimum d'espacement

#### NOK
```
body{
    colors:red;
}
```

#### OK
```
body {
    colors: red;
}
```

### 2) Indentations
Avoir des indentations avec des tabulations de 4 espaces


### 3) Commentaire
- Commenter uniquement le code difficilement compréhensible
- Eviter au maximum les commentaires
- Commenter uniquement le code utilisé
- Ne pas utiliser de commentaire sur la partir Front


### 4) Nommage

- Utiliser uniquement l'Anglais
- Les class et id html doivent être nommé en miniscule et les mots doivent être séparé par des **-**

#### NOK
```
class="reviewsContainer"
```

#### OK
```
class="reviews-container"
```

- Le noms de variables doivent être clair et explicite
- les variables JS et PHP doivent etre nommé en camelCase

#### NOK
```
let rc;
```

#### NOK
```
let reviewcontainer;
```

#### NOK
```
let ReviewContainer;
```

#### OK
```
let reviewContainer;
```

- Les class doivent être nommé en PascalCase

#### NOK
```
class review
```

#### OK
```
class Review
```



### 5) Architecture

- Une fonction doit faire un seul chose
- Une fonction ne doit pas dépacer 50 lignes
- Une fonction ne doit pas avoir plus de 3 indentations


### 6) Gestion des erreurs

- Ne jamais ignorer les erreurs
- Centraliser la gestion des erreurs


### 7) Sécurité

- Ne jamais stocker de secrets dans le code
- Ne jamais mettre sur Github le .env
- Ne jamais partager le .env


### 8) Documentation

- Etablir une documentation API à chaque nouvelle Endpoint

### 9) Endpoints Github

- Toujours partir de la branch **develop**
- Créer une nouvelle branch par tâche
- La branch **main** sera la branch de production
- Ne jamais travailler sur la branch **main**
- Ne jamais faire de merge de **develop** sur **main**