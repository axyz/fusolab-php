MYSQL PARTE 2
=============


----


join
----
Capita spesso la necessità di selezionare dati prelevandoli fra più tabelle
aventi delle relazioni tra loro. A tale scopo si utilizzano le join.


----


cross join
-----------
Di default il JOIN tra due tabelle produce il loro prodotto cartesiano

Poco utile!


----


Inner join
-----------
Se viene specificata una condizione di uguaglianza tra uno o più campi delle
tabelle (solitamente foreign keys) verranno visualizzate solo le righe aventi
una valida relazione con l'altra tabella ed ogni riga sarà l'unione dei campi
della prima tabella con i campi della seconda relativi all'id specificato.

```sql
SELECT *
FROM ordini AS o, clienti AS c
WHERE o.idCliente = c.idCliente AND idOrdine > 1000;

SELECT *
FROM ordini AS o JOIN clienti AS c ON o.idCliente = c.idCliente
WHERE idOrdine > 1000;
```


----


left & right join
-----------------
Usando un LEFT JOIN se una riga della prima tabella non ha una corrispondenza
nell'altra verrà comunque inserita ma con tutti gli altri campi nulli

Il RIGHT JOIN funziona allo stesso modo, ma prendendo invece tutte le righe
della seconda tabella

```sql
SELECT *
FROM ordini as o LEFT JOIN clienti AS c ON o.idCliente = c.idCliente
WHERE idOrdine > 1000;
```


----


using & natural
-----------------
Se il campo di cui controllare l'uguaglianza ha lo stesso nome (es. id_qualcosa)
si può usare la forma abbreviata USING (id_qualcosa).

Un NATURAL JOIN effettuerà un inner join controllando l'uguaglianza di tutti i
campi aventi lo stesso nome.

```sql
SELECT * FROM ordini LEFT JOIN clienti USING (idCliente) WHERE idOrdine > 1000;

SELECT * FROM ordini NATURAL LEFT JOIN clienti WHERE idOrdine > 1000;
```


---


MYSQL CONNECT
=============
Interfacciarsi con MySQL in PHP

----


Connessione al server
---------------------
```php
$server = mysql_connect($address, $user, $password);
```

Su XAMPP l'utente di default è root è non vi è alcuna password.

----


Selzionare un database
----------------------
```php
mysql_select_db('nome_db', $server);
```

N.B. $server non è l'indirizzo del server, ma la risorsa ritornata dalla
funzione mysql_connect.

----


Esempio
-------
```php
$server = mysql_connect('localhost', 'root')
    or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('fusolab', $server)
    or die ("Errore nella selezione del database: " . mysql_error());
```


----


Effettuare una query
--------------------
```php
$query = "SELECT * FROM Tabella";
$result = mysql_query($query);
```


----


Estrapolare i dati
------------------
- mysql_fetch_row

```php
$res = mysql_query("SELECT id, nome FROM utenti ");
while ($row = mysql_fetch_row($res)) {
	echo 'ID: ', $row[0] , ' Nome: ', $row[1] , "\n";
}
```

- mysql_fetch_assoc

```php
$res = mysql_query("SELECT id, nome FROM utenti ");
while ($row = mysql_fetch_assoc($res)) {
	echo 'ID: ', $row['id'] , ' Nome: ', $row['nome'] , "\n";
}
```

- mysql_fetch_object

```php
$res = mysql_query("SELECT id, nome FROM utenti ");
while ($obj = mysql_fetch_object($res)) {
	echo 'ID: ', $obj->id , ' Nome: ', $obj->nome , "\n";
}
```


----


Attenzione
----------
Le funzioni di fetch ogni volta che vengono invocata estrapolano una riga, la
volta successiva estrarranno la seguente e così via.

Solitamente per lavorare con i dati è bene usare il fetch per salvarli in un
array o un'altra struttura dati anzichè utilizzarli direttamente una sola volta.

Es.

```php
$data = array();
while ($row = mysql_fetch_assoc($res)) {
    $data[] = $row;
}
```


---


ESERCIZI
========


----


print_table
-----------
Scrivere una funzione print_table che data una qualunque tabella mysql la stampa
in html.


----


studenti
--------
Usando il atabase fusolab stampare una tabella in HTML sugli studenti contenente
Nome del corso, Ore, Anno, Semestre, Nome studente,	Cognome, email, tel, nascita
