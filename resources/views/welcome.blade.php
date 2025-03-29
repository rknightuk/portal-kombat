<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal Kombat</title>

        <link href="https://uchu.style/color.css" rel="stylesheet"/>

        <link rel="icon" type="image/png" href="/assets/icons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/assets/icons/favicon.svg" />
        <link rel="shortcut icon" href="/assets/icons/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Portal Kombat" />
        <link rel="manifest" href="/assets/icons/site.webmanifest" />

        <meta property="og:title" content="Portal Kombat">
        <meta property="og:url" content="https://portkom.rknight.me">
        <meta name="description" content="Boat Battles">
        <meta property="og:description" content="Boat Battles">
        <meta property="og:image" content="/assets/icons/preview.jpg" />
        <meta name="fediverse:creator" content="@robb@social.lol">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=redacted-script:400" rel="stylesheet" />

        <script type="module" src="/assets/sparkly-text.js"></script>

        <style>
            @font-face {
                font-family: 'ShipsWhistle-Bold';
                src: url('/assets/fonts/ShipsWhistle-Bold.woff2 ') format('woff2');
                font-display: swap;
            }
            @font-face {
                font-family: 'ShipsWhistle-BoldItalic';
                src: url('/assets/fonts/ShipsWhistle-BoldItalic.woff2 ') format('woff2');
                font-display: swap;
            }
            @font-face {
                font-family: 'ShipsWhistle-Italic';
                src: url('/assets/fonts/ShipsWhistle-Italic.woff2 ') format('woff2');
                font-display: swap;
            }
            @font-face {
                font-family: 'ShipsWhistle-Regular';
                src: url('/assets/fonts/ShipsWhistle-Regular.woff2 ') format('woff2');
                font-display: swap;
            }
            @font-face {
                font-family: 'Dusty';
                src: url('/assets/fonts/Dusty.woff2 ') format('woff2');
                font-display: swap;
            }

            * {
                box-sizing: border-box;
            }

            body {
                font-size: 1.2em;
                padding: 1em 2em;
                background-color: var(--uchu-light-yellow);
                color: var(--uchu-dark-blue);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                font-family: 'ShipsWhistle-Regular', system-ui, sans-serif;
                font-weight: normal;
            }

            strong { font-family: 'ShipsWhistle-Bold', system-ui, sans-serif; }
            strong em { font-family: 'ShipsWhistle-BoldItalic', system-ui, sans-serif; }
            em { font-family: 'ShipsWhistle-Italic', system-ui, sans-serif; }

            a {
                text-decoration-style: wavy;
                color: var(--uchu-orange);
            }

            a:hover {
                color: var(--uchu-dark-orange);
            }

            h1 {
                font-family: 'ShipsWhistle-Italic', system-ui, sans-serif;
                font-feature-settings: 'ss01';
                margin-top: 0;
            }

            header h1 {
                font-size: 2.5em;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            header h1 svg {
                width: 1.5em;
                height: 1.5em;
                margin-right: 0.2em;
            }
            h2, h3 {
                font-family: 'ShipsWhistle-Bold', system-ui, sans-serif;
                font-weight: bold;
                font-feature-settings: 'ss02';
                text-transform: uppercase;
            }

            .dusty {
                font-family: 'Dusty', system-ui, sans-serif;
                font-weight: normal;
            }

            .board {
                display: flex;
                grid-gap: 1em;
            }

            .board__card.hidden dd {
                font-family: 'Redacted Script', display;
                line-height: 1.4em;
            }

            .box {
                border: 1px solid var(--uchu-gray);
                border-radius: 10px;
                background: var(--uchu-light-gray);
            }

            .board__card {
                position: relative;
                aspect-ratio: 2 / 3;
                height: calc(50vh - 2em);
                box-shadow: 0 0 5px var(--uchu-dark-gray);
            }

            @media (max-width: 1000px) {
                body {
                    padding: 0.5em;
                }
                header h1 {
                    font-size: 1.3em;
                }
                .board {
                    flex-direction: column;
                    align-items: center;
                }

                .board__card {
                    width: 100%;
                    height: 100%;
                    aspect-ratio: auto;
                    width: 100%;
                }
            }

            .board__card h1 {
                font-size: 1.5em;
                text-align: center;
            }

            .board__card--header {
                font-size: 1.5em;
                padding: 0.5em 1em;
                height: 50%;
                display: flex;
                flex-direction: column;
                border-radius: 10px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            .board__card--header__name {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
            }

            .board__card--header__icons {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .board__card--header__boattype {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .board__card--header svg {
                width: 1em;
                height: 1em;
            }

            dl {
                padding: 0.5em 1em;
            }

            dt {
                font-size: 0.7em;
                text-transform: uppercase;
            }
            dd {
                margin-left: 0;
                margin-bottom: 10px;
            }

            footer {
                font-size: 0.8em;
                margin-top: 2em;
                text-align: center;
                text-transform: lowercase;
            }

            .cols {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 1em;
            }

            .clickable {
                text-decoration: none;
                color: var(--uchu-dark-blue);
                cursor: pointer;
            }

            .clickable:hover {
                color: var(--uchu-dark-orange);
            }

            .trophy {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                display: none;
                justify-content: center;
                align-items: center;
                color: var(--uchu-yellow);
            }

            .trophy svg {
                height: 50px;
                width: 50px;
            }

            .winner .trophy {
                display: flex;
            }

            .scoreboard {
                font-size: 1.2em;
            }
            .scoreboard dd,
            .scoreboard dt,
            .scoreboard dl {
                text-align: center;
            }

            .buttons {
                padding: 1em 0;
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .buttons2 {
                padding: 1em 0;
                text-align: center;
            }

            button {
                background: var(--uchu-light-yellow);
                border: 1px solid var(--uchu-dark-orange);
                font-size: 0.9em;
                padding: 5px 10px;
                text-transform: uppercase;
                box-shadow: 2px 2px 0 var(--uchu-dark-orange);
                font-family: 'ShipsWhistle-Bold', system-ui, sans-serif;
            }

            button:hover {
                cursor: pointer;
                box-shadow: none;

            }

            .yon-window {
                display: block;
                position: absolute;
                top: 0;
                right: 0;
                left: 0;
                bottom: 0;
                border-top-right-radius: 0;
                border-top-left-radius: 0;
                background: rgba(255, 255, 255, 0.5);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .yon-window.hidden {
                display: none;
            }

            .yon-game button {
                font-family: 'Dusty', system-ui, sans-serif;
                font-size: 1.3em;
            }

            .yon-game {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background: var(--uchu-light-yellow);
                border: 1px solid var(--uchu-dark-orange);
                padding: 1em;
                color: black;
            }

            .yon-game p {
                margin: 0em 0;
            }

            .yon-buttons {
                margin-top: 20px;
            }
        </style>

        <!--
____
              ---|
  \/            /|     \/
               / |\
              /  | \        \/
             /   || \
            /    | | \
           /     | |  \
          /      | |   \
         /       ||     \
        /        /       \
       /________/         \
       ________/__________--/
 ~~~   \___________________/
         ~~~~~~~~~~       ~~~~~~~~
~~~~~~~~~~~~~     ~~~~~~~~~
                               ~~~~~~~~~
boats?
-->
    </head>
    <body>

        <header>
            <h1><svg class="icon"><use xlink:href="#logo"></use></svg> Portal Kombat</h1>
        </header>

        <div class="board">
            <div id="c1" class="board__card box">
                <sparkly-text style="--sparkly-text-color: rainbow; --sparkly-text-size: 3.5em;" class="trophy" number-of-sparkles="100">
                    <svg class="icon"><use xlink:href="#trophy"></use></svg>
                </sparkly-text>

                <header id="c1-header" class="board__card--header"
                    style="
                        background: url('/assets/boats/port.jpg');
                        background-position: no-repeat center center;
                        background-size: cover;
                        background-color: rgba(255,255,255,0.7);
                        background-blend-mode: lighten;
                    "
                >
                    <div class="board__card--header__icons">
                        <div class="board__card--header__boattype">
                            <svg><use id="c1-icon" xlink:href="#MISCELLANEOUS"></use></svg>
                        </div>
                        <div id="c1-flag">
                            🏴
                        </div>
                    </div>
                    <div class="board__card--header__name">
                        <h1 id="c1-name">*</h1>
                    </div>
                </header>

                <dl>
                    <div class="cols">
                        <div class="clickable" id="select-loa">
                            <dt>Length</dt>
                            <dd id="c1-loa">---</dd>
                        </div>

                        <div class="clickable" id="select-beam">
                            <dt>Beam</dt>
                            <dd id="c1-beam">---</dd>
                        </div>
                    </div>

                    <div class="cols">
                        <div class="clickable" id="select-draught">
                            <dt>Draft</dt>
                            <dd id="c1-draught">---</dd>
                        </div>

                        <div class="clickable" id="select-grt">
                            <dt>Tonnage</dt>
                            <dd id="c1-grt">---</dd>
                        </div>
                    </div>

                    <div class="cols">
                        <div class="clickable" id="select-dead_weight">
                            <dt>Deadweight</dt>
                            <dd id="c1-dead_weight">---</dd>
                        </div>
                        <div class="clickable" id="select-visits">
                            <dt>Visits</dt>
                            <dd id="c1-visits">---</dd>
                        </div>
                    </div>

                    <div id="select-timeInPort" class="clickable">
                        <dt>Time in Port</dt>
                        <dd id="c1-timeInPort">---</dd>
                    </div>
                </dl>
            </div>

            <div class="board__vs">
            <div class="buttons">
                    <button id="next" disabled>Next Round</button>
                    <button id="reset">Reset</button>
                </div>

                <div class="buttons2">
                    <button id="yon" disabled>Yacht or Not?</button>
                </div>
                <div class="scoreboard box">
                    <dl>
                        <dt>Your Score</dt>
                        <dd id="score">0</dd>
                        <div class="cols">
                            <div>
                                <dt>Wins</dt>
                                <dd id="score-wins">0</dd>
                            </div>

                            <div>
                                <dt>Losses</dt>
                                <dd id="score-losses">0</dd>
                            </div>
                        </div>
                        <div class="cols">
                            <div>
                                <dt>Draws</dt>
                                <dd id="score-draws">0</dd>
                            </div>

                            <div>
                                <dt>Yacht or Not?</dt>
                                <dd id="score-yon">0</dd>
                            </div>
                        </div>
                    </dl>
                </div>

            </div>

            <div id="c2" class="board__card box hidden">
                <sparkly-text style="--sparkly-text-color: rainbow; --sparkly-text-size: 3.5em;" class="trophy" number-of-sparkles="100">
                    <svg class="icon"><use xlink:href="#trophy"></use></svg>
                </sparkly-text>
                <header id="c2-header" class="board__card--header"
                    style="
                        background: url('/assets/boats/port.jpg') no-repeat center center;
                        background-size: cover;
                        background-color: rgba(255,255,255,0.7);
                        background-blend-mode: lighten;
                    "
                >
                    <div class="board__card--header__icons">
                        <div class="board__card--header__boattype">
                            <svg><use id="c2-icon" xlink:href="#MISCELLANEOUS"></use></svg>
                        </div>
                        <div id="c2-flag">
                            🏴
                        </div>
                    </div>
                    <div class="board__card--header__name">
                        <h1 id="c2-name">*</h1>
                    </div>
                </header>

                <dl>
                    <div class="cols">
                        <div>
                            <dt>Length</dt>
                            <dd id="c2-loa">---</dd>
                        </div>

                        <div>
                            <dt>Beam</dt>
                            <dd id="c2-beam">---</dd>
                        </div>
                    </div>

                    <div class="cols">
                        <div>
                            <dt>Draft</dt>
                            <dd id="c2-draught">---</dd>
                        </div>

                        <div>
                            <dt>Tonnage</dt>
                            <dd id="c2-grt">---</dd>
                        </div>
                    </div>

                    <div class="cols">
                        <div>
                            <dt>Dead_weight</dt>
                            <dd id="c2-dead_weight">---</dd>
                        </div>
                        <div>
                            <dt>Visits</dt>
                            <dd id="c2-visits">---</dd>
                        </div>
                    </div>

                    <dt>Time in Port</dt>
                    <dd id="c2-timeInPort">---</dd>
                </dl>
            </div>
        </div>

        <div id="yon-window" class="yon-window hidden">
            <div class="yon-game">
                <h1 class="dusty" style="font-size: 1.5em;">BONUS ROUND!</h1>
                <p>is</p>
                <p class="dusty" style="font-size: 1.5em; color: var(--uchu-dark-blue)" id="yon-name">-</p>
                <p>a yacht or not?</p>

                <div class="yon-buttons">
                    <button id="yon-yes">Yacht</button>
                    <button id="yon-no">Not</button>
                </div>

                <div class="dusty" style="margin-top: 20px; display: none;" id="yon-win"><sparkly-text number-of-sparkles="100">Winner</sparkly-text></div>
                <div class="dusty" style="margin-top: 20px; display: none;" id="yon-loss"><sparkly-text number-of-sparkles="100">Loser</sparkly-text></div>
            </div>
        </div>

        <footer>
            <img src="/assets/qr-code.png" style="width: 265px">

            <p>a <a href="https://rknight.me">Robb Knight</a> curio</p>

            <a href="https://hackpompey.co.uk"><img src="/assets/hack-pompey-sea-change.svg" style="width: 100px;"></a>
        </footer>

        <script>
            const movements = [{"name":"ARMORIQUE","abbreviation":"ARM","type":"FERRY","co_reference":20212,"loa":167,"beam":32,"draught":6,"grt":29468,"net_tonnage":11605,"port":"MORLAIX","date":"01/01/2009 00:00","nationality":"FRENCH","dead_weight":4200,"lrn":9364980,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":16,"LS3":30,"LS4":4,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":33967,"timeInPortHours":"23 days, 14 hours, 7 minutes","visits":50},{"name":"ARROW","abbreviation":"ARR","type":"FERRY","co_reference":163081,"loa":122.32,"beam":19,"draught":6,"grt":7606,"net_tonnage":2282,"port":"DOUGLES","date":"01/01/2013 00:00","nationality":"ISLE OF MANN","dead_weight":5656,"lrn":9119414,"nationality_emoji":"🇮🇲","berths":{"CAM":0,"LS1":0,"LS2":0,"LS3":0,"LS4":0,"LS5":4,"NORTH":0,"favourite":"LS5"},"timeInPort":1851,"timeInPortHours":"1 day, 6 hours, 51 minutes","visits":4},{"name":"BARFLEUR","abbreviation":"BARF","type":"FERRY","co_reference":20212,"loa":157.65,"beam":23,"draught":8,"grt":20133,"net_tonnage":0,"port":"CHERBOURG","date":"","nationality":"FRENCE","dead_weight":0,"lrn":9007130,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":0,"LS3":1,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":88,"timeInPortHours":"1 hour, 28 minutes","visits":1},{"name":"BRETAGNE","abbreviation":"BR","type":"FERRY","co_reference":20212,"loa":151.2,"beam":29,"draught":6,"grt":24534,"net_tonnage":13242,"port":"MORLAIX","date":"26/01/1993 00:00","nationality":"FRENCH","dead_weight":0,"lrn":8707329,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":20,"LS3":132,"LS4":83,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":64964,"timeInPortHours":"45 days, 2 hours, 44 minutes","visits":235},{"name":"COMMODORE CLIPPER","abbreviation":"CCL","type":"FERRY","co_reference":163081,"loa":129.14,"beam":23,"draught":5,"grt":14000,"net_tonnage":4201,"port":"","date":"","nationality":"","dead_weight":"","lrn":9201750,"nationality_emoji":"🏴","berths":{"CAM":0,"LS1":2,"LS2":20,"LS3":11,"LS4":4,"LS5":253,"NORTH":0,"favourite":"LS5"},"timeInPort":114420,"timeInPortHours":"79 days, 11 hours, ","visits":290},{"name":"COMMODORE GOODWILL","abbreviation":"CGO","type":"FERRY","co_reference":163081,"loa":126.4,"beam":21,"draught":6,"grt":11166,"net_tonnage":3350,"port":"NASSAU","date":"01/01/1996 00:00","nationality":"BAHAMAS","dead_weight":"","lrn":9117985,"nationality_emoji":"🇧🇸","berths":{"CAM":0,"LS1":2,"LS2":28,"LS3":14,"LS4":9,"LS5":229,"NORTH":0,"favourite":"LS5"},"timeInPort":-56823,"timeInPortHours":"12 hours, ","visits":282},{"name":"CONDOR LIBERATION","abbreviation":"CON LIB","type":"FERRY","co_reference":163081,"loa":102,"beam":28,"draught":"","grt":6307,"net_tonnage":"","port":"NASSAU","date":"01/01/2010 00:00","nationality":"","dead_weight":680,"lrn":9551363,"nationality_emoji":"🏴","berths":{"CAM":0,"LS1":1,"LS2":0,"LS3":15,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":951,"timeInPortHours":"15 hours, 51 minutes","visits":16},{"name":"COTENTIN","abbreviation":"COTENTIN","type":"FERRY","co_reference":20212,"loa":165,"beam":26,"draught":6,"grt":19909,"net_tonnage":5972,"port":"CHERBOURG","date":"04/12/2007 00:00","nationality":"FRENCH","dead_weight":6200,"lrn":9364978,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":49,"LS3":93,"LS4":115,"LS5":0,"NORTH":0,"favourite":"LS4"},"timeInPort":46821,"timeInPortHours":"32 days, 12 hours, 21 minutes","visits":257},{"name":"DEUTSCHLAND","abbreviation":"DEUT","type":"CRUISE","co_reference":20162,"loa":175.3,"beam":23,"draught":5,"grt":22496,"net_tonnage":8264,"port":"KIEL","date":"01/05/1998 00:00","nationality":"GERMAN","dead_weight":3460,"lrn":9141807,"nationality_emoji":"🇩🇪","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS2"},"timeInPort":764,"timeInPortHours":"12 hours, 44 minutes","visits":1},{"name":"ENGLISHMAN","abbreviation":"ENGL","type":"TUG","co_reference":934842,"loa":24.4,"beam":9.15,"draught":3,"grt":248,"net_tonnage":97,"port":"HULL","date":"01/11/2015 00:00","nationality":"UNITED KINGDOM","dead_weight":97,"lrn":9706023,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":1,"LS2":0,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":25,"timeInPortHours":"25 minutes","visits":1},{"name":"FARRA AOIFE","abbreviation":"FARAA","type":"MISCELLANEOUS","co_reference":563504,"loa":26.4,"beam":9,"draught":1.72,"grt":105,"net_tonnage":105,"port":"JERSEY","date":"","nationality":"JERSEY","dead_weight":50,"lrn":232040984,"nationality_emoji":"🇯🇪","berths":{"CAM":0,"LS1":1,"LS2":0,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":1138,"timeInPortHours":"18 hours, 58 minutes","visits":1},{"name":"GALICIA","abbreviation":"GAL","type":"FERRY","co_reference":20212,"loa":214.5,"beam":28.44,"draught":6,"grt":41863,"net_tonnage":"","port":"MORLAIX","date":"","nationality":"FRENCH","dead_weight":7700,"lrn":9856189,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":2,"LS4":117,"LS5":0,"NORTH":0,"favourite":"LS4"},"timeInPort":28366,"timeInPortHours":"19 days, 16 hours, 46 minutes","visits":120},{"name":"JAYNEE W","abbreviation":"JAY","type":"FUEL BARGE","co_reference":20104,"loa":75,"beam":12,"draught":5,"grt":1689,"net_tonnage":776,"port":"HULL","date":"","nationality":"UK","dead_weight":0,"lrn":9130896,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":12,"LS2":164,"LS3":158,"LS4":179,"LS5":86,"NORTH":6,"favourite":"LS4"},"timeInPort":138872,"timeInPortHours":"96 days, 10 hours, 32 minutes","visits":605},{"name":"MARIETJE HESTER","abbreviation":"MARHE","type":"FREIGHTER","co_reference":507300,"loa":82.5,"beam":12.5,"draught":5.45,"grt":2409,"net_tonnage":993,"port":"DELFZIJL","date":"01/04/2005 00:00","nationality":"NETHERLANDS","dead_weight":3200,"lrn":9279032,"nationality_emoji":"🇳🇱","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS2"},"timeInPort":1123,"timeInPortHours":"18 hours, 43 minutes","visits":1},{"name":"MONT ST MICHEL","abbreviation":"MSM","type":"FERRY","co_reference":20212,"loa":173.15,"beam":28,"draught":6,"grt":34800,"net_tonnage":36000,"port":"CAEN","date":"01/01/2002 00:00","nationality":"FRANCE","dead_weight":7500,"lrn":9238337,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":0,"LS3":140,"LS4":342,"LS5":0,"NORTH":0,"favourite":"LS4"},"timeInPort":55717,"timeInPortHours":"38 days, 16 hours, 37 minutes","visits":482},{"name":"MUSKETIER","abbreviation":"MUSKETIER","type":"FREIGHTER","co_reference":248689,"loa":88.6,"beam":12.52,"draught":4.7,"grt":2545,"net_tonnage":"","port":"GIBRALTAR","date":"","nationality":"UNITED KINGDOM","dead_weight":3850,"lrn":9369514,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":13,"LS2":3,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":48721,"timeInPortHours":"33 days, 20 hours, 1 minute","visits":16},{"name":"NOBLEMAN","abbreviation":"NOB","type":"TUG","co_reference":934842,"loa":24.39,"beam":9.15,"draught":5.1,"grt":145,"net_tonnage":0,"port":"HULL","date":"","nationality":"UNITED KINGDOM","dead_weight":83,"lrn":9655901,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":2,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":125,"timeInPortHours":"2 hours, 5 minutes","visits":3},{"name":"NORMANDIE","abbreviation":"ND","type":"FERRY","co_reference":20212,"loa":161.4,"beam":26,"draught":5,"grt":27541,"net_tonnage":16833,"port":"CAEN","date":"15/05/1992 00:00","nationality":"FRENCH","dead_weight":0,"lrn":9006253,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":2,"LS3":133,"LS4":349,"LS5":0,"NORTH":0,"favourite":"LS4"},"timeInPort":59599,"timeInPortHours":"41 days, 9 hours, 19 minutes","visits":484},{"name":"PONT AVEN","abbreviation":"PA","type":"FERRY","co_reference":20212,"loa":184.3,"beam":30,"draught":6,"grt":41748,"net_tonnage":"","port":"","date":"","nationality":"FRANCE","dead_weight":4750,"lrn":9268708,"nationality_emoji":"🇫🇷","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":3,"LS4":1,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":3441,"timeInPortHours":"2 days, 9 hours, 21 minutes","visits":5},{"name":"SCOTSMAN","abbreviation":"SCO","type":"TUG","co_reference":934842,"loa":24.39,"beam":"","draught":4.42,"grt":192,"net_tonnage":57,"port":"HULL","date":"01/01/2007 00:00","nationality":"UNITED KINGDOM","dead_weight":"","lrn":9429883,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":16,"LS2":0,"LS3":0,"LS4":0,"LS5":1,"NORTH":0,"favourite":"LS1"},"timeInPort":1550,"timeInPortHours":"1 day, 1 hour, 50 minutes","visits":17},{"name":"SOSPAN DAU","abbreviation":"SDAU","type":"DREDGER","co_reference":20193,"loa":70.36,"beam":14,"draught":3,"grt":1546,"net_tonnage":463,"port":"PAPENDRECHT","date":"07/06/2013 00:00","nationality":"NETHERLANDS","dead_weight":2134,"lrn":7711062,"nationality_emoji":"🇳🇱","berths":{"CAM":0,"LS1":0,"LS2":0,"LS3":1,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":27,"timeInPortHours":"27 minutes","visits":1},{"name":"SPIRIT OF DISCOVERY","abbreviation":"SPDIS","type":"CRUISE","co_reference":20162,"loa":236,"beam":"","draught":"","grt":58250,"net_tonnage":"","port":"LONDON","date":"","nationality":"UK","dead_weight":"","lrn":9802683,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS2"},"timeInPort":180,"timeInPortHours":"3 hours, ","visits":1},{"name":"ST CLARE","abbreviation":"STCLA","type":"FERRY","co_reference":20191,"loa":81.12,"beam":18,"draught":2,"grt":5359,"net_tonnage":1607,"port":"LONDON","date":"","nationality":"UK","dead_weight":0,"lrn":9236949,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":2,"LS3":3,"LS4":1,"LS5":0,"NORTH":0,"favourite":"LS3"},"timeInPort":418,"timeInPortHours":"6 hours, 58 minutes","visits":6},{"name":"ST FAITH","abbreviation":"SFAI","type":"FERRY","co_reference":20191,"loa":76.94,"beam":17,"draught":2,"grt":3009,"net_tonnage":914,"port":"LONDON","date":"01/01/1990 00:00","nationality":"UK","dead_weight":0,"lrn":8907228,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":0,"LS3":2,"LS4":0,"LS5":1,"NORTH":0,"favourite":"LS3"},"timeInPort":141,"timeInPortHours":"2 hours, 21 minutes","visits":3},{"name":"VICTORIA OF WIGHT","abbreviation":"VIC OF W","type":"FERRY","co_reference":20191,"loa":89.7,"beam":20,"draught":"","grt":8041,"net_tonnage":8041,"port":"","date":"","nationality":"","dead_weight":950,"lrn":9791028,"nationality_emoji":"🏴","berths":{"CAM":0,"LS1":1,"LS2":6,"LS3":6,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS2"},"timeInPort":783,"timeInPortHours":"13 hours, 3 minutes","visits":13},{"name":"VIKING ENERGY","abbreviation":"VIKEN","type":"MISCELLANEOUS","co_reference":20193,"loa":26.48,"beam":11,"draught":2.61,"grt":255,"net_tonnage":76,"port":"KIRKWALL","date":"01/01/2019 00:00","nationality":"UNITED KINGDOM","dead_weight":0,"lrn":9868510,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":3,"LS2":0,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":1383,"timeInPortHours":"23 hours, 3 minutes","visits":3},{"name":"WHITCHALLENGER","abbreviation":"WCHAL","type":"FUEL BARGE","co_reference":20104,"loa":84.95,"beam":15,"draught":6,"grt":2958,"net_tonnage":1355,"port":"DOUGLAS","date":"01/09/2002 00:00","nationality":"UNITED KINGDOM","dead_weight":4450,"lrn":9252278,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":2,"LS3":0,"LS4":1,"LS5":4,"NORTH":0,"favourite":"LS5"},"timeInPort":1237,"timeInPortHours":"20 hours, 37 minutes","visits":7},{"name":"WHITCHAMPION","abbreviation":"WCHAMP","type":"FUEL BARGE","co_reference":20104,"loa":84.95,"beam":15,"draught":6,"grt":2965,"net_tonnage":1355,"port":"DOUGLAS","date":"","nationality":"UNITED KINGDOM","dead_weight":4513,"lrn":9252280,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":46,"LS3":33,"LS4":64,"LS5":36,"NORTH":0,"favourite":"LS4"},"timeInPort":35051,"timeInPortHours":"24 days, 8 hours, 11 minutes","visits":179},{"name":"WHITONIA","abbreviation":"WHNIA","type":"FUEL BARGE","co_reference":20104,"loa":101.84,"beam":18,"draught":6,"grt":4292,"net_tonnage":1963,"port":"DOUGLAS","date":"15/11/2006 00:00","nationality":"UNITED KINGDOM","dead_weight":7000,"lrn":9342607,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":0,"LS2":77,"LS3":39,"LS4":90,"LS5":12,"NORTH":0,"favourite":"LS4"},"timeInPort":48031,"timeInPortHours":"33 days, 8 hours, 31 minutes","visits":218},{"name":"WIGHT RYDER 1","abbreviation":"WRYD1","type":"FERRY","co_reference":20191,"loa":39.5,"beam":12,"draught":1,"grt":520,"net_tonnage":164,"port":"","date":"","nationality":"","dead_weight":130,"lrn":9512537,"nationality_emoji":"🏴","berths":{"CAM":0,"LS1":0,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS2"},"timeInPort":382,"timeInPortHours":"6 hours, 22 minutes","visits":1},{"name":"WIGHT RYDER 2","abbreviation":"WRYD2","type":"FERRY","co_reference":20191,"loa":40.9,"beam":12,"draught":1,"grt":520,"net_tonnage":164,"port":"PORTSMOUTH","date":"","nationality":"UNITED KINGDOM","dead_weight":130,"lrn":9512549,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":1,"LS2":1,"LS3":0,"LS4":0,"LS5":0,"NORTH":0,"favourite":"LS1"},"timeInPort":33,"timeInPortHours":"33 minutes","visits":2},{"name":"YORKSHIREMAN","abbreviation":"YORK","type":"TUG","co_reference":934842,"loa":24.39,"beam":9,"draught":4,"grt":144,"net_tonnage":136,"port":"HULL","date":"01/09/2007 00:00","nationality":"UK","dead_weight":97,"lrn":9655884,"nationality_emoji":"🇬🇧","berths":{"CAM":0,"LS1":3,"LS2":0,"LS3":0,"LS4":0,"LS5":2,"NORTH":0,"favourite":"LS1"},"timeInPort":658,"timeInPortHours":"10 hours, 58 minutes","visits":5}]
            const yachts = [{"name":"ANDROMEDA","yacht":true},{"name":"APHRODISIAC","yacht":true},{"name":"ATHENA","yacht":true},{"name":"BLACK SWAN","yacht":true},{"name":"CHAMPAGNE HIPPY","yacht":true},{"name":"COCO DE MER","yacht":true},{"name":"CURLEW IX","yacht":true},{"name":"ECOS","yacht":true},{"name":"EL LUJO","yacht":true},{"name":"JADE","yacht":true},{"name":"JANTHINA","yacht":true},{"name":"LARISSA","yacht":true},{"name":"LILY GRACE","yacht":true},{"name":"MANITOBA","yacht":true},{"name":"MONOCLE","yacht":true},{"name":"MOONSHINE","yacht":true},{"name":"NAIVASHA","yacht":true},{"name":"OCEAN WAVE OF ALBANY","yacht":true},{"name":"PICA PICA","yacht":true},{"name":"SAHARA","yacht":true},{"name":"SAMPHIRE","yacht":true},{"name":"SAMSARA","yacht":true},{"name":"SAVANNAH","yacht":true},{"name":"SMIT NEYLAND","yacht":true},{"name":"SNOW WOLF","yacht":true},{"name":"SONGBIRD OF HAMBLE","yacht":true},{"name":"SPIRIT OF GOSPORT","yacht":true},{"name":"SUNSAIL SOLARIS","yacht":true},{"name":"SWEET DREAMS","yacht":true},{"name":"TRINITY STAR","yacht":true},{"name":"TS ROYALIST","yacht":true},{"name":"TS SIR STELIOS","yacht":true},{"name":"VULCAN SPIRIT","yacht":true},{"name":"WETWHEELS SOLENT","yacht":true},{"name":"WIGHT EAGLE","yacht":true},{"name":"WILLCHALLENGE","yacht":true},{"name":"WILLSERVE","yacht":true},{"name":"VALKYRIE 6","yacht":true},{"name":"AI AVOCET","yacht":false},{"name":"ARROW","yacht":false},{"name":"BULLDOG","yacht":false},{"name":"COLOMBIAN STAR","yacht":false},{"name":"COMMODORE CLIPPER","yacht":false},{"name":"COMMODORE GOODWILL","yacht":false},{"name":"ELISE","yacht":false},{"name":"GREEN GUATEMALA","yacht":false},{"name":"HANDY HEIDI","yacht":false},{"name":"ISLANDER","yacht":false},{"name":"JENNY M OF MEDINA","yacht":false},{"name":"MARY SIOBHAN","yacht":false},{"name":"OBERVARGH","yacht":false},{"name":"PATRICK BLACKETT","yacht":false},{"name":"SD BOUNTIFUL","yacht":false},{"name":"SD CHRISTINA","yacht":false},{"name":"SD INDEPENDENT","yacht":false},{"name":"SD INDULGENT","yacht":false},{"name":"SD INSPECTOR","yacht":false},{"name":"SD NETLEY","yacht":false},{"name":"SD NORTHERN RIVER","yacht":false},{"name":"SD NUTBOURNE","yacht":false},{"name":"SD SOLENT SPIRIT","yacht":false},{"name":"SD SUZANNE","yacht":false},{"name":"SD TEMPEST","yacht":false},{"name":"SD VICTORIA","yacht":false},{"name":"SOSPAN DAU","yacht":false},{"name":"SPIRIT","yacht":false},{"name":"ST FAITH","yacht":false},{"name":"STRATEGIC VENTURE","yacht":false},{"name":"VB ENGLISHMAN","yacht":false},{"name":"VB SCOTSMAN","yacht":false},{"name":"WETWHEELS SOLENT","yacht":false},{"name":"WHITCHAMPION","yacht":false},{"name":"WHITSTAR","yacht":false},{"name":"SAINT-MALO","yacht":false}]

            const card2EL = document.getElementById('c2')

            const gameData = {
                card1: movements[Math.floor(Math.random() * movements.length)],
                card2: movements[Math.floor(Math.random() * movements.length)],
                wins: 0,
                losses: 0,
                draws: 0,
                yon: 0,
                played: [],
            }

            gameData.played.push(gameData.card1.lrn)

            while (gameData.card1.lrn === gameData.card2.lrn) {
                gameData.card2 = movements[Math.floor(Math.random() * movements.length)]
            }

            const options = ['loa', 'beam', 'draught', 'grt', 'dead_weight', 'visits', 'timeInPort']

            const renderBasic = (card, id) => {
                document.getElementById(`${id}-name`).innerText = card.name.split(' ')
                    .map((text) => {
                        return text.charAt(0).toUpperCase() + text.substring(1).toLowerCase()
                    })
                    .join(' ')
                document.getElementById(`${id}-flag`).innerText = card.nationality_emoji
            }

            const renderCard = (card, id) => {
                renderBasic(card, id)
                document.getElementById(`${id}-loa`).innerText = card.loa !== '' ? card.loa : '-'
                document.getElementById(`${id}-beam`).innerText = card.beam !== '' ? card.beam : '-'
                document.getElementById(`${id}-draught`).innerText = card.draught !== '' ? card.draught : '-'
                document.getElementById(`${id}-grt`).innerText = card.grt !== '' ? card.grt : '-'
                document.getElementById(`${id}-dead_weight`).innerText = card.dead_weight !== '' ? card.dead_weight : '-'
                document.getElementById(`${id}-visits`).innerText = card.visits !== '' ? card.visits : '-'
                document.getElementById(`${id}-timeInPort`).innerText = card.timeInPortHours.replace(/,\s*$/, "")
                document.getElementById(`${id}-icon`).setAttribute('xlink:href', `#${card.type.replaceAll(' ', '-')}`)
                document.getElementById(`${id}-header`).style.backgroundImage = `url('/assets/boats/${card.lrn}.jpg')`;
            }

            const setup = () => {
                renderCard(gameData.card1, 'c1')
                renderBasic(gameData.card2, 'c2')
            }

            let yacht = {}

            options.forEach(o => {
                document.getElementById(`select-${o}`).addEventListener('click', () => {
                    const card1 = gameData.card1[o]
                    const card2 = gameData.card2[o]

                    if (card1 > card2) {
                        gameData.wins++
                        document.getElementById('c1').classList.add('winner')
                        document.getElementById('c2').classList.remove('winner')

                        if (gameData.wins % 3 == 0) {
                            document.getElementById('yon-window').classList.remove('hidden')
                            yacht = yachts[Math.floor(Math.random() * yachts.length)]
                            document.getElementById('yon-name').innerText = yacht.name.split(' ')
                                .map((text) => {
                                    return text.charAt(0).toUpperCase() + text.substring(1).toLowerCase()
                                })
                                .join(' ')
                        }
                    } else if (card1 < card2) {
                        gameData.losses++
                        document.getElementById('c1').classList.remove('winner')
                        document.getElementById('c2').classList.add('winner')
                    } else {
                        gameData.draws++
                        document.getElementById('c1').classList.remove('winner')
                        document.getElementById('c2').classList.remove('winner')
                    }

                    renderCard(gameData.card2, 'c2')
                    card2EL.classList.remove('hidden')

                    document.getElementById('next').disabled = false

                    renderScore()
                })
            });

            const renderScore = () => {
                document.getElementById('score').innerText = gameData.wins + gameData.yon
                document.getElementById('score-wins').innerText = gameData.wins
                document.getElementById('score-losses').innerText = gameData.losses
                document.getElementById('score-draws').innerText = gameData.draws
                document.getElementById('score-yon').innerText = gameData.yon
            }

            document.getElementById('reset').addEventListener('click', () => {
                gameData.wins = 0
                gameData.losses = 0
                gameData.draws = 0
                gameData.yon = 0
                gameData.played = []
                document.getElementById('score').innerText = gameData.wins + gameData.yon
                document.getElementById('score-wins').innerText = gameData.wins
                document.getElementById('score-losses').innerText = gameData.losses
                document.getElementById('score-draws').innerText = gameData.draws
                document.getElementById('score-yon').innerText = gameData.yon
                document.getElementById('c1').classList.remove('winner')
                document.getElementById('c2').classList.remove('winner')
            });

            document.getElementById('next').addEventListener('click', () => {
                if (gameData.played.length >= movements.length) {
                    alert('No more cards to play')
                    return
                }
                gameData.card1 = movements[Math.floor(Math.random() * movements.length)]
                gameData.card2 = movements[Math.floor(Math.random() * movements.length)]

                gameData.played.push(gameData.card1.lrn)

                while (gameData.played.includes(gameData.card1.lrn)) {
                    gameData.card1 = movements[Math.floor(Math.random() * movements.length)]
                }

                while (gameData.card1.lrn === gameData.card2.lrn) {
                    gameData.card2 = movements[Math.floor(Math.random() * movements.length)]
                }

                const fakeData = {
                    'name': 'ARMORIQUE',
                    'abbreviation': 'ARM',
                    'type': 'FERRY',
                    'co_reference': 20212,
                    'loa': '---',
                    'beam': '---',
                    'draught': '---',
                    'grt': '---',
                    'net_tonnage': '---',
                    'port': 'MORLAIX',
                    'date': '01/01/2009 00:00',
                    'nationality': 'FRENCH',
                    'dead_weight': '---',
                    'lrn': 'port',
                    'nationality_emoji': '🇫🇷',
                    'berths': {
                        'CAM': 0,
                        'LS1': 0,
                        'LS2': 16,
                        'LS3': 30,
                        'LS4': 4,
                        'LS5': 0,
                        'NORTH': 0,
                        'favourite': 'LS3'
                    },
                    'timeInPort': '---',
                    'timeInPortHours': '---',
                    'visits': '---',
                }
                renderCard(gameData.card1, 'c1')
                renderCard(fakeData, 'c2')
                renderBasic(gameData.card2, 'c2')
                card2EL.classList.add('hidden')
                document.getElementById('c1').classList.remove('winner')
                document.getElementById('c2').classList.remove('winner')

                document.getElementById('next').disabled = true
            });

            const yonUpdate = (win) => {
                if (win) {
                    gameData.yon++
                    document.getElementById('yon-win').style.display = 'block'
                } else {
                    document.getElementById('yon-loss').style.display = 'block'
                }
                setTimeout(() => {
                    document.getElementById('yon-window').classList.add('hidden')
                    document.getElementById('yon-win').style.display = 'none'
                    document.getElementById('yon-loss').style.display = 'none'
                    document.getElementById('yon-window').classList.add('hidden')

                    renderScore()
                }, 3000)

            }

            document.getElementById('yon-yes').addEventListener('click', () => {
                yonUpdate(yacht.yacht === true)
            });
            document.getElementById('yon-no').addEventListener('click', () => {
                yonUpdate(yacht.yacht === false)
            });

            (function() {
                setup()
            })()
        </script>

{{-- <p class="dusty">YACHT OR NOT?</p> --}}

<svg width="0" height="0" class="hidden">
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" id="trophy">
    <path fill="currentColor" d="M400 0L176 0c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8L24 64C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9L192 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l192 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-26.1 0C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24L446.4 64c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112l84.4 0c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6l84.4 0c-5.1 66.3-31.1 111.2-63 142.3z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 991 991" id="logo">
    <g id="logo-circle">
      <path id="path1" fill="#ff9e5b" fill-rule="evenodd" stroke="none" d="M 860 495.5 C 860 294.1922 696.8078 131 495.5 131 C 294.1922 131 131 294.1922 131 495.5 C 131 696.8078 294.1922 860 495.5 860 C 696.8078 860 860 696.8078 860 495.5 Z"></path>
      <path id="path2" fill="#0749ac" fill-rule="evenodd" stroke="none" d="M 925 495.5 C 925 258.293701 732.706299 66 495.5 66 C 258.293701 66 66 258.293701 66 495.5 C 66 732.706299 258.293701 925 495.5 925 C 732.706299 925 925 732.706299 925 495.5 Z M 495.5 131 C 696.8078 131 860 294.1922 860 495.5 C 860 696.8078 696.8078 860 495.5 860 C 294.1922 860 131 696.8078 131 495.5 C 131 294.1922 294.1922 131 495.5 131 Z"></path>
    </g>
    <g id="logo-ship">
      <path id="Path" fill="#0749ac" stroke="none" d="M 330.665771 267.336609 C 447.882782 465.625793 520.094238 641.991943 548.833679 797.313416 C 477.04422 702.221802 410.226501 603.438049 348.626587 501.444672 C 346.026123 497.090515 340.401917 495.572418 335.984467 498.068848 C 331.567078 500.565308 329.937561 506.162323 332.329987 510.642975 C 387.848602 614.584167 466.4216 733.947144 551.428894 857.56604 L 520.061829 903.043579 L 232.285934 429.839844 C 253.113602 402.168152 291.534332 343.616943 307.530914 271.065918 C 308.62088 265.986938 312.723907 262.114685 317.825928 261.291199 C 322.949371 260.502258 328.042755 262.865295 330.671722 267.34436 Z M 316.709656 406.17395 L 316.674988 406.195007 C 321.671173 414.410461 331.118378 418.779358 340.594177 417.338196 C 350.083008 415.841248 357.729431 408.816895 360.033051 399.486084 C 362.280365 390.141968 358.722412 380.387207 350.951019 374.713806 C 343.235535 369.054199 332.837097 368.587097 324.621429 373.583374 C 319.248413 376.850952 315.390472 382.141296 313.930817 388.252258 C 312.415497 394.34967 313.407257 400.821594 316.674988 406.194885 Z"></path>
      <path id="path3" fill="#0749ac" stroke="none" d="M 560.188843 562.29834 L 530.114319 613.257446 C 495.487762 517.123169 453.238098 423.913147 403.804504 334.505554 C 425.803802 336.559021 447.552246 340.854614 468.667847 347.387756 L 559.673096 497.032104 C 571.927185 517.02594 572.076599 542.101929 560.187256 562.295654 Z"></path>
      <path id="path4" fill="#0749ac" stroke="none" d="M 563.145447 721.374268 C 557.261597 698.503296 550.574402 675.171387 542.925293 651.427612 L 586.356384 577.768127 L 586.377441 577.802795 C 604.074524 547.95166 603.867004 510.754944 585.773254 481.158356 L 503.958618 346.626587 C 518.391052 349.198486 532.444641 353.567871 545.785217 359.653198 C 571.190918 371.601563 592.506409 390.880371 606.887207 414.995178 L 637.412292 465.189026 L 684.972229 436.265747 L 665.472168 404.200867 C 663.385193 400.769043 662.713318 396.61908 663.677551 392.660828 C 664.607361 388.723999 667.112976 385.348206 670.579773 383.239929 C 674.046509 381.131653 678.161499 380.480957 682.119751 381.445313 C 686.077637 382.409729 689.453369 384.915344 691.540588 388.347534 L 711.040649 420.412415 L 733.295227 406.878418 C 736.761719 404.770264 740.911682 404.098389 744.869812 405.062683 C 748.806702 405.992493 752.182495 408.498108 754.290771 411.964844 C 756.398926 415.431396 757.07074 419.58136 756.085327 423.504944 C 755.120972 427.462769 752.615356 430.838562 749.14856 432.946838 L 726.893982 446.480835 L 746.394043 478.545715 C 748.502136 482.012085 749.153015 486.127411 748.188721 490.085724 C 747.224365 494.043579 744.774353 497.432922 741.307678 499.541168 C 737.840881 501.649475 733.670166 502.286469 729.746521 501.301239 C 725.788635 500.336792 722.43396 497.865814 720.325623 494.399048 L 700.825623 462.334167 L 653.265625 491.257477 L 697.620361 564.192139 C 700.424133 568.80249 700.55603 574.562927 698.016418 579.288574 C 695.463501 584.070068 690.583496 587.132935 685.213318 587.359619 L 640.672241 589.232788 L 663.650513 627.01709 C 672.652283 641.819092 673.930176 660.083313 667.038818 676.002441 L 653.044373 708.349976 L 602.850342 625.813538 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 87 51" id="FUEL-BARGE">
    <g id="fuel-barge">
      <path fill="currentColor" stroke="none" d="M 20.020508 30.162598 L 31.583984 30.162598 C 33.435547 30.162598 34.941406 28.65625 34.941406 26.805176 L 34.941406 15.241211 C 34.941406 13.390137 33.435547 11.883789 31.583984 11.883789 L 20.020508 11.883789 C 18.168945 11.883789 16.663086 13.390137 16.663086 15.241211 L 16.663086 26.805176 C 16.663086 28.65625 18.168945 30.162598 20.020508 30.162598 Z M 18.663086 15.241211 C 18.663086 14.492676 19.272461 13.883789 20.020508 13.883789 L 31.583984 13.883789 C 32.332031 13.883789 32.941406 14.492676 32.941406 15.241211 L 32.941406 15.418457 L 27.282227 19.191406 C 26.822266 19.497559 26.698242 20.118652 27.004883 20.578125 C 27.197266 20.867188 27.514648 21.023438 27.837891 21.023438 C 28.02832 21.023438 28.220703 20.969238 28.391602 20.855469 L 32.941406 17.822144 L 32.941406 20.858521 L 27.291992 24.533691 C 26.829102 24.834961 26.697266 25.45459 26.999023 25.91748 C 27.19043 26.211914 27.510742 26.37207 27.837891 26.37207 C 28.024414 26.37207 28.213867 26.319824 28.381836 26.210449 L 32.941406 23.244263 L 32.941406 26.805176 C 32.941406 27.553711 32.332031 28.162598 31.583984 28.162598 L 20.020508 28.162598 C 19.272461 28.162598 18.663086 27.553711 18.663086 26.805176 L 18.663086 15.241211 Z"></path>
      <path fill="currentColor" stroke="none" d="M 83.814453 23.162598 C 83.261719 23.162598 82.814453 23.610352 82.814453 24.162598 L 82.814453 26.348633 L 75.464844 26.348633 L 75.464844 24.162598 C 75.464844 23.610352 75.017578 23.162598 74.464844 23.162598 C 73.912109 23.162598 73.464844 23.610352 73.464844 24.162598 L 73.464844 26.348633 L 66.976563 26.348633 L 66.976563 24.162598 C 66.976563 23.610352 66.529297 23.162598 65.976563 23.162598 C 65.423828 23.162598 64.976563 23.610352 64.976563 24.162598 L 64.976563 26.348633 L 58.023438 26.348633 L 58.023438 24.162598 C 58.023438 23.610352 57.576172 23.162598 57.023438 23.162598 C 56.470703 23.162598 56.023438 23.610352 56.023438 24.162598 L 56.023438 26.348633 L 52.023438 26.348633 C 51.470703 26.348633 51.023438 26.796387 51.023438 27.348633 C 51.023438 27.900879 51.470703 28.348633 52.023438 28.348633 L 56.023438 28.348633 L 56.023438 31.534668 L 52.023438 31.534668 C 51.470703 31.534668 51.023438 31.982422 51.023438 32.534668 C 51.023438 33.086914 51.470703 33.534668 52.023438 33.534668 L 56.023438 33.534668 L 56.023438 36.526306 C 52.060242 36.589905 47.966187 36.654785 43.953491 36.717163 L 42.606812 8.069824 L 44.813477 8.069824 C 45.143555 8.069824 45.453125 7.906738 45.639648 7.633789 C 45.825195 7.36084 45.865234 7.013672 45.745117 6.705566 L 43.745117 1.589355 C 43.594727 1.206055 43.225586 0.953613 42.813477 0.953613 L 10.418945 0.953613 C 10.006836 0.953613 9.637695 1.206055 9.487305 1.589355 L 7.487305 6.705566 C 7.367188 7.013672 7.407227 7.36084 7.592773 7.633789 C 7.779297 7.906738 8.088867 8.069824 8.418945 8.069824 L 10.121887 8.069824 L 7.459412 39.77832 C 3.501648 43.091675 1.382202 48.357971 1.254883 48.680176 C 1.133789 48.987793 1.172852 49.335938 1.359375 49.609375 C 1.544922 49.882813 1.854492 50.046387 2.185547 50.046387 L 66.488281 50.046387 C 78.969727 50.046387 84.498047 37.990723 84.727539 37.477539 C 84.729126 37.473999 84.729309 37.470215 84.730835 37.466675 C 84.73584 37.455322 84.737061 37.442688 84.741577 37.431091 C 84.781799 37.327942 84.801208 37.220947 84.805786 37.112793 C 84.806458 37.097717 84.814453 37.085083 84.814453 37.069824 L 84.814453 24.162598 C 84.814453 23.610352 84.367188 23.162598 83.814453 23.162598 Z M 66.976563 28.348633 L 73.464844 28.348633 L 73.464844 31.534668 L 66.976563 31.534668 L 66.976563 28.348633 Z M 66.976563 33.534668 L 73.464844 33.534668 L 73.464844 36.242065 C 71.493774 36.274597 69.309998 36.310547 66.976563 36.348755 L 66.976563 33.534668 Z M 58.023438 28.348633 L 64.976563 28.348633 L 64.976563 31.534668 L 58.023438 31.534668 L 58.023438 28.348633 Z M 58.023438 33.534668 L 64.976563 33.534668 L 64.976563 36.381409 C 62.754761 36.417603 60.420227 36.455505 58.023438 36.49408 L 58.023438 33.534668 Z M 9.883789 6.069824 L 11.101563 2.953613 L 42.130859 2.953613 L 43.348633 6.069824 L 9.883789 6.069824 Z M 12.128113 8.069824 L 40.60437 8.069824 L 41.952515 36.748108 C 28.953369 36.948914 17.208557 37.116211 14.163086 37.116211 C 12.477539 37.116211 10.953003 37.582886 9.587891 38.322021 L 12.128113 8.069824 Z M 66.488281 48.046387 L 3.744141 48.046387 C 5.142578 45.245117 8.814453 39.116211 14.163086 39.116211 C 17.295288 39.116211 29.58905 38.940002 42.997742 38.732178 C 42.998169 38.732178 42.998596 38.732422 42.999023 38.732422 C 43.014648 38.732422 43.03125 38.731934 43.046875 38.731445 C 43.046936 38.731445 43.046997 38.731384 43.047058 38.731384 C 59.069336 38.483032 76.668823 38.189819 82.12793 38.098145 C 80.308594 41.159668 75.242188 48.046387 66.488281 48.046387 Z M 82.814453 36.086426 C 81.491882 36.108704 78.901794 36.152039 75.464844 36.208984 L 75.464844 33.534668 L 82.814453 33.534668 L 82.814453 36.086426 Z M 82.814453 31.534668 L 75.464844 31.534668 L 75.464844 28.348633 L 82.814453 28.348633 L 82.814453 31.534668 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79 47" id="MISC BARGE">
    <g id="misc-barge">
      <path fill="currentColor" stroke="none" d="M 8.791504 45.87207 C 8.971191 46.177246 9.299316 46.364746 9.65332 46.364746 L 63.923828 46.364746 C 64.286133 46.364746 64.620117 46.168945 64.796875 45.852539 L 76.566895 24.800781 C 76.739746 24.491211 76.73584 24.113281 76.556641 23.807129 C 76.376953 23.500977 76.048828 23.312988 75.693848 23.312988 L 70.019226 23.312988 L 60.927734 1.254395 C 60.773438 0.879883 60.408691 0.635254 60.003418 0.635254 L 20.138672 0.635254 C 19.722656 0.635254 19.350098 0.892578 19.203125 1.281738 L 10.888733 23.294434 L 8.010254 23.294434 C 7.569824 23.294434 7.181641 23.58252 7.053223 24.003906 L 4.658447 31.885254 L 2.306152 31.885254 C 1.947266 31.885254 1.616211 32.077637 1.437988 32.38916 C 1.259766 32.700195 1.262207 33.083496 1.444336 33.392578 L 8.791504 45.87207 Z M 20.830078 2.635254 L 59.333984 2.635254 L 67.856628 23.312988 L 53.78418 23.312988 C 53.428711 23.312988 53.099609 23.501953 52.92041 23.809082 L 48.209961 31.885254 L 24.219116 31.885254 L 20.488281 23.872559 C 20.32373 23.52002 19.970215 23.294434 19.581543 23.294434 L 13.026855 23.294434 L 20.830078 2.635254 Z M 8.751465 25.294434 L 18.943848 25.294434 L 22.012756 31.885254 L 6.749023 31.885254 L 8.751465 25.294434 Z M 5.397095 33.885254 C 5.398193 33.885254 5.399292 33.885742 5.400391 33.885742 C 5.401428 33.885742 5.402405 33.885254 5.403442 33.885254 L 48.78418 33.885254 C 49.139648 33.885254 49.46875 33.696289 49.647949 33.38916 L 54.358398 25.312988 L 69.34729 25.312988 C 69.348389 25.312988 69.349426 25.313477 69.350586 25.313477 C 69.351379 25.313477 69.352234 25.312988 69.353027 25.312988 L 73.989258 25.312988 L 63.337402 44.364746 L 10.225098 44.364746 L 4.055176 33.885254 L 5.397095 33.885254 Z"></path>
      <path fill="currentColor" stroke="none" d="M 23.895996 14.050781 L 28.34668 14.050781 C 29.237793 14.050781 29.962891 13.326172 29.962891 12.435059 L 29.962891 7.983887 C 29.962891 7.092773 29.237793 6.367676 28.34668 6.367676 L 23.895996 6.367676 C 23.004883 6.367676 22.279785 7.092773 22.279785 7.983887 L 22.279785 12.435059 C 22.279785 13.326172 23.004883 14.050781 23.895996 14.050781 Z M 24.279785 8.367676 L 27.962891 8.367676 L 27.962891 12.050781 L 24.279785 12.050781 L 24.279785 8.367676 Z"></path>
      <path fill="currentColor" stroke="none" d="M 33.083008 14.050781 L 37.533691 14.050781 C 38.424805 14.050781 39.149902 13.326172 39.149902 12.435059 L 39.149902 7.983887 C 39.149902 7.092773 38.424805 6.367676 37.533691 6.367676 L 33.083008 6.367676 C 32.191895 6.367676 31.466797 7.092773 31.466797 7.983887 L 31.466797 12.435059 C 31.466797 13.326172 32.191895 14.050781 33.083008 14.050781 Z M 33.466797 8.367676 L 37.149902 8.367676 L 37.149902 12.050781 L 33.466797 12.050781 L 33.466797 8.367676 Z"></path>
      <path fill="currentColor" stroke="none" d="M 42.445801 14.050781 L 46.896973 14.050781 C 47.788086 14.050781 48.513184 13.326172 48.513184 12.435059 L 48.513184 7.983887 C 48.513184 7.092773 47.788086 6.367676 46.896973 6.367676 L 42.445801 6.367676 C 41.554688 6.367676 40.830078 7.092773 40.830078 7.983887 L 40.830078 12.435059 C 40.830078 13.326172 41.554688 14.050781 42.445801 14.050781 Z M 42.830078 8.367676 L 46.513184 8.367676 L 46.513184 12.050781 L 42.830078 12.050781 L 42.830078 8.367676 Z"></path>
      <path fill="currentColor" stroke="none" d="M 51.633301 14.050781 L 56.083984 14.050781 C 56.975098 14.050781 57.700195 13.326172 57.700195 12.435059 L 57.700195 7.983887 C 57.700195 7.092773 56.975098 6.367676 56.083984 6.367676 L 51.633301 6.367676 C 50.742188 6.367676 50.01709 7.092773 50.01709 7.983887 L 50.01709 12.435059 C 50.01709 13.326172 50.742188 14.050781 51.633301 14.050781 Z M 52.01709 8.367676 L 55.700195 8.367676 L 55.700195 12.050781 L 52.01709 12.050781 L 52.01709 8.367676 Z"></path>
      <path fill="currentColor" stroke="none" d="M 33.02832 15.881348 L 28.577148 15.881348 C 27.686035 15.881348 26.961426 16.605957 26.961426 17.49707 L 26.961426 21.948242 C 26.961426 22.839355 27.686035 23.563965 28.577148 23.563965 L 33.02832 23.563965 C 33.919434 23.563965 34.644531 22.839355 34.644531 21.948242 L 34.644531 17.49707 C 34.644531 16.605957 33.919434 15.881348 33.02832 15.881348 Z M 32.644531 21.563965 L 28.961426 21.563965 L 28.961426 17.881348 L 32.644531 17.881348 L 32.644531 21.563965 Z"></path>
      <path fill="currentColor" stroke="none" d="M 42.215332 15.881348 L 37.764648 15.881348 C 36.873535 15.881348 36.148438 16.605957 36.148438 17.49707 L 36.148438 21.948242 C 36.148438 22.839355 36.873535 23.563965 37.764648 23.563965 L 42.215332 23.563965 C 43.106445 23.563965 43.831543 22.839355 43.831543 21.948242 L 43.831543 17.49707 C 43.831543 16.605957 43.106445 15.881348 42.215332 15.881348 Z M 41.831543 21.563965 L 38.148438 21.563965 L 38.148438 17.881348 L 41.831543 17.881348 L 41.831543 21.563965 Z"></path>
      <path fill="currentColor" stroke="none" d="M 51.578613 15.881348 L 47.127441 15.881348 C 46.236328 15.881348 45.511719 16.605957 45.511719 17.49707 L 45.511719 21.948242 C 45.511719 22.839355 46.236328 23.563965 47.127441 23.563965 L 51.578613 23.563965 C 52.469727 23.563965 53.194824 22.839355 53.194824 21.948242 L 53.194824 17.49707 C 53.194824 16.605957 52.469727 15.881348 51.578613 15.881348 Z M 51.194824 21.563965 L 47.511719 21.563965 L 47.511719 17.881348 L 51.194824 17.881348 L 51.194824 21.563965 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78 51" id="CRUISE">
    <path fill="currentColor" stroke="none" d="M 0.511719 50.345703 C 0.696777 50.624023 1.009277 50.791992 1.344238 50.791992 L 64.685059 50.791992 C 65.056152 50.791992 65.396973 50.586914 65.569824 50.257813 C 65.614746 50.172852 70.149414 41.666992 77.203125 37.055664 C 77.57959 36.80957 77.745605 36.341797 77.60791 35.913086 C 77.470215 35.484375 77.060059 35.192383 76.613281 35.219727 L 68.035522 35.584778 L 56.916504 22.576172 C 56.759766 22.392578 56.541992 22.272461 56.303711 22.236328 L 31.349976 18.521667 L 30.372559 4.866211 C 30.334961 4.342773 29.899414 3.9375 29.375 3.9375 L 28.522461 3.9375 L 28.522461 1.208008 C 28.522461 0.655273 28.074707 0.208008 27.522461 0.208008 C 26.970215 0.208008 26.522461 0.655273 26.522461 1.208008 L 26.522461 3.9375 L 25.669434 3.9375 C 25.146484 3.9375 24.711914 4.339844 24.672363 4.861328 L 23.702332 17.60791 L 15.889648 18.258789 C 15.519043 18.289063 15.196289 18.522461 15.051758 18.865234 L 6.876099 38.187622 L 5.731934 38.236328 C 5.344727 38.25293 5.002441 38.491211 4.852539 38.848633 L 3.264771 42.632141 C 3.26416 42.633606 3.26355 42.63501 3.262939 42.636536 L 0.422363 49.405273 C 0.29248 49.713867 0.326172 50.066406 0.511719 50.345703 Z M 9.004761 48.791992 L 10.891663 43.869934 L 17.550537 43.735352 L 15.32074 48.791992 L 9.004761 48.791992 Z M 17.506531 48.791992 L 19.75592 43.690796 L 28.110901 43.521973 L 25.67926 48.791992 L 17.506531 48.791992 Z M 27.882263 48.791992 L 30.334656 43.47699 L 39.340759 43.295044 L 36.970215 48.791992 L 27.882263 48.791992 Z M 39.148682 48.791992 L 41.538391 43.25061 L 50.074707 43.078125 L 47.235107 48.791992 L 39.148682 48.791992 Z M 58.088135 27.024414 L 61.343445 30.833008 L 18.390625 31.583984 L 20.388672 26.28418 L 58.088135 27.024414 Z M 26.596191 5.9375 L 28.443848 5.9375 L 29.323059 18.21991 L 25.702515 17.680969 L 26.596191 5.9375 Z M 16.658203 20.201172 L 24.602051 19.539063 L 55.63916 24.15918 L 56.348877 24.989502 L 19.72168 24.270508 C 19.281738 24.267578 18.916016 24.521484 18.766602 24.917969 L 15.999512 32.256836 C 15.882324 32.566406 15.926758 32.914063 16.117676 33.185547 C 16.305176 33.451172 16.610352 33.609375 16.935059 33.609375 C 16.940918 33.609375 16.946777 33.609375 16.952637 33.609375 L 63.028198 32.804138 L 65.497253 35.69281 L 9.087463 38.093506 L 16.658203 20.201172 Z M 6.451172 40.207031 L 73.456543 37.355469 C 68.41748 41.571289 65.07666 47.0625 64.094727 48.791992 L 49.468689 48.791992 L 52.600098 42.490234 C 52.755859 42.176758 52.736328 41.804688 52.549316 41.509766 C 52.362305 41.213867 52.01416 41.051758 51.68457 41.044922 L 40.882629 41.263184 C 40.882202 41.263184 40.881836 41.263184 40.881409 41.263184 L 5.709656 41.973816 L 6.451172 40.207031 Z M 4.862793 43.99176 L 8.733337 43.913513 L 6.863159 48.791992 L 2.848145 48.791992 L 4.862793 43.99176 Z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82 57" id="DREDGER">
    <g id="dredger">
      <path fill="currentColor" stroke="none" d="M 14.056152 50.935547 C 15.63916 50.935547 16.927246 49.647461 16.927246 48.064453 C 16.927246 46.481445 15.63916 45.193359 14.056152 45.193359 C 12.473145 45.193359 11.185059 46.481445 11.185059 48.064453 C 11.185059 49.647461 12.473145 50.935547 14.056152 50.935547 Z M 14.056152 47.193359 C 14.536621 47.193359 14.927246 47.583984 14.927246 48.064453 C 14.927246 48.544922 14.536621 48.935547 14.056152 48.935547 C 13.575684 48.935547 13.185059 48.544922 13.185059 48.064453 C 13.185059 47.583984 13.575684 47.193359 14.056152 47.193359 Z"></path>
      <path fill="currentColor" stroke="none" d="M 23.322266 50.935547 C 24.905273 50.935547 26.193359 49.647461 26.193359 48.064453 C 26.193359 46.481445 24.905273 45.193359 23.322266 45.193359 C 21.73877 45.193359 20.450684 46.481445 20.450684 48.064453 C 20.450684 49.647461 21.73877 50.935547 23.322266 50.935547 Z M 23.322266 47.193359 C 23.802734 47.193359 24.193359 47.583984 24.193359 48.064453 C 24.193359 48.544922 23.802734 48.935547 23.322266 48.935547 C 22.841797 48.935547 22.450684 48.544922 22.450684 48.064453 C 22.450684 47.583984 22.841797 47.193359 23.322266 47.193359 Z"></path>
      <path fill="currentColor" stroke="none" d="M 33.432617 50.935547 C 35.015625 50.935547 36.303711 49.647461 36.303711 48.064453 C 36.303711 46.481445 35.015625 45.193359 33.432617 45.193359 C 31.849609 45.193359 30.561523 46.481445 30.561523 48.064453 C 30.561523 49.647461 31.849609 50.935547 33.432617 50.935547 Z M 33.432617 47.193359 C 33.913086 47.193359 34.303711 47.583984 34.303711 48.064453 C 34.303711 48.544922 33.913086 48.935547 33.432617 48.935547 C 32.952148 48.935547 32.561523 48.544922 32.561523 48.064453 C 32.561523 47.583984 32.952148 47.193359 33.432617 47.193359 Z"></path>
      <path fill="currentColor" stroke="none" d="M 42.698242 50.935547 C 44.281738 50.935547 45.569824 49.647461 45.569824 48.064453 C 45.569824 46.481445 44.281738 45.193359 42.698242 45.193359 C 41.115234 45.193359 39.827148 46.481445 39.827148 48.064453 C 39.827148 49.647461 41.115234 50.935547 42.698242 50.935547 Z M 42.698242 47.193359 C 43.178711 47.193359 43.569824 47.583984 43.569824 48.064453 C 43.569824 48.544922 43.178711 48.935547 42.698242 48.935547 C 42.217773 48.935547 41.827148 48.544922 41.827148 48.064453 C 41.827148 47.583984 42.217773 47.193359 42.698242 47.193359 Z"></path>
      <path fill="currentColor" stroke="none" d="M 21.630859 32.674805 L 30.481934 32.674805 C 31.507813 32.674805 32.342773 31.839844 32.342773 30.813477 L 32.342773 23.250305 C 32.342773 23.249451 32.342834 23.248718 32.342773 23.247864 L 32.342773 21.961914 C 32.342773 20.935547 31.507813 20.100586 30.481934 20.100586 L 21.630859 20.100586 C 20.604492 20.100586 19.769531 20.935547 19.769531 21.961914 L 19.769531 30.813477 C 19.769531 31.839844 20.604492 32.674805 21.630859 32.674805 Z M 21.769531 22.100586 L 30.342773 22.100586 L 30.342773 22.611267 L 25.65332 24.673828 C 25.147949 24.895508 24.918457 25.486328 25.140625 25.991211 C 25.305664 26.366211 25.672363 26.588867 26.056641 26.588867 C 26.190918 26.588867 26.327637 26.561523 26.458984 26.503906 L 30.342773 24.795715 L 30.342773 25.823303 L 25.63916 27.982422 C 25.137207 28.212891 24.916992 28.806641 25.147461 29.308594 C 25.315918 29.675781 25.678223 29.891602 26.056641 29.891602 C 26.196289 29.891602 26.338379 29.862305 26.473145 29.800781 L 30.342773 28.024475 L 30.342773 30.674805 L 21.769531 30.674805 L 21.769531 22.100586 Z"></path>
      <path fill="currentColor" stroke="none" d="M 32.023438 0.519531 L 25.046387 0.519531 C 24.494141 0.519531 24.046387 0.966797 24.046387 1.519531 L 24.046387 12.674805 L 17.895996 12.674805 C 15.227051 12.674805 13.056152 14.845703 13.056152 17.514648 L 13.056152 40.253845 C 9.245239 40.292664 5.270996 40.266479 1.082031 40.144531 C 0.759766 40.151367 0.434082 40.291016 0.240723 40.560547 C 0.046875 40.831055 -0.000488 41.179688 0.114746 41.491211 L 5.408691 55.827148 C 5.553711 56.219727 5.928223 56.480469 6.34668 56.480469 L 65.964844 56.480469 C 66.346191 56.480469 66.694336 56.263672 66.862305 55.920898 L 79.844727 29.485352 C 80.041992 29.083984 79.948242 28.600586 79.615234 28.301758 C 79.281738 28.001953 78.791016 27.962891 78.413086 28.199219 C 78.257263 28.298157 66.710693 35.34729 39.441895 38.628906 L 39.441895 13.674805 C 39.441895 13.12207 38.994141 12.674805 38.441895 12.674805 L 33.023438 12.674805 L 33.023438 1.519531 C 33.023438 0.966797 32.575684 0.519531 32.023438 0.519531 Z M 26.046387 2.519531 L 31.023438 2.519531 L 31.023438 4.124023 L 26.046387 4.124023 L 26.046387 2.519531 Z M 26.046387 6.124023 L 31.023438 6.124023 L 31.023438 12.674805 L 26.046387 12.674805 L 26.046387 6.124023 Z M 76.688965 31.375 L 65.341797 54.480469 L 7.043457 54.480469 L 2.502441 42.183594 C 46.90918 43.292969 69.316406 34.893555 76.688965 31.375 Z M 37.441895 14.674805 L 37.441895 38.802734 C 37.441895 38.821594 37.451599 38.837341 37.452637 38.855957 C 30.876038 39.582336 23.433655 40.086914 15.056152 40.231201 L 15.056152 17.514648 C 15.056152 15.949219 16.330078 14.674805 17.895996 14.674805 L 37.441895 14.674805 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85 43" id="FERRY">
    <g id="ferry">
      <path fill="currentColor" stroke="none" d="M 81.825684 32.151367 L 74.686035 32.151367 L 74.686035 9.336914 L 75.592773 9.336914 C 77.939453 9.336914 79.848633 7.427734 79.848633 5.081055 C 79.848633 2.734375 77.939453 0.825195 75.592773 0.825195 L 12.802246 0.825195 C 10.455566 0.825195 8.546387 2.734375 8.546387 5.081055 C 8.546387 7.081726 9.938843 8.752991 11.802246 9.205688 L 11.802246 22.848633 L 2.174316 22.848633 C 1.833008 22.848633 1.515137 23.022461 1.331543 23.310547 C 1.147949 23.597656 1.123535 23.958984 1.26709 24.268555 L 9.290527 41.594727 C 9.454102 41.948242 9.808105 42.174805 10.197754 42.174805 L 75.779297 42.174805 C 76.093262 42.174805 76.38916 42.027344 76.578125 41.776367 L 82.624512 33.75293 C 82.852539 33.450195 82.889648 33.044922 82.720703 32.705078 C 82.55127 32.366211 82.205078 32.151367 81.825684 32.151367 Z M 10.546387 5.081055 C 10.546387 3.836914 11.558594 2.825195 12.802246 2.825195 L 75.592773 2.825195 C 76.836426 2.825195 77.848633 3.836914 77.848633 5.081055 C 77.848633 6.325195 76.836426 7.336914 75.592773 7.336914 L 12.802246 7.336914 C 11.558594 7.336914 10.546387 6.325195 10.546387 5.081055 Z M 18.220703 21.744141 C 18.772949 21.744141 19.220703 21.296875 19.220703 20.744141 L 19.220703 14.081055 C 19.220703 13.52832 18.772949 13.081055 18.220703 13.081055 L 13.802246 13.081055 L 13.802246 9.336914 L 72.686035 9.336914 L 72.686035 32.151367 L 49.911133 32.151367 C 41.825684 24.246094 33.039551 22.912109 32.665039 22.858398 C 32.618164 22.851563 32.570801 22.848633 32.523438 22.848633 L 13.802246 22.848633 L 13.802246 21.744141 L 18.220703 21.744141 Z M 13.802246 19.744141 L 13.802246 15.081055 L 17.220703 15.081055 L 17.220703 19.744141 L 13.802246 19.744141 Z M 75.280762 40.174805 L 10.836914 40.174805 L 3.739258 24.848633 L 32.443848 24.848633 C 33.246094 24.984375 41.467285 26.533203 48.792969 33.858398 C 48.980469 34.045898 49.234863 34.151367 49.5 34.151367 L 79.819824 34.151367 L 75.280762 40.174805 Z"></path>
      <path fill="currentColor" stroke="none" d="M 50.197754 21.744141 L 67.988281 21.744141 C 68.540527 21.744141 68.988281 21.296875 68.988281 20.744141 L 68.988281 14.081055 C 68.988281 13.52832 68.540527 13.081055 67.988281 13.081055 L 50.197754 13.081055 C 49.645508 13.081055 49.197754 13.52832 49.197754 14.081055 L 49.197754 20.744141 C 49.197754 21.296875 49.645508 21.744141 50.197754 21.744141 Z M 51.197754 15.081055 L 66.988281 15.081055 L 66.988281 19.744141 L 51.197754 19.744141 L 51.197754 15.081055 Z"></path>
      <path fill="currentColor" stroke="none" d="M 36.37207 21.744141 L 44.209473 21.744141 C 44.761719 21.744141 45.209473 21.296875 45.209473 20.744141 L 45.209473 14.081055 C 45.209473 13.52832 44.761719 13.081055 44.209473 13.081055 L 36.37207 13.081055 C 35.819824 13.081055 35.37207 13.52832 35.37207 14.081055 L 35.37207 20.744141 C 35.37207 21.296875 35.819824 21.744141 36.37207 21.744141 Z M 37.37207 15.081055 L 43.209473 15.081055 L 43.209473 19.744141 L 37.37207 19.744141 L 37.37207 15.081055 Z"></path>
      <path fill="currentColor" stroke="none" d="M 23.37207 21.744141 L 31.209473 21.744141 C 31.761719 21.744141 32.209473 21.296875 32.209473 20.744141 L 32.209473 14.081055 C 32.209473 13.52832 31.761719 13.081055 31.209473 13.081055 L 23.37207 13.081055 C 22.819824 13.081055 22.37207 13.52832 22.37207 14.081055 L 22.37207 20.744141 C 22.37207 21.296875 22.819824 21.744141 23.37207 21.744141 Z M 24.37207 15.081055 L 30.209473 15.081055 L 30.209473 19.744141 L 24.37207 19.744141 L 24.37207 15.081055 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76 51" id="FREIGHTER">
    <path fill="currentColor" stroke="none" d="M 7.791504 50.293457 C 7.971191 50.598633 8.299316 50.786133 8.65332 50.786133 L 62.923828 50.786133 C 63.286133 50.786133 63.620117 50.590332 63.796875 50.273926 L 75.566895 29.222168 C 75.739746 28.912598 75.73584 28.534668 75.556641 28.228516 C 75.376953 27.922363 75.048828 27.734375 74.693848 27.734375 L 61.745605 27.734375 L 61.745605 20.925781 C 61.745605 20.373535 61.297852 19.925781 60.745605 19.925781 L 55.625 19.925781 L 55.625 9.044434 C 55.625 8.492188 55.177246 8.044434 54.625 8.044434 L 41.40332 8.044434 L 41.40332 1.213867 C 41.40332 0.661621 40.955566 0.213867 40.40332 0.213867 L 16.460938 0.213867 C 15.908691 0.213867 15.460938 0.661621 15.460938 1.213867 L 15.460938 8.044434 L 11.780762 8.044434 C 11.228516 8.044434 10.780762 8.492188 10.780762 9.044434 L 10.780762 19.925781 L 7.820313 19.925781 C 7.268066 19.925781 6.820313 20.373535 6.820313 20.925781 L 6.820313 36.307129 L 1.306152 36.307129 C 0.947266 36.307129 0.616211 36.499512 0.437988 36.811035 C 0.259766 37.12207 0.262207 37.505371 0.444336 37.814453 L 7.791504 50.293457 Z M 17.460938 2.213867 L 23.671875 2.213867 L 23.671875 5.53418 C 23.671875 6.086426 24.119629 6.53418 24.671875 6.53418 C 25.224121 6.53418 25.671875 6.086426 25.671875 5.53418 L 25.671875 2.213867 L 31.132324 2.213867 L 31.132324 5.53418 C 31.132324 6.086426 31.580078 6.53418 32.132324 6.53418 C 32.68457 6.53418 33.132324 6.086426 33.132324 5.53418 L 33.132324 2.213867 L 39.40332 2.213867 L 39.40332 8.044434 L 17.460938 8.044434 L 17.460938 2.213867 Z M 12.780762 10.044434 L 18.981445 10.044434 L 18.981445 14.984863 C 18.981445 15.537109 19.429199 15.984863 19.981445 15.984863 C 20.533691 15.984863 20.981445 15.537109 20.981445 14.984863 L 20.981445 10.044434 L 26.901855 10.044434 L 26.901855 12.915039 C 26.901855 13.467285 27.349609 13.915039 27.901855 13.915039 C 28.454102 13.915039 28.901855 13.467285 28.901855 12.915039 L 28.901855 10.044434 L 35.00293 10.044434 L 35.00293 14.984863 C 35.00293 15.537109 35.450684 15.984863 36.00293 15.984863 C 36.555176 15.984863 37.00293 15.537109 37.00293 14.984863 L 37.00293 10.044434 L 43.103516 10.044434 L 43.103516 13.376953 C 43.103516 13.929199 43.55127 14.376953 44.103516 14.376953 C 44.655762 14.376953 45.103516 13.929199 45.103516 13.376953 L 45.103516 10.044434 L 53.625 10.044434 L 53.625 19.925781 L 12.780762 19.925781 L 12.780762 10.044434 Z M 8.820313 21.925781 L 14.920898 21.925781 L 14.920898 32.562012 C 14.920898 33.114258 15.368652 33.562012 15.920898 33.562012 C 16.473145 33.562012 16.920898 33.114258 16.920898 32.562012 L 16.920898 21.925781 L 22.661621 21.925781 L 22.661621 28.126465 C 22.661621 28.678711 23.109375 29.126465 23.661621 29.126465 C 24.213867 29.126465 24.661621 28.678711 24.661621 28.126465 L 24.661621 21.925781 L 30.762695 21.925781 L 30.762695 32.896973 C 30.762695 33.449219 31.210449 33.896973 31.762695 33.896973 C 32.314941 33.896973 32.762695 33.449219 32.762695 32.896973 L 32.762695 21.925781 L 38.233398 21.925781 L 38.233398 28.126465 C 38.233398 28.678711 38.681152 29.126465 39.233398 29.126465 C 39.785645 29.126465 40.233398 28.678711 40.233398 28.126465 L 40.233398 21.925781 L 45.983887 21.925781 L 45.983887 24.379883 C 45.983887 24.932129 46.431641 25.379883 46.983887 25.379883 C 47.536133 25.379883 47.983887 24.932129 47.983887 24.379883 L 47.983887 21.925781 L 59.745605 21.925781 L 59.745605 27.734375 L 47.78418 27.734375 C 47.231934 27.734375 46.78418 28.182129 46.78418 28.734375 L 46.78418 36.307129 L 8.820313 36.307129 L 8.820313 21.925781 Z M 47.78418 38.307129 C 48.336426 38.307129 48.78418 37.859375 48.78418 37.307129 L 48.78418 29.734375 L 72.989258 29.734375 L 62.337402 48.786133 L 9.225098 48.786133 L 3.055176 38.307129 L 47.78418 38.307129 Z"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 83 73" id="MISCELLANEOUS">
    <g id="misc">
      <path fill="currentColor" stroke="none" d="M 79.51416 49.578125 L 74.451965 50.156982 L 72.416687 37.137695 L 78.241211 35.93457 C 78.51416 35.87793 78.750977 35.710938 78.89502 35.472656 C 79.039063 35.234375 79.077148 34.946289 79 34.678711 L 76.905762 27.385742 C 76.829102 27.118164 76.644043 26.895508 76.395996 26.769531 C 76.147461 26.644531 75.858398 26.626953 75.59668 26.724609 L 66.088867 30.254883 C 65.687378 30.403625 65.449951 30.78656 65.451294 31.196228 L 52.613281 35.632813 C 52.11084 35.806641 51.832031 36.342773 51.979004 36.854492 L 52.847168 39.87793 C 52.972168 40.314453 53.370605 40.601563 53.807617 40.601563 C 53.881836 40.601563 53.957031 40.59375 54.032715 40.576172 L 63.914368 38.299377 L 62.361816 51.539429 L 48.533142 53.120728 L 45.066895 30.290039 L 51.76123 24.493164 C 51.980469 24.303711 52.106445 24.027344 52.106445 23.737305 L 52.106445 19.112305 C 52.106445 18.808594 51.96875 18.522461 51.732422 18.332031 C 51.496094 18.142578 51.187012 18.072266 50.889648 18.135742 L 44.41748 19.572266 L 42.379395 1.791992 C 42.316406 1.244141 41.818848 0.848633 41.271973 0.913086 C 40.723145 0.975586 40.32959 1.47168 40.39209 2.020508 L 40.633362 4.12561 C 39.633789 4.811035 36.992249 6.479858 33.314514 7.822693 L 32.687012 4.925781 C 32.665894 4.828857 32.627808 4.739319 32.580994 4.654907 C 32.571228 4.63739 32.558777 4.623047 32.547974 4.606262 C 32.49176 4.5177 32.423035 4.439697 32.342285 4.372864 C 32.33075 4.363403 32.321289 4.352722 32.309387 4.343811 C 32.228699 4.282837 32.141541 4.229919 32.043457 4.195313 C 32.02655 4.18927 32.008789 4.189087 31.991699 4.18396 C 31.980103 4.180481 31.968384 4.179382 31.956665 4.176331 C 31.843506 4.146973 31.728821 4.137207 31.61499 4.148132 C 31.604126 4.148987 31.594421 4.144287 31.583496 4.145508 C 31.463379 4.161133 19.435059 5.679688 9.544922 5.449219 C 9.148926 5.485352 8.79834 5.658203 8.625977 6.005859 C 8.454102 6.353516 8.499023 6.769531 8.741211 7.073242 L 11.47998 10.50293 L 8.744141 13.891602 C 8.519043 14.169922 8.460449 14.548828 8.59082 14.882813 C 8.721191 15.216797 9.02002 15.456055 9.375 15.508789 C 11.963379 15.894531 14.428223 16.03125 16.620605 16.03125 C 20.224426 16.03125 23.082397 15.663147 24.535217 15.429382 L 24.915039 17.932617 C 24.989746 18.423828 25.412598 18.782227 25.902832 18.782227 C 25.926758 18.782227 25.950684 18.78125 25.974609 18.779297 C 35.020874 18.136963 39.627869 15.660583 41.762695 13.977661 L 42.453918 20.008057 L 12.095703 26.746094 C 11.638184 26.847656 11.3125 27.253906 11.3125 27.722656 L 11.3125 57.37677 L 2.258301 58.412109 C 1.951172 58.447266 1.677246 58.62207 1.516602 58.886719 C 1.356445 59.151367 1.327637 59.475586 1.438965 59.764648 L 5.939453 71.453125 C 6.087891 71.838867 6.458984 72.09375 6.872559 72.09375 L 69.191406 72.09375 C 69.567871 72.09375 69.912109 71.882813 70.083008 71.546875 L 80.519531 51.024414 C 80.686035 50.696289 80.65918 50.302734 80.449219 50.000977 C 80.239746 49.698242 79.885254 49.533203 79.51416 49.578125 Z M 31.405518 8.459167 C 30.392151 8.761169 29.322388 9.02832 28.199707 9.236938 L 31.074219 6.929688 L 31.405518 8.459167 Z M 24.197754 9.883789 C 24.166382 9.908997 24.151123 9.944702 24.123596 9.972717 C 24.099792 9.996765 24.067383 10.009521 24.045898 10.036133 C 24.027344 10.05896 24.022888 10.088867 24.006592 10.113037 C 23.96405 10.176331 23.932251 10.240662 23.905579 10.310608 C 23.884277 10.365723 23.865479 10.418091 23.854248 10.476074 C 23.839966 10.55011 23.83905 10.622253 23.841614 10.697754 C 23.842834 10.737122 23.828979 10.775146 23.834961 10.814453 L 24.234558 13.447815 C 22.240295 13.763184 17.233582 14.38031 11.424805 13.754883 L 13.541016 11.133789 C 13.835449 10.768555 13.836914 10.248047 13.543945 9.881836 L 11.618652 7.47168 C 17.84552 7.469116 24.493225 6.90625 28.40094 6.510376 L 24.197754 9.883789 Z M 26.75293 16.711914 L 25.973145 11.575195 C 32.937134 10.889038 38.422729 7.919006 40.88916 6.356812 L 41.481445 11.524048 C 40.651428 12.445557 36.96167 15.808838 26.75293 16.711914 Z M 72.463684 50.384338 L 69.186829 50.759033 L 69.111206 37.820557 L 70.456177 37.542725 L 72.463684 50.384338 Z M 75.28125 28.975586 L 76.780273 34.194336 L 68.812012 35.839844 L 67.653809 31.807617 L 75.28125 28.975586 Z M 67.18811 50.987549 L 64.40271 51.306091 L 65.983887 37.822571 L 67.10968 37.563171 L 67.18811 50.987549 Z M 54.507324 38.414063 L 54.162598 37.213867 L 65.955444 33.138367 L 66.665894 35.612732 L 54.507324 38.414063 Z M 46.544434 53.348145 L 39.071716 54.202576 L 37.494141 32.415039 L 43.16864 31.110718 L 46.544434 53.348145 Z M 13.3125 28.525391 L 50.106445 20.358398 L 50.106445 23.280273 L 43.529114 28.975647 L 36.210938 30.658203 C 35.730469 30.768555 35.401855 31.212891 35.4375 31.705078 L 37.082581 54.430054 L 13.3125 57.148071 L 13.3125 28.525391 Z M 68.578125 70.09375 L 7.559082 70.09375 L 3.769531 60.251953 L 49.057617 55.073547 L 49.057617 57.405945 C 47.275513 57.855591 45.947266 59.459045 45.947266 61.378906 C 45.947266 63.645508 47.791016 65.489258 50.057617 65.489258 C 52.32373 65.489258 54.16748 63.645508 54.16748 61.378906 C 54.16748 59.459106 52.839294 57.855713 51.057617 57.406006 L 51.057617 54.844849 L 60.057617 53.815796 L 60.057617 57.405945 C 58.275513 57.855591 56.947266 59.459045 56.947266 61.378906 C 56.947266 63.645508 58.791016 65.489258 61.057617 65.489258 C 63.32373 65.489258 65.16748 63.645508 65.16748 61.378906 C 65.16748 59.459106 63.839294 57.855713 62.057617 57.406006 L 62.057617 53.587097 L 77.893555 51.776367 L 68.578125 70.09375 Z M 50.057617 59.268555 C 51.221191 59.268555 52.16748 60.214844 52.16748 61.378906 C 52.16748 62.542969 51.221191 63.489258 50.057617 63.489258 C 48.894043 63.489258 47.947266 62.542969 47.947266 61.378906 C 47.947266 60.214844 48.894043 59.268555 50.057617 59.268555 Z M 61.057617 59.268555 C 62.221191 59.268555 63.16748 60.214844 63.16748 61.378906 C 63.16748 62.542969 62.221191 63.489258 61.057617 63.489258 C 59.894043 63.489258 58.947266 62.542969 58.947266 61.378906 C 58.947266 60.214844 59.894043 59.268555 61.057617 59.268555 Z"></path>
      <path fill="currentColor" stroke="none" d="M 29.367188 34.422852 C 28.833008 33.976563 28.155273 33.767578 27.469727 33.828125 L 19.628906 34.535156 C 18.938965 34.597656 18.313965 34.925781 17.868164 35.459961 C 17.422363 35.994141 17.211426 36.667969 17.273438 37.357422 L 17.97998 45.198242 C 18.102051 46.546875 19.238281 47.564453 20.566895 47.564453 C 20.64502 47.564453 20.723633 47.560547 20.802734 47.553711 L 28.643066 46.84668 C 30.070313 46.717773 31.126953 45.452148 30.999023 44.024414 L 30.291992 36.183594 C 30.229492 35.494141 29.901367 34.868164 29.367188 34.422852 Z M 28.463379 44.854492 L 20.623047 45.561523 C 20.298828 45.599609 20.001465 45.342773 19.972168 45.018555 L 19.265625 37.177734 C 19.251465 37.020508 19.300293 36.865234 19.403809 36.741211 C 19.507324 36.617188 19.650879 36.541016 19.808594 36.527344 L 27.649414 35.820313 C 27.66748 35.818359 27.685059 35.817383 27.702637 35.817383 C 27.841797 35.817383 27.976074 35.867188 28.085938 35.958008 C 28.209473 36.061523 28.285645 36.206055 28.299805 36.363281 L 29.006836 44.204102 C 29.036133 44.527344 28.787109 44.825195 28.463379 44.854492 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 83 66" id="STEAMBOAT">
    <g>
      <path fill="currentColor" stroke="none" d="M 62.147461 61.212891 C 65.803711 61.212891 68.77832 58.238281 68.77832 54.582031 C 68.77832 50.924805 65.803711 47.950195 62.147461 47.950195 C 58.490234 47.950195 55.515625 50.924805 55.515625 54.582031 C 55.515625 58.238281 58.490234 61.212891 62.147461 61.212891 Z M 63.147461 50.065613 C 64.897888 50.453552 66.27533 51.831482 66.663025 53.582031 L 63.147461 53.582031 L 63.147461 50.065613 Z M 63.147461 55.582031 L 66.662964 55.582031 C 66.275269 57.332397 64.897827 58.709839 63.147461 59.097534 L 63.147461 55.582031 Z M 61.147461 50.065613 L 61.147461 53.582031 L 57.631042 53.582031 C 58.018982 51.831482 59.396912 50.453552 61.147461 50.065613 Z M 61.147461 55.582031 L 61.147461 59.097595 C 59.396912 58.7099 58.018982 57.332458 57.631042 55.582031 L 61.147461 55.582031 Z"></path>
      <path fill="currentColor" stroke="none" d="M 45.147461 61.212891 C 48.803711 61.212891 51.77832 58.238281 51.77832 54.582031 C 51.77832 50.924805 48.803711 47.950195 45.147461 47.950195 C 41.490234 47.950195 38.515625 50.924805 38.515625 54.582031 C 38.515625 58.238281 41.490234 61.212891 45.147461 61.212891 Z M 46.147461 50.065613 C 47.897888 50.453552 49.27533 51.831482 49.663025 53.582031 L 46.147461 53.582031 L 46.147461 50.065613 Z M 46.147461 55.582031 L 49.662964 55.582031 C 49.275269 57.332397 47.897827 58.709839 46.147461 59.097534 L 46.147461 55.582031 Z M 44.147461 50.065613 L 44.147461 53.582031 L 40.631042 53.582031 C 41.018982 51.831482 42.396912 50.453552 44.147461 50.065613 Z M 44.147461 55.582031 L 44.147461 59.097595 C 42.396912 58.7099 41.018982 57.332458 40.631042 55.582031 L 44.147461 55.582031 Z"></path>
      <path fill="currentColor" stroke="none" d="M 79.59082 43.243164 L 64.422913 43.799561 L 65.102539 33.420898 L 67.525391 33.110352 C 67.998047 33.049805 68.362305 32.664063 68.395508 32.188477 L 68.775391 26.833008 C 68.795898 26.545898 68.691406 26.262695 68.488281 26.058594 C 68.285156 25.853516 68.013672 25.755859 67.714844 25.764648 L 44.841858 27.209045 L 43.09082 2.166016 C 43.070313 1.885742 42.93457 1.62793 42.71582 1.453125 C 42.496094 1.279297 42.214844 1.207031 41.9375 1.24707 L 35.469727 2.265625 C 34.993164 2.34082 34.638672 2.745117 34.625 3.226563 L 33.949768 27.896851 L 28.634338 28.232544 L 26.811523 4.5 C 26.791016 4.227539 26.65918 3.975586 26.448242 3.802734 C 26.237305 3.629883 25.97168 3.544922 25.693359 3.583984 L 19.302734 4.362305 C 18.819336 4.420898 18.448242 4.820313 18.424805 5.307617 L 17.304138 28.947998 L 11.439453 29.318359 C 11.166992 29.335938 10.913086 29.463867 10.737305 29.672852 C 10.561523 29.882813 10.478516 30.154297 10.508789 30.426758 L 12.202759 45.715149 L 2.334961 46.077148 C 2.033203 46.087891 1.75293 46.235352 1.571289 46.476563 C 1.390625 46.71875 1.328125 47.030273 1.40332 47.323242 L 5.904297 65.011719 C 6.016602 65.454102 6.416016 65.764648 6.873047 65.764648 L 69.191406 65.764648 C 69.567383 65.764648 69.912109 65.553711 70.083008 65.217773 L 80.519531 44.695313 C 80.679688 44.379883 80.661133 44.001953 80.470703 43.704102 C 80.279297 43.405273 79.974609 43.213867 79.59082 43.243164 Z M 36.601563 4.112305 L 41.170898 3.392578 L 42.844849 27.335144 L 35.954712 27.770264 L 36.601563 4.112305 Z M 20.382813 6.245117 L 24.897461 5.695313 L 26.638184 28.358582 L 19.312622 28.821167 L 20.382813 6.245117 Z M 27.787781 30.289856 C 27.788208 30.289795 27.788635 30.2901 27.789063 30.290039 C 27.789429 30.290039 27.789734 30.289734 27.7901 30.289734 L 43.981445 29.267456 C 43.981812 29.267456 43.982056 29.267578 43.982422 29.267578 C 43.982788 29.267578 43.982971 29.267334 43.983337 29.267334 L 66.700195 27.833008 L 66.458984 31.230469 L 64.063171 31.536926 L 61.095703 31.742188 C 60.544922 31.780273 60.128906 32.257813 60.166992 32.80957 C 60.204102 33.336914 60.643555 33.740234 61.164063 33.740234 C 61.1875 33.740234 61.210938 33.739258 61.234375 33.738281 L 63.085327 33.610229 L 62.772339 38.391479 L 57.65332 38.802734 C 57.102539 38.847656 56.692383 39.329102 56.736328 39.879883 C 56.77832 40.40332 57.21582 40.799805 57.732422 40.799805 C 57.758789 40.799805 57.786133 40.798828 57.813477 40.796875 L 62.640259 40.409119 L 62.413452 43.873291 L 14.207336 45.641663 L 12.612305 31.248047 L 27.787781 30.289856 Z M 68.578125 63.764648 L 7.650391 63.764648 L 3.646484 48.030273 L 77.96582 45.303711 L 68.578125 63.764648 Z"></path>
      <path fill="currentColor" stroke="none" d="M 48.220703 34.632813 C 48.244141 34.632813 48.266602 34.631836 48.290039 34.630859 L 54.761719 34.18457 C 55.313477 34.146484 55.728516 33.668945 55.691406 33.118164 C 55.652344 32.56543 55.15625 32.15332 54.625 32.188477 L 48.15332 32.634766 C 47.601563 32.672852 47.186523 33.150391 47.223633 33.701172 C 47.260742 34.229492 47.699219 34.632813 48.220703 34.632813 Z"></path>
      <path fill="currentColor" stroke="none" d="M 35.277344 35.525391 C 35.300781 35.525391 35.323242 35.524414 35.34668 35.523438 L 41.818359 35.077148 C 42.370117 35.039063 42.785156 34.561523 42.748047 34.010742 C 42.708984 33.458008 42.214844 33.05957 41.681641 33.081055 L 35.209961 33.527344 C 34.658203 33.56543 34.243164 34.042969 34.280273 34.59375 C 34.317383 35.12207 34.755859 35.525391 35.277344 35.525391 Z"></path>
      <path fill="currentColor" stroke="none" d="M 25.813477 36.178711 C 25.836914 36.178711 25.859375 36.177734 25.882813 36.176758 L 28.875 35.970703 C 29.426758 35.932617 29.841797 35.455078 29.804688 34.904297 C 29.765625 34.351563 29.291016 33.960938 28.738281 33.974609 L 25.746094 34.180664 C 25.194336 34.21875 24.779297 34.696289 24.816406 35.24707 C 24.853516 35.775391 25.291992 36.178711 25.813477 36.178711 Z"></path>
      <path fill="currentColor" stroke="none" d="M 39.710938 40.243164 L 37.625 40.410156 C 37.075195 40.454102 36.664063 40.936523 36.708008 41.487305 C 36.75 42.010742 37.1875 42.407227 37.704102 42.407227 C 37.730469 42.407227 37.757813 42.40625 37.785156 42.404297 L 39.871094 42.237305 C 40.420898 42.193359 40.832031 41.710938 40.788086 41.160156 C 40.744141 40.610352 40.275391 40.206055 39.710938 40.243164 Z"></path>
      <path fill="currentColor" stroke="none" d="M 45.770508 41.759766 C 45.796875 41.759766 45.824219 41.758789 45.851563 41.756836 L 51.832031 41.276367 C 52.382813 41.231445 52.792969 40.75 52.749023 40.199219 C 52.705078 39.649414 52.230469 39.241211 51.671875 39.282227 L 45.691406 39.762695 C 45.140625 39.807617 44.730469 40.289063 44.774414 40.839844 C 44.816406 41.363281 45.253906 41.759766 45.770508 41.759766 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71 60" id="TUG">
    <g id="tug">
      <path fill="currentColor" stroke="none" d="M 13.0625 54 C 16.242676 54 18.82959 51.413086 18.82959 48.232422 C 18.82959 45.051758 16.242676 42.464844 13.0625 42.464844 C 9.882324 42.464844 7.294922 45.051758 7.294922 48.232422 C 7.294922 51.413086 9.882324 54 13.0625 54 Z M 13.0625 44.464844 C 15.139648 44.464844 16.82959 46.155273 16.82959 48.232422 C 16.82959 50.30957 15.139648 52 13.0625 52 C 10.984863 52 9.294922 50.30957 9.294922 48.232422 C 9.294922 46.155273 10.984863 44.464844 13.0625 44.464844 Z"></path>
      <path fill="currentColor" stroke="none" d="M 13.0625 50.804688 C 13.614746 50.804688 14.0625 50.357422 14.0625 49.804688 C 14.0625 49.251953 13.614746 48.804688 13.0625 48.804688 C 12.74707 48.804688 12.490234 48.547852 12.490234 48.232422 C 12.490234 47.916992 12.74707 47.660156 13.0625 47.660156 C 13.614746 47.660156 14.0625 47.212891 14.0625 46.660156 C 14.0625 46.107422 13.614746 45.660156 13.0625 45.660156 C 11.644043 45.660156 10.490234 46.814453 10.490234 48.232422 C 10.490234 49.650391 11.644043 50.804688 13.0625 50.804688 Z"></path>
      <path fill="currentColor" stroke="none" d="M 26.82959 54 C 30.009766 54 32.597168 51.413086 32.597168 48.232422 C 32.597168 45.051758 30.009766 42.464844 26.82959 42.464844 C 23.649414 42.464844 21.0625 45.051758 21.0625 48.232422 C 21.0625 51.413086 23.649414 54 26.82959 54 Z M 26.82959 44.464844 C 28.907227 44.464844 30.597168 46.155273 30.597168 48.232422 C 30.597168 50.30957 28.907227 52 26.82959 52 C 24.752441 52 23.0625 50.30957 23.0625 48.232422 C 23.0625 46.155273 24.752441 44.464844 26.82959 44.464844 Z"></path>
      <path fill="currentColor" stroke="none" d="M 26.82959 50.804688 C 27.381836 50.804688 27.82959 50.357422 27.82959 49.804688 C 27.82959 49.251953 27.381836 48.804688 26.82959 48.804688 C 26.51416 48.804688 26.257813 48.547852 26.257813 48.232422 C 26.257813 47.916992 26.51416 47.660156 26.82959 47.660156 C 27.381836 47.660156 27.82959 47.212891 27.82959 46.660156 C 27.82959 46.107422 27.381836 45.660156 26.82959 45.660156 C 25.411621 45.660156 24.257813 46.814453 24.257813 48.232422 C 24.257813 49.650391 25.411621 50.804688 26.82959 50.804688 Z"></path>
      <path fill="currentColor" stroke="none" d="M 40.767578 54 C 43.947754 54 46.534668 51.413086 46.534668 48.232422 C 46.534668 45.051758 43.947754 42.464844 40.767578 42.464844 C 37.587402 42.464844 35 45.051758 35 48.232422 C 35 51.413086 37.587402 54 40.767578 54 Z M 40.767578 44.464844 C 42.844727 44.464844 44.534668 46.155273 44.534668 48.232422 C 44.534668 50.30957 42.844727 52 40.767578 52 C 38.689941 52 37 50.30957 37 48.232422 C 37 46.155273 38.689941 44.464844 40.767578 44.464844 Z"></path>
      <path fill="currentColor" stroke="none" d="M 40.767578 50.804688 C 41.319824 50.804688 41.767578 50.357422 41.767578 49.804688 C 41.767578 49.251953 41.319824 48.804688 40.767578 48.804688 C 40.452148 48.804688 40.195313 48.547852 40.195313 48.232422 C 40.195313 47.916992 40.452148 47.660156 40.767578 47.660156 C 41.319824 47.660156 41.767578 47.212891 41.767578 46.660156 C 41.767578 46.107422 41.319824 45.660156 40.767578 45.660156 C 39.349121 45.660156 38.195313 46.814453 38.195313 48.232422 C 38.195313 49.650391 39.349121 50.804688 40.767578 50.804688 Z"></path>
      <path fill="currentColor" stroke="none" d="M 17.82959 1.12793 C 17.277344 1.12793 16.82959 1.575195 16.82959 2.12793 L 16.82959 8.00177 C 13.623962 8.200806 11.070496 10.849304 11.038086 14.09668 L 8.322998 36.592773 L 1.337402 36.592773 C 0.785156 36.592773 0.337402 37.040039 0.337402 37.592773 L 0.337402 58.87207 C 0.337402 59.424805 0.785156 59.87207 1.337402 59.87207 L 47.267578 59.87207 C 69.286133 59.87207 69.661133 37.821289 69.662598 37.598633 C 69.664063 37.332031 69.559082 37.076172 69.371582 36.887695 C 69.184082 36.699219 68.928711 36.592773 68.662598 36.592773 L 61.851318 36.592773 L 59.13623 14.09668 C 59.102539 10.719727 56.344727 7.982422 52.959961 7.982422 L 52.581543 7.982422 L 52.581543 2.12793 C 52.581543 1.575195 52.133789 1.12793 51.581543 1.12793 C 51.029297 1.12793 50.581543 1.575195 50.581543 2.12793 L 50.581543 4.555664 L 45.222168 4.555664 L 45.222168 2.12793 C 45.222168 1.575195 44.774414 1.12793 44.222168 1.12793 C 43.669922 1.12793 43.222168 1.575195 43.222168 2.12793 L 43.222168 4.555664 L 35.705566 4.555664 L 35.705566 2.12793 C 35.705566 1.575195 35.257813 1.12793 34.705566 1.12793 C 34.15332 1.12793 33.705566 1.575195 33.705566 2.12793 L 33.705566 4.555664 L 26.777832 4.555664 L 26.777832 2.12793 C 26.777832 1.575195 26.330078 1.12793 25.777832 1.12793 C 25.225586 1.12793 24.777832 1.575195 24.777832 2.12793 L 24.777832 4.555664 L 18.82959 4.555664 L 18.82959 2.12793 C 18.82959 1.575195 18.381836 1.12793 17.82959 1.12793 Z M 67.615723 38.592773 C 67.305664 42.727539 64.959961 57.87207 47.267578 57.87207 L 2.337402 57.87207 L 2.337402 38.592773 L 67.615723 38.592773 Z M 57.502075 17.246094 L 59.836975 36.592773 L 47.581543 36.592773 L 47.581543 17.246094 L 57.502075 17.246094 Z M 45.222168 6.555664 L 50.581543 6.555664 L 50.581543 7.982422 L 45.222168 7.982422 L 45.222168 6.555664 Z M 35.705566 6.555664 L 43.222168 6.555664 L 43.222168 7.982422 L 35.705566 7.982422 L 35.705566 6.555664 Z M 26.777832 6.555664 L 33.705566 6.555664 L 33.705566 7.982422 L 26.777832 7.982422 L 26.777832 6.555664 Z M 52.959961 9.982422 C 55.263184 9.982422 57.136719 11.856445 57.136719 14.15918 C 57.136719 14.199219 57.13916 14.239258 57.144043 14.279297 L 57.260742 15.246094 L 46.581543 15.246094 C 46.029297 15.246094 45.581543 15.693359 45.581543 16.246094 L 45.581543 36.592773 L 10.337341 36.592773 L 13.030273 14.279297 C 13.035156 14.239258 13.037598 14.199219 13.037598 14.15918 C 13.037598 11.856445 14.911133 9.982422 17.214355 9.982422 L 52.959961 9.982422 Z M 24.777832 6.555664 L 24.777832 7.982422 L 18.82959 7.982422 L 18.82959 6.555664 L 24.777832 6.555664 Z"></path>
      <path fill="currentColor" stroke="none" d="M 27.242676 34.512695 C 32.738281 34.512695 37.209473 30.041992 37.209473 24.546875 C 37.209473 19.050781 32.738281 14.580078 27.242676 14.580078 C 21.74707 14.580078 17.276367 19.050781 17.276367 24.546875 C 17.276367 30.041992 21.74707 34.512695 27.242676 34.512695 Z M 28.242676 32.442932 L 28.242676 29.715332 C 30.34668 29.308777 32.004883 27.650574 32.41156 25.546875 L 35.139709 25.546875 C 34.686707 29.139771 31.835938 31.98999 28.242676 32.442932 Z M 28.242676 16.649841 C 31.835938 17.102844 34.686707 19.953918 35.139709 23.546875 L 32.411621 23.546875 C 32.005127 21.442566 30.346802 19.783997 28.242676 19.377441 L 28.242676 16.649841 Z M 30.512695 24.546875 C 30.512695 26.349609 29.045898 27.816406 27.242676 27.816406 C 25.439941 27.816406 23.973145 26.349609 23.973145 24.546875 C 23.973145 22.743164 25.439941 21.276367 27.242676 21.276367 C 29.045898 21.276367 30.512695 22.743164 30.512695 24.546875 Z M 26.242676 16.649841 L 26.242676 19.377502 C 24.138733 19.784058 22.480591 21.442566 22.074219 23.546875 L 19.34613 23.546875 C 19.799133 19.953979 22.649841 17.102966 26.242676 16.649841 Z M 22.07428 25.546875 C 22.480835 27.650513 24.138855 29.308716 26.242676 29.715271 L 26.242676 32.442932 C 22.649841 31.989929 19.799133 29.139771 19.34613 25.546875 L 22.07428 25.546875 Z"></path>
    </g>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85 45" id="WAVE-PIERCING-CRAFT">
    <g id="wave-piercer">
      <path fill="currentColor" stroke="none" d="M 82.175781 27.664063 L 74.816956 27.977234 C 74.682983 27.320557 74.455994 26.344421 74.105591 25.184326 C 74.088379 25.113892 74.074341 25.044739 74.043091 24.981079 C 72.470337 19.891663 68.544983 11.583252 59.665039 11.161682 C 58.69873 8.786438 54.845337 0.839844 46.54541 0.839844 L 12.266113 0.839844 C 11.713867 0.839844 11.266113 1.287109 11.266113 1.839844 C 11.266113 2.392578 11.713867 2.839844 12.266113 2.839844 L 20.407104 2.839844 L 18.205566 11.132813 L 7.052246 11.132813 C 6.5 11.132813 6.052246 11.580078 6.052246 12.132813 C 6.052246 12.685547 6.5 13.132813 7.052246 13.132813 L 14.223389 13.132813 L 8.185059 30.812805 L 6.471191 30.885742 C 6.083984 30.902344 5.741699 31.140625 5.591797 31.498047 L 0.859863 42.773438 C 0.72998 43.082031 0.763672 43.43457 0.949219 43.713867 C 1.134277 43.992188 1.446777 44.160156 1.781738 44.160156 L 69.432617 44.160156 C 69.803223 44.160156 70.144043 43.955078 70.317383 43.626953 C 70.365234 43.535156 75.22998 34.427734 82.765625 29.5 C 83.142578 29.253906 83.308105 28.786133 83.17041 28.357422 C 83.033203 27.928711 82.625 27.631836 82.175781 27.664063 Z M 71.761536 24.416016 L 22.393066 24.416016 L 25.452637 13.132813 L 58.964844 13.132813 C 66.452698 13.132813 70.102173 19.691345 71.761536 24.416016 Z M 27.732483 2.839844 L 46.54541 2.839844 C 50.066467 2.839844 52.684937 4.637024 54.525757 6.676758 L 26.916504 6.676758 L 27.732483 2.839844 Z M 22.476074 2.839844 L 25.687866 2.839844 L 24.703125 7.46875 C 24.640137 7.763672 24.713867 8.071289 24.903809 8.305664 C 25.09375 8.540039 25.379395 8.676758 25.681152 8.676758 L 56.066772 8.676758 C 56.679504 9.601074 57.136902 10.460938 57.455078 11.132813 L 20.274536 11.132813 L 22.476074 2.839844 Z M 16.336731 13.132813 L 23.380066 13.132813 L 20.120605 25.154297 C 20.039063 25.455078 20.102539 25.776367 20.291504 26.023438 C 20.480957 26.270508 20.774414 26.416016 21.085938 26.416016 L 72.388489 26.416016 C 72.565308 27.057129 72.699524 27.620056 72.794739 28.063293 L 10.32959 30.721558 L 16.336731 13.132813 Z M 68.841797 42.160156 L 3.286133 42.160156 L 7.19043 32.856445 L 79 29.800781 C 73.505371 34.34082 69.872559 40.339844 68.841797 42.160156 Z"></path>
      <path fill="currentColor" stroke="none" d="M 41.677246 37.888672 L 45.204102 37.888672 C 45.756348 37.888672 46.204102 37.441406 46.204102 36.888672 C 46.204102 36.335938 45.756348 35.888672 45.204102 35.888672 L 41.677246 35.888672 C 41.125 35.888672 40.677246 36.335938 40.677246 36.888672 C 40.677246 37.441406 41.125 37.888672 41.677246 37.888672 Z"></path>
      <path fill="currentColor" stroke="none" d="M 50.323242 37.888672 L 53.850098 37.888672 C 54.402344 37.888672 54.850098 37.441406 54.850098 36.888672 C 54.850098 36.335938 54.402344 35.888672 53.850098 35.888672 L 50.323242 35.888672 C 49.770996 35.888672 49.323242 36.335938 49.323242 36.888672 C 49.323242 37.441406 49.770996 37.888672 50.323242 37.888672 Z"></path>
      <path fill="currentColor" stroke="none" d="M 59.118652 37.888672 L 62.645508 37.888672 C 63.197754 37.888672 63.645508 37.441406 63.645508 36.888672 C 63.645508 36.335938 63.197754 35.888672 62.645508 35.888672 L 59.118652 35.888672 C 58.566406 35.888672 58.118652 36.335938 58.118652 36.888672 C 58.118652 37.441406 58.566406 37.888672 59.118652 37.888672 Z"></path>
    </g>
  </symbol>
</svg>
    </body>
</html>
