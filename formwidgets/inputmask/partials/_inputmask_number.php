<?php if($this->previewMode): ?>
    <div class="form-control" style="text-align: right;"><?= $value ?></div>
<?php else: ?>
    <input
        id="<?= $this->getId('input') ?>"
        type="text"
        class="form-control"
        name="<?= $name ?>"
        value="<?= $value ?>"
        <?php if($readOnly): ?>readonly<?php endif ?>
        <?php if($disabled): ?>disabled<?php endif ?>
        style="text-align: right;"
        <?= $this->formField->getAttributes() ?> /> 
    <script type="text/javascript">
        $(function() {
            $('#<?= $this->getId('input') ?>').mask('<?= $dataMask ?>', <?= $dataMaskOptions ?>);
        });
    </script>
<?php endif ?>