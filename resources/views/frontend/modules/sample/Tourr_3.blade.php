@php
    $module = \App\Models\CMS\Module::getByID(__ID__);
@endphp

<section class="module-{{ $module->id }}">
    <h2 style="display: none">Add template section module below here</h2>
</section>