<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "header.html"
    ?>

    <?php
    include "body.html"
    ?>

         <form action="23include.php" method="post">
        <fieldset>
          <legend class="offscreen">Send Message</legend>
          <p>
            <label for="Name" class="contact__label">Name: </label>
            <input type="text" name="Name" id="name" placeholder="Your Name" autocomplete="on" class="contact__input" >
          </p>
          <p>
            <label for="message" class="contact__label">Your Message</label>
            <br>
            <textarea name="message" id="message" cols="70" rows="10" placeholder="Type your message here..." class="contact__textarea"></textarea>
          </p>
          <section class="contact__buttons">
          <p>
            <button type="submit" class="contact__button">Submit</button>
          </p>
          <p>
            <button type="submit" formaction="https://httpbin.org/post" formmethod="post" class="contact__button">Post</button>
          </p>
          <p>
            <button type="reset" class="contact__button">Reset</button>
          </p>
          </section>
        </fieldset>
    </form>
        <br>
        Your name is <?php echo $_POST["Name"]?>
        <br>
        Your message is <?php echo $_POST["message"]?>
    
    <?php
    include "footer.html"
    ?>
</body>
</html>