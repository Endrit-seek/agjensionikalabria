<template>
  <v-app>
    <v-app-bar app color="black" height="100">
      <v-container>
        <v-row align="center">
          Faqja Admin
        </v-row>
      </v-container>
    </v-app-bar>
    <v-main>
      <slot />
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
const menus = [
  { title: 'Ballina', route: '/' },
  { title: 'Serviset', route: '/serviset' },
  { title: 'Kontakto', route: '/kontakto' },
];
</script>
