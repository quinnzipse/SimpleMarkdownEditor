<script>
    function applyStyle() {
        $('div p, ul').each(function () {
            $(this).addClass('text-light');
        });
        $('div a').each(function () {
            $(this).addClass('text-info');
        });
        $('div h1,h2,h3,h4,h5,h6').each(function () {
            $(this).addClass('text-white');
        });
        $('strong, em').each(function () {
            $(this).addClass('text-white');
        });
        $('hr').each(function () {
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
        .printable * {
            color: initial;
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
                          style="border: none; height: 100%; font-size: 1.1rem"><?php echo _MESSAGE ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="card p-3" style="height: 91vh">
                <div id="after" style="height: 100%; overflow-y: auto; font-size: 1.1rem;"></div>
            </div>
        </div>
    </div>
</div>
<div class="printable" style="display: none" id="print">
</div>