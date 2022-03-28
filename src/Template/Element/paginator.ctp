<div class="row justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('')) ?>
            <?= $this->Paginator->prev('<' . __('')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('') . ' >') ?>
            <?= $this->Paginator->last(__('') . ' >>') ?>
        </ul>
    </nav>
</div>