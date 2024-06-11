<footer class="container">
  
  <p>Tenda de prova</p>

 
<div id="cookie-banner" 
    <?php 
        if (isset($_COOKIE['accepted']) && $_COOKIE['accepted'] === 'true') {
            echo 'style="display:none"';
        }else{
            echo 'style="display:block"';
        }
    ?>>
  <p>This  web site uses cookies. When you click on "Accept", you accept our <a href="/policy.html">cookie policy.</a></p>
  <button id="accept-cookie">Aceptar</button>
</div>
</footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
  const cookieBanner = document.getElementById("cookie-banner");
  const acceptButton = document.getElementById("accept-cookie");

  // Comprueba si la cookie 'accepted' ya está establecida
  const accepted = document.cookie.includes("accepted=true");

  if (!accepted) {
    cookieBanner.style.display = "block";
  }

  acceptButton.addEventListener("click", function () {
    // Establece la cookie 'accepted' con valor true y una fecha de vencimiento
    document.cookie = "accepted=true; expires=Sun, 20 Jan 2030 00:00:00 UTC; path=/";

    // Oculta el banner de cookies
    cookieBanner.style.display = "none";
  });
});

    </script>
</body>
</html>