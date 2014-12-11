CLASSI
======


----


Definizione
-----------
```php
class Persona
{
  public $nome = '';

  public function stampaNome()
  {
    echo $this->nome;
  }
}
```


----


Istanziazione
-------------
Una volta dichiarata una classe si può creare un oggetto di quella classe
tramite l'operatore new

```php
new Persona();
```

tale oggetto può essere assegnato ad una variabile

```php
$andrea = new Persona();
```


----


Metodi e Proprietà
------------------
Le variabili dichiarate all'interno di una classe sono da considerarsi delle
proprietà o attributi dell'oggetto che astraggono.

Le funzioni, invece, sono le "azioni" che può compiere l'oggetto e vengono
solitamente chiamate metodi.

si può accedere a metodì e proprietà di un oggetto istanziato tramite
l'operatore freccia ->

```php
$andrea->nome = 'Andrea Moretti';
$andrea->stampaNome(); // Andrea Moretti
```


----


Visibilità
----------
Proprietà e metodi possono essere dichiarati come public, protected o private.

- public: saranno visibili ovunque
- protected: saranno visibili solo alla classe stessa o a classi figlie
- private: saranno visibili solo alla classe stessa


----


Costruttore
-----------
Il costruttore è il metodo che viene invocato nel momento in cui un oggetto
viene istanziato

```php
class Persona
{
  $nome = '';

  function __construct($nome)
  {
    $this->nome = $nome;
  }
}
```

Esiste anche il metodo __destruct() che viene automaticamente invocato quando
non vi sono più referenze ad un determinato oggetto o quando lo script termina.


----


Ereditarietà
------------
Una classe può "discendere" da un'altra ed ereditarne metodi e proprietà.

```php
class Animale
{
  public function mangia()
  {
    echo "mangio";
  }
}

class Cane extends Animale
{
  public function abbaia()
  {
    echo "abbaio";
  }
}

$pluto = new Cane();
$pluto->mangia(); // mangio
$pluto->abbaia(); // abbaio
```


----


Elementi static
---------------
Con la keyword static si possono dichiarare metodi o proprietà che siano
accessibili senza necessità di istanziare alcun oggetto.

```php
class Matematica
{
  const PI = 3.14159;
}

echo Matematica::PI;
```


---


ARGOMENTI AVANZATI
==================


----


interface
---------
```php
interface Stampabile
{
  public function stampa();
}

class Testo implements Stampabile
{
  public function stampa()
  {
    echo "stampo il testo";
  }
}
```

Definisce i comportamenti che un oggetto deve avere.

N.B. si possono implementare più interfacce, ma si può estendere una sola classe



----


trait
-----
```php
trait Parla
{
  public function parla()
  {
    echo "parlo";
  }
}

Class Uomo
{
  use Parla;
}
```

Concettualmente non sono oggetti, ma parti riusabili comuni a più classi.

Si possono usare quanti trait si vogliano a patto di non avere funzioni
in conflitto.


----


abstract
--------
```php
abstract class Animale
{
  abstract function mangia();
  function muore()
  {
    echo "sono morto";
  }
}

class Cane extends Animale
{
  function mangia()
  {
    echo "mangio come un cane";
  }
}
```


----


final
-----
Con la keyword final si possno definire metodi su cui non si può fare overloading
o intere classi che non possono essere estese.



----


__set() e __get()
-----------------
Sovrascrivendo i metodi __set e __get si può definire il comportamento
dell'oggetto quando si tenta di accedere o modificare proprietà non definite


----


Magic methods
-------------
[referenze dei magic methods](http://php.net/manual/it/language.oop5.magic.php)


---


ESERCIZI
========


----


Inizializzato
-------------
Scrivere una classe che quando istanziata scriva il messaggio "sono stato inizializzato"


----


Ordinatore
----------
Scrivere la classe Ordinatore che quando inizializzata prende in input un array
e che abbia 2 metodi:

- getOriginal che ritorna l'array originale
- getSorted che ritorna l'array ordinato


----


Calcolatore
-----------
Scrivere una classe calcolatore il cui costruttore prenda in input 2 numeri x e y.

si implementino le 4 operazioni fondamentali tramite metodi, con la particolarità
che il risultato, oltre ad essere ritornato, verrà salvato al posto di x.

Scrivere inoltre un metodo push(n) che salvi n al posto di y.


----


Figura
------
Scrivere le classi necessarie per rappresentare figure, punti e rettangoli.

Un punto deve poter essere generato fornendo le coordinate x ed y.

Un rettangolo deve poter essere generato a partire da 2 punti (alto a sinistra
e in basso a destra)

Per disegnarli a schermo utilizzare questa stringa per generare un punto nero:

< div style='position:absolute;top:{VALORE Y}px;left:{VALORE X}px;width:1px;height:1px;background-color:#000;'>< /div>";
