<script>
    function applyStyle() {
        $('#after p, ul').each(function () {
            $(this).addClass('text-light');
        });
        $('#after a').each(function () {
            $(this).addClass('text-info');
        });
        $('#after h1,h2,h3,h4,h5,h6').each(function () {
            $(this).addClass('text-white mt-4');
        });
        $('#after trong, em').each(function () {
            $(this).addClass('text-white');
        });
        $('#after hr').each(function () {
            $(this).addClass('bg-light');
        });
    }
</script>
<style>
    nav {
        padding-bottom: .5% !important;
        padding-top: .5% !important;
    }

    @media print {
        .printable {
            background-color: white;
        }

        .printable h1, h2, h3, h4, h5, h6 {
            color: black;
        }

        .printable a {
            color: -webkit-link;
        }
    }
</style>
<div class="container-fluid noPrint">
    <div class="row mt-3">
        <div class="col-6">
            <div class="card p-2" style="height: 91vh;">
                <textarea id="before" class="bg-dark text-white p-2" onfocus=""
                          style="border: none; height: 100%; font-size: 1.1rem"><?php $file = fopen('README.md', 'r');
                    echo fread($file, filesize('README.md'));
                    fclose($file);
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
<div class="printable vh-100" style="display: none; background-color: white !important; color: black !important;"
     id="print">
</div>