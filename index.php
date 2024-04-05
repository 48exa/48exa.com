<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php require_once('boilerplate/header.php'); ?>

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
    <form class="form-inline justify-content-center needs-validation" action="api/send_message.php" method="POST" novalidate>
      <div class="row justify-content-center">
        <input type="text" maxlength="50" class="col-4 mx-1 rounded py-1" placeholder="Message" name="msg" id="msg" required></input>
        <input type="text" maxlength="15" class="col-2 mx-1 rounded py-1" placeholder="Name" name="username" id="username" required></input>
      </div>
      <button type="submit" value="Submit" class="btn btn-outline-light my-3">Send</button>
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
            <li class="card-title font-italic" id="userMessage">Messages will show up here</li>
            <li>"</li><br>
            <li class="card-title" id="userName">The Lord</li><br>
            <li class="card-title opacity-50 font-italic" id="userDate">The Epoch</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once('boilerplate/footer.php'); ?>

</html>