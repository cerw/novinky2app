<script>
// import Layout from './Layout'
import Layout from "@/layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

export default {
    // Using shorthand syntax...
    name: "Show.index",
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
        <title>Shows</title>
    </Head>
    <Layout>
        <q-page class="column flex-center"> Shows {{ shows.length }}
            <!-- list shows in quasar way -->
            <q-list>
                <q-item
                    v-for="show in shows"
                    :key="show.id"
                    clickable
                >
                    <q-item-section avatar>
                        <q-icon name="music_note" />
                    </q-item-section>

                    <q-item-section>
                        <q-item-label>
                            {{ show.date }}  {{ show.title }}
                        </q-item-label>
                        <q-item-label caption>{{ show.description }}</q-item-label>
                    </q-item-section>
                </q-item>
            </q-list>
        </q-page>
    </Layout>
</template>
