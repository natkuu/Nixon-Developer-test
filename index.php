<?php
   session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nixon Developer Test</title>
        <link rel="stylesheet" type="text/css" href="./stylesheets/stylesheet.css">
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
                </script>
                <script>
                $(document).ready(function(){ //if the document is ready it does the following
                    $('#policy').hide(); //policy - default hidden
                    $("#policy_toggle").click(function(){ //on click, if the policy is visible it hides by sliding up
                        if ( $('#policy').is(':visible') ) {
                            $('#policy').slideUp()
                        }
                        else {
                            $("#policy").slideDown();//if policy is hidden, by clicking the link, the policy opends by sliding down
                        }
                    });

                    $('.img_slide img:gt(0)').hide(); //only the first image of the slideshow is visible

                    $('.right').click(function() { //on clicking right, the first image appends last, the second shows up
                        $('.img_slide img:first-child').fadeOut().appendTo('.img_slide');
                        $('.img_slide img:first-child').fadeIn();
                    });

                    $('.left').click(function() {//on clicking left, the first image appends last, the second shows up
                        $('.img_slide img:first-child').fadeOut();
                        $('.img_slide img:last-child').prependTo('.img_slide').fadeOut();
                        $('.img_slide img:first-child').fadeIn();
                    });

                    $("#contactform").submit(function(e) //on clicking submit
{
                    var postData = $(this).serializeArray();
                    var formURL = $(this).attr("action");
                    $.ajax(
                    {
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data, textStatus, jqXHR) //if the form is successfully submited
                        {
                            var data = $.parseJSON(data) //it parse return string into JSON
                            alert(data.name + ': success'); //prints out the success notification
                        },
                        error: function(jqXHR, textStatus, errorThrown) //if the form submition is unsuccessfull
                        {
                            alert(postData[0].value + ': failure');//prints out the failure message
                        }
                    });
                    e.preventDefault(); //stops the form from the default submitting
                });
                });
                </script>
            </head>
            <body>
                <div class="container">
                <h1><img src="./images/logo.jpg" alt="I can haz developer?"></h1>
                <div class="slideshow">
                    <div id="image_slideshow">
                        <div class="img_slide">
                            <img src="./images/synth-cat-placeholder-960x400.jpg" alt="Synth Cat">
                            <img src="./images/grumpy-cat-placeholder-960x400.jpg" alt="Grumpy Cat">
                            <img src="./images/nyan-cat-placeholder-960x400.jpg" alt="Nyan Cat">
                        </div>
                        <img src="./images/arrow_left.png" alt="Left arrow" class="left">
                        <img src="./images/arrow_right.png" alt="Right arrow" class="right">
                </div>
                </div>
                <div class="welcome">
                    <h2>Cupcake ipsum dolor sit amet jujubes. Lemon drops marshmallow gingerbread fruitcake macaroon applicake dessert. Toffee sweet roll jelly beans. Donut jujubes pastry lemon drops.</h2>
                </div>
                <div class="middle_column">
                    <h3>Kitteh ipsum</h3>
                <div class="middle_ipsum">
                    <p>Cupcake ipsum dolor sit amet bear claw oat cake candy canes jelly-o. Jelly beans tootsie roll halvah pastry. Sesame snaps toffee marzipan macaroon fruitcake cheesecake sweet brownie donut. Sesame snaps halvah tart cheesecake applicake. Caramels donut jelly-o powder marzipan danish pastry fruitcake chocolate cake. Unerdwear.com marshmallow tootsie roll topping. Pastry sweet roll biscuit muffin candy wafer pastry macaroon. Toffee cotton candy chocolate bar. Tiramisu sweet roll cheesecake soufflé sweet cheesecake jelly beans lollipop.</p>
                    <p>Croissant topping tart gummies jelly bear claw gummies. Chupa chups icing ice cream gummi bears. Gummies gingerbread marshmallow halvah bear claw powder. Cheesecake dragée jelly croissant. Marshmallow chocolate cake pudding candy canes jelly. Sugar plum liquorice unerdwear.com biscuit pie gummi bears oat cake tootsie roll. Tootsie roll marzipan chocolate bar chocolate cake sweet roll cupcake caramels oat cake. Gummi bears tiramisu croissant cupcake chocolate cake. Apple pie dragée soufflé gingerbread applicake sugar plum pudding. Apple pie muffin jelly-o croissant lollipop carrot cake gingerbread bear claw bear claw.</p>
                </div>
                    <div class="grumpy"><img alt="Grumpy cat" src="./images/grumpy-cat-placeholder-340x240.jpg"></div>
                </div>
                <div class="bottom_column">
                    <p>Cupcake ipsum dolor sit amet bear claw oat cake candy canes jelly-o. Jelly beans tootsie roll halvah pastry. Sesame snaps toffee marzipan macaroon fruitcake cheesecake sweet brownie donut. Sesame snaps halvah tart cheesecake applicake. Caramels donut jelly-o powder marzipan danish pastry fruitcake chocolate cake. Unerdwear.com marshmallow tootsie roll topping.</p>
                    <div class="form">
                        <form id="contactform" action="PHP/ajax.php" method="post">
                            <label for="name">name*</label><br />
                            <input value="<?php echo $_SESSION['name']; ?>" type="text" name="name" placeholder="Cras aliquam"><br />
                            <label for="email">email address*</label><br />
                            <input type="email" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Cras aliquam"><br />
                            <label for="address">address</label><br />
                            <textarea name="address" placeholder="Donec id eros eget Praesent vitae ligula Aliquam adipiscing"></textarea>
                            <p>* Indicates required field</p>
                            <input type="submit" value="submit form" />
                        </form>
                    </div>
                    <div>
                        <div id="policy_toggle">View our privacy policy</div>
                        <p id="policy">Sesame snaps halvah tart cheesecake applicake. Caramels donut jelly-o powder marzipan danish pastry fruitcake chocolate cake. Unerdwear.com marshmallow tootsie roll topping.</p>
                    </div>
                </div>
                <footer>
                    <div class="footer">
                        <h3>Contact kitteh</h3>
                        <address><span class="address_name">Grumpy Cat</span><br />
                        Sesame snaps, Halvah tart, <span class="footer_hid">cheesecake, TR27 4HH</span></address>
                        <p><img alt="envelope" src="../images/email.png"> E-mail <span class="det_footer"><a href="mailto:cupcake@nyancat.com">cupcake@nyancat.com</a></span></p>
                        <p><img alt="phone" src="../images/phone.png"> Telephone <span class="det_footer"> +44 (0)1736 758 600</span></p>
                        <p>Kitten Meow <span class="reg_add">(Registered Address) Foundry Square, Hayle, Cornwall,TR27 4HH</span></p>
                    </div>
                </footer>
                </div>
            </body>
        </html>
