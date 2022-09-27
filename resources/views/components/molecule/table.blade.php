<div {!! $attributes->merge(['class' => 'mb-4 overflow-x-auto overflow-y-visible shadow overflow-hidden border-b border-gray-200 sm:rounded-lg']) !!}>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            {{ $header }}
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            {{ $body }}
        </tbody>
    </table>
</div>