<script>
    function applyStyle() {
        $('#after p, ul').each(function () {
            $(this).addClass('text-light');
        });
        $('#after a').each(function () {
            $(this).addClass('text-info');
        });
        $('#after h2,h3,h4,h5,h6').each(function () {
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
        <div class="col-6 pl-4">
            <div class="card p-2" style="height: 90vh;">
                <textarea id="before" class="bg-dark text-white p-2" onfocus=""
                          style="border: none; height: 100%; font-size: 1.1rem"><?php $file = fopen('README.md', 'r');
                    echo fread($file, filesize('README.md'));
                    fclose($file);
                    ?></textarea>
            </div>
        </div>
        <div class="col-6 pr-4">
            <div class="card pl-3 pr-2 pt-2 pb-2" style="height: 90vh">
                <div id="after" style="height: 100%; overflow-y: auto; font-size: 1.1rem;"></div>
            </div>
        </div>
    </div>
</div>
<div class="printable vh-100" style="display: none; background-color: white !important; color: black !important;"
     id="print">
</div>