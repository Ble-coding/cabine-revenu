<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-400 text-sm font-medium leading-5 text-white focus:outline-none focus:border-green-700 transition duration-150 ease-in-out'
                            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-white-700 hover:border-white-300 focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out'
            }
        }
    }
</script>
