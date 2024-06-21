<?php
session_start();
include "init1.php";
?>
<h1 class="w3-container w3-teal">Calendar</h1>
<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FKolkata&src=YWJkdWxyYWhtYW5haG1lZC5hbG9kYWluaTIxQHZpdC5lZHU&src=Y19vYmFqZzI3YWlzcXJtZG9mZTQ2cWd2OWRtOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZW4ueWUjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%237CB342&color=%2333B679&color=%230B8043&color=%230B8043" style="border:solid 1px #777" width="1250" height="600" frameborder="0" scrolling="no"></iframe>

<!-- FOOTER -->
<?php
include $tpl .'footer.php';
?>
</body>
