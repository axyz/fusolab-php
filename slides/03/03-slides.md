TIPI DI DATI
============


----


Numeri
------
- interi : 1, 2, -3
- reali : 0.2, -1.5...
- notazione scientifica : 1.333e9
- numeri in base 8 : 0777
- numeri in base 16 : 0xff
- NAN : sqrt(-2)

----


Stringhe
--------
- "ciao"
- 'ciao'
- "Erano i $capei d'oro a l'aura sparsi"
- 'Erano i capei d\'oro a l\'aura sparsi'


----


Array
-----
Struttura dati consistente in una lista di coppia key => value.

Le chiavi possono essere interi o stringhe, se omessa viene generato
in automatico un intero a partire da 0.

Si dichiarano con `array(key1 => value1, key2 => value2)`

o anche soltanto `array(value1, value2, value3)`

si accede a dun elemento di un array tramite `$array[key]`

durante lo sviluppo può essere utile verificare l'attuale contenuto di un array
a questo scopo ci si può servire della funzione `print_r($array)`

oppure si può usare `echo(json_encode($array))`



----


Booleani
--------
- true, false

----


Tipi speciali
-------------
- null


---


OPERATORI E COMPARAZIONI
========================


----


Operatori
---------
- aritmetici (+, -, *, /, %, ++, --)
- assegnazione ( =, +=, -=, *=, /=, %=, &=, |=, ^=, <<=, >>=, .=)
- il '.' con le stringhe effettua concatenazione!
- comparazione (==, ===, !=, <>, !==, <, > <=, >=)
- logici (&&, ||, !, and, or, xor)
- condizionale (variabile = (condizione) ? valore1 : valore2)
- operazioni su bit (&, |, ~, ^, <<, >>)
- soppressione errori '@'
- esecuzione ``` `istruzione` ```
- instanceof
- [Precedenza degli Operatori](http://php.net/manual/it/language.operators.precedence.php)


----

Conversioni automatiche (occhio!)
---------------------------------
- (8 * null) // 0
- ("5" - 1) // 4
- ("5" + 1) // 6
- ("five" * 2) // 0


----


Compararazioni
--------------
Spesso risultati poco intuitivi, dare un'occhiata a questa tabella:

[Types Comparisons](http://php.net/manual/it/types.comparisons.php)


----


Un gran casino!
---------------
Per sicurezza nelle comparazioni è meglio utilizzare === e !== che restituiscono
l'uguaglianza solo se i dati sono effettivamente identici

- ("ciao" === "ciao"); // true
- (null === null); // true

Attenzione però:

- (2.0 === 2); // false
- (2.0 == 2); // true

---


STRUTTURE DI CONTROLLO
======================


----


if, then, else
--------------
```php
if (condizione) { // se la condizione è vera
  "fai qualcosa";
} elseif (altra condizione) { // altrimenti
  "fai qualcos'altro";
} else { // altrimenti
  "fai qualcos'altro ancora";
}
```

Es.

```php
if (3 > 2) {
  echo("3 è maggiore di 2");
} else {
  echo("la matematica è impazzita");
}
```

Sintassi alternativa:

```php
if (condizione):
  istruzioni;
elseif (condizione):
  istruzioni;
else:
  istruzioni;
endif;
```



----


while
-----
```php
while (condizione) { // finchè la condizione rimane vera
  fai qualcosa;
}
```

Es.

```php
$i = 0;
while ($i <= 10) {
  echo(i);
  $i++;
}
```

Sintassi alternativa:

```php
while (condizione):
  istruzioni;
endwhile;
```


----


for
---
```php
for (dichiarazione; condizione; incremento) {
  fai qualcosa;
}
```

Es.

```php
for ($i = 0; $i <= 10; $i++) {
  echo($i);
}
```

Sintassi alternativa:

```php
for (dichiarazione; condizione; incremento):
  istruzioni;
endfor;
```


----


foreach
-------
Scansiona uno ad uno gli elementi di un array

```php
foreach ($array as $elemento) { // per ogni elemento dell'array
  fai qualcosa con $elemento;
}
```

Oppure

```php
foreach ($array as $key => $value) {
  fai qualcosa con $key e con $value;
}
```

Es.

```php
foreach ($list as $el) {
  echo($el);
}
```

Sintassi alternativa:

```php
foreach ($array as $key => $value):
  istruzioni;
endforeach;
```


---


ESERCIZI
========


----


FizzBuzz
--------
Scrivere un programma che stampi i numeri da 1 a 100, se però il numero è
divisibile per 3 allora si scriva "Fizz", se è divisibile per 5 "Buzz", se è
divisibile sia per 3 che per 5 allora si scriva "FizzBuzz".

Es. 1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz, 16, etc...

Un grande classico della programmazione


----

vOcAlI
------
Scrivere un programma che data una stringa minuscola la stampi con le vocali maiuscole

Es. andrea -> AndrEA

Per quanto vi siano soluzioni semplici ma tediose, si consiglia di sbirciare
tra le funzioni di stringhe ed array per trovare una soluzione elegante.


----


Scacchiera
----------
Scrivere uno script php che disegni una scacchiera

Usare il seguente css per ralizzarla graficamente

```css
<style>
  .new-line {
    clear: both; }

  .square {
    float: left;
    width: 100px;
    height: 100px; }
    .white {
      background-color: #eee; }
    .black {
      background-color: #222; }
</style>
```

Di modo che le caselle nere siano rappresentate da

    <div class="square black"></div>

le bianche da

    <div class="square white"></div>

e si possa andare a capo inserendo un elemento

    <div class="new-line"></div>
