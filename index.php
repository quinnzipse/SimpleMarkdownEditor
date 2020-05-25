<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php
    if (isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == "true") {
        echo '<link href="bootstrap.min.css" rel="stylesheet">';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <meta name="description"
          content="Easy to use, simplistic online markdown editor with little overhead (and dark mode).">
    <meta name="keywords" content="Markdown, Parsedown, parsedown-extra, Free, Fast, Open Source, quinn zipse">
    <meta charset="UTF-8">
    <meta name="author" content="Quinn Zipse">
    <title>Markdown Editor</title>
    <script type="text/javascript">
        $(document).ready(function () {

            <?php
            if (!isset($_COOKIE['dark_theme'])) {
                echo "if(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) 
                {setDarkCookie(true); window.location = 'https://markdown.quinnzipse.dev';}";
            }
            ?>

            $('#before').change(function () {
                submit();
            });
            submit();
        });

        function submit() {
            let data = $('#before').val();
            $.ajax({
                async: true,
                method: 'post',
                url: './api.php',
                data: {
                    content: data
                }
            }).done(function (res) {
                $("#after, #print").html(res);
                <?php if (isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true') echo 'applyStyle()';?>
            });
        }

        function setDarkCookie(d) {
            document.cookie = "dark_theme = " + d + "; expires=Thu, 18 Dec 2037 12:00:00 UTC";
        }
    </script>
    <style>
        @media print {
            .noPrint {
                display: none;
            }

            .printable {
                display: block !important;
            }
        }

        h1 {
            margin-bottom: 2%;
        }

        nav {
            padding-bottom: .3% !important;
            padding-top: .3% !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark noPrint">
    <a class="navbar-brand" href="#">Markdown Editor</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                if (isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true') {
                    echo '<a href="https://markdown.quinnzipse.dev/" class="nav-link btn btn-outline-dark  mr-3"
                   onclick="setDarkCookie(false)">
                    <svg class="bi bi-brightness-high-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <circle cx="8" cy="8" r="4"/>
  <path fill-rule="evenodd" d="M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
</svg>
                    <small>Switch to Light Mode</small>
                </a>';
                } else {
                    echo '<a href="https://markdown.quinnzipse.dev/" class="nav-link btn btn-outline-dark  mr-3"
                   onclick="setDarkCookie(true)">
                    <svg class="bi bi-moon mb-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"/>
                    </svg>
                    <small>Switch to Dark Mode</small>
                </a>';
                }
                ?>

            </li>
            <li class="nav-item">
                <a href="https://quinnzipse.dev" class="nav-link btn btn btn-outline-dark">quinnzipse.dev
                    <svg class="mr-1 ml-1 bi bi-box-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                        <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                        <path fill-rule="evenodd"
                              d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php
if (isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true') {
    require 'parser.php';
} else {
    require 'parser_light.php';
}
?>
<?php echo get_browser(); ?>
</body>
</html>