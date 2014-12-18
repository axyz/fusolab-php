<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>guestbook</title>

        <style>
            .avatar {
            width: 100px;
            height: 100px;
            float: left;
            }

            .avatar img {
            max-width: 100%;
            }

            .message {
            padding: 5px;
            border: 1px solid #ccc;
            }

            .name {
            margin-bottom: -10px;
            }

            .text {
            margin-bottom: 21px;
            }

            .mail {
            color: #678;
            }
        </style>

    </head>

    <?php
    function antispam ($mail)
    {
        $name = explode("@", $mail)[0];
        $domain = explode("@", $mail)[1];
        $domain_name = explode(".", $domain)[0];
        $domain_extension = explode(".", $domain)[1];
        return $name . '[at]' . $domain_name . '[dot]' . $domain_extension;
    }

    function robohash ($str = false, $set = false)
    {
        $str = $str ?: rand(1, 10000);
        $set = $set ?: rand(1, 3);
        return "http://robohash.org/${str}?set=set${set}";
    }
    ?>

    <body>
        <form action="guestbook.php" method="post">
            <fieldset>
                <legend>Lascia un messaggio</legend>
                <label>Nome: <input type="text" name="name" /></label><br>
                <label>Email: <input type="email" name="mail" /></label></br>
                <input type="hidden" name="date" value="<?= date('d/m/Y - H:M') ?>"/>
                </label><br>
                Messaggio: <br><textarea name="msg" cols=30 rows=10></textarea><br>
                <input type="submit" />
            </fieldset>
        </form>

        <br><br>

        <?php
        if (isset($_POST['name']) &&
            isset($_POST['mail']) &&
            isset($_POST['msg'])) :
        ?>

            <div class="message">
                <div class="avatar">
                    <img src="<?= robohash($_POST['mail'], 1) ?>" />
                </div>
                <div class="post">
                    <h3 class="name"><?= $_POST['name'] ?></h3>
                    <p class="text"><?= $_POST['msg'] ?></p>
                    <span class="mail"><?= antispam($_POST['mail']) ?> - <?= $_POST['date'] ?></span>
                </div>
            </div>


        <?php endif; ?>

    </body>
</html>
