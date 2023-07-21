<template>
  <div>
    <v-container v-if="product">
      <v-row>
        <v-col>
          <v-sheet height="50vh" width="auto" border rounded>
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
          <v-sheet height="60vh" width="auto" border rounded>
            <v-card class="pa-4 ma-4">
              <v-row>
                <v-col>
                  <v-textfield>{{ product.title }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.description }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.type }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.price  }}€</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.status }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.address }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.space }}m2</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.room }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.bath }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.furnished }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.city }}</v-textfield>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textfield>{{ product.street }}</v-textfield>
                </v-col>
              </v-row>
            </v-card>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script setup lang="ts">
const product = ref<Product>();

onMounted(async () => {
    const route = useRoute()
    const { show } = useProduct()
    const response = await show(parseInt(route.params.id as string, 10))
    product.value = response;
})
</script>
