<?php if($this->previewMode): ?>
    <div class="form-control"><?= $value ?></div>
<?php else: ?>
    <input
        id="<?= $this->getId('input') ?>"
        type="text"
        class="form-control"
        name="<?= $name ?>"
        value="<?= $value ?>"
        <?php if($readOnly): ?>readonly<?php endif ?>
        <?php if($disabled): ?>disabled<?php endif ?>
        <?= $this->formField->getAttributes() ?> /> 
    <script type="text/javascript">
        $(function() {
            $('#<?= $this->getId('input') ?>').mask('<?= $dataMask ?>', <?= $dataMaskOptions ?>);
        });
    </script>
<?php endif ?>