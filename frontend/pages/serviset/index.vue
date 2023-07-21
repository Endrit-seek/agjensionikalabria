<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="3">
          <v-sheet rounded="lg">
            <v-list color="transparent">
              <v-card-title>Filtrimet</v-card-title>
              <v-divider class="mt-2"></v-divider>
              <v-list-item>
                <v-text-field
                  hide-details
                  class="mb-2 pt-2"
                  label="Kodi i Identifikimit / Titulli"
                  prepend-icon="mdi-lock"
                  variant="outlined"
                />
              </v-list-item>
              <v-divider />
              <v-list-item class="mt-2">
                <v-list-item-content>
                  <v-list-item-title class="mb-2">Filtrimi i Pergjithshem</v-list-item-title>
                  <v-autocomplete
                    v-model="qytetiValue"
                    :items="qytetet"
                    prepend-icon="mdi-city"
                    outlined
                    label="Qyteti"
                  />
                  <v-autocomplete
                    v-model="lagjiaValue"
                    :items="lagjet"
                    prepend-icon="mdi-road-variant"
                    outlined
                    label="Lagjia"
                  />
                  <v-autocomplete
                    v-model="llojiValue"
                    :items="llojet"
                    prepend-icon="mdi-office-building-cog"
                    outlined
                    label="Lloji"
                  />
                  <v-autocomplete
                    v-model="statusiValue"
                    :items="statuset"
                    prepend-icon="mdi-tag"
                    outlined
                    label="Statusi"
                  />
                  <v-row class="pa-2" dense>
                    <v-col cols="12" sm="5">
                      <v-text-field
                        suffix="€"
                        :value="valueRange[0]"
                        :rules="[numberRule]"
                        label="Minimum"
                        outlined
                        dense
                        @change="$set(valueRange, 0, $event)"
                      />
                    </v-col>
                    <v-col cols="12" sm="2">
                      <p class="pt-4 text-center">Deri</p>
                    </v-col>
                    <v-col cols="12" sm="5">
                      <v-text-field
                        suffix="€"
                        :rules="[numberRule]"
                        :value="valueRange[1]"
                        label="Maksimum"
                        outlined
                        dense
                        @change="$set(valueRange, 1, $event)"
                      />
                    </v-col>
                  </v-row>
                </v-list-item-content>
              </v-list-item>

              <v-divider />
              <v-list-item class="mt-2">
                <v-list-item-content>
                  <v-list-item-title class="mb-2">Filtrimi i Prones</v-list-item-title>
                  <v-text-field prepend-icon="mdi-texture-box" outlined label="Hapesira" />
                  <v-autocomplete prepend-icon="mdi-bed" outlined label="Dhoma" />
                  <v-autocomplete prepend-icon="mdi-bathtub" outlined label="Banjo" />
                  <div class="d-flex justify-start align-center">
                    <v-icon class="mr-5" style="color: rgb(149, 149, 149)">mdi-sofa</v-icon>
                    E Mobiluar?
                    <v-spacer></v-spacer>
                    <v-radio-group v-model="mobiluarRadio" class="justify-center mt-5" row inline>
                      <v-radio label="Po" value="radio-1"></v-radio>
                      <v-spacer></v-spacer>
                      <v-radio label="Jo" value="radio-2"></v-radio>
                    </v-radio-group>
                  </div>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-sheet>
        </v-col>

        <v-col>
          <v-sheet min-height="70vh" rounded="lg" class="pt-5">
            <div class="col-md-9 col-sm-9 col-xs-12">
              <v-row v-if="products.data" class="mx-1">
                <v-col v-for="pro in products.data" :key="pro.id" cols="4">
                  <v-hover v-slot="{ isHovering, props }">
                    <v-card
                      :elevation="isHovering ? 12 : 2"
                      v-bind="props"
                      class="mx-auto"
                      color="grey lighten-4"
                      :class="{ 'on-hover': isHovering }"
                      width="420"
                      :to="'/serviset/' + pro.id"
                    >
                      <v-img :cover="true" :aspect-ratio="16 / 9" height="200px" :src="pro.medias[0] ? pro.medias[0].url : ''">
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
                        <div>
                          <v-icon icon="mdi-city" />
                          {{ pro.city }}
                        </div>

                        <div>
                          <v-icon icon="mdi-road-variant" />
                          {{ pro.address }}
                        </div>
                      </v-card-text>
                      <v-divider></v-divider>
                      <v-card-text class="d-flex justify-space-between">
                        <div>
                          <v-icon icon="mdi-texture-box" />
                          {{ pro.space }}
                        </div>
                        <div>
                          <v-icon icon="mdi-bed" />
                          {{ pro.room }}
                        </div>
                        <div>
                          <v-icon icon="mdi-bathtub" />
                          {{ pro.bath }}
                        </div>
                        <div>
                          <v-icon icon="mdi-sofa" />
                          {{ pro.furnished ? 'Po' : 'Jo' }}
                        </div>
                      </v-card-text>
                    </v-card>
                  </v-hover>
                </v-col>
              </v-row>
            </div>
            <div class="text-center mt-12">
              <v-pagination v-model="page" :length="6"></v-pagination>
            </div>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script setup>
const lagjiaValue = ref(null);
const qytetiValue = ref(null);
const llojiValue = ref(null);
const statusiValue = ref(null);

const valueRange = ref([0, 1000000]);
const mobiluarRadio = ref(null);

const page = 1;

const { index } = useProduct()
const products = await index()
console.log(products);

const statuset = ['Per Qera', 'Per Shitje'];
const llojet = ['Banese', 'Shtepi', 'Zyre', 'Toke', 'Shtepi'];
// const { data: qytetet } = await useFetch(() => `/api/qytetet`);
// const { data: lagjet } = await useFetch(() => `/api/lagjet`);
// const { data: posts } = await useFetch(`http://localhost:8000/api/posts`);

const numberRule = [
  v =>
    (v && v >= valueRange.value[0]) ||
    `Vlera minimale duhet te jete se paku ${valueRange.value[0]}`,
  v =>
    (v && v <= valueRange.value[1]) ||
    `Vlera maksimale duhet te jete se paku ${valueRange.value[1]}`,
];
</script>

<style>
  .flex-center {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .v-img--booting .v-responsive__sizer {
    position: absolute !important;
  }
  .v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    position: absolute;
    width: 100%;
  }

  .v-card {
    transition: opacity 0.4s ease-in-out;
  }

  .v-card:not(.on-hover) {
    opacity: 0.8;
  }
</style>
