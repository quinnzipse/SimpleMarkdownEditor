<div class="container-fluid noPrint">
    <div class="row mt-3">
        <div class="col-6">
            <div class="card p-3" style="height: 91vh;">
                <textarea id="before" style="border: none; height: 100%; font-size: 1.1rem"><?php $file = fopen('README.md', 'r');
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
<div class="printable" style="display: none" id="print">
</div>