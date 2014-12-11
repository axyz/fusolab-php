Ambiente di Sviluppo
====================
- just PHP
- PHP come modulo di un server web
- piattaforma LAMP (Linux, Apache, MySQL, PHP)


----


XAMPP
-----
Ottima soluzione pronta per un'ambiente di sviluppo standardizzato.

Meno indicato in produzione.

Include Apache, MySQL, PHP, Perl già configurati e pronti all'uso.

Scaricabile da https://www.apachefriends.org


----


XAMPP su linux
--------------
Solitamente viene installato nella directory `/opt` dove come semplice utente
non si hanno permessi di scrittura.

La cosa migliore è creare un link nella cartella del server che punti a una
directory nella home dove possiamo scrivere liberamente.

Es.

    $ mkdir ~/www
    $ sudo ln -s ~/www /opt/lampp/htdocs/www


----


avviare il server
-----------------
    $ /opt/lampp/xampp start

Di default potremo accedere al server inserendo nel browser l'indirizzo
http://localhost oppure http://127.0.0.1


----


arrestare il server
-------------------
rullo di tamburi...

    $ /opt/lampp/xampp stop


---


Hello World!
============
Nella nostra cartella servita da Apache creiamo un file `hello.php`

```PHP
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
</head>
<body>
<?php echo "Hello World!";?>
</body>
</html>
```


----


prendere un input
-----------------
creiamo ora un file input.php

```PHP
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>ciao</title>
</head>
<body>
  <form method="post">
    <span>
      inserisci il tuo nome
      <input type="text" name="name">
      <input type="submit" value="Invia">
    </span>
  </form>
  <h2>Ciao <?php echo $_POST['name']; ?>!</h2>
</body>
</html>
```


----


**Il codice php è sempre racchiuso tra i simboli `<?php` e `?>`**

```PHP
<?php
  ...
?>
```


----


**Le istruzioni terminano sempre con un punto e virgola**

```PHP
<?php
  echo "ciao";
?>
```


----


**Le variabili devono essere precedute dal simbolo `$`**

```PHP
<?php
  $numero = 42;
  echo $numero;
?>
```


----


**Le stringhe sono rachiuse tra apici \`...\` o virgolette "..."**

```PHP
<?php
  $stringa = "ciao";
  echo 'test';
?>
```


----


**Le stringhe possono essere concatenate con l'operatore punto**

```PHP
<?php
  $stringa = "ciao" . "mondo";
  echo $stringa . $stringa;
  // stampa ciaomondociaomondo
?>
```


----


**Intuitivamente un array è una lista di elementi**

**Si può accedere ad un singolo elemento di un array tramite array[index]**

```PHP
<?php
  $lista = array(1, 2, 3, 4);
  echo $lista[2]; // stampa 3, N.B. gli indici partono da 0
?>
```


---


Risorse
=======
- [w3schools](http://www.w3schools.com)
- [php.net References](http://php.net/manual/it/extensions.membership.php)
- cercare ispirazione con la shell: `php -a`


---


Esercizi
========
I seguenti esercizi possono essere svolti utilizzando le poche basilari nozioni
fino ad ora presentate.

Non è consentito utilizzare strutture di controllo, funzioni o altri strumenti
non ancora spiegati.

Si consiglia di cercare tra le funzioni standard che operano su stringhe e
array quelle che potrebbero essere di aiuto per la risoluzione dei problemi.

*[w3schools](http://www.w3schools.com) and
[PHP References](http://php.net/manual/it/extensions.membership.php)
are your friend!*

----


reverse
-------
Partendo da una copia di `input.php` realizzare un programma che data una
stringa in input la stampi al contrario.

Es. ciao -> oaic


----


antispam
--------
realizzare un programma che prenda in input un indirizzo mail e lo restituisca
con choiocciola e punto sostituiti da [at] e [dot]

Es. axyzxp@gmail.com -> axyzxp[at]gmail[dot]com

mario.rossi@yahoo.it -> mario.rossi[at]yahoo[dot]it

Per semplicità diamo per scontato che l'utente invii un indirizzo email corretto
e che nel dominio possa esserci un solo punto.


----


mescola carte
-------------
Realizzare un programma che prenda in input una stringa che rappresenta un mazzo
di carte napoletane nella forma nsnsnsns... dove n è il numero e s il seme.

Es. 3b4d1s5c rappresenta 3 a bastoni, 4 a denara, asso di spade, 5 di coppe.

Creare un bottone "mescola" al click del quale viene stampata una stringa
rappresentante il mazzo mescolato casualmente nella forma ns-ns-ns-ns...

Es. 3b4d1s5c --> MESCOLA --> 1s-3b-5c-4d
