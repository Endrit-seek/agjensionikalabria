<template>
  <v-app>
    <v-app-bar app color="black" height="100">
      <v-container>
        <v-row>
          <v-col v-if="!mdAndUp" class="d-flex justify-start align-center">
            <v-app-bar-nav-icon
              @click.stop="drawer = !drawer" 
              class="d-flex d-sm-none"
            />
          </v-col>
          <v-col cols="4" :class="mdAndUp ? 'd-flex justify-start align-start' : 'd-flex justify-end align-end'">
            <v-app-bar-title>
              <v-img src="/img/logo.ico" height="80" width="80" @click="$router.push('/')" />
            </v-app-bar-title>
          </v-col>
          <v-col v-if="mdAndUp" cols="8" class="d-flex justify-start align-center">
            <v-list color="black" style="color: black !important" class="d-flex justify-center align-center" rounded="shaped">
              <v-list-item v-for="(item, i) in menus" :key="i" color="black">
                <v-list-item-title>
                  <NuxtLink :to="item.route">
                    <v-btn color="white">{{ item.title }}</v-btn>
                  </NuxtLink>
                </v-list-item-title>
              </v-list-item>
            </v-list>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>
    <v-navigation-drawer
      v-model="drawer"
      location="bottom"
      temporary
      height="100"
    >
      <v-list class="align-center">
        <v-list-subheader class="d-flex justify-center align-center" title="Navigo tek faqet kryesore"></v-list-subheader>
        <v-list-item v-for="(item, i) in menus" :key="i" class="d-flex justify-center align-center">
          <v-row>
            <v-col>
              <NuxtLink :to="item.route">
                <v-btn variant="outlined" :prepend-icon="item.icon">
                  {{ item.title }}
                </v-btn>
              </NuxtLink>
            </v-col>
          </v-row>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main>
        <slot />
    </v-main>
  </v-app>
</template>

<script setup lang="ts">
  import { useDisplay } from 'vuetify'
  
  const drawer = ref<boolean>(false)
  const { mdAndUp } = useDisplay()
  const menus = [
    { title: 'Ballina', route: '/', icon: 'mdi-home'},
    { title: 'Serviset', route: '/serviset', icon: 'mdi-home-city-outline' },
    { title: 'Kontakto', route: '/kontakto', icon: 'mdi-card-account-phone'},
  ];
</script>
