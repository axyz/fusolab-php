AJAX
====
Asynchronous JavaScript and XML


----


Un pizzico di JavaScript
------------------------
Utilizzando JavaScript assieme a PHP si possono ottenere risultati
sorprendenti.

In particolare utilizzando la tecnica delle richieste asincrone
si possono eseguire script php e visualizzarne il risultato senza dover
ricaricare la pagina.


----


Funzioni
--------
```javascript
function nome(arg1, arg2) {
  // fai qualcosa
  return risultato;
}

nome('foo', 100); // invoco la funzione name
```


----


Variabili
---------
```
var numero = 2 + 3; // 5
var stringa = "ciao " + "ciao"; // ciao ciao
var array = [1, 2, 3];
var obj = {key1: "val1", key2: 100, key3: [1, 2, "ciao"]};
obj.key2; // 100
obj.key3[2] // ciao
```


----


jQuery
------
includere jquery nella pagina

[google cdn](https://developers.google.com/speed/libraries/devguide)


----


Struttura di base
-----------------
```javascript
$(function () {
  // operazioni da eseguire
  // quando il DOM è pronto
});

// funzioni ausiliarie...
```


----


La funzione $
-------------
```javascript
/**
 * crea un oggetto jquery contenente
 * l'elemento o gli elementi corrisponenti
 * al selettore indicato
 */
$('selettore css');

/**
 * crea un oggetto jquery rappresentante
 * il nodo HTML inserito
 */
$('<div>ciao</div>');
```


----


css(...)
--------
```javascript
$(selettore).css('proprietà CSS', 'valore');
```

oppure

```javascript
$(selettore).css({'prop1': 'val1', 'prop2', 'val2'});
```


----


visibilità
----------
- hide()  nasconde un elemento;
- show()  mostra un elemento;
- toggle()  per alternare hide e show in base alla visibilità di un elemento;


----


classi
------
- hasClass('classe') metodo di controllo, ritorna true se l’elemento ha una specifica classe;
- addClass('classe') aggiungi una classe agli elementi;
- removeClass('classe') rimuove una classe agli elementi;
- toggleClass('classe') aggiunge una classe se già non presente, altrimenti la toglie.


----


length
------
Quando un oggetto jQuery contiene più elementi si può conoscere il loro numero
tramite la proprietà length.

```javascript
$('a').length // numero dei link
```


----


each
----
Col metodo each si può iterare tra tutti gli elementi di un oggetto jQuery.

```javascript
$('h1').each(function () {
  $(this).css('color', 'red'); // tutti i titoli diventano rossi
}
```

N.B. usando $(this) racchiudiamo l'elemento attuale (this) in un oggetto jQuery
e possiamo quindi utilizzare i metodi della libreria su quell'oggetto.


---


Eventi
------
```javascript
$('selettore').on('nomeevento', function () {
  // fai qualcosa avendo a disposizione $(this)
});
```

[Lista eventi](https://developer.mozilla.org/en-US/docs/Web/Events)


----


Eventi delegati
---------------
Passando una stringa come secondo parametro alla funzione on, si può indicare
un selettore per i figli del nodo abilitati a far scattare l'evento.

Es.

```javascript
$( "#dataTable tbody tr" ).on( "click", function() {
  console.log( $( this ).text() );
});
```

vs

```javascript
$( "#dataTable tbody" ).on( "click", "tr", function() {
  console.log( $( this ).text() );
});
```


----


abbreviazioni
-------------
- click()
- dblclclick()
- change()
- focus()
- keypress
- mouseover, mouseenter, mousedown, mousemove, mouseout, mouseup

[etc...](http://api.jquery.com/category/events/)


----


off
---
Rimuove un event handler da un oggetto jQuery

```javascript
.off( events [, selector ] [, handler ] )
```


---


EVENTI ASINCRONI
================


----


XMLHttpRequest
--------------
Originariamente introdotto da Microsoft per funzionare con risorse XML.

```javascript
var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function () {
  if (httpRequest.readyState === 4) {
    if (httpRequest.status === 200) {
      console.log(httpRequest.responseText);
    }
  }
}
httpRequest.open('GET', 'url');
httpRequest.send();
```

----


Same origin Policy
------------------
Per motivi di sicurezza le XMLHttprequest possono essere eseguite solo verso
risorse dello stesso dominio.

Per accedere ad API di terze parti si devono usare le http access policy (CORS)
o, come di solito avviene, il "trucchetto" del jsonp


----


JQuery ajax
-----------
JQuery ci semplifica molto la vita con le richieste asincrone, sia per quanto
riguarda la compatibilità con tutti i browser, sia per l'astrazione di alcuni
utili trucchetti come jsonp e la serializzazione dei dati inseriti nei form.


----


$.ajax
------
La funzione $.ajax implementa tutte le operazioni effettuabili tramite
XMLhttprequest, che in JQuery viene esteso in un oggetto jqXHR

```javascript
var jqxhr = $.ajax( "example.php" )
  .done(function() {
    alert( "success" );
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    alert( "complete" );
  });
```

[Lunga documentazione](http://api.jquery.com/jQuery.ajax/)


----


Shortcuts
---------
JQuery ci fornisce alcuni shortcuts per operazioni tipiche.

```javascript
$.get('url', data)
  .done(function (data) {...});

$.getJSON('url', data)
  .done(function (data) {...});

$.post('url', data)
  .done(function (data) {...});

/**
 * carica la risposta di URL all'interno dell'elemento selezionato al posto del
 * suo attuale HTML
 */
$('selettore').load('URL');
```


----


Serialize
---------
I dati inviati in una chaimata ajax possono essere un oggetto javascript o una
stringa. In particolare una stringa in formato url si può usare per inviare
delle coppie key=value&key2=value2 etc..

la funzione serialize() di jQuery trasforma i dati raccolti in un form in una
stringa in formato url e si può usare in una funzione post per inviare i dati
del form ad un server remoto.

```javascript
$.post( "test.php", $( "#testform" ).serialize() );
```


---


Esercizi
========


----


To-Do 2.0
---------
Modificare l'applicazione To-Do in modo che la pagina non venga mai ricaricata
usando AJAX
