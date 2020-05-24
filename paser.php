<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>Markdown Editor</title>
    <script>
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
                $("#after").html(res);
            });
        }

    </script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="https://quinnzipse.dev">Markdown Editor</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="https://quinnzipse.dev" class="nav-link">quinnzipse.dev <svg class="mr-1 ml-1 bi bi-box-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                    <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                    <path fill-rule="evenodd" d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/>
                </svg> </a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-6">
            <div class="card p-3" style="height: 91vh;">
                <textarea id="before" style="border: none; height: 100%; font-size: 1.1rem"><?php echo
                        "# Simple Markdown Editor\n---\nSimple and straight-forward markdown editor created using " .
                        "a simplistic front-end and [parsedown-extra](https://parsedown.org) in the back-end.\n\n" .
                        "Created just for fun by [Quinn Zipse](https://quinnzipse.dev).\n" .
                        "#### Technologies {.mt-4}\n---\n- **Bootstrap** for fast and easy styling\n" .
                        "- **jQuery** to make ajax requests\n- **PHP** for the server side script\n" .
                        "- **parsedown-extra** to parse the markdown content.\n\n" .
                        "###Getting Started {.mt-4}\n---\nIt's as easy as typing in the textbox to the left. " .
                        "When you're ready for it to parse the content, unfocus on the textbox and *poof*, perfect.\n\n" .
                        "For more helpful tips on styling check out [Markdown Guide](https://www.markdownguide.org/)"
                    ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="card p-3" style="height: 91vh">
                <div id="after" style="height: 100%; overflow-y: auto; font-size: 1.1rem;"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>