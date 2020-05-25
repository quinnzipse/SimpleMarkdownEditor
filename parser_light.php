<div class="container-fluid noPrint">
    <div class="row mt-3">
        <div class="col-6 pl-4">
            <div class="card p-2" style="height: 90vh;">
                <textarea id="before" style="border: none; height: 100%; font-size: 1.1rem"><?php $file = fopen('README.md', 'r');
                    echo fread($file, filesize('README.md'));
                    fclose($file);
                    ?></textarea>
            </div>
        </div>
        <div class="col-6 pr-4"> <!---->
            <div class="card pl-3 pr-2 pt-2 pb-2" style="height: 90vh">
                <div id="after" style="height: 100%; overflow-y: auto; font-size: 1.1rem;"></div>
            </div>
        </div>
    </div>
</div>
<div class="printable" style="display: none" id="print">
</div>