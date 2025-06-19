  <!DOCTYPE html>
  <html lang="it">

  <head>
      <title>{$titolo}</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <script src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
      </script>

      <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
      <link rel="stylesheet" href="css/custom.css">
  </head>

  <body>
      <div class="headerDiv">{$rooLink}</div>
      <div class='clearDiv'></div>
      <div class='menuDiv'>{$menu}</div>
      <div class='clearDiv'></div>
      <h1>{$titolo}</h1>
      <div>{$contenuto}</div>
  </body>

  </html>

<script src="js/custom.js"></script>