<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
