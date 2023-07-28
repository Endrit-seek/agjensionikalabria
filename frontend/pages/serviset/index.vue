<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="3">
          <v-sheet rounded="lg">
            <v-list height="86vh" color="transparent">
              <div class="d-flex justify-space-around align-center ma-2">
                <v-chip variant="text">FILTRIMI I PRODUKTEVE</v-chip>
                <v-chip prepend-icon="mdi-autorenew" color="red" @click.native.stop.prevent="resetFilter()">
                  RESETO FILTRIMET
                </v-chip>
              </div>

              <v-list-item>
                <v-text-field
                  v-model="filteredTitle"
                  hide-details
                  density="compact"
                  variant="outlined"  
                  class="mb-2 pt-2"
                  label="Titulli"
                  placeholder="Titulli i produktit / Kodi i identifikimit"
                  prepend-icon="mdi-lock"
                />
              </v-list-item>

              <v-divider />

              <v-list-item>
                  <v-autocomplete
                    v-model="filteredCity"
                    id="city"
                    name="city"
                    density="compact"
                    placeholder="Qyteti ku gjindet produkti"
                    class="pt-3"
                    label="Qyteti"
                    prepend-icon="mdi-city"
                    variant="outlined"
                    return-object
                    clearable
                    :items="cities ? 
                      cities.map((city) => ({
                        value: city.id,
                        title: city.name
                      })) : ['Nuk ka qytete te gatshme']
                    "
                  />

                  <v-text-field
                    v-model="filteredAddress"
                    prepend-icon="mdi-home-city"
                    density="compact"
                    placeholder="Lagjia ku gjindet produkti"
                    variant="outlined"  
                    label="Lagjia"
                  />

                  <v-text-field
                    v-model="filteredStreet"
                    id="street"
                    name="street"
                    density="compact"
                    placeholder="Rruga ku gjindet produkti"
                    label="Rruga"
                    prepend-icon="mdi-road-variant"
                    variant="outlined"
                  />

                  <v-autocomplete
                    v-model="filteredType"
                    :items="llojet"
                    prepend-icon="mdi-office-building-cog"
                    placeholder="Lloji i produktit"
                    density="compact"
                    clearable
                    variant="outlined"  
                    label="Lloji"
                  />

                  <v-autocomplete
                    v-model="filteredStatus"
                    :items="statuset"
                    prepend-icon="mdi-tag"
                    placeholder="Statusi i produktit"
                    density="compact"
                    clearable
                    variant="outlined"  
                    label="Statusi"
                  />

                  <v-row dense>
                    <v-col cols="6" sm="5">
                      <v-text-field
                        v-model="filteredMinPrice"
                        suffix="€"
                        prepend-icon="mdi-cash-minus"
                        label="Vlera Min."
                        density="compact"
                        variant="outlined"  
                      />
                    </v-col>

                    <v-col cols="1" sm="2">
                      <p class="pt-2 text-center">Deri</p>
                    </v-col>

                    <v-col cols="5" sm="5">
                      <v-text-field
                        v-model="filteredMaxPrice"
                        suffix="€"
                        append-icon="mdi-cash-plus"
                        label="Vlera Maks."
                        density="compact"
                        variant="outlined"  
                      />
                    </v-col>
                  </v-row>
              </v-list-item>

              <v-divider />

              <v-list-item class="mt-2">
                  <v-text-field
                    v-model="filteredSpace"
                    type="number"
                    placeholder="Sa ka hapesire produkti"
                    prepend-icon="mdi-texture-box"
                    density="compact"
                    variant="outlined"
                    suffix="m&#178;"
                    label="Hapesira"
                  />

                  <v-text-field
                    v-model="filteredRoom"
                    type="number"
                    placeholder="Sa dhoma ka produkti"
                    prepend-icon="mdi-bed"
                    density="compact"
                    variant="outlined"
                    label="Dhoma"
                  />

                  <v-text-field
                    v-model="filteredBath"
                    type="number"
                    placeholder="Sa banjo ka produkti"
                    prepend-icon="mdi-bathtub"
                    density="compact"
                    variant="outlined"
                    label="Banjo"
                  />

                  <div style="height: 40px" class="d-flex justify-start align-top">
                    <v-icon
                      icon="mdi-sofa"
                      class="mr-5 mt-2"
                      style="color: rgb(149, 149, 149)"
                    />

                    <div class="mt-2 mr-2">E Mobiluar?</div>

                    <v-radio-group v-model="filteredFurnished" class="justify-start align-top" inline>
                      <v-radio label="Po" key="1" value="1" @click.native.stop.prevent="resetGroup('1')" />
                      <v-radio label="Jo" key="0" value="0" @click.native.stop.prevent="resetGroup('0')" />
                    </v-radio-group>
                  </div>
              </v-list-item>
            </v-list>
          </v-sheet>
        </v-col>

        <v-col>
          <v-sheet min-height="70vh" rounded="lg" class="pt-5">
            <div v-if="filteredProducts && filteredProducts.length > 0">
              
              <ServiceProducts :products="filteredProducts" :cities="cities"/>

              <div class="text-center mt-12">
                <v-pagination v-model="page" :length="6"></v-pagination>
              </div>
            </div>

            <div v-else>
              Nuk ka produkte
            </div>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script setup lang="ts">
  const filteredTitle = ref<string>('');
  const filteredCity = ref<{value: number; title: string}>();
  const filteredAddress = ref<string>('');
  const filteredStreet = ref<string>('');
  const filteredType = ref<string>();
  const filteredStatus = ref<string>();
  const filteredMinPrice = ref<number>();
  const filteredMaxPrice = ref<number>();
  const filteredSpace = ref<string>();
  const filteredRoom = ref<string>();
  const filteredBath = ref<string>();
  const filteredFurnished = ref<string>();
  const tempFurnished = ref<string>();
  
  const statuset = ['Me Qera', 'Per Shitje'];
  const llojet = ['Banese', 'Shtepi', 'Zyre', 'Toke', 'Shtepi'];
  const valueRange = ref([0, 1000000]);

  const page = 1;

  const { products } = useProductStore()
  const { cities } = useCityStore()

  const filteredProducts = computed(() => {
    return products
      .filter((item: Product) => {
        return filteredTitle.value ? item.title.toLowerCase().includes(filteredTitle.value.toLowerCase()) : products
      })
      .filter((item: Product) => {
        return filteredCity.value ? item.city_id === filteredCity.value.value : products
      })
      .filter((item: Product) => {
        return filteredAddress.value ? item.address.toLowerCase().includes(filteredAddress.value.toLowerCase()) : products
      })
      .filter((item: Product) => {
        return filteredStreet.value ? item.street.toLowerCase().includes(filteredStreet.value.toLowerCase()) : products
      })
      .filter((item: Product) => {
        return filteredType.value ? item.type.toLocaleLowerCase().match(filteredType.value.toLowerCase())  : products
      })
      .filter((item: Product) => {
        return filteredStatus.value ? item.status.toLowerCase().match(filteredStatus.value.toLowerCase()) : products
      })
      .filter((item: Product) => {
        if (filteredMinPrice.value && !filteredMaxPrice.value) {
          return item.price >= filteredMinPrice.value;
        } else if (!filteredMinPrice.value && filteredMaxPrice.value) {
          return item.price <= filteredMaxPrice.value;
        } else if (filteredMinPrice.value && filteredMaxPrice.value) {
          return item.price >= filteredMinPrice.value && item.price <= filteredMaxPrice.value;
        }
        return products;
      })
      .filter((item: Product) => {
        return filteredSpace.value ? item.space.toString().includes(filteredSpace.value) : products
      })
      .filter((item: Product) => {
        return filteredRoom.value ? item.room.toString().includes(filteredRoom.value) : products
      })
      .filter((item: Product) => {
        return filteredBath.value ? item.bath.toString().includes(filteredBath.value) : products
      })
      .filter((item: Product) => {
        return filteredFurnished.value ? item.furnished.toString().match(filteredFurnished.value) : products
      })
  })

  function resetGroup(value: string) {
    tempFurnished.value = filteredFurnished.value === value ? '' : value;
    filteredFurnished.value = tempFurnished.value;
  }

  function resetFilter() {
    filteredTitle.value = '';
    filteredCity.value = undefined;
    filteredAddress.value = '';
    filteredStreet.value = '';
    filteredType.value = undefined;
    filteredStatus.value = undefined;
    filteredMinPrice.value = undefined;
    filteredMaxPrice.value = undefined;
    filteredSpace.value = '';
    filteredRoom.value = '';
    filteredBath.value = '';
    filteredFurnished.value = '';
    tempFurnished.value = '';
  }
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

  /* Remove arrows for number fields for Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Remove arrows for number fields for Firefox */
  input[type=number] {
    appearance: textfield;
    -moz-appearance: textfield;
  }
</style>
