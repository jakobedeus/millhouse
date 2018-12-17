Guidelines 


GENERELLT 

Indentera koden med en tab och gör det direkt
alltid små bokstäver i filnamn, mappnamn, förutom klassnamn
filnamn och mappnamn med mer än ett ord separeras med (-)
kommentarer ska alltid skrivas i engelska och alltid skrivas utifrån vad man vill att koden ska göra och inte vad den gör. 
 

PHP

Använda kortkommando : <?= $item["value"]; ?>
Ingen sluttagg på php när filen endast innehåller php 
När vi har kommentarer på en rad använd //
När vi har kommentarer på flera rader använd /**/
Variabelnamn ska vara snake case (_)
Funktioner ska namnges beskrivande och gärna långa om det behövs
Öppningstagg och stängningstagg är inte föräldrarelement
I OOP namnger vi klasser(classes) med PascalCase (StorBokstavGenomHelaGrejen) 
I OOP börjar alltid egenskaper (properties) och metoderna (methods) med liten bokstav men vid fler än ett ord börjar alla andra ord förutom första med stor bokstav (camelCase), ex hello eller helloFriend


HTML 

Bootstrap
använd alltid snake_case (underscore)
använd ALLTID små bokstäver när vi namnger klasser
använd inte ID någon gång utan class
class namn, använd relevanta namn som beskriver vad den gör, tänk placering och innehåll (tex gallery_box)  och inte förkortningar
När vi lägger in bilder i html, använd direkt boostrap-classen img fluid: “class=”img-fluid”

 
CSS/SASS

Sass 
All text ska vara i rem 
Padding, margin i em 
Bilder, width, height pixlar 
width height / width width procent % 
Genomtänkta variabelnamn inte $green utan $main_color


DATABASEN 

alltid små bokstäver på namnen i databasen
separera namn med flera ord med snake case  



GIT

Git commit meddelande ska alltid börjas med “This commit will…” 
Om man vill ha längre meddelanden separera i titel och body (git commit -m ”add a space” -m ”blablablab” Det andra ”-m” gör att det meddelandet hamnar under ”läs mer”.) 
Alla ska verifiera pull request 
Börja varje session med att hämta (pull) från master.
