# Galerija slika u PHP-u

Ova aplikacija omogućava korisnicima da se registruju, prijave, otpreme slike i gledaju ih u galeriji. Napravljena je u PHP-u sa MySQL bazom, uz jednostavnu MVC strukturu.

## Funkcionalnosti
- Registracija i prijava korisnika
- Upload slika
- Prikaz slika u galeriji
- Odjava (logout)

## Tehnologije
- PHP
- MySQL
- Tailwind CSS (za izgled)
- Font Awesome (ikonice)

## Test korisnički nalozi

Za testiranje aplikacije možeš koristiti sledeći nalog:

- Korisničko ime: `test123`  
- Lozinka: `test123`

## Link ka aplikaciji

[Registracija](https://usp2022.epizy.com/sup25/iv/public/index.php?controller=user&action=register)  
[Prijava](https://usp2022.epizy.com/sup25/iv/public/index.php?controller=user&action=login)


## Napomena

Aplikacija koristi `index.php` kao ulaznu tačku, uz `controller` i `action` parametre u URL-u, npr:

```
https://usp2022.epizy.com/sup25/iv/public/index.php?controller=image&action=index
```