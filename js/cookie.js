document.addEventListener("DOMContentLoaded", function () {
  const banner = document.getElementById("cookieConsentBanner");
  const acceptBtn = document.getElementById("btnAcceptCookies");
  const rejectBtn = document.getElementById("btnRejectCookies");

  // Prüfen, ob der Nutzer bereits eine Auswahl getroffen hat
  const cookieChoice = localStorage.getItem("cookieConsent");

  if (!cookieChoice) {
    // Banner anzeigen, falls keine Entscheidung vorliegt
    banner.classList.remove("d-none");
  } else if (cookieChoice === "accepted") {
    activateTracking();
  }

  // Interaktion: Akzeptieren
  acceptBtn.addEventListener("click", function () {
    localStorage.setItem("cookieConsent", "accepted");
    banner.classList.add("d-none");
    activateTracking();
  });

  // Interaktion: Ablehnen
  rejectBtn.addEventListener("click", function () {
    localStorage.setItem("cookieConsent", "rejected");
    banner.classList.add("d-none");
  });

  // Hier optionale Tracking-Skripte initialisieren
  function activateTracking() {
    console.log("Tracking-Skripte (z.B. Google Analytics) wurden geladen.");
    // Füge hier deinen Google Tag Manager oder Analytics Code ein
  }
});
