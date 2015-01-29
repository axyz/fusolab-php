MySQL
======


----


Cos'è un database
----------------------
contenitore per la conservazione la modifica e la consultazione di dati di qualunque tipo.

Nel caso di MySQL si può parlare di database relazionale, sostanzialmente un particolare tipo di database che utilizza il concetto di tabelle e tramite campi univoci identificativi permette di definire delle relazioni tra le tabelle stesse.

ogni riga di una tabella è un record, il quale è composto da vari campi (colonne) che possono essere di vari tipi e dimensioni (stringhe, numeri, dati binari, etc..)


----


Creare un DataBase
-----------------------
In MySQL si può creare un database tramite l'istruzione

CREATE DATABASE database_name

sarà poi possibile accedere a tale database invocando

mysql database_name

o tramite un connettore di un qualunque linguaggio di programmazione specificando indirizzo ip del server e nome del database


---


QUERY SQL
=========


----


SQL
-----
SQL sta per Structured Query Language.

Una query è un insieme di istruzioni che compiono una determinata azione, come creare una tabella, aggiungere dei dati o effettuare un ricerca.

I comandi SQL sono molto vicini al semplice inglese, solitamente vengono scritti in maiuscolo per differenziarli dai nomi di tabelle e dai dati; tuttavia tali comandi funzionano anche se scritti in minuscolo.


----


CREATE TABLE
-------------------
```sql
CREATE TABLE name (
field1 TYPE OPTIONS;
field2 TYPE OPTIONS;
);
```

Crea una tabella name con due campi


----


Tipi dei campi
-----------------
I principali tipi di dato che può assumere un campo sono:

- INTEGER, SMALLINT, DECIMAL(n,d)
- FLOAT, REAL
- CHAR(n), VARCHAR(n)
- TEXT, BLOB
- ENUM('a', 'b', 'c', ...), SET('a', 'b', 'c', ...) // occhio...

Se si usa SQLite si ha a disposizione soltanto

NULL, INTEGER, REAL, TEXT, BLOB; ma molti dei tipi di sqlite verranno automaticamente interpretati come uno di questi.


----


Esempio 1
------------
```sql
CREATE TABLE People (
name VARCHAR(20),
birthday DATE
)
```


----


Inserire record in una tabella
---------------------------------
```sql
INSERT INTO table_name
VALUES (value1,value2,value3,...);
```

Es.

```sql
INSERT INTO People
VALUES ("Andrea", "1987-10-11"), ("Gianni", "1990-7-9");
```


----



Opzioni dei campi
---------------------
Un campo può avere delle opzioni che ne influenzano il comportamento, le più note sono:

- NOT NULL deve essere definito
- AUTOINCREMENT un numero che si incrementa da solo ogni volta che un    record viene creato
- DEFAULT('value') se non definito il campo avrà il valore specificato
- UNIQUE non possono esistere due record con tale campo uguale


----


Esempio 2
------------
```sql
CREATE TABLE People (
id INT AUTOINCREMENT,
name VARCHAR(20) NOT NULL DEFAULT('ignoto'),
birthday DATE NOT NULL
)
```


----


Relazioni
-----------
Per stabilire una relazione tra due tabelle è necessario che almeno quella riferita possegga un campo dei record che funga da identificatore univoco. Tale identificatore (spesso un intero che si autoincrementa) viene chiamato primary key.

La chiave primaria di un elemento di un'altra tabella a cui ci si riferisce viene chiamata foreign key.


----


Esempio 3
------------
```sql
CREATE TABLE People (
P_ID INT NOT NULL AUTO_INCREMENT
name VARCHAR(20) NOT NULL DEFAULT('ignoto'),
birthday DATE NOT NULL,
PRIMARY KEY (P_ID)
)

CREATE TABLE Orders (
O_ID int NOT NULL AUTO_INCREMENT,
OrderNo int NOT NULL,
P_ID int,
PRIMARY KEY (O_ID),
FOREIGN KEY (P_ID) REFERENCES People(P_ID)
)
```


----


SELECT
---------
Il comando SELECT permette di selezionare determinate colonne da una tabella e restituisce una nuova tabella con i risultati.

```sql
SELECT column_name,column_name
FROM table_name;
```

o anche

```sql
SELECT * FROM table_name;
```

```sql
SELECT DISTINCT * FROM table_name;
```

Seleziona ogni elemento presente ma senza ripetizioni.


----


WHERE
---------
```sql
SELECT column_name, column_name
FROM table_name
WHERE column_name operator value;
```

Con il WHERE si possono selezionare record che soddisfino una determinata condizione.

```sql
SELECT * FROM Orders
WHERE OrderNo = 123;
```

Possibili operatori sono <, >, =, <=, >=, <>, BETWEEN, LIKE, IN

si possono aggiungere condizioni con AND ed OR


----


DELETE
----------
```sql
DELETE FROM table_name
WHERE some_column=some_value;
```

Elimina dalla tabella i record che soddisfano la condizione specificata

----


UPDATE
----------
```sql
UPDATE table_name
SET column1=value1,column2=value2,...
WHERE some_column=some_value;
```

Modifica il contenuto dei record che soddisfano la condizione specificata


----


VIEW
------
Una view è sostanzialmente il risultato di una select a cui viene dato un nome, una volta creata essa si comporterà come una normale tabella dove cercare dei dati, ma il suo contenuto si aggiornerà automaticamente in base alla select con cui è definita.

```sql
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
```


----


E molto altro...
-----------------
[W3Schools tutorial](http://www.w3schools.com/sql/default.asp)


---


ESERCIZI
=======


----


Fusolab
---------
Progettare un database per il Fusolab.

In particolare è necessario tenere traccia dei corsi, degli studenti e dei docenti.

Degli studenti ci interessano nome, cognome, email, telefono, data di nascita e i corsi che segue.

Dei corsi ci interessa nome, docente, ore, partecipanti, anno e semestre.

Dei docenti ci interessa sapere i corsi che tiene.

N.B. i docenti sono persone come tutte le altre e possono anche seguire dei corsi.
