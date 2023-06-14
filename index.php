<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <style>
        body{
            Background-image: url("https://static.neweuropetours.eu/wp-content/uploads/2018/08/best-restaurants-1600x900.jpg");
            Background-repeat:no-repeat;
            Background-size:cover;
            Background-position:center;
            Background-attachment:fixed;
            
        }

        body:before{
            width: 100%;
            height: 100vh;
            Background:linear-gradient(130deg,·509fc9,·e83b59);
            opacity:0.7;
        }
    </style>
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">
       <img 
       src="img/fondoLog.pgj"
        whidth="200px"
        height="200px"
        alt=""
        >
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem"
    >
      <div class="d-flex justify-content-center">
        <img
          src="img/login.ico"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <div class="text-center fs-2 fw-bold">Bienvenido Usuario</div>
      <div class="input-group mt-4">
        <div class="input-group-text ">
          <img
            src="img/logUsu.ico"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          name="email"
          class="form-control bg-light"
          type="text"
          placeholder="Email"
        />
      </div>
      <div class="input-group mt-2">
        <div class="input-group-text ">
          <img
            src="img/passUsu.ico"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <input
          name="password"
          class="form-control bg-light"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-1" style="font-size: 0.9rem">Acuérdate de mí</div>
        </div>
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-info fw-semibold fst-italic"
            style="font-size: 0.9rem"
            >¿Olvidaste tu contraseña?</a
          >
        </div>
      </div>
      <div class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
        Login
      </div>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>¿No tienes una cuenta?</div>
        <a href="#" class="text-decoration-none text-info fw-semibold"
          >Register</a
        >
        </div>
    </div>
  </body>
</html>