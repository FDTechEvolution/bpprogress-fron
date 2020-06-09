<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div style="background: #F5F5F9;" class="pt-3" onclick="this.classList.add('hidden');">
    <div class="container" >

        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <div class="alert alert-danger" role="alert">
                    <?= $message ?>
                </div>
            </div>
        </div>
    </div>
</div>


