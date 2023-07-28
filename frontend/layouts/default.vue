<template>
  <v-app>
    <v-app-bar app color="black" height="100">
      <v-container>
        <v-row align="center">
          <v-app-bar-title>
            <v-img src="/img/logo.ico" height="80" width="80" @click="$router.push('/')" />
          </v-app-bar-title>
          <v-list color="black" style="color: black !important" class="d-flex align-center" rounded="shaped">
            <v-list-item v-for="(item, i) in menus" :key="i" color="black">
              <v-list-item-title>
                <NuxtLink :to="item.route">
                  <v-btn color="white">{{ item.title }}</v-btn>
                </NuxtLink>
              </v-list-item-title>
            </v-list-item>
          </v-list>
          <v-spacer></v-spacer>
          <v-btn variant="outlined" color="white">Kyqu</v-btn>
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
