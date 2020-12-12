<template>
  <div class="bg-grey-1 full-height q-px-md q-py-lg">
    <div class="q-subheading q-mb-sm">Produkty</div>
    <q-list link class="no-border">
      <q-item class="q-body-1" to="/products/index">
        <q-item-main>Zobraziť produkty</q-item-main>
      </q-item>
      <q-item class="q-body-1" to="/products/create">
        <q-item-main>Vytvoriť produkt</q-item-main>
      </q-item>
    </q-list>
  </div>
</template>

<script>
export default {
  name: 'Drawer', // .vue
};
</script>

<style scoped>

</style>
