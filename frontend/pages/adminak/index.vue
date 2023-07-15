<template>
  <div>
    <v-card
      title="Krijo nje postim"
      subtitle="Zgjedh dhe mbush detajet e meposhtme"
      variant="outlined"
      width="800"
    >
    
      <v-container fill-height>
          <v-row justify="center">
              <v-col cols="12" sm="4">
                <FilePond></FilePond>
              </v-col>
          </v-row>
      </v-container>
      <v-form>
        <v-container>
          <v-row>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Titulli"
                required
                prepend-icon="mdi-lock"
                variant="outlined"
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Pershkrimi"
                required
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Qmimi"
                required
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Qyteti"
                required
                prepend-icon="mdi-city"
                outlined
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Lagjia"
                required
                prepend-icon="mdi-road-variant"
                outlined
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Rruga"
                required
                prepend-icon="mdi-road-variant"
                outlined
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Siperfaqja (m2)"
                required
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Dhomat"
                required
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="Banjot"
                required
              />
            </v-col>
            <v-col  cols="12" md="4">
              <v-text-field
                label="E Mobiluar?"
                required
              />
            </v-col>
            <v-btn type="submit" block class="mt-2">Krijo Postin</v-btn>
          </v-row>
        </v-container>
      </v-form>
    </v-card>
  </div>
</template>

<script lang="ts" setup>
  definePageMeta({
    layout: false,
  })
  const height = ref<number>(350);
  const width = ref<number>(400);

</script>