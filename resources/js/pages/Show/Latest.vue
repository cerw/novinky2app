<script>
// import Layout from './Layout'
import Layout from "@/layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

export default {
    // Using shorthand syntax...
    name: "Latest",
    components: {
        Layout,
        Head,
    },
    layout: Layout,
    props: {
        shows: Array,
    },
};
</script>

<template>
    <Head>
        <title>Latest</title>
    </Head>
    <Layout>
        <q-page class="column flex-center"> Latest </q-page>
    </Layout>
</template>
