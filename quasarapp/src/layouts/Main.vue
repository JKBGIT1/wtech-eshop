<template>
  <q-layout>

    <q-layout-header>
      <q-toolbar>
        <q-btn flat round dense icon="menu" @click="left = !left" class="q-mr-md"/>
        <q-toolbar-title>
          ADMIN<span @click="print" slot="subtitle">Furniture e-shop</span>
        </q-toolbar-title>
      </q-toolbar>
    </q-layout-header>

    <q-layout-drawer v-model="left" side="left">
      <main-layout-drawer></main-layout-drawer>
    </q-layout-drawer>

    <q-page-container>
      <div class="row full-width justify-center">
        <router-view class="c-container"/>
        <q-ajax-bar />
      </div>
    </q-page-container>

    <q-layout-footer>
      <div class="text-center q-pa-md">Copyright (C) 2020, Adam & Jakub</div>
    </q-layout-footer>
  </q-layout>
</template>

<script>
import MainLayoutDrawer from 'components/layouts/Main/Drawer';

export default {
  components: {
    MainLayoutDrawer,
  },
  computed: {
    left: {
      get() { return this.$store.state.moduleUI.layout.drawerState; },
      set(val) { return this.$store.commit('moduleUI/updateDrawerState', val); },
    },
  },
  methods: {
    print() {
      console.log(this.$store.commit);
    },
  },
};
</script>

<style scoped>

</style>
