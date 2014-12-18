USER INPUT & FORMS
==================


----


Il tag form
------------
In HTML un form è un insieme di input ed opzioni selezionabili dall'utente che possono essere inviate al server per essere processate.

```HTML
<form action="test.php" method="post">
  Nome: <input type="text" name="name"><br>
  cognome: <input type="text" name="surname"><br>
  <input type="submit">
</form>
```

<pre>
<form action="test.php" method="post">
  Nome: <input type="text" name="name"><br>
  cognome: <input type="text" name="surname"><br>
  <input type="submit">
</form>
</pre>


----


L'elemento input
--------------------
In un form HTML l'elemento input si occupa di acquisire un input dall'utente.

Tramite l'attributo type si può definire il tipo di input: text, button, email, file, date, etc...

[guida MDN](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input)


----


Elementi option
------------------
Si possono creare liste di valori predefiniti da poter selezionare in un form tramite gli elementi select e datalist.

Le singoli opzioni saranno poi racchiuse in un tag option

```HTML
<select name="city">
  <option value="roma" selected>Roma</option>
  <option value="milano">Milano</option>
  <option value="napoli">Napoli</option>
</select>
```

<pre>
<select name="city">
  <option value="roma" selected>Roma</option>
  <option value="milano">Milano</option>
  <option value="napoli">Napoli</option>
</select>
</pre>

L'attributo value indica il valore che verrà inviato al server se quella opzione viene selezionata.

[guida select](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select)

[guida datalist](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist)


----


Label
------
Si possono assegnare delle etichette ad un elemento di un form racchiudendolo in un tag label.

```HTML
<label>Nome: <input type="text" name="name" /></label>
```

<pre>
<label>Nome: <input type="text" name="name" /></label>
</pre>


----


textarea
----------
Quando si ha necessità di avere in input del testo più ampio e che possa anche andare a capo si può usare una textarea.

```HTML
<textarea name="text" rows="10" cols="50">Scrivi del testo</textarea>
```

<pre>
<textarea name="text" rows="10" cols="50">Scrivi del testo</textarea>
</pre>

Dove intuitivamente rows e cols sono le dimensioni iniziali della text area in caratteri e righe.


---


esempio semicompleto
--------------------
```HTML
<html>
  <body>
    <form action="formtest.php" method="post">
      <fieldset>
        <legend>User info</legend>
        <label>Nome: <input type="text" name="name" /></label><br>
        <input type="radio" name="sex" value="male" /> Maschio<br>
        <input type="radio" name="sex" value="female" /> Femmina<br>
        <label>Data di Nascita: <input type="date" name="born"/></label></br>
        <label>Email: <input type="email" name="mail" /></label></br>
        <label>Città:
          <select name="city">
            <option value="Roma">Roma</option>
            <option value="Milano">Milano</option>
            <option value="Napoli">Napoli</option>
          </select>
        </label><br>
        Biografia: <br><textarea name="bio" cols=30 rows=10></textarea><br>
        <input type="submit" />
      </fieldset>
    </form>
  </body>
</html>
```


----


risultato
---------
<pre>
<form action="formtest.php" method="post">
<fieldset>
<legend>User info</legend>
<label>Nome: <input type="text" name="name" /></label><br>
<input type="radio" name="sex" value="male" /> Maschio<br>
<input type="radio" name="sex" value="female" /> Femmina<br>
<label>Data di Nascita: <input type="date" name="born"/></label></br>
<label>Email: <input type="email" name="mail" /></label></br>
<label>Città:
<select name="city">
<option value="Roma">Roma</option>
<option value="Milano">Milano</option>
<option value="Napoli">Napoli</option>
</select>
</label><br>
Biografia: <br><textarea name="bio" cols=30 rows=10></textarea><br>
<input type="submit" />
</fieldset>
</form>
</pre>


---


INVIARE I DATI
============


----


GET & POST
----------
I dati inviati tramite i form saranno visibili allo script specificato nell'attributo action.

A seconda del metodo scelto essi saranno disponibili nell'array $_POST oppure in quello $_GET

le chiavi dell'array saranno gli attributi name degli elementi del form.

```php
<?= $_POST['name'] ?>
```

dove name è l'attributo name dell'input inviato


----





Validare sempre l'input
--------------------------
Se permettiamo a qualunque input dell'utente di essere incluso nella nostra pagina web tramite $_GET o $_POST ci esponiamo a possibili iniezioni malevole di codice html o javascript. Una tecnica di base per limitare in parte il problema è quella di codificare gli input ricevuti con htmlspecialchars.

```HTML
<?php echo htmlspecialchars($_POST['text']); ?>
```

In questo modo eventuali tag HTML iniettati nel campo di testo verranno stampati come semplice testo.


---


ESERCIZI
========


----


Guestbook
-------------
Creare un form che accetti un nome, una mail e del testo e quando inviato faccia comparire un avatar generato con robohash, il nome, il testo inviato e alla fine la mail in versione antispam e l'orario a cui è stato inviato.
