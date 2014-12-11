Funzioni
========


----


richiamare una funzione
-----------------------
```php
nomeFunzione(arg1, arg2, ...);
```

La funzione 'nomeFunzione' viene richiamata con gli argomenti passati.

Una funzione può ritornare un risultato, oppure ritornare NULL ed eventualmente
eseguire operazioni che non agiscono sui dati o che modificano dati esistenti
al di furoi della funzione (side-effect)


----


definire una funzione
---------------------
```php
function nomeFunzione($arg1, $arg2)
{
  istruzioni;
  return qualcosa; // qualora ci sia un valore di ritorno
}
```

Es.

```php
function sum($a, $b)
{
  return $a + $b;
}
```

Quando una funzione viene dichiarata essa esiste in tutto lo scope globale, a
prescindere da dove venga definita.


----


scoping delle funzioni
----------------------
```php
$a = 1; /* global scope */

function test()
{
    echo $a; // $a non è definita nello scope della funzione
}

test(); // non stampa nulla!
```

----


global keyword
--------------
```php
$text = "ciao";

function stampa()
{
  global $text; // inserisce la variabile globale $text nello scope della funzione
  echo $text;
}

stampa(); // stampa ciao
```

Generalmente affidarsi a variabili globali è una cattiva abitudine.

Si consiglia di cercare di scrivere funzioni indipendenti dall'ambiente in cui
vengono eseguite.


----


variabili statiche
------------------
Si comportano in maniera simile alle variabili globali, ma la loro dichiarazione
viene eseguita una sola volta nel corso della vita dello script, anche se la
funzione in cui viene definita viene richiamata più volte.

Un tipico esempio può essere un contatore che tiene traccia di quante volte
una funzione viene eseguita.

```php
function counter()
{
  static $cnt = 0; // se non fosse static verrebbe azzerato ad ogni esecuzione
  echo "funzione eseguite $cnt volte";
  $cnt++;
}
```

Così come per le variabili globali sarebbe bene evitare di fare affidamento
sulle variabili statiche quando esistano soluzioni più pulite che le evitino.


----


argomenti passati per riferimento
---------------------------------
Di default, gli argomenti della funzione sono passati per valore (così se
cambiate il valore dell'argomento all'interno della funzione , esso non
cambierà fuori della funzione). Se volete permettere ad una funzione di
modificare i suoi argomenti (side effect), dovete passarli per riferimento.

Se volete che una argomento sia passato sempre per riferimento ad una funzione,
dovete anteporre un ampersand (&) al nome dell'argomento nella definizione della
funzione:

```php
function aggiungiQualcosa(&$string) // l'argomento non è il valore di string, ma la stringa stessa
{
  $string .= "e qualche altra cosa."; // modifichiamo la stringa originaria
}

$str = "Questa è una stringa, ";
aggiungiQualcosa($str);
echo $str; // l'output sarà "Questa è una stringa, e qualche altra cosa."
```


----


argomenti di default
--------------------
Una funzione può definire valori predefiniti.

```php
function test($msg = "ciao")
{
  echo $msg;
}
test("buongiorno"); // stampa "buongiorno"
test(); // stampa "ciao"
```


----


numero variabile di argomenti
-----------------------------
In PHP 5.6 e successivi, le liste dei parametri possono includere il token ...
per denotare che la funzione accetta un numero variabile di parametri.
I parametri saranno passati nella variabile data come un array; per esempio:

```php
function sum(...$numbers)
{
  $res = 0;
  foreach ($numbers as $n) {
    $res += $n;
  }
  return $res;
}

echo sum(1, 2, 3, 4); // stampa 10
```


---


ESERCIZI
========


----


antispam bis
------------
Riscrivere l'esercizio dell'antispam della lezione 2, ma questa volta realizzare
una funzione antispam che accetti come argomento un indirizzo email e restituisca
la versione a prova di spam.


----


robohash
--------
[robohash.org](http://robohash.org) è un servizio online che genera avatar di
robot e mostri in base ad una stringa che funge da hash.

Se aprite sul browser http://robohash.org/qualsiasicosa capirete di cosa parlo.

Se cambiate la stringa cambierà anche l'immagine, ma se la stringa è la stessa
l'immagine sarà sempre la stessa (per questo è un hash e non un generatore casuale)

inoltre se aggiungete alla fine dell'indirizzo ?set=set2 avrete mostri invece
che robot, mentre con set3 avrete teste di robot.

Scriverete una funzione robohash che accetti come argomenti una stringa ed un
numero e ritorni un url valido di robohash con la stringa come hash e il numero
(da 1 a 3) come set.

Se la funzione viene richiamata senza alcun argomento, allora dovrà restituire
un url con hash casuali (qualunque stringa) e set casuale (1, 2 o 3)


----


scacchiera bis
--------------
Scrivere una funzione checkerBoard che accetti 6 argomenti:

- larghezza in celle
- altezza in celle
- primo colore
- secondo colore
- larghezza della singola cella in pixel
- altezza della singola cella in pixel

qualora non vengano passati argomenti, di default, la funzione deve utilizzare
i valori 8, 8, '#ddd', '#222', 100, 100

La funzione deve ritornare una stringa contenente una scacchiera nella forma
utilizzata nella lezione passata.
