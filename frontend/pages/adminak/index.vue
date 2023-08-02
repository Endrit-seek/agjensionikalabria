<template>
  <div>
    <ClientOnly>
      <v-row align="center" justify="center" style="height:100vh">
        <v-card
          class="mx-auto pa-12 pb-8"
          elevation="8"
          rounded="lg"
          title="Krijo nje postim"
          subtitle="Zgjedh dhe mbush detajet e meposhtme"
          variant="outlined"
          width="800"
        >
        <v-form validate-on="submit lazy" @submit.prevent="handleAddPost">
            <v-container>
              <v-row>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="title.value.value"
                    :error-messages="title.errorMessage.value || errors.$state.errors.title"
                    id="title"
                    name="title"
                    density="compact"
                    placeholder="psh: Banese ne shitje"
                    label="Titulli i Postimit"
                    prepend-icon="mdi-format-title"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="description.value.value"
                    :error-messages="description.errorMessage.value || errors.$state.errors.description"
                    id="description"
                    name="description"
                    density="compact"
                    placeholder="Pershkrimi i postimit"
                    label="Pershkrimi"
                    prepend-icon="mdi-subtitles"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-autocomplete
                    v-model="(type.value.value as string)"
                    :error-messages="type.errorMessage.value || errors.$state.errors.type"
                    id="type"
                    :items="llojet"
                    name="type"
                    density="compact"
                    placeholder="Lloji i produktit"
                    label="Lloji"
                    prepend-icon="mdi-office-building-cog"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-autocomplete
                    v-model="(status.value.value as string)"
                    :error-messages="status.errorMessage.value || errors.$state.errors.status"
                    id="status"
                    name="status"
                    :items="statuset"
                    density="compact"
                    placeholder="Statusi i produktit"
                    label="Statusi"
                    prepend-icon="mdi-tag"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="price.value.value"
                    :error-messages="price.errorMessage.value || errors.$state.errors.price"
                    id="price"
                    name="price"
                    density="compact"
                    placeholder="Qmimi i Produktit"
                    label="Qmimi"
                    prepend-icon="mdi-currency-eur"
                    variant="outlined"
                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col  cols="12" md="4">
                  <v-autocomplete
                    v-if="cities"
                    v-model="city.value.value"
                    :error-messages="city.errorMessage.value || errors.$state.errors.city"
                    id="city"
                    name="city"
                    density="compact"
                    placeholder="Qyteti ku gjindet produkti"
                    label="Qyteti"
                    prepend-icon="mdi-city"
                    variant="outlined"  
                    clearable
                    :items="cities.map((city) => ({
                      value: city.id,
                      title: city.name
                    }))"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="address.value.value"
                    :error-messages="address.errorMessage.value || errors.$state.errors.address"
                    id="address"
                    name="address"
                    density="compact"
                    placeholder="Lagjia ku gjindet produkti"
                    label="Lagjia"
                    prepend-icon="mdi-home-city"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="street.value.value"
                    :error-messages="street.errorMessage.value || errors.$state.errors.street"
                    id="street"
                    name="street"
                    density="compact"
                    placeholder="Rruga ku gjindet produkti"
                    label="Rruga"
                    prepend-icon="mdi-road-variant"
                    variant="outlined"
                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="space.value.value"
                    :error-messages="space.errorMessage.value || errors.$state.errors.space"
                    id="space"
                    type="number"
                    name="space"
                    density="compact"
                    placeholder="Hapesira e produktit"
                    label="Hapesira/Siperfaqja (m2)"
                    prepend-icon="mdi-texture-box"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="room.value.value"
                    :error-messages="room.errorMessage.value || errors.$state.errors.room"
                    id="room"
                    name="room"
                    type="number"
                    density="compact"
                    placeholder="Sa dhoma gjinden"
                    label="Dhomat"
                    prepend-icon="mdi-bed"
                    variant="outlined"
                  />
                </v-col>
                <v-col  cols="12" md="4">
                  <v-text-field
                    v-model="bath.value.value"
                    :error-messages="bath.errorMessage.value || errors.$state.errors.bath"
                    id="bath"
                    type="number"
                    name="bath"
                    density="compact"
                    placeholder="Sa banjo gjinden"
                    label="Banjot"
                    prepend-icon="mdi-bathtub"
                    variant="outlined"
                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col  cols="12" md="4">
                  <v-radio-group  v-model="furnished.value.value"
                    :error-messages="furnished.errorMessage.value || errors.$state.errors.furnished"
                    id="furnished"
                    name="furnished"
                    density="compact"
                    placeholder="A eshte e mobiluar?"
                    label="Mobilje"
                    prepend-icon="mdi-sofa"
                    variant="outlined">
                    <v-radio label="Po" value="1"></v-radio>
                    <v-radio label="Jo" value="0"></v-radio>
                  </v-radio-group>
                </v-col>
              </v-row>
              <v-row>
                <v-container fill-height>
                  <v-row justify="center">
                    <v-col cols="12" sm="4">
                      <FilePond :disabled="isDisabled" @files="updateFiles"></FilePond>
                    </v-col>
                  </v-row>
                </v-container>
                <v-btn :disabled="isDisabled" type="submit" block class="mt-2">Krijo Postin</v-btn>
              </v-row>
            </v-container>
          </v-form>
        </v-card>
      </v-row>
    </ClientOnly>
  </div>
</template>

<script lang="ts" setup>
  definePageMeta({
    layout: 'admin'
  })
  const { store } = useProduct();
  const { index } = useCity();
  const cities = await index();
  const statuset = ['Per Qera', 'Per Shitje'];
  const llojet = ['Banese', 'Shtepi', 'Zyre', 'Toke', 'Shtepi'];

  const errors = useErrorStore();

  const { handleSubmit } = useForm({
    validationSchema: {
      title (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      description (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      type (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      price (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      status (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      city (value: string) {
        if (value) return true

        return 'City is required.'
      },
      address (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      street (value: string) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
      space (value: number) {
        if (value >= 0) return true

        return 'Shtyp numer pozitiv'
      },
      room (value: number) {
        if (value >= 0) return true

        return 'Shtyp numer pozitiv'
      },
      bath (value: number) {
        if (value >= 0) return true

        return 'Shtyp numer pozitiv'
      },
      furnished (value: string) {
        if (value?.length >= 1) return true

        return 'Name needs to be at least 2 characters.'
      },
    }
  })
  

  const images = ref<Array<string>>([]);
  const title = useField('title');
  const description = useField('description');
  const type = useField('type');
  const price = useField('price');
  const status = useField('status');
  const city = useField('city');
  const address = useField('address');
  const street = useField('street');
  const space = useField('space');
  const room = useField('room');
  const bath = useField('bath');
  const furnished = useField('furnished');

  const isDirty = useIsFormDirty();
  const isValid = useIsFormValid();

  const isDisabled = computed(() => {
    return !isDirty.value || !isValid.value;
  });

  const handleAddPost = handleSubmit(async (values) => {
    await store({
      title: values.title,
      description: values.description,
      price: values.price,
      type: values.type,
      status: values.status,
      address: values.address,
      space: values.space,
      room: values.room,
      bath: values.bath,
      furnished: values.furnished,
      city_id: values.city,
      street: values.street,
      medias: images.value,
    })
  })

  function updateFiles(files: any) {
    images.value = files.value;
  }
</script>