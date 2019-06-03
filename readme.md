## Slutprojekt Webbserver 2
I det här projektet har jag gjort en väldigt standard blogg men inriktiktat mig på en privatmeddelande
funktion. Man kan helt enkelt skapa konto på sidan göra inlägg osv. men också skicka meddelanden mellan
användare.

## Ramverk
Jag använde mig av ramverket Laravel. Laravel är ett av de största PHP-ramverken och har mycket bra
dokumentation, bra funktionallitet och mycket som kommer "out of the box" så som säkerhet, rutter osv.

## Datalagring
Jag lagrar allt i en mysql-databas. Jag har använt mig av Laravels artisan funktion för att göra
migrationer i databasen. Lösenord hashas som standard i Laravel. Jag har också använt foreign-keys
mellan de olika tabellerna vid behov.