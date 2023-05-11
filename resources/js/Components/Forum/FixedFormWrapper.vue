<template>
    <form class="fixed bottom-0 w-full bg-white p-6 border-t-4 border-gray-100 space-y-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <slot name="header" />
            </div>

            <div class="mt-4">
                <slot name="main" />

                <div class="mt-4">
                    <slot name="button" />
                </div>
            </div>
        </div>
    </form>
</template>
