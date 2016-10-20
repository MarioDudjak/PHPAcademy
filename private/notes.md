1.PREDAVANJE

#Environment
NetBeans IDE 8.1
Apache : port 80 

-dobar HTML kod -> u obliku Word documenta, tj. diplomski rad npr.

-Chrome F12 -> elementi,konzola,mreža...

<?php phpinfo();

Ovo se koristi za opis konfiguracije servera. 
?> 

C:\xampp\php\php.ini  - opis konfiguracije PHP-a

Display errors: na offline serverima pali errore
                online gasi 


Nepisano pravilo: čista PHP skripta se ne zatvara, tj. ne ide ?> (jer onaj razmak nakon ide u output)
                  Miješani HTML i PHP- ne ide {} nego npr. <?php if(uvjet): ?>   naredbe <?php endif ?>

GIT & GITHUB    
-iz terminala(git-bash)
cd:/xampp/htdocs
git init    (Napravi se hidden folder .git)

git config user.name "MarioDudjak"
git config user.email dudjakmario@hotmail.com
git status 

git add.
git commit -m "first commit"
git remote add origin https://github.com/MarioDudjak/PHPAcademy
git push -u origin master









