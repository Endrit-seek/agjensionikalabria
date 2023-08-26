<template>
  <div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <v-row class="mx-1">
        <v-col v-for="pro in products" :key="pro.title" :cols="mdAndUp ? 4 : 12">
          <v-hover v-slot="{ isHovering, props }">
            <v-card
              :elevation="isHovering ? 12 : 2"
              v-bind="props"
              class="mx-auto"
              color="grey lighten-4"
              :class="{ 'on-hover': isHovering }"
              max-width="420"
              :to="'/serviset/' + pro.id"
            >
              <v-img
                :cover="true"
                :aspect-ratio="16 / 9"
                height="200px"
                :src="pro.medias[0] ? pro.medias[0].url : '/img/C1.jpg'"
              >
                <v-expand-transition>
                  <div
                    v-if="isHovering"
                    class="d-flex transition-fast-in-fast-out v-card--reveal white--text"
                    style="height: 100%"
                  >
                    <v-btn v-if="isHovering" outlined>
                      Shiqo me shume
                    </v-btn>
                  </div>
                </v-expand-transition>
              </v-img>

              <v-card-title>{{ pro.title }}</v-card-title>

              <v-card-text>
                <v-row>
                  <v-col cols="9">
                    <div>
                      <v-icon icon="mdi-city" />
                      Qyteti: {{ cities.find((city) => city.id === pro.city_id)?.name }}
                    </div>

                    <div>
                      <v-icon icon="mdi-home-city" />
                      Lagjia: {{ pro.address }}
                    </div>

                    <div>
                      <v-icon icon="mdi-road-variant" />
                      Rruga: {{ pro.street }}
                    </div>
                    <div>
                      <v-icon icon="mdi-calendar-range" />
                      Data e Krijuar: {{ moment(pro.created_at).format("DD-MM-YYYY HH:mm:ss") }}
                    </div>
                  </v-col>
                  <v-col justify="end" align="end" cols="3">
                    <v-chip color="black">
                      {{ pro.price }} &#8364;
                    </v-chip>
                  </v-col>
                </v-row>

              </v-card-text>

              <v-divider />

              <v-card-text class="d-flex justify-space-between">
                <div>
                  <v-icon icon="mdi-texture-box" />
                  {{ pro.space }}	m&#178;
                </div>

                <div>
                  <v-icon icon="mdi-bed" />
                  {{ pro.room }} dhoma
                </div>

                <div>
                  <v-icon icon="mdi-bathtub" />
                  {{ pro.bath }} banjo
                </div>

                <div>
                  <v-icon icon="mdi-sofa" />
                  {{ pro.furnished ? 'E mobiluar' : 'Pa mobiluar' }}
                </div>
              </v-card-text>
            </v-card>
          </v-hover>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script setup lang="ts">
  import moment from 'moment'
  import { useDisplay } from 'vuetify'

  const { mdAndUp } = useDisplay()

  defineProps<{
    products: Product[]
    cities: City[]
  }>()
</script>

<style>
</style>
