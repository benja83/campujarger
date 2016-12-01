# Anleitung für den Code-Test

Wir möchten, dass du in CakePHP 2.6 und MySQL eine Jobbörse baust, die folgende Funktionalitäten bietet:

* Anlegen eines Jobs
* Bearbeiten und Löschen eines Jobs (siehe mehr unten)
* Ansehen eines Jobs
* Ansehen aller Jobs als Liste

Dieses Tutorial könnte dir dabei eine Hilfe sein: http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/blog.html.

Neben den Grundfunktionalitäten soll noch ein weiteres Feature enthalten sein: Und zwar soll der Ersteller eines Jobs nach seiner E-Mail-Adresse gefragt werden. Wurde der Job nun erfolgreich gespeichert, erhält der Ersteller einen Link per E-Mail zugesendet, unter dem er den Job bearbeiten kann.

Der Link kann dann z.B. folgende Struktur haben jobboard.local/jobs/edit/256?token=asddas1221d1asdkjd122kj. Wichtig: Es soll nur möglich sein den Job über diesen Link (mit Token) zu bearbeiten oder zu löschen.

Wir bewerten die Lösung der Aufgabe nach den folgenden Kriterien:

* Funktionalität
* Coding Style
* Leserlichkeit
* Sauberkeit
* Effizienz

Die Auswahl der Daten, die du abfrägst ist dir überlassen. Das Design bzw. Aussehen der Seite ist dabei nicht ausschlaggebend, aber wir freuen uns natürlich immer auch über eine optisch ansprechende Umsetzung. Das Wichtigste ist, dass alles läuft und wir sehen, dass CakePHP und der MVC-Ansatz verstanden wurden.

Bitte hoste die fertige Jobbörse auf einer Plattform deiner Wahl (z.B. kostenlos auf: https://www.heroku.com/) und sende uns anschließend den zugehörigen Link. Den SourceCode kannst du uns über Github zur Verfügung stellen - ebenfalls mit Link zu deiner Repository.

# For local installation:

- You have to create a .env file with the following content

```json
{
    "USERNAME": "your email account from where the emails will be sent",
    "PASSWORD": "the password of you email aaccount",
    "CLEARDB_DATABASE_URL": "http://user:password@localhost/database_name"
}

```

- Create your database in your local mysql

- Run the ./db/migrations/1479415747_create_job_offer.sql sql script to create the offer table
