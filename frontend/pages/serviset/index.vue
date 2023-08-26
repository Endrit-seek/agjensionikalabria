<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" sm="4">
          <v-sheet rounded="lg">
            <v-list v-model:opened="open" :height="open ? '' : '86vh'">
              <v-list-group value="Filtrimet" fluid>
                <template v-slot:activator="{ props }">
                  <v-list-item
                    v-bind="props"
                    prepend-icon="mdi-filter-menu-outline"
                    title="Filtrimet"
                  />
                </template>
                <div class="d-flex justify-space-around align-center ma-2">
                  <v-chip variant="text">FILTRIMI I PRODUKTEVE</v-chip>
                  <v-chip prepend-icon="mdi-autorenew" color="red" @click.native.stop.prevent="resetFilter()">
                    RESETO
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
                    placeholder="Titulli i produktit"
                    prepend-icon="mdi-format-title"
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
                      :items="
                        cities.map((city) => ({
                          value: city.id,
                          title: city.name
                        }))
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
                      <v-col :cols="mdAndUp ? '5' : '12'">
                        <v-text-field
                          v-model="filteredMinPrice"
                          suffix="€"
                          prepend-icon="mdi-cash-minus"
                          label="Vlera min"
                          density="compact"
                          variant="outlined"
                        />
                      </v-col>

                      <v-col :cols="mdAndUp ? '2' : '12'">
                        <p v-if="mdAndUp" class="pt-2 text-center">Deri</p>
                      </v-col>

                      <v-col :cols="mdAndUp ? '5' : '12'">
                        <v-text-field
                          v-model="filteredMaxPrice"
                          suffix="€"
                          :append-icon="mdAndUp ? 'mdi-cash-plus' : ''"
                          :prepend-icon="mdAndUp ? '' : 'mdi-cash-plus'"
                          label="Vlera maks"
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
                      class="pt-3"
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
              </v-list-group>
            </v-list>
          </v-sheet>
        </v-col>

        <v-col cols="12" sm="8">
          <v-sheet min-height="auto" height="100%" rounded="lg" class="pt-5">
            <v-row style="height: 70vh;" class="d-flex justify-center align-center" v-if="filteredProducts && filteredProducts.length > 0">
              <v-col cols="12">
                <v-row no-guttersclass="align-center">
                  <v-col :cols="mdAndUp ? 2 : 3" class="d-flex justify-end align-center">
                    {{ mdAndUp ? 'Rradhit Produktet permes' : 'Rradhit:'}}
                  </v-col>
                  <v-col :cols="mdAndUp ? 2 : 4" class="d-flex justify-center align-center">
                    <v-btn
                      :append-icon="sortPrice ? 'fa:fas fa-arrow-down-9-1 fa-sm' : 'fa:fas fa-arrow-down-1-9 fa-sm'"
                      @click="sortByPrice()"
                    >
                      Qmimit
                    </v-btn>
                  </v-col>
                  <v-col :cols="mdAndUp ? 0 : 4">
                    <v-btn
                      :append-icon="sortDate ? 'mdi-sort-calendar-ascending' : 'mdi-sort-calendar-descending'"
                      @click="sortByDate()"
                    >
                      {{ mdAndUp ? 'Dates se krijuar' : 'Dates'}}
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12">
                <ServiceProducts :products="filteredProducts" :cities="cities"/>
              </v-col>

              <v-col cols="12">
                <div class="text-center mt-12">
                  <v-pagination v-model="productStore.page" :length="productStore.meta.last_page" @update:model-value="updatePage"></v-pagination>
                </div>
              </v-col>
            </v-row>

            <v-row v-if="!filteredProducts" style="height: 70vh;" class="d-flex justify-center align-center">
              <v-icon class="pr-7" icon="mdi-emoticon-sad-outline" size="70"/><h1>Nuk ka produkte</h1>
            </v-row>
          </v-sheet>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script setup lang="ts">
  import moment from 'moment';
  import { useDisplay } from 'vuetify'

  const { mdAndUp } = useDisplay()
  const open = ref<Array<string>>([mdAndUp ? 'Filtrimet' : ''])

  const productStore = useProductStore()
  const { cities } = useCityStore()

  const filteredTitle = ref<string>();
  const filteredCity = ref<{value: number; title: string}>();
  const filteredAddress = ref<string>();
  const filteredStreet = ref<string>();
  const filteredType = ref<string>();
  const filteredStatus = ref<string>();
  const filteredMinPrice = ref<number>();
  const filteredMaxPrice = ref<number>();
  const filteredSpace = ref<string>();
  const filteredRoom = ref<string>();
  const filteredBath = ref<string>();
  const filteredFurnished = ref<string>();
  const tempFurnished = ref<string>();

  // true: Qmimi me I larte tek me I ulet, Data me e hershme tek me e vonshme
  // false: Qmimi me I ulet tek me I larte, Data me e vonshme tek me e hershme
  const sortPrice = ref<boolean | undefined>(undefined)
  const sortDate = ref<boolean | undefined>(undefined)

  const statuset = ['Me Qera', 'Per Shitje'];
  const llojet = ['Banese', 'Shtepi', 'Zyre', 'Toke', 'Shtepi'];
  const valueRange = ref([0, 1000000]);

  const filteredProducts = computed(() => {
    return productStore.products
      .sort((fp1: Product, fp2: Product) => {
        const fp1Date = moment(fp1.created_at).format("DD-MM-YYYY HH:mm:ss");
        const fp2Date = moment(fp2.created_at).format("DD-MM-YYYY HH:mm:ss");
        return (fp1Date < fp2Date) ? 1 : (fp1Date > fp2Date) ? -1 : 0
      })
      .filter((item: Product) => {
        return filteredTitle.value ? item.title.toLowerCase().includes(filteredTitle.value.toLowerCase()) : productStore.products
      })
      .filter((item: Product) => {
        return filteredCity.value ? item.city_id === filteredCity.value.value : productStore.products
      })
      .filter((item: Product) => {
        return filteredAddress.value ? item.address.toLowerCase().includes(filteredAddress.value.toLowerCase()) : productStore.products
      })
      .filter((item: Product) => {
        return filteredStreet.value ? item.street.toLowerCase().includes(filteredStreet.value.toLowerCase()) : productStore.products
      })
      .filter((item: Product) => {
        return filteredType.value ? item.type.toLocaleLowerCase().match(filteredType.value.toLowerCase())  : productStore.products
      })
      .filter((item: Product) => {
        return filteredStatus.value ? item.status.toLowerCase().match(filteredStatus.value.toLowerCase()) : productStore.products
      })
      .filter((item: Product) => {
        if (filteredMinPrice.value && !filteredMaxPrice.value) {
          return item.price >= filteredMinPrice.value;
        } else if (!filteredMinPrice.value && filteredMaxPrice.value) {
          return item.price <= filteredMaxPrice.value;
        } else if (filteredMinPrice.value && filteredMaxPrice.value) {
          return item.price >= filteredMinPrice.value && item.price <= filteredMaxPrice.value;
        }
        return productStore.products;
      })
      .filter((item: Product) => {
        return filteredSpace.value ? item.space.toString().includes(filteredSpace.value) : productStore.products
      })
      .filter((item: Product) => {
        return filteredRoom.value ? item.room.toString().includes(filteredRoom.value) : productStore.products
      })
      .filter((item: Product) => {
        return filteredBath.value ? item.bath.toString().includes(filteredBath.value) : productStore.products
      })
      .filter((item: Product) => {
        return filteredFurnished.value ? item.furnished.toString().match(filteredFurnished.value) : productStore.products
      })
      .sort((fp1: Product, fp2: Product) => {
        if (sortPrice.value) return (fp1.price < fp2.price) ? 1 : (fp1.price > fp2.price) ? -1 : 0
        if (!sortPrice.value) return (fp1.price > fp2.price) ? 1 : (fp1.price < fp2.price) ? -1 : 0
        return 0;
      })
      .sort((fp1: Product, fp2: Product) => {
        const fp1Date = moment(fp1.created_at).format("DD-MM-YYYY HH:mm:ss");
        const fp2Date = moment(fp2.created_at).format("DD-MM-YYYY HH:mm:ss");
        if (sortDate.value) return (fp1Date < fp2Date) ? 1 : (fp1Date > fp2Date) ? -1 : 0
        if (!sortDate.value) return (fp1Date > fp2Date) ? 1 : (fp1Date < fp2Date) ? -1 : 0
        return 0
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

  function sortByPrice() {
    if (sortPrice.value === undefined) sortPrice.value = true;
    else sortPrice.value = !sortPrice.value
  }

  function sortByDate() {
    if (sortDate.value === undefined) sortDate.value = true;
    else sortDate.value = !sortDate.value;
  }

  function updatePage(index: number) {
    productStore.page = index;
    productStore.fetchProducts(index);
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
