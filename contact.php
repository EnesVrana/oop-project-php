<?php
require 'lib/functions.php';
?>
<?php
require 'layout/header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['message'])) {
        if ($_POST['message'] != '') {
            $newMessage = $_POST['message'];
        }

    $messages = get_messages();
    $newMessageArray = array(
        'id' => $_SESSION['id'],
        'firstName' => $_SESSION['firstName'],
        'lastName' => $_SESSION['lastName'],
        'message' => $newMessage,
    );
    $messages[] = $newMessageArray;
    save_messages($messages);
    }
}
?>



<?php
if (isset($_SESSION['role'])){
    if ($_SESSION != ''){ ?>


        <!DOCTYPE html>
        <html>
        <head>
            <link href="css/contact.css" rel="stylesheet">
            <link href="js/contact.js" rel="stylesheet">
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        </head>
        <body>


        <div class="container content">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div style="background: #9acfea; padding: 3%; padding-bottom: 5%">
                            <form action="contact.php" method="POST">
                                <div class="msj-rta macro">
                                    <div class="text text-r" style="background:whitesmoke !important">
                                        <input class="mytext" name="message" placeholder="Type a message"/>
                                    </div>

                                </div>
                                <div style="padding:12px;">
                                    <button type="submit" class="btn btn-primary"> Send</button>
                                </div>
                            </form>
                        </div>
                        <br>


                                <?php
                                $messages = array_reverse(get_messages());

                                foreach ($messages as $message){
                                ?>
                                    <div class="card-body height3">
                                        <ul class="chat-list">
                                            <?php
                                            if ($message['id'] == $_SESSION['id']){ ?>
                                                <li class="in">
                                            <?php
                                            }
                                            else{ ?>
                                                <li class="out">
                                            <?php
                                            }
                                            ?>
                                                <div class="chat-body">
                                                    <div class="chat-message">
                                                        <h5>
                                                            <?php echo $message['firstName']." ".$message['lastName'] ?>
                                                        </h5>
                                                        <p><?php echo $message['message'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
<!--                                <li class="out">-->
<!--                                    <div class="chat-body">-->
<!--                                        <div class="chat-message">-->
<!--                                            <h5>Jimmy Willams</h5>-->
<!--                                            <p>Raw denim heard of them tofu master cleanse</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </li>-->



                            </ul>
                                       <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>















            </>

        </div>
        </body>
        </html>






    <?php

    }

}
else{


?>
<h1 class="div">
    Log In to access Contact Mode!
</h1>

<?php
}

require 'layout/footer.php'; ?>
