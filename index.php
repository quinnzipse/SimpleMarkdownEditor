<?php const _MESSAGE = "# Simple Markdown Editor\n---\nSimple and straight-forward markdown editor created using " .
    "a simplistic front-end and [parsedown-extra](https://parsedown.org) in the back-end.\n\n" .
    "Created just for fun by [Quinn Zipse](https://quinnzipse.dev). Check me out on [GitHub]" .
    "(https://github.com/quinnzipse)!\n" .
    "### Technologies {.mt-4}\n---\n- **Bootstrap** for fast and easy styling\n" .
    "- **jQuery** to make ajax requests\n- **PHP** for the server side script\n" .
    "- **parsedown-extra** to parse the markdown content.\n\n" .
    "### Getting Started {.mt-4}\n---\nIt's as easy as typing in the textbox to the left. " .
    "When you're ready for it to parse the content, unfocus on the textbox and *poof*, perfect.\n\n" .
    "For more helpful tips on styling check out [Markdown Guide](https://www.markdownguide.org/)\n\n" .
    "### What's New {.mt-4}\n---\n\n- **Printing!** Now, you'll only see the resulting HTML!\n" .
    "- **Dark Mode:** because let's be honest, no one wants to look at a white background these days\n" .
    "- **Meta Data,** to make the links look more appetizing.\n\n" .
    "### Coming *Soon* {.mt-4}\n---\n\n- **Remembering Data!** So when you switch between themes you don't " .
    "loose your progress.\n- **Cookie Banner!** This website uses cookies to remember what theme you " .
    "prefer. So, we should probably include a cookie acceptance banner to comply with the [Cookie Law]" .
    "(https://www.cookielaw.org/the-cookie-law/)." ?>
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
    <meta name="description" content="Easy to use, fast markdown parser with little overhead.">
    <meta name="keywords" content="Markdown, Parsedown, parsedown-extra, Free, Fast, Open Source, quinn zipse">
    <meta charset="UTF-8">
    <meta name="author" content="Quinn Zipse">
    <title>Markdown Editor</title>
    <script type="text/javascript">
        $(document).ready(function () {
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
                <?php if (isset($_COOKIE['dark_theme']) && $_COOKIE == 'true') echo 'applyStyle()';?>
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
                    <svg class="bi bi-sun" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M3.5 8a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0z"/>
  <path fill-rule="evenodd" d="M8.202.28a.25.25 0 0 0-.404 0l-.91 1.255a.25.25 0 0 1-.334.067L5.232.79a.25.25 0 0 0-.374.155l-.36 1.508a.25.25 0 0 1-.282.19l-1.532-.245a.25.25 0 0 0-.286.286l.244 1.532a.25.25 0 0 1-.189.282l-1.509.36a.25.25 0 0 0-.154.374l.812 1.322a.25.25 0 0 1-.067.333l-1.256.91a.25.25 0 0 0 0 .405l1.256.91a.25.25 0 0 1 .067.334L.79 10.768a.25.25 0 0 0 .154.374l1.51.36a.25.25 0 0 1 .188.282l-.244 1.532a.25.25 0 0 0 .286.286l1.532-.244a.25.25 0 0 1 .282.189l.36 1.508a.25.25 0 0 0 .374.155l1.322-.812a.25.25 0 0 1 .333.067l.91 1.256a.25.25 0 0 0 .405 0l.91-1.256a.25.25 0 0 1 .334-.067l1.322.812a.25.25 0 0 0 .374-.155l.36-1.508a.25.25 0 0 1 .282-.19l1.532.245a.25.25 0 0 0 .286-.286l-.244-1.532a.25.25 0 0 1 .189-.282l1.508-.36a.25.25 0 0 0 .155-.374l-.812-1.322a.25.25 0 0 1 .067-.333l1.256-.91a.25.25 0 0 0 0-.405l-1.256-.91a.25.25 0 0 1-.067-.334l.812-1.322a.25.25 0 0 0-.155-.374l-1.508-.36a.25.25 0 0 1-.19-.282l.245-1.532a.25.25 0 0 0-.286-.286l-1.532.244a.25.25 0 0 1-.282-.189l-.36-1.508a.25.25 0 0 0-.374-.155l-1.322.812a.25.25 0 0 1-.333-.067L8.203.28zM8 2.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11z"/>
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
</body>
</html>