<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/styles.css">
  <script>
    let exports = {};
  </script>
  <script src="script/main.js" defer></script>
  <title>fourty eighty exa</title>
</head>

<body>

  <main>
    <h1 class="display-4 type-effect">Give me all of your money</h1>

    <div id="donate-button-container">
      <div id="donate-button"></div>
      <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
      <script>
        PayPal.Donation.Button({
          env: 'production',
          hosted_button_id: '7EU8EX4M8D322',
          image: {
            src: 'https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif',
            alt: 'Donate with PayPal button',
            title: 'PayPal - The safer, easier way to pay online!',
          }
        }).render('#donate-button');
      </script>
    </div>

    <p class="lead beg">Please give me all of your money. I need it more than you do.</p>

    <h2 class="display-5 spacer">Leave a message!</h2>

    <div class="container text-center">
      <form class="form-inline justify-content-center">
        <div class="row justify-content-center">
          <input class="col-4 mx-1 rounded" placeholder="Message"></input>
          <input class="col-2 mx-1 rounded" placeholder="Name"></input>
        </div>
        <button type="submit" class="btn btn-outline-light my-2">Send</button>
      </form>
    </div>
  </main>

  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-4">
        <div class="card text-center d-flex align-items-center justify-content-center">
          <div class="card-body">
            <ul>
              <li>"</li>
              <li class="card-title font-italic" id="userMessage">Hello bro.</li>
              <li>"</li><br>
              <li class="card-title" id="userName">mr bro</li><br>
              <li class="card-title opacity-50 font-italic" id="userDate">2024 - 01 - 01</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-2 mx-1 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">© <span id="date"><?php echo date("Y") ?></span> • 48exa</p>
  </footer>
</body>

</html>