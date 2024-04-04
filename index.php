<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Platform</title>
    <!-- Tautkan CSS Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan CSS kustom -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Arjulio Freelance</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ms-auto" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link" href="#aboutus">About Us</a>
          <a class="nav-link" href="jobs.php">Jobs</a>
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="register.php">Register</a>
          <a class="nav-link" href="#contact">Contact Me</a>
        </div>
      </div>
    </div>
  </nav>

  <section id="home" class="home d-flex justify-content-center align-items-center">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 id="typing-text">Welcome to Arjulio Freelance</h1>
          <p>Connecting Talent, Empowering Dreams.</p>
          <a href="login.php" class="btn btn-primary">Login</a>
          <a href="register.php" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>
  </section>

  <section class="aboutus  text-center" id="aboutus">
    <div class="container">
        <h2 class="display-4 fw-bold">About Arjulio Freelance</h2>
        <div class="row">
            <div class="col-md-6">
                <p class="lead text-justify">Arjulio Freelance is a platform that connects talented freelancers with clients looking for their services. We provide access to a diverse range of skills, from graphic design to content writing, to meet your project needs. Our mission is to empower freelancers to showcase their expertise and help clients find the perfect solution for their projects. Arjulio Freelance is a platform that connects talented freelancers with clients looking for their services. We provide access to a diverse range of skills, from graphic design to content writing, to meet your project needs. Our mission is to empower freelancers to showcase their expertise and help clients find the perfect solution for their projects.</p>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <img src="img/img2.jpeg" alt="Freelance Image">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-5">
      <div class="container">
        <h2 class="text-center mb-4">Contact Me</h2>
        <div id="notification" class="alert alert-success" style="display: none;">
          Pesan berhasil terkirim.
        </div>
        <form id="contact-form">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Pesan</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="successModalLabel">Pesan Terkirim</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Pesan Anda berhasil terkirim.
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-dark text-light py-4">
      <div class="container text-center">
        <p>&copy; 2024 Arjulio. All rights reserved.</p>
      </div>
    </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
