# SGD PHP SDK

## Authentifizierung
Um sich an der Schnittstelle anzumelden, senden Sie eine POST-Anfrage an `/rest/auth/login` und übergeben die Argumente `username` für den Benutzernamen und `apikey` für den API-Schlüssel den Sie erhalten haben.

    POST /rest/auth/login HTTP/1.1
    Host: sgd.de
    Cache-Control: no-cache
    Content-Type: application/x-www-form-urlencoded

    username=myUserName&apikey=myApiKey

Zusätzlich zur Anmeldung können Sie mit dieser Methode den aktuellen Anmeldestatus abrufen:

    curl -X GET https://www.sgd.de/rest/auth/login

und um sich vom Webservice abzumelden:

    curl -X POST https://www.sgd.de/rest/auth/logout



## Daten senden
Folgende Content-Types für den Datenversand werden unterstützt:

### raw body
    curl -X POST \
    -H "Content-Type: application/json" \
    -d '{
      "property1":"Value 1",
      "property2":"Value 2"
    }' \
    "https://www.sgd.de/rest/registration"

### form-data
    curl -X POST \
    -H "Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW" \
    -d '------WebKitFormBoundary7MA4YWxkTrZu0gW
    Content-Disposition: form-data; name="field1"

    Value 1
    ------WebKitFormBoundary7MA4YWxkTrZu0gW
    Content-Disposition: form-data; name="field2"

    Value 2
    ------WebKitFormBoundary7MA4YWxkTrZu0gW--' \
    "https://www.sgd.de/rest/registration"

### x-www-form-urlencoded
    curl -X POST \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -d 'field1=Value 1&field2=Value 2' \
    "https://www.sgd.de/rest/registration"


## Kursanmeldung Formular

#### URL
    https://www.sgd.de/rest/registration
    
#### Mögliche Argumente
| Feldname |  |  Beschreibung |
|----------|:-------------:|------|
| gender | Pflichtfeld | Geschlecht<br> Mögliche Werte: "male, female" |
| firstName | Pflichtfeld | Vorname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| lastName | Pflichtfeld | Nachname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| birthday | Pflichtfeld | Geburtsdatum<br>Format: "JJJJ-MM-TT" |
| street | Pflichtfeld | Straße<br>Buchstaben, Zahlen, Leerzeichen, Punkt und Bindestrich (max 80 Zeichen) |
| houseNumber | optional | Hausnummer<br>Buchstaben, Zahlen, Leerzeichen und Bindestrich (max 20 Zeichen) |
| postalCode | Pflichtfeld | Postleitzahl (max 10 Zeichen) |
| city | Pflichtfeld | Wohnort (max 80 Zeichen) |
| country | Pflichtfeld | Land<br>Format: ISO 3166 ALPHA-2, z.B "DE" (max 2 Zeichen) |
| phone | Pflichtfeld | Telefonnummer (max 20 Zeichen) |
| email | Pflichtfeld | E-Mail-Adresse<br>Format: nach RFC3696, http://tools.ietf.org/html/rfc3696 (max 255 Zeichen) |
| nationality | optional | Staatsangehörigkeit (max 80 Zeichen) |
| graduation | optional | Schulabschluss (max 160 Zeichen) |
| profession | optional | Beruf (max 80 Zeichen) |
| education | optional | Berufsausbildung (max 80 Zeichen) |
| experience | optional | Berufspraxis  (max 255 Zeichen) |
| experienceYear | optional | BerufspraxisJahre<br>Format: 0-9, (max 2 Zeichen) |
| professionState | optional | Bundesland (max 40 Zeichen) |
| bankTransfer | Pflichtfeld | Zahlung erfolgt per Überweisung<br>Format: bool (true, false) |
| accountOwner | optional | Kontoinhaber (max 255 Zeichen) |
| iban | optional | IBAN (max 22 Zeichen) |
| bic | optional | BIC (max 11 Zeichen) |
| discount | optional | Gewährter Rabatt<br>Format: '15' (max 2 Zeichen) |
| note | optional | Anmerkungen (max 1000 Zeichen) |
| courseCode | Pflichtfeld | Kursnummer (max 8 Zeichen) |
| wkz | Pflichtfeld | Werbekennziffer (max 20 Zeichen) |

#### Ergebnis
Ein erfolgreiches Ergebnis könnte folgendermaßen aussehen:

    {
        "orderId": "SGD-0446960",
        "eSignLink": "https://www.sgd.de/docusign/add/cc577add0400764c458b860b7466e0f2"
    }

## Infomaterial anfordern Formular

#### URL
    https://www.sgd.de/rest/studymaterial
    
#### Mögliche Argumente
| Feldname |  |  Beschreibung |
|----------|:-------------:|------|
| gender | Pflichtfeld | Geschlecht<br> Mögliche Werte: "male, female" |
| firstName | Pflichtfeld | Vorname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| lastName | Pflichtfeld | Nachname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| street | Pflichtfeld | Straße<br>Buchstaben, Zahlen, Leerzeichen, Punkt und Bindestrich (max 80 Zeichen) |
| houseNumber | optional | Hausnummer<br>Buchstaben, Zahlen, Leerzeichen und Bindestrich (max 20 Zeichen) |
| postalCode | Pflichtfeld | Postleitzahl (max 10 Zeichen) |
| city | Pflichtfeld | Wohnort (max 80 Zeichen) |
| country | Pflichtfeld | Land<br>Format: ISO 3166 ALPHA-2, z.B "DE" (max 2 Zeichen) |
| phone | optional | Telefonnummer (max 20 Zeichen) |
| email | optional | E-Mail-Adresse<br>Format: nach RFC3696, http://tools.ietf.org/html/rfc3696 (max 255 Zeichen) |
| courseCode | Pflichtfeld | Kursnummer (max 8 Zeichen) |
| courseCodeSecond | optional | Kursnummer (max 8 Zeichen) |
| wkz | Pflichtfeld | Werbekennziffer (max 20 Zeichen) |
| formName | optional | |
| phoneOptIn | optional | true/false |
| mailOptIn | optional | true/false |

#### Ergebnis
Ein erfolgreiches Ergebnis könnte folgendermaßen aussehen:

    {
        "orderId": "SGD-0446960",
    }

## Infomaterial digital anfordern

#### URL
    https://www.sgd.de/rest/study-material-digital
    
#### Mögliche Argumente
| Feldname |  |  Beschreibung |
|----------|:-------------:|------|
| gender | Pflichtfeld | Geschlecht<br> Mögliche Werte: "male, female" |
| firstName | Pflichtfeld | Vorname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| lastName | Pflichtfeld | Nachname<br>Buchstaben, Leerzeichen und Bindestrich (max 80 Zeichen) |
| phone | optional | Telefonnummer (max 20 Zeichen) |
| email | Pflichtfeld | E-Mail-Adresse<br>Format: nach RFC3696, http://tools.ietf.org/html/rfc3696 (max 255 Zeichen) |
| courseCode | Pflichtfeld | Kursnummer (max 8 Zeichen) |
| courseCodeSecond | optional | Kursnummer (max 8 Zeichen) |
| wkz | Pflichtfeld | Werbekennziffer (max 20 Zeichen) |
| formName | optional | |
| phoneOptIn | optional | true/false |
| mailOptIn | optional | true/false |

#### Ergebnis
Ein erfolgreiches Ergebnis könnte folgendermaßen aussehen:

    {
        "orderId": "SGD-0446960",
    }

## Kursliste anfragen

#### URL
    https://www.sgd.de/rest/courses

#### Ergebnis
Ein erfolgreiches Ergebnis könnte folgendermaßen aussehen:

    [
        {
            "id": 297,
            "courseCode": "8930",
            "title": "Außenwirtschaft und Exportmanagement"
        },
        {
            "id": 296,
            "courseCode": "8931",
            "title": "Außenwirtschaft und Exportmanagement mit IHK-Zertifikat"
        },
        ...
    ]
 
## Einzelkurs anfragen

#### URL
    https://www.sgd.de/rest/course/296

#### Ergebnis
Ein erfolgreiches Ergebnis könnte folgendermaßen aussehen:

    {
        "id": 296,
        "courseCode": "8931",
        "title": "Außenwirtschaft und Exportmanagement mit IHK-Zertifikat",
        "description": "<p>Deutschland gehört seit vielen Jahrzehnten zu den größten Exportstaaten. Durch die Globalisierung und neue digitale Kommunikationstechnologien profitieren mittlerweile selbst kleinere bis mittlere Unternehmen vom Außenhandel. Entsprechend groß ist heute die Nachfrage nach qualifizierten Experten und Expertinnen. Mit diesem Kompaktkurs eignen Sie sich in kürzester Zeit alle Kenntnisse für den Aufbau und die Pflege des Auslandsgeschäfts an. Im Anschluss sind Sie fit für anspruchsvolle Tätigkeiten in allen Branchen.</p>",
        "duration": 12,
        "supportDuration": 18,
        "graduation": "IHK-Zertifikat",
        "graduationShort": "<p><strong>sgd-Abschlusszeugnis</strong> nach erfolgreicher Kursteilnahme</p>\r\n<p><strong>IHK-Zertifikat</strong> nach erfolgreichem Absolvieren des lehrgangsinternen Tests</p>",
        "hoursPerWeek": "10 Stunden",
        "addSchoolInfo": false,
        "addCareerInfo": false,
        "addNationalityInfo": false,
        "price": 3228,
        ...
    }
    
