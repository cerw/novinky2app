<template>
    <q-layout view="lHh Lpr lFf">
        <q-header elevated>
            <q-toolbar>
                <q-btn
                    flat
                    dense
                    round
                    icon="menu"
                    aria-label="Menu"
                    @click="toggleLeftDrawer"
                />

                <q-toolbar-title>Novinky na alternativní scéně - Archive</q-toolbar-title>

                <!-- <div>Quasar v{{ $q.version }}</div> -->
                <q-toggle label="Dark Mode" v-model="darkMode" />
            </q-toolbar>
        </q-header>

        <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
            <q-list>
                <q-item-label header>Novinky 2</q-item-label>

                <q-item
                    clickable
                    @click="navigateTo(link.link)"
                    v-for="link in essentialLinks"
                    :key="link.title"
                >
                    <q-item-section v-if="link.icon" avatar>
                        <q-icon :name="link.icon" />
                    </q-item-section>

                    <q-item-section>
                        <q-item-label>
                            {{ link.title }}
                        </q-item-label>
                        <q-item-label caption>{{ link.caption }}</q-item-label>
                    </q-item-section>
                </q-item>
            </q-list>
        </q-drawer>

        <q-page-container>
            <slot />
        </q-page-container>
    </q-layout>
</template>

<script>
// import { defineComponent, ref, watch } from "vue";
import { Link } from "@inertiajs/vue3";
import { Dark } from "quasar";

export default {
    name: "MainLayout",

    components: {
        Link,
    },

    data() {
        return {
            darkMode: Dark.isActive,
            leftDrawerOpen: false,
            essentialLinks: [
                {
                    title: "Home",
                    icon: "home",
                    link: "/",
                },
                {
                    title: "Shows",
                    caption: "All shows",
                    icon: "music_note",
                    link: "/shows",
                },
                {
                    title: "Latest",
                    caption: "Lateset show added",
                    icon: "calendar_today",
                    link: "/latest",
                },
            ],
        };
    },

    watch: {
        darkMode(newValue) {
            Dark.set(newValue);
        },
    },

    methods: {
        navigateTo(url) {
            this.$inertia.visit(url);
        },
        toggleLeftDrawer() {
            this.leftDrawerOpen = !this.leftDrawerOpen;
        },
    },
};
</script>
