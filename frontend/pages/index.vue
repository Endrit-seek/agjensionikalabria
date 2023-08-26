<template>
  <div>
    <v-carousel :hide-delimiters="mdAndUp ? false : true" cycle :height="mdAndUp ? '700' : '300'" show-arrows="hover" hide-delimiter-background>
      <template #prev="{ props }">
        <v-btn class="ma-2" variant="text" icon="mdi-chevron-left" @click="props.onClick" />
      </template>
      <template #next="{ props }">
        <v-btn class="ma-2" variant="text" icon="mdi-chevron-right" @click="props.onClick" />
      </template>
      <v-carousel-item v-for="(slide, i) in slides" :key="i" :src="slide.src" cover />
    </v-carousel>
    <v-sheet :style="mdAndUp ? 'margin: 0% 15% 0% 15%; padding: 0% 1% 0% 1%' : ''">
      <v-timeline truncate-line="end">
        <v-timeline-item :size="mdAndUp ? 'x-small' : ''" v-for="(item, i) in items" :key="i">
          <template #opposite>
            <v-img :src="item.image" />
          </template>
          <div>
            <p class="text-h6" v-text="item.label" />
            <p v-text="item.description" />
          </div>
        </v-timeline-item>
      </v-timeline>
    </v-sheet>
  </div>
</template>

<script setup>
  import { useDisplay } from 'vuetify'

  const { mdAndUp } = useDisplay()
  const auth = useAuthStore()
  const products = useProductStore()
  const cities = useCityStore()
  const config = useRuntimeConfig()

  onMounted(async () => {
    await auth.fetchUser()
    await products.fetchProducts()
    await cities.fetchCities()
  });

  const slides = [
    {
      src: '/img/C1.jpg',
    },
    {
      src: '/img/C2.jpg',
    },
    {
      src: '/img/C3.jpg',
    },
    {
      src: '/img/C4.jpg',
    },
    {
      src: '/img/C5.jpg',
    },
  ];

  const items = ref([
    {
      label: 'Banese',
      image: '/img/P1.jpg',
      description: 'Banese ne shitje',
    },
    {
      label: 'Shpi',
      image: '/img/P2.jpg',
      description: 'Shpi ne shitje',
    },
    {
      label: 'Lokal',
      image: '/img/P3.jpg',
      description: 'Lokal ne shitje',
    },
    {
      label: 'Toke',
      image: '/img/P4.jpg',
      description: 'Toke ne shitje',
    },
    {
      label: 'Prone',
      image: '/img/P5.jpg',
      description: 'Prone ne shitje',
    },
  ]);
</script>

<style>
.v-img__img {
  position: relative !important;
}
</style>
