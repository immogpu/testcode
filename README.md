# Universal MP4 Player

The **Universal MP4 Player** is a framework-agnostic, responsive MP4 video player with custom controls that work across modern desktop browsers as well as Android and iOS WebViews. The library is implemented from scratch without third-party UI dependencies and can be embedded on any website similarly to how you would load jQuery.

## Features

- 🔁 Custom play/pause, timeline, buffered progress, volume, and fullscreen controls
- 📱 Touch-friendly sliders and buttons designed for mobile browsers
- ♿ Keyboard shortcuts and accessible labels for screen readers
- ⚙️ API for play, pause, seek, volume, mute, fullscreen, and dynamic source loading
- 🧱 Lightweight ES module bundle plus standalone CSS theme
- 🧪 Automated tests powered by JSDOM

## Getting started

1. Install via npm (or copy the files from the `dist/` folder):

   ```bash
   npm install universal-mp4-player
   ```

2. Include the CSS and JS bundle on your page and instantiate the player:

   ```html
   <link rel="stylesheet" href="./dist/mp4player.css" />
   <div id="player"></div>
   <script type="module">
     import Mp4Player from './dist/mp4player.js';

     new Mp4Player('#player', {
       poster: 'poster.jpg',
       sources: [
         { src: 'video.mp4', type: 'video/mp4' }
       ]
     });
   </script>
   ```

3. Alternatively, add `data-mp4-player` to any container that already includes `<source>` children and call `Mp4Player.enhanceAll()` for progressive enhancement.

### API surface

- `play()`, `pause()`, `togglePlay()`
- `seekBy(seconds)`
- `setVolume(value)` and `toggleMute()`
- `setSource(sources)`
- `toggleFullscreen()`
- `destroy()`
- `Mp4Player.enhanceAll(selector?)`

### Development scripts

- `npm run build` – copies the source JavaScript and CSS into `dist/` with a banner header.
- `npm test` – runs the JSDOM-based unit tests.

## Demo

Open `demo/index.html` in a modern browser after running `npm run build` to see the player in action.

---

# Testprojekt

## FAQ für Service-Support-Teams im Umgang mit Immobilienmakler:innen

**Frage 1: Wie kann ich einem Immobilienmakler helfen, wenn er Probleme beim Einloggen hat?**
Überprüfen Sie zunächst, ob der oder die Makler:in die richtige E-Mail-Adresse verwendet. Bitten Sie anschließend um eine Passwortzurücksetzung über den Link „Passwort vergessen?“. Sollte weiterhin kein Zugang möglich sein, prüfen Sie, ob das Konto gesperrt ist, und eskalieren Sie gegebenenfalls an das Technikteam.

**Frage 2: Was tun, wenn Exposés nicht korrekt hochgeladen werden?**
Fragen Sie nach der genauen Fehlermeldung und lassen Sie sich die Dateigröße und das Dateiformat nennen. Verweisen Sie auf die zulässigen Formate (PDF, JPEG, PNG) und eine maximale Dateigröße von 15 MB. Falls das Problem bleibt, fordern Sie Testdaten an und erstellen Sie ein Ticket für das Produktteam.

**Frage 3: Wie unterstütze ich bei fehlenden oder veralteten Objektstammdaten?**
Führen Sie den oder die Makler:in durch den Import- oder Synchronisationsprozess mit dem angebundenen CRM. Prüfen Sie, ob ein automatischer Datenabgleich aktiviert ist und wann er zuletzt erfolgreich lief. Bei anhaltenden Differenzen koordinieren Sie ein manuelles Update durch das Datenmanagement-Team.

**Frage 4: Was sage ich, wenn Leads nicht in der Makler-Übersicht auftauchen?**
Kontrollieren Sie, ob Filter gesetzt wurden, die Leads ausblenden. Stellen Sie sicher, dass das Lead-Routing aktiv ist und die jeweiligen Regionen korrekt zugeordnet sind. Wenn das Problem nur einzelne Leads betrifft, lassen Sie sich die Lead-IDs geben und leiten Sie die Analyse an das CRM-Team weiter.

**Frage 5: Wie gehe ich mit Fragen zur Provisionsabrechnung um?**
Bitten Sie um die betreffende Rechnungsnummer und den Abrechnungszeitraum. Überprüfen Sie die Provisionsberechnung in den internen Systemen und stellen Sie dem oder der Makler:in eine Zusammenfassung der relevanten Transaktionen zur Verfügung. Bei Unklarheiten koordinieren Sie ein Gespräch mit dem Finance-Team.

**Frage 6: Was mache ich, wenn Push-Benachrichtigungen in der App fehlen?**
Fragen Sie nach dem verwendeten Endgerät und der App-Version. Lassen Sie die Systemberechtigungen für Benachrichtigungen überprüfen und regen Sie einen Neustart der App an. Besteht das Problem weiterhin, erfassen Sie die Gerätedaten und übergeben Sie den Fall an das Mobile-Team.

**Frage 7: Wie beantworte ich Anfragen zu neuen Feature-Wünschen?**
Bedanken Sie sich für das Feedback und dokumentieren Sie den Wunsch in unserem Feature-Request-Tool, inklusive Nutzenbeschreibung und Priorität aus Sicht des Maklers. Informieren Sie, dass das Produktteam den Wunsch prüft und bei Umsetzung über das Update-Log informiert.

**Frage 8: Wie unterstütze ich bei Schulungs- oder Onboarding-Bedarf?**
Verweisen Sie auf unser aktuelles Schulungsmaterial im Help-Center und bieten Sie bei Bedarf eine kurze Einführungssession per Video-Call an. Planen Sie bei mehreren Interessierten ein Gruppentraining und halten Sie Rücksprache mit dem Enablement-Team für weiterführende Workshops.

**Frage 9: Was tun, wenn Makler:innen Datenschutzbedenken äußern?**
Erklären Sie die vorhandenen Sicherheitsmaßnahmen (SSL-Verschlüsselung, DSGVO-konforme Speicherung). Stellen Sie weiterführende Unterlagen bereit und bieten Sie an, konkrete Fragen an unsere Datenschutzbeauftragten weiterzugeben.

**Frage 10: Wie gehe ich mit Eskalationen und unzufriedenen Makler:innen um?**
Bleiben Sie ruhig, hören Sie aktiv zu und fassen Sie die Anliegen zusammen. Stellen Sie einen klaren Aktionsplan mit Zeitleiste bereit und informieren Sie die verantwortlichen Teams über die Eskalation. Halten Sie die Makler:innen regelmäßig über Fortschritte auf dem Laufenden.

## Hinweis: Mietwohnungszahlen pro Jahr

Für eine Liste, wie viele Mietwohnungen in Deutschland pro Jahr bestehen, verweisen wir auf die GENESIS-Datenbank des Statistischen Bundesamts. Ein direkter Abruf über Skripte schlug wegen einer Zugangsbegrenzung fehl; manuell können die Werte aber wie folgt ermittelt werden:

1. GENESIS-Online öffnen: <https://www-genesis.destatis.de/genesis/online>
2. Die Tabelle **31111-0004 – Wohngebäude: Wohnungen nach Art der Nutzung** auswählen.
3. Als Merkmale „Deutschland“ und „Mietwohnungen“ einstellen und den Zeitraum (z. B. 2010 – aktuelles Jahr) wählen.
4. Die Tabelle anzeigen und als CSV oder Excel exportieren. Die Spalte „Mietwohnungen“ enthält die gesuchten Jahreswerte.

**Hinweis:** Für den Datenexport wird ein kostenloses GENESIS-Benutzerkonto benötigt. Ohne Login werden statt der CSV-Datei nur HTML-Fehlerseiten ausgeliefert, weshalb in diesem Repository keine fertige Liste hinterlegt werden konnte.
