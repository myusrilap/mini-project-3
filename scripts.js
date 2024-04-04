document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("contact-form");
  const successModal = new bootstrap.Modal(document.getElementById('successModal'));

  form.addEventListener("submit", function(event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const message = document.getElementById("message").value;

    const notificationText = `${name} mengirim pesan: "${message}"`;

    document.querySelector("#successModal .modal-body").innerText = notificationText;

    successModal.show();

    form.reset();
  }); // Menutup event listener untuk submit form
}); // Menutup event listener untuk DOMContentLoaded
