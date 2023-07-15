<template>
  <main>
    <h1>{{product.data.title}}</h1>
    <h2>{{product.data.city}}</h2>
  </main>
</template>

<script setup>
const props = defineProps({
});

const route = useRoute()
console.log(route.params.id)
const { show } = useProduct();
const product = await show(route.params.id);
</script>
