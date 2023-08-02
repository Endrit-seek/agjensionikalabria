<template>
  <div>
    <ClientOnly>
      <v-container v-if="product">
        <v-row>
          <v-col cols="9">
            <v-sheet height="auto" width="auto" border rounded>
              <v-carousel >
                <v-carousel-item
                  v-for="(media, i) in product.medias"
                  :key="i"
                  :src="media.url"
                  cover
                />
              </v-carousel>
            </v-sheet>

          </v-col>
          <v-col>
            <v-sheet min-height="52vh" height="auto" width="auto" border rounded>
              <v-row>
                <v-col>
                  <v-card class="pl-4 pb-2" title="Informacione">
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-office-building-cog" />
                          Lloji: {{ product.type }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-tag" />
                          Statusi: {{ product.status }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-cash"/>
                          Qmimi: {{ product.price  }}€
                        </div>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-col>
                <v-col>
                  <v-card class="pl-4" title="Adresa">
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-city" />
                          Qyteti: {{ cities.find((city) => city.id === product?.city_id)?.name }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-home-city" />
                          Lagjia: {{ product.address }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-road-variant" />
                          Rruga: {{ product.street }}
                        </div>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-card class="pl-4 pb-4" title="Brendesia">
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-texture-box" />
                          Siperfaqja: {{ product.space }}m2
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-bed" />
                          Dhoma: {{ product.room }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-bathtub" />
                          Banjo: {{ product.bath }}
                        </div>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        <div>
                          <v-icon icon="mdi-sofa" />
                          E Mobiluar: {{ product.furnished ? 'Po' : 'Jo' }}
                        </div>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-col>
              </v-row>
            </v-sheet>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-sheet min-height="40vh" height="auto" width="auto" border rounded>
              <div class="ma-3"><h1>{{ product.title }}</h1></div>
              <div class="ma-3"><h4>{{ product.description }}</h4></div>
            </v-sheet>
          </v-col>
          <v-col>
            <v-sheet min-height="40vh" height="auto" width="auto" border rounded>
              <div class="ma-3">
                
                <h1><v-icon icon="mdi-phone" size="sm"/> Na kontaktoni: +383 xx xx</h1>
              </div>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </ClientOnly>
  </div>
</template>
<script setup lang="ts">
const product = ref<Product>();
const { cities } = useCityStore();

onMounted(async () => {
    const route = useRoute()
    const { show } = useProduct()
    const response = await show(parseInt(route.params.id as string, 10))
    product.value = response;
})
</script>
