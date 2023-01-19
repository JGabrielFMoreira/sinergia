<template>

    <Link :href="'/'">
        <img src="/images/Equatorial-logo.svg.png" alt="" style="width:200px;">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
