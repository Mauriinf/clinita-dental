<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sonri-Dent - Somos el Mejor Servicio Dental</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./landing/assets/css/style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!--
    - #HEADER
  -->

  <header class="header">

    <div class="header-top">
      <div class="container">

        <ul class="contact-list">

          <li class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>

            <a href="mailto:info@example.com" class="contact-link">info@example.com</a>
          </li>

          <li class="contact-item">
            <ion-icon name="call-outline"></ion-icon>

            <a href="tel:+917052101786" class="contact-link">+591-7777777</a>
          </li>

        </ul>

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

    <div class="header-bottom" data-header>
      <div class="container">

        <a href="#" class="logo">Sonri-Dent.</a>

        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>Principal</a>
            </li>

            <li>
              <a href="#service" class="navbar-link" data-nav-link>Servicios</a>
            </li>

            <li>
              <a href="#about" class="navbar-link" data-nav-link>Sobre Nosotros</a>
            </li>

            <li>
              <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>Cantacto</a>
            </li>

          </ul>
        </nav>

        <a href="{{ route('login') }}" class="btn">Inicio de Sesión</a>

        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <ion-icon name="menu-sharp" aria-hidden="true" class="menu-icon"></ion-icon>
          <ion-icon name="close-sharp" aria-hidden="true" class="close-icon"></ion-icon>
        </button>

      </div>
    </div>

  </header>





  <main>
    <article>

      <!--
        - #HERO
      -->

      <section class="section hero" id="home" style="background-image: url('./landing/assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Bienvenido a Sonri-Dent</p>

            <h1 class="h1 hero-title">El mejor servicio dental</h1>

            <p class="hero-text">
                SonriDent es un sitio de confianza que ofrece la más alta calidad en servicios integrales de odontología.
            </p>

            {{-- <form action="" class="hero-form">
              <input type="email" name="email_address" aria-label="email" placeholder="Your Email Address..." required
                class="email-field">

              <button type="submit" class="btn">Get Call Back</button>
            </form> --}}

          </div>

          <figure class="hero-banner">
            <img src="./landing/assets/images/doctor.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!--
        - #SERVICE
      -->

      <section class="section service" id="service" aria-label="service">
        <div class="container">

          <p class="section-subtitle text-center">Nuestros servicios</p>

          <h2 class="h2 section-title text-center">Lo que proporcionamos</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/endodoncia.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Endodoncia o tratamiento de conducto</h3>

                  <p class="card-text">
                    Consiste en la extirpación del paquete vásculo-nervioso que se encuentra en el interior del diente y que es el causante del dolor, limpiando el interior del diente y dejándolo libre de infección
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/blanqueamiento.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Blanqueamiento Dental</h3>

                  <p class="card-text">
                    Es un tratamiento dental estético, que logra reducir varios tonos el color original de las piezas dentales, dejando los dientes más blancos y brillantes.
                    Implantes y Cirugía bucal.
                    Un implante es un tornillo de titanio integrado en el hueso y sustituye al diente natural. Trabajamos con las más altas calidades del mercado.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/service-icon-3.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Dientes Cosméticos</h3>

                  <p class="card-text">
                    Aenean eleifend turpis tellus, nec laoreet metus elementum ac.
                  </p>
                </div>

              </div>
            </li>

            <li class="service-banner">
              <figure>
                <img src="./landing/assets/images/service-banner.png" width="409" height="467" loading="lazy"
                  alt="service banner" class="w-100">
              </figure>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/service-icon-4.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Higiene Bocal</h3>

                  <p class="card-text">
                    Aenean eleifend turpis tellus, nec laoreet metus elementum ac.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/service-icon-5.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">  Aviso en vivo</h3>

                  <p class="card-text">
                    Aenean eleifend turpis tellus, nec laoreet metus elementum ac.
                  </p>
                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./landing/assets/images/service-icon-6.png" width="100" height="100" loading="lazy"
                    alt="service icon" class="w-100">
                </div>

                <div>
                  <h3 class="h3 card-title">Inspección de cavidades</h3>

                  <p class="card-text">
                    Aenean eleifend turpis tellus, nec laoreet metus elementum ac.
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!--
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./landing/assets/images/about-banner.png" width="470" height="538" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">Sobre Nosotros</p>

            <h2 class="h2 section-title">Cuidamos de su salud dental</h2>

            <p class="section-text section-text-1">
                SonriDent está conformado por un grupo profesionales especializados al cuidado de tu salud bucal…

                SonriDent es un sitio de confianza que ofrece la más alta calidad en servicios integrales de odontología.



            </p>

            <p class="section-text">
                Contamos con todas las especialidades en el ámbito dental, utilizando las últimas tecnologías.
            </p>

            {{-- <a href="#" class="btn">Leer mas..</a> --}}

          </div>

        </div>
      </section>





      <!--
        - #DOCTOR
      -->

      <section class="section doctor" aria-label="doctor">
        <div class="container">

          <p class="section-subtitle text-center">Nuestros Doctores</p>

          <h2 class="h2 section-title text-center">Mejor dentista experto</h2>

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
              <div class="doctor-card">

                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./landing/assets/images/doctor-1.png" width="460" height="500" loading="lazy" alt="Howard Holmes"
                    class="img-cover">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Howard Holmes</a>
                </h3>

                <p class="card-subtitle">Dentista</p>

                <ul class="card-social-list">

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>

                </ul>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="doctor-card">

                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./landing/assets/images/doctor-2.png" width="460" height="500" loading="lazy" alt="Ella Thompson"
                    class="img-cover">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Ella Thompson</a>
                </h3>

                <p class="card-subtitle">Dentista</p>

                <ul class="card-social-list">

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>

                </ul>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="doctor-card">

                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./landing/assets/images/doctor-3.png" width="460" height="500" loading="lazy" alt="Vincent Cooper"
                    class="img-cover">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Vincent Cooper</a>
                </h3>

                <p class="card-subtitle">Dentista</p>

                <ul class="card-social-list">

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>

                </ul>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="doctor-card">

                <div class="card-banner img-holder" style="--width: 460; --height: 500;">
                  <img src="./landing/assets/images/doctor-4.png" width="460" height="500" loading="lazy" alt="Danielle Bryant"
                    class="img-cover">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Danielle Bryant</a>
                </h3>

                <p class="card-subtitle">Dentista</p>

                <ul class="card-social-list">

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="card-social-link">
                      <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                  </li>

                </ul>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!--
        - #CTA
      -->

      <section class="section cta" aria-label="cta">
        <div class="container">

          <figure class="cta-banner">
            <img src="./landing/assets/images/cta-banner.png" width="1056" height="1076" loading="lazy" alt="cta banner"
              class="w-100">
          </figure>

          <div class="cta-content">

            <p class="section-subtitle">Reservar cita detallada</p>

            <h2 class="h2 section-title">We Are open And Welcoming Patients</h2>

            <a href="#" class="btn">Reservar una cita</a>

          </div>

        </div>
      </section>





      <!--
        - #BLOG
      -->

      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">

          <p class="section-subtitle text-center">Nuestro Blog</p>

          <h2 class="h2 section-title text-center">Últimos Blogs y Noticias</h2>

          <ul class="blog-list">

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="./landing/assets/images/blog-1.jpg" width="1180" height="800" loading="lazy"
                    alt="Cras accumsan nulla nec lacus ultricies placerat." class="img-cover">

                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>

                    <time class="time" datetime="2022-03-24">24th Octubre 2022</time>
                  </div>
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">Mañana no habrá estratagema, ni se invertirá el lago.</a>
                  </h3>

                  <p class="card-text">
                    Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.
                  </p>

                  <a href="#" class="card-link">Leer mas...</a>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="./landing/assets/images/blog-2.jpg" width="1180" height="800" loading="lazy"
                    alt="Dras accumsan nulla nec lacus ultricies placerat." class="img-cover">

                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>

                    <time class="time" datetime="2022-03-24">24th Octubre 2022</time>
                  </div>
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">No hay capa de agua y no hay capa de agua..</a>
                  </h3>

                  <p class="card-text">
                    Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.
                  </p>

                  <a href="#" class="card-link">Leer mas..</a>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 1180; --height: 800;">
                  <img src="./landing/assets/images/blog-3.jpg" width="1180" height="800" loading="lazy"
                    alt="Seas accumsan nulla nec lacus ultricies placerat." class="img-cover">

                  <div class="card-badge">
                    <ion-icon name="calendar-outline"></ion-icon>

                    <time class="time" datetime="2022-03-24">24th Octubre 2022</time>
                  </div>
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title">Seas accumsan nulla nec lacus ultricies placerat.</a>
                  </h3>

                  <p class="card-text">
                    Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.
                  </p>

                  <a href="#" class="card-link">Leer mas..</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

    </article>
  </main>





  <!--
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">Sonti-Dent.</a>

          <p class="footer-text">
            Mauris non nisi semper, lacinia neque in, dapibus leo. Curabitur sagittis libero tincidunt tempor finibus.
            Mauris at
            dignissim ligula, nec tristique orci.Quisque vitae metus.
          </p>

          <div class="schedule">
            <div class="schedule-icon">
              <ion-icon name="time-outline"></ion-icon>
            </div>

            <span class="span">
              Lunes - Sabado:<br>
              9:00am - 10:00Pm
            </span>
          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Otros Enlaces</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Principal</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Sobre Nosotros</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Servicios</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Proyecto</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Nuestro Equipo</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Blog más reciente</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">
                Nuestros servicios</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Canal Raíz</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Alineación de Dientes</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Dientes Cosméticos</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Higiene Bocal</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Aviso en Vivo</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Inspección de Cavidades</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Cantactenos</p>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="item-text">
              No. 39,<br>
              Calle La Paz
            </address>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+917052101786" class="footer-link">+591-777777</a>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:help@example.com" class="footer-link">help@example.com</a>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022
          Todos los derechos reservados por Sonri-Dent.
        </p>

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!--
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
  </a>





  <!--
    - custom js link
  -->
  <script src="./landing/assets/js/script.js" defer></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
