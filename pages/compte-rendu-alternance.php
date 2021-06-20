<?php require_once "header.php"; ?>

<h2>Compte rendu Alternance</h2>
<br /><br /><br />

<div class="col-2"></div><div class="col-2"></div><div class="col-2"></div><div class="col-2"></div><div class="col-2"></div>
    <div class="col-8">
        <div class="progress">
        <div id="progress" class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>
<div class="col-2"></div>

<br /><br />

<script type="text/javascript">
    function countWords(id){
        var progress = document.getElementById('progress');
        var advance = 4000 / 85000 * 100;
        progress.setAttribute('style', 'width: '+advance+'%');
        progress.innerHTML = advance.toFixed(2)+' %';
        return content.length;
    }

    countWords('content');
</script>

<?php require_once "footer.php"; ?>

