<?php
    $pdo = new PDO(
        'mysql:dbname=cbp_discuss;host=localhost;charset=utf8', // connection information
        'root', // username
        '' // password
    );

    if(isset($_POST['submit'])){
        $query = "INSERT INTO `messages` (`name`, `message`, `created_at`) VALUE (?, ?, ?)";

        $statement = $pdo->prepare($query);
        $statement->execute([$_POST['name'], $_POST['message'], date("Y-m-d H:i:s")]);
    }

    $query = "SELECT * FROM `messages`";

    $statement = $pdo->prepare($query);
    $statement->execute([]);
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $messages = $statement->fetchAll();
    
?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        @media (min-width: 768px) {
            .container {
                max-width: 640px;
            }
        }

        #disc-wrapper {
            position: relative;
            margin: 1rem -15px 0;
        }

        #disc-form {
            padding: 1.5rem;
            border: solid #d3d3dd;
            border-width: .2rem .2rem 0 .2rem;
        }

        #disc-messages {
            clear: both;
            padding: 1.5rem;
            border: solid #d3d3dd;
        }

        #disc-messages .disc-message {
            border: solid #d3d3dd;
            border-width: 0 .2rem 0 .2rem;

            margin: .4rem 0;
        }

        #disc-messages .disc-message .disc-header {
            background: #d3d3dd;
            font-size: 120%;
            font-weight: 500;
            padding: .2rem .6rem;
            color: #666;
        }

        #disc-messages .disc-message .disc-body {
            border-width: 0 .2rem 0 .2rem;

            padding: .2rem .6rem;
        }

        #disc-messages .disc-message .disc-footer {
            background: #d3d3dd;
            text-align: right;
            font-size: 60%;
            padding: .1rem .6rem;
            color: #666;
        }


    </style>
</head>
<body>
<div class="container">


    <div id="disc-wrapper">
        <h1 class="text-center">Discussion</h1>

        <h2>  &lt; codingBootcamp/ &gt;  </h2>
        <form id="disc-form" method="post">
            <div class="form-group">
                <label class="d-none" for="form-name">Name</label>
                <input name="name" type="text" class="form-control" id="form-name" placeholder="Your name">
            </div>
            <div class="form-group">
                <label class="d-none" for="form-message">Messge</label>
                <textarea name="message" class="form-control" id="form-message" placeholder="Your message..."></textarea>
            </div>
            <div class="text-right">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        <div id="disc-messages">

            <?php if(count($messages) > 0): ?>

                <?php foreach($messages as $message): ?>

                    <!--  FETCH_OBJ-->
                    <div class="disc-message">
                        <div class="disc-header"><?php echo htmlspecialchars($message->name); ?></div>
                        <div class="disc-body"><?php echo htmlspecialchars($message->message); ?></div>
                        <div class="disc-footer"><?php echo htmlspecialchars($message->created_at); ?></div>
                    </div>

                    <!--   FETCH_ASSOC-->
<!--                        FETCH_ARRAY-->


<!--                        ['a','b','c'] //array-->
<!--                        [0=>'a', 1=>'b', 2=>'c'] //assoc-->
<!--                -->
<!--                        ['a','c']-->
<!--                        [0=>'a', 2=>'c'] //assoc-->

<!--                        $message['name_of_column']-->

                    <div class="disc-message">
                        <div class="disc-header"><?php echo htmlspecialchars($message['name']); ?></div>
                        <div class="disc-body"><?php echo htmlspecialchars($message['message']); ?></div>
                        <div class="disc-footer"><?php echo htmlspecialchars($message['created_at']); ?></div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p class="text-center">No messages yet :(</p>
            <?php endif; ?>

        </div>


    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>